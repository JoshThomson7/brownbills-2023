<?php
/**
 * Blog
 */

global $paged;
get_header();

$term = get_queried_object();

$title = 'News';
$has_featured = true;

$blog_args = array(
    'posts_per_page' => 1,
    'paged' => $paged
);

$featured_blog = FL1_Blogs::get_blogs($blog_args);
$featured_blog_id = reset($featured_blog['posts']);

if($term->taxonomy === 'category' || $term->taxonomy === 'post_tag') {

    $has_featured = false;
    $title = 'Blog - '.$term->name;
    $featured_blog_id = 0;

    // Featured

    $blog_args['tax_query'] = array(
        array(
            'taxonomy' => $term->taxonomy,
            'field' => 'id',
            'terms' => $term->term_id
        )
    );

}

$blog_args['posts_per_page'] = 15;
$blog_args['post__not_in'] = array($featured_blog_id);
$blogs = FL1_Blogs::get_blogs($blog_args);

$blog_cats = FL1_Blogs::get_categories();

?>

<section class="blog__header <?php if(!$has_featured): ?>no-featured<?php endif; ?>">
    <div class="max__width">
        <h1 class="blog__title"><?php echo $title; ?></h1>

        <?php if($has_featured): ?>
            <article class="blog__article blog__featured">
                <?php
                    if($featured_blog_id):
                    
                        $blog = new FL1_Blog($featured_blog_id);

                        // Image
                        $blog_image = $blog->image(300, 200, true);
                        $banner_image = '';
                        if(!empty($blog_image)) {
                            $banner_image = ' style="background-image: url('.$blog_image['url'].')"';
                        } else {
                            $banner_image = ' style="background-image: url('.get_stylesheet_directory_uri().'/img/sq-blog-placeholder.jpg)"';
                        }

                        // Main category
                        $blog_cat = $blog->main_category('id=>name');
                ?>
                    <a class="blog__img" href="<?php echo $blog->url(); ?>" <?php echo $banner_image; ?>></a>

                    <div class="blog__content">

                        <?php if($blog_cat): ?><h5><?php echo $blog_cat; ?></h5><?php endif; ?>
                        <h2><a href="<?php echo $blog->url(); ?>" title="<?php echo $blog->title(); ?>"><?php echo $blog->title(); ?></a></h2>

                        <date><?php echo $blog->date('M jS Y') ?></date>
                        
                        <div class="blog__more">
                            <a href="<?php echo $blog->url(); ?>" class="button primary gradient">
                                <span>Read more</span>
                            </a>
                        </div><!-- blog__more -->
                    </div>
                <?php endif; ?>
            </article>
        <?php endif; ?>
    </div>
</section>

<section class="blog">
    <div class="max__width">
        <div class="blog__loop grid">
            <?php include FL1_BLOG_PATH .'templates/blog-loop.php'; ?>
        </div>

        <div class="blog__filters">
            <article>
                <ul>
                    <li>
                        <a href="<?php echo home_url('/blog/'); ?>" <?php if(!$term->taxonomy): ?>class="active"<?php endif; ?>>Recent articles</a>
                    </li>
                    <?php
                        if(!empty($blog_cats)):
                            foreach($blog_cats as $blog_cat):
                                $active = '';
                                if($term->term_id == $blog_cat->term_id) {
                                    $active = 'active';
                                }
                        ?>
                            <li>
                                <a href="<?php echo get_term_link($blog_cat, 'category'); ?>" class="<?php echo $active; ?>"><?php echo $blog_cat->name; ?></a>
                            </li>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </ul>
            </article>
        </div>
    </div><!-- max__width -->
</section><!-- blog -->

<?php get_footer(); ?>

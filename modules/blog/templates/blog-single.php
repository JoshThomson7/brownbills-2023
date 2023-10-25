<?php
/*
*	Blog Single
*
*	@package Blog
*	@version 1.0
*/

global $post;
get_header();

$blog = new FL1_Blog($post->ID);

// Image
$blog_image = $blog->image(900, 700, true);
$banner_image = '';
if(!empty($blog_image)) {
    $banner_image = ' style="background-image: url('.$blog_image['url'].')"';
}

// Main category
$blog_cat = $blog->main_category('id=>name');
?>

<div class="max__width">

    <div class="blog__single">

        <article>            

            <div class="blog__info">
                <h5><a href="<?php echo esc_url(get_permalink(get_page_by_path('news'))); ?>">&lsaquo; Blog</a> / <?php echo $blog_cat; ?></h5>
                <h1><?php echo get_the_title($post->ID); ?></h1>
                <date><?php echo $blog->date('M jS Y') ?></date>
            </div>

        </article>

        <?php FC_Helpers::flexible_content(); ?>

    </div><!-- blog__single -->
</div><!-- max__width -->

<?php get_footer(); ?>

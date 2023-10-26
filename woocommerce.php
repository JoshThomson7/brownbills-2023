<?php
/*
    WooCommerce template
*/
get_header();

global $post;

// AVB::avb_banners();

// Shop options
$wc_custom_shop = false; // Custom shop - false for standard Woo
$wc_custom_archive = false; // Custom shop archive (tax) - false for standard Woo
$wc_sidebar = true; // Custom sidebar - false for no sidebar

$shop_image = ' style="background-image: url('.get_stylesheet_directory_uri().'/img/shop-img.webp)"';

?>

<section class="wc__wrapper">
    <?php
        if($wc_sidebar) {
            require_once(FL1_WOO_PATH.'templates/sidebar.php');
        }
    ?>

    <div class="wc__content<?php if($wc_sidebar && (is_shop() || is_tax(array('product_cat', 'product_tag'))  || is_search()) ) { echo ' wc__has__sidebar'; } ?>">
        <?php if(($wc_sidebar) && !is_shop()): ?>
            <div class="wc__filters">
                <a href="/shop"><i class="fal fa-chevron-left"></i> Back to Shop</a>
            </div><!-- wc__filters -->
        <?php endif; ?>

        <?php
            if(is_shop() && $wc_custom_shop) {
                require_once(FL1_WOO_PATH.'templates/shop.php');

            } else {
                if( $wc_custom_archive && (is_shop() || is_tax(array('product_cat', 'product_tag'))) ) {
                    require_once(FL1_WOO_PATH.'templates/archive-product.php');
                } else {
                    woocommerce_content();
                }
            }
        ?>
    </div><!-- wc__content -->
</section><!-- wc__wrapper -->

<?php get_footer(); ?>

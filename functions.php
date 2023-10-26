<?php
/**
 * WP Functions
 *
 * @author  FL1
 * @package WordPress
 *
 */

// Core
require_once 'core/class-fl1.php';
require_once 'modules/flexible-content/class-fc.php';
require_once 'modules/advanced-video-banners/functions/class-avb.php';
require_once 'modules/gravity-forms/functions/gf-functions.php';
require_once 'modules/advanced-team-members/functions/ateam-functions.php';
require_once 'modules/fl1-woo/class-fl1-woo.php';
require_once 'modules/fl1-client/class-fl1c.php';
include('modules/blog/functions/class-fl1-blog-module.php');

// Change "Read More" button text to "More Info" for out of stock products
function custom_change_out_of_stock_button_text($text, $product) {
    if (!$product->is_in_stock()) {
        $text = 'More Info';
    }
    return $text;
}
add_filter('woocommerce_product_add_to_cart_text', 'custom_change_out_of_stock_button_text', 10, 2);

?>

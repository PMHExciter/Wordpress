<?php
/**
 * Woocommerce hooks
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

function hello_mobili_woocommerce_body_class($classes)
{
    if (is_page() && function_exists('is_shop') && (is_shop() || is_tax('product_cat') || is_tax('product_tag') ||
            (is_search() && get_query_var('post_type') === 'product')
        )) {
        $classes[] = 'product-archive';
    }

    return $classes;
}

function hello_mobili_woocommerce_output_content_wrapper_start(){
    echo '<div class="container">';
    if (is_singular()){
        echo '<article class="post-item card">';
    }
}
function hello_mobili_woocommerce_output_content_wrapper_end(){
    if (is_singular()){
        echo '</article>';
    }
    echo '</div>';
}

add_filter('body_class', 'hello_mobili_woocommerce_body_class');
remove_action('woocommerce_before_main_content','woocommerce_output_content_wrapper');
add_action('woocommerce_before_main_content','hello_mobili_woocommerce_output_content_wrapper_start');
remove_action('woocommerce_after_main_content','woocommerce_output_content_wrapper_end');
add_action('woocommerce_after_main_content','hello_mobili_woocommerce_output_content_wrapper_end');
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10);
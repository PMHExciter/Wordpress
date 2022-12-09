<?php
/**
 * @package Fast Food Pizza
 * @subpackage fast-food-pizza
 * @since fast-food-pizza 1.0
 * Setup the WordPress core custom header feature.
 * @uses fast_food_pizza_header_style()
*/

function fast_food_pizza_custom_header_setup() {

	add_theme_support( 'custom-header', apply_filters( 'fast_food_pizza_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 80,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'fast_food_pizza_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'fast_food_pizza_custom_header_setup' );

if ( ! function_exists( 'fast_food_pizza_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'fast_food_pizza_header_style' );
function fast_food_pizza_header_style() {
	if ( get_header_image() ) :
	$fast_food_pizza_custom_css = "
        .bottom-header{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'fast-food-pizza-basic-style', $fast_food_pizza_custom_css );
	endif;
}
endif;
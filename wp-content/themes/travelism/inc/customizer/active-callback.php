<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

if ( ! function_exists( 'travelism_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Travelism 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travelism_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'travelism_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'travelism_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Travelism 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travelism_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'travelism_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'travelism_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Travelism 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function travelism_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/*====================Hero Banner======================*/

/**
 * Check if hero_banner section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_hero_banner_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[hero_banner_section_enable]' )->value() );
}

/*====================Northface Jacket======================*/

/**
 * Check if Northface Jacket section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_northface_jacket_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[northface_jacket_section_enable]' )->value() ) && class_exists( 'WooCommerce' );
}

/*====================wildlife section===================*/

/**
 * Check if wildlife section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_wildlife_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[wildlife_section_enable]' )->value() );
}

/*====================gallery section===================*/

/**
 * Check if gallery section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_gallery_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[gallery_section_enable]' )->value() );
}

/**
 * Check if gallery section content type is post.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_gallery_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travelism_theme_options[gallery_content_type]' )->value();
	return travelism_is_gallery_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if gallery section content type is trip.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_gallery_section_content_trip_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travelism_theme_options[gallery_content_type]' )->value();
	return travelism_is_gallery_section_enable( $control ) && ( 'trip' == $content_type );
}

/*====================Happy Clients section===================*/

/**
 * Check if happy_clients section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_happy_clients_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[happy_clients_section_enable]' )->value() );
}

/*==================Articles===============*/

/**
 * Check if articles section is enabled.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_articles_section_enable( $control ) {
	return ( $control->manager->get_setting( 'travelism_theme_options[articles_section_enable]' )->value() );
}

/**
 * Check if articles section content type is category.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_articles_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travelism_theme_options[articles_content_type]' )->value();
	return travelism_is_articles_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if articles section content type is post.
 *
 * @since Travelism 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function travelism_is_articles_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'travelism_theme_options[articles_content_type]' )->value();
	return travelism_is_articles_section_enable( $control ) && ( 'post' == $content_type );
}
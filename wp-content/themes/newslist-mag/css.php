<?php
add_action( 'init', 'newslist_mag_all_device_css' );
/**
 * Register dynamic css
 *
 * @since 1.0
 * @package Newslist Mag WordPress Theme
 */
function newslist_mag_all_device_css() {
	$style = array(
		array(
			'selector' => '.newlist-tag-wrapper',
			'props' => array(
				'background-color' => 'top-tag-background',
			)
		),
		array(
			'selector' => '.newslist-latest-post-wrapper, .newslist-latest-post-wrapper .newslist-latest-post-inner',
			'props' => array(
				'background-color' => 'latest-post-background',
			)
		),
		array(
			'selector' => 'body .newslist-latest-post-wrapper .newslist-latest-post-inner .newslist-latest-post-slider a',
			'props' => array(
				'color' => 'latest-post-color'
			)
		),
		array(
			'selector' => 'body .newslist-latest-post-wrapper .newslist-latest-post-inner .newslist-latest-post-slider a:hover',
			'props' => array(
				'color' => 'latest-post-hover-color'
			)
		)
	);
	Newslist_Css::add_styles( $style, 'md' );
}

/**
 * Register dynamic css for responsive devices
 *
 * @since 1.0
 * @package Newslist Mag WordPress Theme
 */
function newslist_mag_responsive_device_css() {
	foreach ( array( 'md' => 'desktop', 'sm' => 'tablet', 'xs' => 'mobile' ) as $size => $device ) {
		Newslist_Css::add_styles(array(
			#Typography
			array(
				'selector'  => 'body .newslist-latest-post-wrapper',
				'props'		=> array(
					'margin-top'	  => 'latest-post-margin-' . $device . '-top',
					'margin-bottom'	  => 'latest-post-margin-' . $device . '-bottom',
					'margin-right'	  => 'latest-post-margin-' . $device . '-right',
					'margin-left'	  => 'latest-post-margin-' . $device . '-left'
				),
			),
		), $size);
	}
}
add_action( 'init', 'newslist_mag_responsive_device_css' );

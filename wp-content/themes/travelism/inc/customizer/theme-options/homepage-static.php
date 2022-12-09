<?php
/**
* Homepage (Static ) options
*
* @package Theme Palace
* @subpackage Travelism
* @since Travelism 1.0.0
*/

// Homepage (Static ) setting and control.
$wp_customize->add_setting( 'travelism_theme_options[enable_frontpage_content]', array(
	'sanitize_callback'   => 'travelism_sanitize_checkbox',
	'default'             => $options['enable_frontpage_content'],
) );

$wp_customize->add_control( 'travelism_theme_options[enable_frontpage_content]', array(
	'label'       	=> esc_html__( 'Enable Content', 'travelism' ),
	'description' 	=> esc_html__( 'Check to enable content on static front page only.', 'travelism' ),
	'section'     	=> 'static_front_page',
	'type'        	=> 'checkbox',
	'active_callback' => 'travelism_is_static_homepage_enable',
) );
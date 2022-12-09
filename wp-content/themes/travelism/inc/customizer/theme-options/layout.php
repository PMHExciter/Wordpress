<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'travelism_layout', array(
	'title'               => esc_html__('Layout','travelism'),
	'description'         => esc_html__( 'Layout section options.', 'travelism' ),
	'panel'               => 'travelism_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'travelism_theme_options[site_layout]', array(
	'sanitize_callback'   => 'travelism_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Travelism_Custom_Radio_Image_Control ( $wp_customize, 'travelism_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'travelism' ),
	'section'             => 'travelism_layout',
	'choices'			  => travelism_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'travelism_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'travelism_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Travelism_Custom_Radio_Image_Control ( $wp_customize, 'travelism_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'travelism' ),
	'section'             => 'travelism_layout',
	'choices'			  => travelism_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'travelism_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'travelism_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Travelism_Custom_Radio_Image_Control ( $wp_customize, 'travelism_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'travelism' ),
	'section'             => 'travelism_layout',
	'choices'			  => travelism_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'travelism_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'travelism_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Travelism_Custom_Radio_Image_Control( $wp_customize, 'travelism_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'travelism' ),
	'section'             => 'travelism_layout',
	'choices'			  => travelism_sidebar_position(),
) ) );
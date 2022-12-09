<?php
/**
 * Hero Banner Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add Hero Banner section
$wp_customize->add_section( 'travelism_hero_banner_section', array(
	'title'             => esc_html__( 'Hero Banner Section','travelism' ),
	'description'       => esc_html__( 'Hero Banner Section options.', 'travelism' ),
	'panel'             => 'travelism_front_page_panel',
) );

// Hero Banner content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[hero_banner_section_enable]', array(
	'default'			=> 	$options['hero_banner_section_enable'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[hero_banner_section_enable]', array(
	'label'             => esc_html__( 'Hero Banner Section Enable', 'travelism' ),
	'section'           => 'travelism_hero_banner_section',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

$wp_customize->add_setting( 'travelism_theme_options[hero_banner_bg_image]', array(
	'sanitize_callback' => 'travelism_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travelism_theme_options[hero_banner_bg_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'travelism' ),
		'section'     		=> 'travelism_hero_banner_section',
		'active_callback'	=> 'travelism_is_hero_banner_section_enable',
) ) );

// hero_banner sub title setting and control
$wp_customize->add_setting( 'travelism_theme_options[hero_banner_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[hero_banner_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'travelism' ),
	'section'        	=> 'travelism_hero_banner_section',
	'active_callback' 	=> 'travelism_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[hero_banner_sub_title]', array(
		'selector'            => '#travelism_hero_banner_section .section-subtitle',
		'settings'            => 'travelism_theme_options[hero_banner_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_hero_banner_sub_title_partial',
    ) );
}

// hero_banner pages drop down chooser control and setting
$wp_customize->add_setting( 'travelism_theme_options[hero_banner_content_page]', array(
	'sanitize_callback' => 'travelism_sanitize_page',
) );

$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[hero_banner_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'travelism' ),
	'section'           => 'travelism_hero_banner_section',
	'choices'			=> travelism_page_choices(),
	'active_callback'	=> 'travelism_is_hero_banner_section_enable',
) ) );


// hero_banner btn title setting and control
$wp_customize->add_setting( 'travelism_theme_options[hero_banner_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['hero_banner_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[hero_banner_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'travelism' ),
	'section'        	=> 'travelism_hero_banner_section',
	'active_callback' 	=> 'travelism_is_hero_banner_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[hero_banner_btn_title]', array(
		'selector'            => '#travelism_hero_banner_section .btn',
		'settings'            => 'travelism_theme_options[hero_banner_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_hero_banner_btn_title_partial',
    ) );
}

// hero_banner image setting and control.
$wp_customize->add_setting( 'travelism_theme_options[hero_banner_content_bg_image]', array(
	'sanitize_callback' => 'travelism_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travelism_theme_options[hero_banner_content_bg_image]',
		array(
		'label'       		=> esc_html__( 'Content BG Image', 'travelism' ),
		'description' 		=> sprintf( esc_html__( 'Recommended size: %1$dpx x %2$dpx ', 'travelism' ), 705, 900 ),
		'section'     		=> 'travelism_hero_banner_section',
		'active_callback'	=> 'travelism_is_hero_banner_section_enable',
) ) );
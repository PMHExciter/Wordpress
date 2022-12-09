<?php
/**
 * Gallery Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add Gallery section
$wp_customize->add_section( 'travelism_gallery_section', array(
	'title'             => esc_html__( 'Gallery Section','travelism' ),
	'description'       => esc_html__( 'Gallery Section options.', 'travelism' ),
	'panel'             => 'travelism_front_page_panel',
) );

// Gallery content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[gallery_section_enable]', array(
	'default'			=> 	$options['gallery_section_enable'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[gallery_section_enable]', array(
	'label'             => esc_html__( 'Gallery Section Enable', 'travelism' ),
	'section'           => 'travelism_gallery_section',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

// popular destination sub title setting and control
$wp_customize->add_setting( 'travelism_theme_options[gallery_sub_title]', array(
	'default'			=> $options['gallery_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[gallery_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'travelism' ),
	'section'        	=> 'travelism_gallery_section',
	'active_callback' 	=> 'travelism_is_gallery_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[gallery_sub_title]', array(
		'selector'            => '#travelism_gallery_section .section-subtitle',
		'settings'            => 'travelism_theme_options[gallery_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_gallery_sub_title_partial',
    ) );
}

// popular destination title setting and control
$wp_customize->add_setting( 'travelism_theme_options[gallery_title]', array(
	'default'			=> $options['gallery_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[gallery_title]', array(
	'label'           	=> esc_html__( 'Title', 'travelism' ),
	'section'        	=> 'travelism_gallery_section',
	'active_callback' 	=> 'travelism_is_gallery_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[gallery_title]', array(
		'selector'            => '#travelism_gallery_section .section-title',
		'settings'            => 'travelism_theme_options[gallery_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_gallery_title_partial',
    ) );
}

// Popular deatination btn label setting and control
$wp_customize->add_setting( 'travelism_theme_options[gallery_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['gallery_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[gallery_btn_label]', array(
	'label'           	=> esc_html__( 'Gallery Button Label', 'travelism' ),
	'section'        	=> 'travelism_gallery_section',
	'active_callback' 	=> 'travelism_is_gallery_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[gallery_btn_label]', array(
		'selector'            => '#travelism_gallery_section .btn',
		'settings'            => 'travelism_theme_options[gallery_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_gallery_btn_label_partial',
    ) );
}

$wp_customize->add_setting( 'travelism_theme_options[gallery_btn_url]', array(
'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'travelism_theme_options[gallery_btn_url]', array(
	'label'           	=> esc_html__( 'Button URL', 'travelism' ),
	'section'        	=> 'travelism_gallery_section',
	'active_callback' 	=> 'travelism_is_gallery_section_enable',
	'type'				=> 'url',
) );

// Gallery content type control and setting
$wp_customize->add_setting( 'travelism_theme_options[gallery_content_type]', array(
	'default'          	=> $options['gallery_content_type'],
	'sanitize_callback' => 'travelism_sanitize_select',
) );

$wp_customize->add_control( 'travelism_theme_options[gallery_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'travelism' ),
	'section'           => 'travelism_gallery_section',
	'type'				=> 'select',
	'active_callback' 	=> 'travelism_is_gallery_section_enable',
	'choices'			=> travelism_gallery_content_type(),
) );

for ( $i=1; $i <= 4; $i++ ) { 

	// Popular deatination posts drop down chooser control and setting
	$wp_customize->add_setting( 'travelism_theme_options[gallery_content_post_' . $i . ']', array(
		'sanitize_callback' => 'travelism_sanitize_page',
	) );

	$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[gallery_content_post_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select posts %d', 'travelism' ), $i ),
		'section'           => 'travelism_gallery_section',
		'choices'			=> travelism_post_choices(),
		'active_callback'	=> 'travelism_is_gallery_section_content_post_enable',
	) ) );

	// gallery trips drop down chooser control and setting
	$wp_customize->add_setting( 'travelism_theme_options[gallery_content_trip_' . $i . ']', array(
		'sanitize_callback' => 'travelism_sanitize_page',
	) );

	$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[gallery_content_trip_' . $i . ']', array(
		'label'             => sprintf ( esc_html__( 'Select Trip %d', 'travelism' ), $i ),
		'section'           => 'travelism_gallery_section',
		'choices'			=> travelism_trip_choices(),
		'active_callback'	=> 'travelism_is_gallery_section_content_trip_enable',
	) ) );
}
<?php
/**
 * Menu options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'travelism_menu', array(
	'title'             => esc_html__('Header Menu','travelism'),
	'description'       => esc_html__( 'Header Menu options.', 'travelism' ),
	'panel'             => 'nav_menus',
) );

// Topbar contact number control and setting
$wp_customize->add_setting( 'travelism_theme_options[contact_number]', array(
	'default'			=> '',
    'sanitize_callback' => 'sanitize_text_field',
    'transport'			=> 'postMessage',
) );
    
$wp_customize->add_control( 'travelism_theme_options[contact_number]', array(
    'label'           	=> esc_html__( 'Contact Number', 'travelism' ),
    'section'        	=> 'travelism_menu',
    'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[contact_number]', array(
		'selector'            => '.contact-info',
		'settings'            => 'travelism_theme_options[contact_number]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_contact_number_partial',
    ) );
}

// Popular deatination btn label setting and control
$wp_customize->add_setting( 'travelism_theme_options[menu_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['menu_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[menu_btn_label]', array(
	'label'           	=> esc_html__( 'Gallery Button Label', 'travelism' ),
	'section'        	=> 'travelism_menu',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[menu_btn_label]', array(
		'selector'            => '#travelism_gallery_section .btn',
		'settings'            => 'travelism_theme_options[menu_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_menu_btn_label_partial',
    ) );
}

$wp_customize->add_setting( 'travelism_theme_options[menu_btn_url]', array(
'sanitize_callback' => 'esc_url_raw',
	) );

$wp_customize->add_control( 'travelism_theme_options[menu_btn_url]', array(
	'label'           	=> esc_html__( 'Button URL', 'travelism' ),
	'section'        	=> 'travelism_menu',
	'type'				=> 'url',
) );
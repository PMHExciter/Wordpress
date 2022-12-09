<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

$wp_customize->add_section( 'travelism_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','travelism' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'travelism' ),
	'panel'             => 'travelism_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'travelism_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'travelism_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'travelism' ),
	'section'          	=> 'travelism_breadcrumb',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'travelism_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'travelism_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'travelism' ),
	'active_callback' 	=> 'travelism_is_breadcrumb_enable',
	'section'          	=> 'travelism_breadcrumb',
) );

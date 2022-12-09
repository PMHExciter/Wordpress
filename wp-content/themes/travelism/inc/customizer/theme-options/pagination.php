<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'travelism_pagination', array(
	'title'               => esc_html__('Pagination','travelism'),
	'description'         => esc_html__( 'Pagination section options.', 'travelism' ),
	'panel'               => 'travelism_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'travelism_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'travelism_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'travelism' ),
	'section'             => 'travelism_pagination',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'travelism_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'travelism_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'travelism_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'travelism' ),
	'section'             => 'travelism_pagination',
	'type'                => 'select',
	'choices'			  => travelism_pagination_options(),
	'active_callback'	  => 'travelism_is_pagination_enable',
) );

<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'travelism_single_post_section', array(
	'title'             => esc_html__( 'Single Post','travelism' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'travelism' ),
	'panel'             => 'travelism_theme_options_panel',
) );

$wp_customize->add_setting( 'travelism_theme_options[single_post_hide_banner]', array(
	'default'           => $options['single_post_hide_banner'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[single_post_hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'travelism' ),
	'section'           => 'travelism_single_post_section',
	'on_off_label' 		=> travelism_hide_options(),
) ) );

// Tourableve author category setting and control.
$wp_customize->add_setting( 'travelism_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'travelism' ),
	'section'           => 'travelism_single_post_section',
	'on_off_label' 		=> travelism_hide_options(),
) ) );
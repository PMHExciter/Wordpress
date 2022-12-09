<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'travelism_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','travelism' ),
	'description'       => esc_html__( 'Archive section options.', 'travelism' ),
	'panel'             => 'travelism_theme_options_panel',
) );

$wp_customize->add_setting( 'travelism_theme_options[hide_banner]', array(
	'default'           => $options['hide_banner'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'travelism' ),
	'section'           => 'travelism_archive_section',
	'on_off_label' 		=> travelism_hide_options(),
) ) );

// features content type control and setting
$wp_customize->add_setting( 'travelism_theme_options[blog_column]', array(
	'default'          	=> $options['blog_column'],
	'sanitize_callback' => 'travelism_sanitize_select',
	'transport'			=> 'refresh',
) );

$wp_customize->add_control( 'travelism_theme_options[blog_column]', array(
	'label'             => esc_html__( 'Column Layout', 'travelism' ),
	'section'           => 'travelism_archive_section',
	'type'				=> 'select',
	'choices'			=> array( 
		'col-1'		=> esc_html__( 'One Column', 'travelism' ),
		'col-2'		=> esc_html__( 'Two Column', 'travelism' ),
		'col-3'		=> esc_html__( 'Three Column', 'travelism' ),
		'col-4'		=> esc_html__( 'Four Column', 'travelism' ),
	),
) );
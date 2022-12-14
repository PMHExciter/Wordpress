<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'travelism_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','travelism' ),
	'description'       => esc_html__( 'Excerpt section options.', 'travelism' ),
	'panel'             => 'travelism_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'travelism_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'travelism_sanitize_number_range',
	'validate_callback' => 'travelism_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'travelism_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'travelism' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'travelism' ),
	'section'     		=> 'travelism_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

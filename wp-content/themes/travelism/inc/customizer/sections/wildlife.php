<?php
/**
 * Wildlife Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add Wildlife section
$wp_customize->add_section( 'travelism_wildlife_section', array(
	'title'             => esc_html__( 'Wildlife Section','travelism' ),
	'description'       => esc_html__( 'Wildlife Section options.', 'travelism' ),
	'panel'             => 'travelism_front_page_panel',
) );

// Wildlife content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[wildlife_section_enable]', array(
	'default'			=> 	$options['wildlife_section_enable'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[wildlife_section_enable]', array(
	'label'             => esc_html__( 'Wildlife Section Enable', 'travelism' ),
	'section'           => 'travelism_wildlife_section',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

// popular destination sub title setting and control
$wp_customize->add_setting( 'travelism_theme_options[wildlife_sub_title]', array(
	'default'			=> $options['wildlife_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[wildlife_sub_title]', array(
	'label'           	=> esc_html__( 'Sub Title', 'travelism' ),
	'section'        	=> 'travelism_wildlife_section',
	'active_callback' 	=> 'travelism_is_wildlife_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[wildlife_sub_title]', array(
		'selector'            => '#travelism_wildlife_section .section-subtitle',
		'settings'            => 'travelism_theme_options[wildlife_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_wildlife_sub_title_partial',
    ) );
}

// Popular deatination btn label setting and control
$wp_customize->add_setting( 'travelism_theme_options[wildlife_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['wildlife_btn_label'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[wildlife_btn_label]', array(
	'label'           	=> esc_html__( 'Wildlife Button Label', 'travelism' ),
	'section'        	=> 'travelism_wildlife_section',
	'active_callback' 	=> 'travelism_is_wildlife_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[wildlife_btn_label]', array(
		'selector'            => '#travelism_wildlife_section .btn',
		'settings'            => 'travelism_theme_options[wildlife_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_wildlife_btn_label_partial',
    ) );
}
	// Popular deatination posts drop down chooser control and setting
	$wp_customize->add_setting( 'travelism_theme_options[wildlife_content_post]', array(
		'sanitize_callback' => 'travelism_sanitize_page',
	) );

	$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[wildlife_content_post]', array(
		'label'             => esc_html__( 'Select posts', 'travelism' ),
		'section'           => 'travelism_wildlife_section',
		'choices'			=> travelism_post_choices(),
		'active_callback'	=> 'travelism_is_wildlife_section_enable',
	) ) );
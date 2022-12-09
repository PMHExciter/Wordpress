<?php
/**
 * Happy Clients Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add Happy Clients section
$wp_customize->add_section( 'travelism_happy_clients_section', array(
	'title'             => esc_html__( 'Happy Clients Section','travelism' ),
	'description'       => esc_html__( 'Happy Clients Section options.', 'travelism' ),
	'panel'             => 'travelism_front_page_panel',
	) );

// Happy Clients content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[happy_clients_section_enable]', array(
	'default'			=> 	$options['happy_clients_section_enable'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[happy_clients_section_enable]', array(
	'label'             => esc_html__( 'Happy Clients Section Enable', 'travelism' ),
	'section'           => 'travelism_happy_clients_section',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

$wp_customize->add_setting( 'travelism_theme_options[happy_clients_section_sub_title]', array(
	'default'          	=> $options['happy_clients_section_sub_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[happy_clients_section_sub_title]', array(
	'label'             => esc_html__( 'Section Sub Title', 'travelism' ),
	'section'           => 'travelism_happy_clients_section',
	'type'				=> 'text',
	'active_callback' 	=> 'travelism_is_happy_clients_section_enable',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[happy_clients_section_sub_title]', array(
		'selector'            => '#travelism_happy_clients_section .section-subtitle',
		'settings'            => 'travelism_theme_options[happy_clients_section_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_happy_clients_section_sub_title_partial',
    ) );
}

$wp_customize->add_setting( 'travelism_theme_options[happy_clients_section_title]', array(
	'default'          	=> $options['happy_clients_section_title'],
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[happy_clients_section_title]', array(
	'label'             => esc_html__( 'Section Title', 'travelism' ),
	'section'           => 'travelism_happy_clients_section',
	'type'				=> 'text',
	'active_callback' 	=> 'travelism_is_happy_clients_section_enable',
) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[happy_clients_section_title]', array(
		'selector'            => '#travelism_happy_clients_section .section-title',
		'settings'            => 'travelism_theme_options[happy_clients_section_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_happy_clients_section_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// happy_clients pages drop down chooser control and setting
	$wp_customize->add_setting( 'travelism_theme_options[happy_clients_content_page_' . $i . ']', array(
		'sanitize_callback' => 'travelism_sanitize_page',
	) );

	$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[happy_clients_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'travelism' ), $i ),
		'section'           => 'travelism_happy_clients_section',
		'choices'			=> travelism_page_choices(),
		'active_callback'	=> 'travelism_is_happy_clients_section_enable',
	) ) );

	$wp_customize->add_setting( 'travelism_theme_options[happy_clients_client_position_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( 'travelism_theme_options[happy_clients_client_position_' . $i . ']', array(
		'label'           	=> sprintf( esc_html__( 'Client Position %d', 'travelism' ), $i ),
		'section'        	=> 'travelism_happy_clients_section',
		'active_callback' 	=> 'travelism_is_happy_clients_section_enable',
		'type'				=> 'text',
	) );

	// happy_clients hr setting and control
	$wp_customize->add_setting( 'travelism_theme_options[happy_clients_hr_'. $i .']', array(
		'sanitize_callback' => 'sanitize_text_field'
	) );

	$wp_customize->add_control( new Travelism_Customize_Horizontal_Line( $wp_customize, 'travelism_theme_options[happy_clients_hr_'. $i .']',
		array(
			'section'         => 'travelism_happy_clients_section',
			'active_callback' => 'travelism_is_happy_clients_section_enable',
			'type'			  => 'hr'
	) ) );

endfor;
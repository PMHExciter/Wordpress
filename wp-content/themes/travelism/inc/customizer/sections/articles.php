<?php
/**
 * Articles Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Add Articles section
$wp_customize->add_section( 'travelism_articles_section', array(
	'title'             => esc_html__( 'Articles Section','travelism' ),
	'description'       => esc_html__( 'Articles Section options.', 'travelism' ),
	'panel'             => 'travelism_front_page_panel',
) );

// Articles content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[articles_section_enable]', array(
	'default'			=> 	$options['articles_section_enable'],
	'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[articles_section_enable]', array(
	'label'             => esc_html__( 'Articles Section Enable', 'travelism' ),
	'section'           => 'travelism_articles_section',
	'on_off_label' 		=> travelism_switch_options(),
) ) );

// Articles btn label setting and control
$wp_customize->add_setting( 'travelism_theme_options[articles_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['articles_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[articles_sub_title]', array(
	'label'           	=> esc_html__( 'Articles Sub Title', 'travelism' ),
	'section'        	=> 'travelism_articles_section',
	'active_callback' 	=> 'travelism_is_articles_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[articles_sub_title]', array(
		'selector'            => '#travelism_articles_section .section-subtitle',
		'settings'            => 'travelism_theme_options[articles_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_articles_sub_title_partial',
    ) );
}

// Articles btn label setting and control
$wp_customize->add_setting( 'travelism_theme_options[articles_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['articles_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[articles_title]', array(
	'label'           	=> esc_html__( 'Articles Title', 'travelism' ),
	'section'        	=> 'travelism_articles_section',
	'active_callback' 	=> 'travelism_is_articles_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[articles_title]', array(
		'selector'            => '#travelism_articles_section .section-title',
		'settings'            => 'travelism_theme_options[articles_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_articles_title_partial',
    ) );
}

// Articles content type control and setting
$wp_customize->add_setting( 'travelism_theme_options[articles_content_type]', array(
	'default'          	=> $options['articles_content_type'],
	'sanitize_callback' => 'travelism_sanitize_select',
) );

$wp_customize->add_control( 'travelism_theme_options[articles_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'travelism' ),
	'section'           => 'travelism_articles_section',
	'type'				=> 'select',
	'active_callback' 	=> 'travelism_is_articles_section_enable',
	'choices'			=> array(
		'post'      => esc_html__( 'Post', 'travelism' ),
		'category'  => esc_html__( 'Category', 'travelism' ),
		),
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// articles posts drop down chooser control and setting
	$wp_customize->add_setting( 'travelism_theme_options[articles_content_post_' . $i . ']', array(
		'sanitize_callback' => 'travelism_sanitize_page',
	) );

	$wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[articles_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'travelism' ), $i ),
		'section'           => 'travelism_articles_section',
		'choices'			=> travelism_post_choices(),
		'active_callback'	=> 'travelism_is_articles_section_content_post_enable',
	) ) );

endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'travelism_theme_options[articles_content_category]', array(
	'sanitize_callback' => 'travelism_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Travelism_Dropdown_Taxonomies_Control( $wp_customize,'travelism_theme_options[articles_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'travelism' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'travelism' ),
	'section'           => 'travelism_articles_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'travelism_is_articles_section_content_category_enable'
) ) );
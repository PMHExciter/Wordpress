<?php
/**
 * Northface Jacket Section options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( !class_exists('WooCommerce') ) {
    return;
}

// Add northface_jacket section
$wp_customize->add_section( 'travelism_northface_jacket_section', array(
    'title'             => esc_html__( 'Northface Jacket Section','travelism' ),
    'description'       => esc_html__( 'Note: To activate this section you need to install WooCommerce Plugin.', 'travelism' ),
    'panel'             => 'travelism_front_page_panel',
) );

// northface_jacket content enable control and setting
$wp_customize->add_setting( 'travelism_theme_options[northface_jacket_section_enable]', array(
    'default'           =>  $options['northface_jacket_section_enable'],
    'sanitize_callback' => 'travelism_sanitize_switch_control',
) );

$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[northface_jacket_section_enable]', array(
    'label'             => esc_html__( 'Popular product Section Enable', 'travelism' ),
    'section'           => 'travelism_northface_jacket_section',
    'on_off_label'      => travelism_switch_options(),
) ) );

// northface_jacket title setting and control
$wp_customize->add_setting( 'travelism_theme_options[northface_jacket_title]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['northface_jacket_title'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[northface_jacket_title]', array(
    'label'             => esc_html__( 'Title', 'travelism' ),
    'section'           => 'travelism_northface_jacket_section',
    'active_callback'   => 'travelism_is_northface_jacket_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[northface_jacket_title]', array(
        'selector'            => '#travelism_northface_jacket_section .section-title',
        'settings'            => 'travelism_theme_options[northface_jacket_title]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'travelism_northface_jacket_title_partial',
    ) );
}

// northface_jacket title setting and control
$wp_customize->add_setting( 'travelism_theme_options[northface_jacket_sub_title]', array(
    'sanitize_callback' => 'sanitize_text_field',
    'default'           => $options['northface_jacket_sub_title'],
    'transport'         => 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[northface_jacket_sub_title]', array(
    'label'             => esc_html__( 'Sub Title', 'travelism' ),
    'section'           => 'travelism_northface_jacket_section',
    'active_callback'   => 'travelism_is_northface_jacket_section_enable',
    'type'              => 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[northface_jacket_sub_title]', array(
        'selector'            => '#travelism_northface_jacket_section .section-subtitle',
        'settings'            => 'travelism_theme_options[northface_jacket_sub_title]',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
        'render_callback'     => 'travelism_northface_jacket_sub_title_partial',
    ) );
}

// hero_banner image setting and control.
$wp_customize->add_setting( 'travelism_theme_options[northface_jacket_bg_image]', array(
    'sanitize_callback' => 'travelism_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travelism_theme_options[northface_jacket_bg_image]',
        array(
        'label'             => esc_html__( 'Background Image', 'travelism' ),
        'section'           => 'travelism_northface_jacket_section',
        'active_callback'   => 'travelism_is_northface_jacket_section_enable',
) ) );

for( $i = 1 ; $i <= 2; $i++ ){

    $wp_customize->add_setting( 'travelism_theme_options[northface_jacket_content_page_' . $i . ']', array(
        'sanitize_callback' => 'travelism_sanitize_page',
    ) );

    $wp_customize->add_control( new Travelism_Dropdown_Chooser( $wp_customize, 'travelism_theme_options[northface_jacket_content_page_' . $i . ']', array(
        'label'             => sprintf( esc_html__( 'Select Product %d', 'travelism' ), $i ),
        'section'           => 'travelism_northface_jacket_section',
        'choices'           => travelismduct_choices(),
        'active_callback'   => 'travelism_is_northface_jacket_section_enable',
    ) ) );
}
<?php
/**
 * Business About Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Business About section
$wp_customize->add_section( 'travelism_business_about_section',
    array(
        'title'             => esc_html__( 'Business About','corpo-travelism' ),
        'description'       => esc_html__( 'Business About Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Business About content enable control and setting
$wp_customize->add_setting( 'business_about_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'business_about_section_enable',
        array(
            'label'             => esc_html__( 'Business About Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_business_about_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);

// business_about title setting and control
$wp_customize->add_setting( 'business_about_subtitle',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Creative Vision', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'business_about_subtitle',
    array(
        'label'             => esc_html__( 'Section Sub Title', 'corpo-travelism' ),
        'section'           => 'travelism_business_about_section',
        'active_callback'   => 'corpo_travelism_is_business_about_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('business_about_subtitle',
        array(
            'selector'            => '#travelism_business_about_section .section-subtitle',
            'settings'            => 'business_about_subtitle',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_business_about_subtitle_partial',
        )
    );
}


    // business_about posts drop down chooser control and setting
    $wp_customize->add_setting( 'business_about_content_page',
        array(
            'sanitize_callback' => 'travelism_sanitize_page',
        )
    );

    $wp_customize->add_control( new Corpo_Travelism_Dropdown_Chooser( $wp_customize,
        'business_about_content_page',
            array(
                'label'             => esc_html__( 'Select Page', 'corpo-travelism' ),
                'section'           => 'travelism_business_about_section',
                'choices'           => travelism_page_choices(),
                'active_callback'   => 'corpo_travelism_is_business_about_section_enable',
            ) 
        )
    );

    //business_about separator
    $wp_customize->add_setting('business_about_separator',
        array(
            'sanitize_callback'      => 'travelism_sanitize_html',
        )
    );

    $wp_customize->add_control(new Corpo_Travelism_Customize_Horizontal_Line($wp_customize,
        'business_about_separator',
            array(
                'active_callback'       => 'corpo_travelism_is_business_about_section_enable',
                'type'                  =>'hr',
                'section'               =>'travelism_business_about_section',
            )
        )
    );

// business_about title setting and control
$wp_customize->add_setting( 'business_about_btn_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Learn More', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'business_about_btn_title',
    array(
        'label'             => esc_html__( 'Button Title', 'corpo-travelism' ),
        'section'           => 'travelism_business_about_section',
        'active_callback'   => 'corpo_travelism_is_business_about_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('business_about_btn_title',
        array(
            'selector'            => '#travelism_business_about_section .read-more a',
            'settings'            => 'business_about_btn_title',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_business_about_btn_title_partial',
        )
    );
}
<?php
/**
 * Business Team Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Business Team section
$wp_customize->add_section( 'travelism_business_team_section',
    array(
        'title'             => esc_html__( 'Business Team','corpo-travelism' ),
        'description'       => esc_html__( 'Business Team Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Business Team content enable control and setting
$wp_customize->add_setting( 'business_team_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'business_team_section_enable',
        array(
            'label'             => esc_html__( 'Business Team Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_business_team_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);

// business_team title setting and control
$wp_customize->add_setting( 'business_team_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Who We Have', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'business_team_title',
    array(
        'label'             => esc_html__( 'Section Title', 'corpo-travelism' ),
        'section'           => 'travelism_business_team_section',
        'active_callback'   => 'corpo_travelism_is_business_team_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('business_team_title',
        array(
            'selector'            => '#travelism_business_team_section .section-title',
            'settings'            => 'business_team_title',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_business_team_title_partial',
        )
    );
}

// business_team title setting and control
$wp_customize->add_setting( 'business_team_subtitle',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'OUR TEAM', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'business_team_subtitle',
    array(
        'label'             => esc_html__( 'Section Sub Title', 'corpo-travelism' ),
        'section'           => 'travelism_business_team_section',
        'active_callback'   => 'corpo_travelism_is_business_team_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('business_team_subtitle',
        array(
            'selector'            => '#travelism_business_team_section .section-subtitle',
            'settings'            => 'business_team_subtitle',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_business_team_subtitle_partial',
        )
    );
}


for ( $i = 1; $i <= 3; $i++ ) :

    // business_team posts drop down chooser control and setting
    $wp_customize->add_setting( 'business_team_content_post_' . $i,
        array(
            'sanitize_callback' => 'travelism_sanitize_page',
        )
    );

    $wp_customize->add_control( new Corpo_Travelism_Dropdown_Chooser( $wp_customize,
        'business_team_content_post_' . $i,
            array(
                'label'             => sprintf( esc_html__( 'Select Post %d', 'corpo-travelism' ), $i ),
                'section'           => 'travelism_business_team_section',
                'choices'           => travelism_post_choices(),
                'active_callback'   => 'corpo_travelism_is_business_team_section_enable',
            ) 
        )
    );

    // team custom content
    $wp_customize->add_setting( 'business_team_position_' . $i, array(
        'sanitize_callback' => 'wp_kses_post',
    ) );

    $wp_customize->add_control( 'business_team_position_' . $i, array(
        'label'             => sprintf( esc_html__( 'Position %d', 'corpo-travelism' ), $i ),
        'section'           => 'travelism_business_team_section',
        'active_callback'   => 'corpo_travelism_is_business_team_section_enable',
    ) );

    // team social
    $wp_customize->add_setting( 'business_team_social_' . $i, array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new Corpo_Travelism_Multi_Input_Custom_Control( $wp_customize, 'business_team_social_' . $i, array(
        'label'             => esc_html__( 'Social ', 'corpo-travelism' ),
        'button_text'       => esc_html__( 'Add social.', 'corpo-travelism' ),
        'section'           => 'travelism_business_team_section',
        'active_callback'   => 'corpo_travelism_is_business_team_section_enable',
    ) ) );

    //business_team separator
    $wp_customize->add_setting('business_team_separator'. $i,
        array(
            'sanitize_callback'      => 'travelism_sanitize_html',
        )
    );

    $wp_customize->add_control(new Corpo_Travelism_Customize_Horizontal_Line($wp_customize,
        'business_team_separator'. $i,
            array(
                'active_callback'       => 'corpo_travelism_is_business_team_section_enable',
                'type'                  =>'hr',
                'section'               =>'travelism_business_team_section',
            )
        )
    );
    
endfor;
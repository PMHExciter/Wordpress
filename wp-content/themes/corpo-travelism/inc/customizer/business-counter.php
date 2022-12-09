<?php
/**
 * Business Counter Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Business Counter section
$wp_customize->add_section( 'travelism_business_counter_section',
    array(
        'title'             => esc_html__( 'Business Counter','corpo-travelism' ),
        'description'       => esc_html__( 'Business Counter Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Business Counter content enable control and setting
$wp_customize->add_setting( 'business_counter_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'business_counter_section_enable',
        array(
            'label'             => esc_html__( 'Business Counter Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_business_counter_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);

// counter image setting and control.
$wp_customize->add_setting( 'business_counter_image', array(
    'sanitize_callback' => 'travelism_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'business_counter_image',
        array(
        'label'             => esc_html__( 'Counter BG Image', 'corpo-travelism' ),
        'section'           => 'travelism_business_counter_section',
        'active_callback'   => 'corpo_travelism_is_business_counter_section_enable',
) ) );

for ( $i = 1; $i <= 4; $i++ ) :

// counter note control and setting
    $wp_customize->add_setting( 'business_counter_icon_' . $i, array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( new Corpo_Travelism_Icon_Picker( $wp_customize, 'business_counter_icon_' . $i, array(
        'label'             => sprintf( esc_html__( 'Select Icon %d', 'corpo-travelism' ), $i ),
        'section'           => 'travelism_business_counter_section',
        'active_callback'   => 'corpo_travelism_is_business_counter_section_enable',
    ) ) );

    // counter title setting and control
    $wp_customize->add_setting( 'business_counter_value_' . $i, array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'business_counter_value_' . $i, array(
        'label'             => sprintf( esc_html__( 'Value %d', 'corpo-travelism' ), $i ),
        'section'           => 'travelism_business_counter_section',
        'active_callback'   => 'corpo_travelism_is_business_counter_section_enable',
        'type'              => 'text',
    ) );

    // counter position setting and control
    $wp_customize->add_setting( 'business_counter_label_' . $i, array(
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'business_counter_label_' . $i, array(
        'label'             => sprintf( esc_html__( 'Label %d', 'corpo-travelism' ), $i ),
        'section'           => 'travelism_business_counter_section',
        'active_callback'   => 'corpo_travelism_is_business_counter_section_enable',
        'type'              => 'text',
    ) );

    //business_counter separator
    $wp_customize->add_setting('business_counter_separator'. $i,
        array(
            'sanitize_callback'      => 'travelism_sanitize_html',
        )
    );

    $wp_customize->add_control(new Corpo_Travelism_Customize_Horizontal_Line($wp_customize,
        'business_counter_separator'. $i,
            array(
                'active_callback'       => 'corpo_travelism_is_business_counter_section_enable',
                'type'                  =>'hr',
                'section'               =>'travelism_business_counter_section',
            )
        )
    );
    
endfor;
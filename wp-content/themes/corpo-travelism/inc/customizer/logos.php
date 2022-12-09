<?php
/**
 * Logos Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Logos section
$wp_customize->add_section( 'travelism_logos_section',
    array(
        'title'             => esc_html__( 'Logos','corpo-travelism' ),
        'description'       => esc_html__( 'Logos Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Logos content enable control and setting
$wp_customize->add_setting( 'logos_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'logos_section_enable',
        array(
            'label'             => esc_html__( 'Logos Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_logos_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);

for ( $i = 1; $i <= 4; $i++ ) :

    // Partners image setting and control.
    $wp_customize->add_setting( 'logos_image_' . $i, array(
        'sanitize_callback' => 'travelism_sanitize_image',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'logos_image_' . $i,
            array(
            'label'             => sprintf( esc_html__( 'Image %d', 'corpo-travelism' ), $i),
            'section'           => 'travelism_logos_section',
            'active_callback'   => 'corpo_travelism_is_logos_section_enable',
    ) ) );

    // Partners url setting and control
    $wp_customize->add_setting( 'logos_url_' . $i, array(
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'logos_url_' . $i, array(
        'label'             => sprintf( esc_html__( 'Partners Url %d', 'corpo-travelism' ), $i),
        'section'           => 'travelism_logos_section',
        'active_callback'   => 'corpo_travelism_is_logos_section_enable',
        'type'              => 'url',
    ) );

endfor;
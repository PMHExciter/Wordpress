<?php
/**
 * Blog Slider Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Blog Slider section
$wp_customize->add_section( 'travelism_blog_slider_section',
    array(
        'title'             => esc_html__( 'Blog Slider','corpo-travelism' ),
        'description'       => esc_html__( 'Blog Slider Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Blog Slider content enable control and setting
$wp_customize->add_setting( 'blog_slider_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'blog_slider_section_enable',
        array(
            'label'             => esc_html__( 'Blog Slider Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_blog_slider_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);

// blog_slider title setting and control
$wp_customize->add_setting( 'blog_slider_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Blog Slider', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blog_slider_title',
    array(
        'label'             => esc_html__( 'Section Title', 'corpo-travelism' ),
        'section'           => 'travelism_blog_slider_section',
        'active_callback'   => 'corpo_travelism_is_blog_slider_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('blog_slider_title',
        array(
            'selector'            => '#travelism_blog_slider_section .section-title',
            'settings'            => 'blog_slider_title',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_blog_slider_title_partial',
        )
    );
}


for ( $i = 1; $i <= 3; $i++ ) :

    // blog_slider posts drop down chooser control and setting
    $wp_customize->add_setting( 'blog_slider_content_post_' . $i,
        array(
            'sanitize_callback' => 'travelism_sanitize_page',
        )
    );

    $wp_customize->add_control( new Corpo_Travelism_Dropdown_Chooser( $wp_customize,
        'blog_slider_content_post_' . $i,
            array(
                'label'             => sprintf( esc_html__( 'Select Post %d', 'corpo-travelism' ), $i ),
                'section'           => 'travelism_blog_slider_section',
                'choices'           => travelism_post_choices(),
                'active_callback'   => 'corpo_travelism_is_blog_slider_section_enable',
            ) 
        )
    );

    //blog_slider separator
    $wp_customize->add_setting('blog_slider_separator'. $i,
        array(
            'sanitize_callback'      => 'travelism_sanitize_html',
        )
    );

    $wp_customize->add_control(new Corpo_Travelism_Customize_Horizontal_Line($wp_customize,
        'blog_slider_separator'. $i,
            array(
                'active_callback'       => 'corpo_travelism_is_blog_slider_section_enable',
                'type'                  =>'hr',
                'section'               =>'travelism_blog_slider_section',
            )
        )
    );
    
endfor;

// blog_slider title setting and control
$wp_customize->add_setting( 'blog_slider_btn_title',
    array(
        'sanitize_callback' => 'sanitize_text_field',
        'default'           => esc_html__( 'Learn More', 'corpo-travelism' ),
        'transport'         => 'postMessage',
    )
);

$wp_customize->add_control( 'blog_slider_btn_title',
    array(
        'label'             => esc_html__( 'Button Title', 'corpo-travelism' ),
        'section'           => 'travelism_blog_slider_section',
        'active_callback'   => 'corpo_travelism_is_blog_slider_section_enable',
        'type'              => 'text',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial('blog_slider_btn_title',
        array(
            'selector'            => '#travelism_blog_slider_section .read-more a',
            'settings'            => 'blog_slider_btn_title',
            'container_inclusive' => false,
            'fallback_refresh'    => true,
            'render_callback'     => 'corpo_travelism_blog_slider_btn_title_partial',
        )
    );
}
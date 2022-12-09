<?php
/**
 * Blog CTA Section options
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */

// Add Blog CTA section
$wp_customize->add_section( 'travelism_blog_cta_section',
    array(
        'title'             => esc_html__( 'Blog CTA','corpo-travelism' ),
        'description'       => esc_html__( 'Blog CTA Section options.', 'corpo-travelism' ),
        'panel'             => 'travelism_front_page_panel',
    )
);

// Blog CTA content enable control and setting
$wp_customize->add_setting( 'blog_cta_section_enable',
    array(
        'default'           =>  false,
        'sanitize_callback' => 'travelism_sanitize_switch_control',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Switch_Control( $wp_customize,
    'blog_cta_section_enable',
        array(
            'label'             => esc_html__( 'Blog CTA Section Enable', 'corpo-travelism' ),
            'section'           => 'travelism_blog_cta_section',
            'on_off_label'      => travelism_switch_options(),
        ) 
    )
);


// blog_cta posts drop down chooser control and setting
$wp_customize->add_setting( 'blog_cta_content_page',
    array(
        'sanitize_callback' => 'travelism_sanitize_page',
    )
);

$wp_customize->add_control( new Corpo_Travelism_Dropdown_Chooser( $wp_customize,
    'blog_cta_content_page',
        array(
            'label'             => esc_html__( 'Select Page', 'corpo-travelism' ),
            'section'           => 'travelism_blog_cta_section',
            'choices'           => travelism_page_choices(),
            'active_callback'   => 'corpo_travelism_is_blog_cta_section_enable',
        ) 
    )
);

//blog_cta separator
$wp_customize->add_setting('blog_cta_separator',
    array(
        'sanitize_callback'      => 'travelism_sanitize_html',
    )
);

$wp_customize->add_control(new Corpo_Travelism_Customize_Horizontal_Line($wp_customize,
    'blog_cta_separator',
        array(
            'active_callback'       => 'corpo_travelism_is_blog_cta_section_enable',
            'type'                  =>'hr',
            'section'               =>'travelism_blog_cta_section',
        )
    )
);

$wp_customize->add_setting( 'blog_cta_video_url', array(
'sanitize_callback' => 'esc_url_raw',
    ) );

$wp_customize->add_control( 'blog_cta_video_url', array(
    'label'             => esc_html__( 'Video URL', 'corpo-travelism' ),
    'section'           => 'travelism_blog_cta_section',
    'active_callback'   => 'corpo_travelism_is_blog_cta_section_enable',
    'type'              => 'url',
) );
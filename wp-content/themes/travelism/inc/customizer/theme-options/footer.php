<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'travelism_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'travelism' ),
		'priority'   			=> 900,
		'panel'      			=> 'travelism_theme_options_panel',
	)
);

$wp_customize->add_setting( 'travelism_theme_options[footer_bg_image]', array(
	'sanitize_callback' => 'travelism_sanitize_image',
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'travelism_theme_options[footer_bg_image]',
		array(
		'label'       		=> esc_html__( 'Background Image', 'travelism' ),
		'section'     		=> 'travelism_section_footer',
) ) );

// footer text
$wp_customize->add_setting( 'travelism_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'travelism_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'travelism_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'travelism' ),
		'section'    			=> 'travelism_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'travelism_theme_options[copyright_text]', array(
		'selector'            => '.site-info .copyright p',
		'settings'            => 'travelism_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'travelism_copyright_text_partial',
    ) );
}

// scroll top visible
$wp_customize->add_setting( 'travelism_theme_options[scroll_top_visible]',
	array(
		'default'       		=> $options['scroll_top_visible'],
		'sanitize_callback' => 'travelism_sanitize_switch_control',
	)
);
$wp_customize->add_control( new Travelism_Switch_Control( $wp_customize, 'travelism_theme_options[scroll_top_visible]',
    array(
		'label'      			=> esc_html__( 'Display Scroll Top Button', 'travelism' ),
		'section'    			=> 'travelism_section_footer',
		'on_off_label' 		=> travelism_switch_options(),
    )
) );
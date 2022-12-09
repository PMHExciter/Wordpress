<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'travelism_reset_section', array(
	'title'             => esc_html__('Reset all settings','travelism'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'travelism' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'travelism_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'travelism_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'travelism_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'travelism' ),
	'section'           => 'travelism_reset_section',
	'type'              => 'checkbox',
) );

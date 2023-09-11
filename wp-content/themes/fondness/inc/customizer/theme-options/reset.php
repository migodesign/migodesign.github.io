<?php
/**
 * Reset options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

/**
* Reset section
*/
// Add reset enable section
$wp_customize->add_section( 'fondness_reset_section', array(
	'title'             => esc_html__('Reset all settings','fondness'),
	'description'       => esc_html__( 'Caution: All settings will be reset to default. Refresh the page after clicking Save & Publish.', 'fondness' ),
) );

// Add reset enable setting and control.
$wp_customize->add_setting( 'fondness_theme_options[reset_options]', array(
	'default'           => $options['reset_options'],
	'sanitize_callback' => 'fondness_sanitize_checkbox',
	'transport'			  => 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[reset_options]', array(
	'label'             => esc_html__( 'Check to reset all settings', 'fondness' ),
	'section'           => 'fondness_reset_section',
	'type'              => 'checkbox',
) );

<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add single posts section
$wp_customize->add_section( 'fondness_single_post_section', array(
	'title'             => esc_html__( 'Single Post','fondness' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'fondness' ),
	'panel'             => 'fondness_theme_options_panel',
) );

$wp_customize->add_setting( 'fondness_theme_options[single_post_hide_banner]', array(
	'default'           => $options['single_post_hide_banner'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[single_post_hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'fondness' ),
	'section'           => 'fondness_single_post_section',
	'on_off_label' 		=> fondness_hide_options(),
) ) );
<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'fondness_pagination', array(
	'title'               => esc_html__('Pagination','fondness'),
	'description'         => esc_html__( 'Pagination section options.', 'fondness' ),
	'panel'               => 'fondness_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'fondness_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'fondness_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'fondness' ),
	'section'             => 'fondness_pagination',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'fondness_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'fondness_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'fondness_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'fondness' ),
	'section'             => 'fondness_pagination',
	'type'                => 'select',
	'choices'			  => fondness_pagination_options(),
	'active_callback'	  => 'fondness_is_pagination_enable',
) );

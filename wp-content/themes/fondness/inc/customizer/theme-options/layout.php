<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'fondness_layout', array(
	'title'               => esc_html__('Layout','fondness'),
	'description'         => esc_html__( 'Layout section options.', 'fondness' ),
	'panel'               => 'fondness_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'fondness_theme_options[site_layout]', array(
	'sanitize_callback'   => 'fondness_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Fondness_Custom_Radio_Image_Control ( $wp_customize, 'fondness_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'fondness' ),
	'section'             => 'fondness_layout',
	'choices'			  => fondness_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'fondness_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'fondness_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Fondness_Custom_Radio_Image_Control ( $wp_customize, 'fondness_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'fondness' ),
	'section'             => 'fondness_layout',
	'choices'			  => fondness_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'fondness_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'fondness_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Fondness_Custom_Radio_Image_Control ( $wp_customize, 'fondness_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'fondness' ),
	'section'             => 'fondness_layout',
	'choices'			  => fondness_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'fondness_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'fondness_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Fondness_Custom_Radio_Image_Control( $wp_customize, 'fondness_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'fondness' ),
	'section'             => 'fondness_layout',
	'choices'			  => fondness_sidebar_position(),
) ) );
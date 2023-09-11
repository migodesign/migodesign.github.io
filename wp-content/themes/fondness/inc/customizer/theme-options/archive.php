<?php
/**
 * Archive options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add archive section
$wp_customize->add_section( 'fondness_archive_section', array(
	'title'             => esc_html__( 'Blog/Archive','fondness' ),
	'description'       => esc_html__( 'Archive section options.', 'fondness' ),
	'panel'             => 'fondness_theme_options_panel',
) );

$wp_customize->add_setting( 'fondness_theme_options[hide_banner]', array(
	'default'           => $options['hide_banner'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[hide_banner]', array(
	'label'             => esc_html__( 'Hide Banner', 'fondness' ),
	'section'           => 'fondness_archive_section',
	'on_off_label' 		=> fondness_hide_options(),
) ) );

// Blog btn label setting and control
$wp_customize->add_setting( 'fondness_theme_options[blog_page_post_btn]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['blog_page_post_btn'],
) );

$wp_customize->add_control( 'fondness_theme_options[blog_page_post_btn]', array(
	'label'           	=> esc_html__( 'Blog Post Button', 'fondness' ),
	'section'        	=> 'fondness_archive_section',
	'type'				=> 'text',
) );



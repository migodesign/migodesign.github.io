<?php
/**
* Slider Section options
*
* @package Theme Palace
* @subpackage Fondness
* @since Fondness 1.0.0
*/

// Add Slider section
$wp_customize->add_section( 'fondness_slider_section', array(
	'title'             => esc_html__( 'Main Slider','fondness' ),
	'description'       => esc_html__( 'Slider Section options.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 10,
	) );

// Slider content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
	) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'fondness' ),
	'section'           => 'fondness_slider_section',
	'on_off_label' 		=> fondness_switch_options(),
	) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'fondness_theme_options[slider_section_enable]', array(
		'selector'            => '#featured-slider-section .tooltiptext',
		'settings'            => 'fondness_theme_options[slider_section_enable]',
		) );
}

// Slider btn label setting and control
$wp_customize->add_setting( 'fondness_theme_options[slider_btn_label]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['slider_btn_label'],
	'transport'			=> 'postMessage',
	) );

$wp_customize->add_control( 'fondness_theme_options[slider_btn_label]', array(
	'label'           	=> esc_html__( 'Slider Button Label', 'fondness' ),
	'section'        	=> 'fondness_slider_section',
	'active_callback' 	=> 'fondness_is_slider_section_enable',
	'type'				=> 'text',
	) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial( 'fondness_theme_options[slider_btn_label]', array(
		'selector'            => '#featured-slider-section .read-more a',
		'settings'            => 'fondness_theme_options[slider_btn_label]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_slider_btn_label_partial',
		) );
}

for ( $i = 1; $i <= 3; $i++ ) :

// Alt btn label setting and control
	$wp_customize->add_setting( 'fondness_theme_options[slider_sub_title_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
		) );

$wp_customize->add_control( 'fondness_theme_options[slider_sub_title_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Sub Title %d', 'fondness' ), $i ),
	'section'        	=> 'fondness_slider_section',
	'active_callback' 	=> 'fondness_is_slider_section_enable',
	'type'				=> 'text',
	) );

// slider pages drop down chooser control and setting
$wp_customize->add_setting( 'fondness_theme_options[slider_content_page_' . $i . ']', array(
	'sanitize_callback' => 'fondness_sanitize_page',
	) );

$wp_customize->add_control( new Fondness_Dropdown_Chooser( $wp_customize, 'fondness_theme_options[slider_content_page_' . $i . ']', array(
	'label'             => sprintf( esc_html__( 'Select Page %d', 'fondness' ), $i ),
	'section'           => 'fondness_slider_section',
	'choices'			=> fondness_page_choices(),
	'active_callback'	=> 'fondness_is_slider_section_enable',
	) ) );

endfor;
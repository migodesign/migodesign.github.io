<?php
/**
 * Subscription Section options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add Subscription section
$wp_customize->add_section( 'fondness_subscription_section', array(
	'title'             => esc_html__( 'Subscription','fondness' ),
	'description'       => esc_html__( 'Note: To activate this section you need to install Jetpack Plugin and activate subscription module.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 60,
) );

// Subscription content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[subscription_section_enable]', array(
	'default'			=> 	$options['subscription_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[subscription_section_enable]', array(
	'label'             => esc_html__( 'Subscription Section Enable', 'fondness' ),
	'section'           => 'fondness_subscription_section',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[subscription_section_enable]', array(
		'selector'            => '#subscribe-now .tooltiptext',
		'settings'            => 'fondness_theme_options[subscription_section_enable]',
    ) );
}

// subscription title setting and control
$wp_customize->add_setting( 'fondness_theme_options[subscription_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[subscription_title]', array(
	'label'           	=> esc_html__( 'Title', 'fondness' ),
	'section'        	=> 'fondness_subscription_section',
	'active_callback' 	=> 'fondness_is_subscription_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[subscription_title]', array(
		'selector'            => '#subscribe-now h2.section-title',
		'settings'            => 'fondness_theme_options[subscription_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_subscription_title_partial',
    ) );
}

// subscription description setting and control
$wp_customize->add_setting( 'fondness_theme_options[subscription_description]', array(
	'sanitize_callback' => 'wp_kses_post',	
	'default'			=> $options['subscription_description'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[subscription_description]', array(
	'label'           	=> esc_html__( 'Description', 'fondness' ),
	'section'        	=> 'fondness_subscription_section',
	'active_callback' 	=> 'fondness_is_subscription_section_enable',
	'type'				=> 'textarea',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[subscription_description]', array(
		'selector'            => '#subscribe-now div.entry-content',
		'settings'            => 'fondness_theme_options[subscription_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_subscription_description_partial',
    ) );
}

// subscription btn title setting and control
$wp_customize->add_setting( 'fondness_theme_options[subscription_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['subscription_btn_title'],
) );

$wp_customize->add_control( 'fondness_theme_options[subscription_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'fondness' ),
	'section'        	=> 'fondness_subscription_section',
	'active_callback' 	=> 'fondness_is_subscription_section_enable',
	'type'				=> 'text',
) );
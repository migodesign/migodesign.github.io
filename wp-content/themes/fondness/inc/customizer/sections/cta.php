<?php
/**
 * CTA Section options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add CTA section
$wp_customize->add_section( 'fondness_cta_section', array(
	'title'             => esc_html__( 'CTA','fondness' ),
	'description'       => esc_html__( 'CTA Section options.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 30,
) );

// CTA content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'CTA Section Enable', 'fondness' ),
	'section'           => 'fondness_cta_section',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[cta_section_enable]', array(
		'selector'            => '#cta .tooltiptext',
		'settings'            => 'fondness_theme_options[cta_section_enable]',
    ) );
}

// counter image setting and control.
$wp_customize->add_setting( 'fondness_theme_options[cta_bg_image]', array(
	'sanitize_callback' => 'fondness_sanitize_image'
) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fondness_theme_options[cta_bg_image]',
		array(
		'label'       		=> esc_html__( 'CTA BG Image', 'fondness' ),
		'section'     		=> 'fondness_cta_section',
		'active_callback'	=> 'fondness_is_cta_section_enable',
) ) );

// cta sub_title setting and control
$wp_customize->add_setting( 'fondness_theme_options[cta_sub_title]',
	array(
		'default'       		=> $options['cta_sub_title'],
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'fondness_theme_options[cta_sub_title]',
    array(
		'label'      			=> esc_html__( 'Sub Title', 'fondness' ),
		'section'    			=> 'fondness_cta_section',
		'type'		 			=> 'text',
		'active_callback'		=> 'fondness_is_cta_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[cta_sub_title]', array(
		'selector'            => '#cta p.section-subtitle',
		'settings'            => 'fondness_theme_options[cta_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_cta_sub_title_partial',
    ) );
}

// cta posts drop down chooser control and setting
$wp_customize->add_setting( 'fondness_theme_options[cta_content_post]', array(
	'sanitize_callback' => 'fondness_sanitize_page',
) );

$wp_customize->add_control( new Fondness_Dropdown_Chooser( $wp_customize, 'fondness_theme_options[cta_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'fondness' ),
	'section'           => 'fondness_cta_section',
	'choices'			=> fondness_post_choices(),
	'active_callback'	=> 'fondness_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'fondness_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['cta_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'fondness' ),
	'section'        	=> 'fondness_cta_section',
	'active_callback' 	=> 'fondness_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[cta_btn_title]', array(
		'selector'            => '#cta div.read-more a',
		'settings'            => 'fondness_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_cta_btn_title_partial',
    ) );
}
<?php
/**
 * Our Solution Section options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add Our Solution section
$wp_customize->add_section( 'fondness_solution_section', array(
	'title'             => esc_html__( 'Our Solution','fondness' ),
	'description'       => esc_html__( 'Our Solution Section options.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 20,
) );

// Our Solution content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[solution_section_enable]', array(
	'default'			=> 	$options['solution_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[solution_section_enable]', array(
	'label'             => esc_html__( 'Our Solution Section Enable', 'fondness' ),
	'section'           => 'fondness_solution_section',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[solution_section_enable]', array(
		'selector'            => '#our-solution .tooltiptext',
		'settings'            => 'fondness_theme_options[solution_section_enable]',
    ) );
}

// solution sub_title setting and control
$wp_customize->add_setting( 'fondness_theme_options[solution_sub_title]',
	array(
		'default'       		=> $options['solution_sub_title'],
		'sanitize_callback'		=> 'sanitize_text_field',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'fondness_theme_options[solution_sub_title]',
    array(
		'label'      			=> esc_html__( 'Sub Title', 'fondness' ),
		'section'    			=> 'fondness_solution_section',
		'type'		 			=> 'text',
		'active_callback'		=> 'fondness_is_solution_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[solution_sub_title]', array(
		'selector'            => '#our-solution p.section-subtitle',
		'settings'            => 'fondness_theme_options[solution_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_solution_sub_title_partial',
    ) );
}


// solution sub_title setting and control
$wp_customize->add_setting( 'fondness_theme_options[solution_short_description]',
	array(
		'default'       		=> $options['solution_short_description'],
		'sanitize_callback'		=> 'wp_kses_post',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'fondness_theme_options[solution_short_description]',
    array(
		'label'      			=> esc_html__( 'Short Description', 'fondness' ),
		'section'    			=> 'fondness_solution_section',
		'type'		 			=> 'textarea',
		'active_callback'		=> 'fondness_is_solution_section_enable',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[solution_short_description]', array(
		'selector'            => '#our-solution div.section-content span',
		'settings'            => 'fondness_theme_options[solution_short_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_solution_short_description_partial',
    ) );
}

// solution posts drop down chooser control and setting
$wp_customize->add_setting( 'fondness_theme_options[solution_content_post]', array(
	'sanitize_callback' => 'fondness_sanitize_page',
) );

$wp_customize->add_control( new Fondness_Dropdown_Chooser( $wp_customize, 'fondness_theme_options[solution_content_post]', array(
	'label'             => esc_html__( 'Select Post', 'fondness' ),
	'section'           => 'fondness_solution_section',
	'choices'			=> fondness_post_choices(),
	'active_callback'	=> 'fondness_is_solution_section_enable',
) ) );

// solution btn title setting and control
$wp_customize->add_setting( 'fondness_theme_options[solution_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['solution_btn_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[solution_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'fondness' ),
	'section'        	=> 'fondness_solution_section',
	'active_callback' 	=> 'fondness_is_solution_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[solution_btn_title]', array(
		'selector'            => '#our-solution div.read-more a',
		'settings'            => 'fondness_theme_options[solution_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_solution_btn_title_partial',
    ) );
}
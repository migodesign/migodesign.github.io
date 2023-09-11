<?php
/**
 * Work Section options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add Work section
$wp_customize->add_section( 'fondness_work_section', array(
	'title'             => esc_html__( 'Our Work','fondness' ),
	'description'       => esc_html__( 'Work Section options.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 40,
) );

// Work content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[work_section_enable]', array(
	'default'			=> 	$options['work_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[work_section_enable]', array(
	'label'             => esc_html__( 'Work Section Enable', 'fondness' ),
	'section'           => 'fondness_work_section',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[work_section_enable]', array(
		'selector'            => '#work-section .tooltiptext',
		'settings'            => 'fondness_theme_options[work_section_enable]',
    ) );
}

// Subtitle setting and control
	$wp_customize->add_setting( 'fondness_theme_options[work_sub_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $options['work_sub_title'],
		'transport'			=> 'postMessage',
		) );

	$wp_customize->add_control( 'fondness_theme_options[work_sub_title]', array(
		'label'             => sprintf( esc_html__( 'Sub Title', 'fondness' ) ),
		'section'        	=> 'fondness_work_section',
		'active_callback' 	=> 'fondness_is_work_section_enable',
		'type'				=> 'text',
		) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[work_sub_title]', array(
		'selector'            => '#work-section p.section-subtitle',
		'settings'            => 'fondness_theme_options[work_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_work_sub_title_partial',
    ) );
}

// Title setting and control
	$wp_customize->add_setting( 'fondness_theme_options[work_title]', array(
		'sanitize_callback' => 'sanitize_text_field',
		'default' => $options['work_title'],
		'transport'			=> 'postMessage',
		) );

	$wp_customize->add_control( 'fondness_theme_options[work_title]', array(
		'label'             => sprintf( esc_html__( 'Title', 'fondness' ) ),
		'section'        	=> 'fondness_work_section',
		'active_callback' 	=> 'fondness_is_work_section_enable',
		'type'				=> 'text',
		) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[work_title]', array(
		'selector'            => '#work-section h2.section-title',
		'settings'            => 'fondness_theme_options[work_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_work_title_partial',
    ) );
}

// Short Description setting and control
	$wp_customize->add_setting( 'fondness_theme_options[work_short_description]', array(
		'sanitize_callback' => 'wp_kses_post',
		'default' => $options['work_short_description'],
		'transport'			=> 'postMessage',
		) );

	$wp_customize->add_control( 'fondness_theme_options[work_short_description]', array(
		'label'             => sprintf( esc_html__( 'Short Description', 'fondness' ) ),
		'section'        	=> 'fondness_work_section',
		'active_callback' 	=> 'fondness_is_work_section_enable',
		'type'				=> 'textarea',
		) );

	// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[work_short_description]', array(
		'selector'            => '#work-section div.section-content p',
		'settings'            => 'fondness_theme_options[work_short_description]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_work_short_description_partial',
    ) );
}

// Work content type control and setting
$wp_customize->add_setting( 'fondness_theme_options[work_content_type]', array(
	'default'          	=> $options['work_content_type'],
	'sanitize_callback' => 'fondness_sanitize_select',
) );

$wp_customize->add_control( 'fondness_theme_options[work_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'fondness' ),
	'section'           => 'fondness_work_section',
	'type'				=> 'select',
	'active_callback' 	=> 'fondness_is_work_section_enable',
	'choices'			=> array(
            'post'      => esc_html__( 'Post', 'fondness' ),
            'category'  => esc_html__( 'Category', 'fondness' ),
        )
) );

// Add dropdown category setting and control.
$wp_customize->add_setting(  'fondness_theme_options[work_content_category]', array(
	'sanitize_callback' => 'fondness_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Fondness_Dropdown_Taxonomies_Control( $wp_customize,'fondness_theme_options[work_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'fondness' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'fondness' ),
	'section'           => 'fondness_work_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'fondness_is_work_section_content_category_enable'
) ) );

for ( $i = 1; $i <= 13; $i++ ) :

	// work posts drop down chooser control and setting
	$wp_customize->add_setting( 'fondness_theme_options[work_content_post_' . $i . ']', array(
		'sanitize_callback' => 'fondness_sanitize_page',
	) );

	$wp_customize->add_control( new Fondness_Dropdown_Chooser( $wp_customize, 'fondness_theme_options[work_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'fondness' ), $i ),
		'section'           => 'fondness_work_section',
		'choices'			=> fondness_post_choices(),
		'active_callback'	=> 'fondness_is_work_section_content_post_enable',
	) ) );

endfor;
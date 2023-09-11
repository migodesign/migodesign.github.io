<?php
/**
 * Latest Posts Section options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add Latest Posts section
$wp_customize->add_section( 'fondness_latest_posts_section', array(
	'title'             => esc_html__( 'Latest Posts','fondness' ),
	'description'       => esc_html__( 'Latest Posts Section options.', 'fondness' ),
	'panel'             => 'fondness_front_page_panel',
	'priority'			=> 50,
) );

// Latest Posts content enable control and setting
$wp_customize->add_setting( 'fondness_theme_options[latest_posts_section_enable]', array(
	'default'			=> 	$options['latest_posts_section_enable'],
	'sanitize_callback' => 'fondness_sanitize_switch_control',
) );

$wp_customize->add_control( new Fondness_Switch_Control( $wp_customize, 'fondness_theme_options[latest_posts_section_enable]', array(
	'label'             => esc_html__( 'Latest Posts Section Enable', 'fondness' ),
	'section'           => 'fondness_latest_posts_section',
	'on_off_label' 		=> fondness_switch_options(),
) ) );

if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[latest_posts_section_enable]', array(
		'selector'            => '#latest-posts .tooltiptext',
		'settings'            => 'fondness_theme_options[latest_posts_section_enable]',
    ) );
}

// Latest Posts btn label setting and control
$wp_customize->add_setting( 'fondness_theme_options[latest_posts_sub_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['latest_posts_sub_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[latest_posts_sub_title]', array(
	'label'           	=> esc_html__( 'Section Sub Title', 'fondness' ),
	'section'        	=> 'fondness_latest_posts_section',
	'active_callback' 	=> 'fondness_is_latest_posts_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[latest_posts_sub_title]', array(
		'selector'            => '#latest-posts p.section-subtitle',
		'settings'            => 'fondness_theme_options[latest_posts_sub_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_latest_posts_sub_title_partial',
    ) );
}

// Latest Posts btn label setting and control
$wp_customize->add_setting( 'fondness_theme_options[latest_posts_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['latest_posts_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'fondness_theme_options[latest_posts_title]', array(
	'label'           	=> esc_html__( 'Section Title', 'fondness' ),
	'section'        	=> 'fondness_latest_posts_section',
	'active_callback' 	=> 'fondness_is_latest_posts_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[latest_posts_title]', array(
		'selector'            => '#latest-posts h2.section-title',
		'settings'            => 'fondness_theme_options[latest_posts_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_latest_posts_title_partial',
    ) );
}

// Latest Posts content type control and setting
$wp_customize->add_setting( 'fondness_theme_options[latest_posts_content_type]', array(
	'default'          	=> $options['latest_posts_content_type'],
	'sanitize_callback' => 'fondness_sanitize_select',
) );

$wp_customize->add_control( 'fondness_theme_options[latest_posts_content_type]', array(
	'label'             => esc_html__( 'Content Type', 'fondness' ),
	'section'           => 'fondness_latest_posts_section',
	'type'				=> 'select',
	'active_callback' 	=> 'fondness_is_latest_posts_section_enable',
	'choices'			=> array(
		'post'      => esc_html__( 'Post', 'fondness' ),
		'category'  => esc_html__( 'Category', 'fondness' ),
		),
) );

for ( $i = 1; $i <= 3; $i++ ) :

	// latest_posts posts drop down chooser control and setting
	$wp_customize->add_setting( 'fondness_theme_options[latest_posts_content_post_' . $i . ']', array(
		'sanitize_callback' => 'fondness_sanitize_page',
	) );

	$wp_customize->add_control( new Fondness_Dropdown_Chooser( $wp_customize, 'fondness_theme_options[latest_posts_content_post_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Post %d', 'fondness' ), $i ),
		'section'           => 'fondness_latest_posts_section',
		'choices'			=> fondness_post_choices(),
		'active_callback'	=> 'fondness_is_latest_posts_section_content_post_enable',
	) ) );

endfor;

// Add dropdown category setting and control.
$wp_customize->add_setting(  'fondness_theme_options[latest_posts_content_category]', array(
	'sanitize_callback' => 'fondness_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Fondness_Dropdown_Taxonomies_Control( $wp_customize,'fondness_theme_options[latest_posts_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'fondness' ),
	'description'      	=> esc_html__( 'Note: Latest selected no of posts will be shown from selected category', 'fondness' ),
	'section'           => 'fondness_latest_posts_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'fondness_is_latest_posts_section_content_category_enable'
) ) );
<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'fondness_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','fondness' ),
	'description'       => esc_html__( 'Excerpt section options.', 'fondness' ),
	'panel'             => 'fondness_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'fondness_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'fondness_sanitize_number_range',
	'validate_callback' => 'fondness_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'fondness_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'fondness' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'fondness' ),
	'section'     		=> 'fondness_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

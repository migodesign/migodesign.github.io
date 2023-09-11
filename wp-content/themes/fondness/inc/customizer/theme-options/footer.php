<?php
/**
 * Footer options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

// Footer Section
$wp_customize->add_section( 'fondness_section_footer',
	array(
		'title'      			=> esc_html__( 'Footer Options', 'fondness' ),
		'priority'   			=> 900,
		'panel'      			=> 'fondness_theme_options_panel',
	)
);

// footer image setting and control.
$wp_customize->add_setting( 'fondness_theme_options[footer_logo]', array(
	'sanitize_callback' => 'fondness_sanitize_image'
	) );

$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'fondness_theme_options[footer_logo]',
	array(
		'label'       		=> esc_html__( 'Site Info Logo', 'fondness' ),
		'section'     		=> 'fondness_section_footer',
		) ) );

// footer text
$wp_customize->add_setting( 'fondness_theme_options[copyright_text]',
	array(
		'default'       		=> $options['copyright_text'],
		'sanitize_callback'		=> 'fondness_santize_allow_tag',
		'transport'				=> 'postMessage',
	)
);
$wp_customize->add_control( 'fondness_theme_options[copyright_text]',
    array(
		'label'      			=> esc_html__( 'Copyright Text', 'fondness' ),
		'section'    			=> 'fondness_section_footer',
		'type'		 			=> 'textarea',
    )
);

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'fondness_theme_options[copyright_text]', array(
		'selector'            => '.site-info span',
		'settings'            => 'fondness_theme_options[copyright_text]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'fondness_copyright_text_partial',
    ) );
}
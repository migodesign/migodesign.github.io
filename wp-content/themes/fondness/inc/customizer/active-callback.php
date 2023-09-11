<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

if ( ! function_exists( 'fondness_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Fondness 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fondness_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'fondness_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'fondness_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Fondness 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fondness_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'fondness_theme_options[pagination_enable]' )->value();
	}
endif;

if ( ! function_exists( 'fondness_is_static_homepage_enable' ) ) :
	/**
	 * Check if static homepage is enabled.
	 *
	 * @since Fondness 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function fondness_is_static_homepage_enable( $control ) {
		return ( 'page' == $control->manager->get_setting( 'show_on_front' )->value() );
	}
endif;

/**
 * Front Page Active Callbacks
 */

/*==================Slider===============*/

/**
 * Check if slider section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[slider_section_enable]' )->value() );
}

/*==================Our Solution Section=====================*/

/**
 * Check if solution section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_solution_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[solution_section_enable]' )->value() );
}

/*==================CTA=====================*/

/**
 * Check if cta section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[cta_section_enable]' )->value() );
}

/*==================Work Section===============*/

/**
 * Check if work section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_work_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[work_section_enable]' )->value() );
}

/**
 * Check if work section content type is post.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_work_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'fondness_theme_options[work_content_type]' )->value();
	return fondness_is_work_section_enable( $control ) && ( 'post' == $content_type );
}

/**
 * Check if work section content type is category.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_work_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'fondness_theme_options[work_content_type]' )->value();
	return fondness_is_work_section_enable( $control ) && ( 'category' == $content_type );
}

/*=========================Latest Posts==================*/

/**
 * Check if latest_posts section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_latest_posts_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[latest_posts_section_enable]' )->value() );
}

/**
 * Check if latest_posts section content type is category.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_latest_posts_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'fondness_theme_options[latest_posts_content_type]' )->value();
	return fondness_is_latest_posts_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if latest_posts section content type is page.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_latest_posts_section_content_page_enable( $control ) {
	$content_type = $control->manager->get_setting( 'fondness_theme_options[latest_posts_content_type]' )->value();
	return fondness_is_latest_posts_section_enable( $control ) && ( 'page' == $content_type );
}

/**
 * Check if latest_posts section content type is post.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_latest_posts_section_content_post_enable( $control ) {
	$content_type = $control->manager->get_setting( 'fondness_theme_options[latest_posts_content_type]' )->value();
	return fondness_is_latest_posts_section_enable( $control ) && ( 'post' == $content_type );
}

/*========================Subscription===========================*/
/**
 * Check if subscription section is enabled.
 *
 * @since Fondness 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function fondness_is_subscription_section_enable( $control ) {
	return ( $control->manager->get_setting( 'fondness_theme_options[subscription_section_enable]' )->value() );
}
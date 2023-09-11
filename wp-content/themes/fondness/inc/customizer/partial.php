<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Fondness
* @since Fondness 1.0.0
*/

if ( ! function_exists( 'fondness_copyright_text_partial' ) ) :
    // copyright_text
    function fondness_copyright_text_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['copyright_text'] );
    }
endif;

/*=============Slider Section==============*/
if ( ! function_exists( 'fondness_slider_btn_label_partial' ) ) :
    // slider title
    function fondness_slider_btn_label_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['slider_btn_label'] );
    }
endif;

/*=============Our Solution Section==============*/

if ( ! function_exists( 'fondness_solution_sub_title_partial' ) ) :
    // solution_sub_title
    function fondness_solution_sub_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['solution_sub_title'] );
    }
endif;

if ( ! function_exists( 'fondness_solution_short_description_partial' ) ) :
    // solution_short_description
    function fondness_solution_short_description_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['solution_short_description'] );
    }
endif;

if ( ! function_exists( 'fondness_solution_btn_title_partial' ) ) :
    // solution_btn_title
    function fondness_solution_btn_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['solution_btn_title'] );
    }
endif;

/*=============CTA Section==============*/

if ( ! function_exists( 'fondness_cta_sub_title_partial' ) ) :
    // cta_sub_title
    function fondness_cta_sub_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['cta_sub_title'] );
    }
endif;

if ( ! function_exists( 'fondness_cta_btn_title_partial' ) ) :
    // cta_btn_title
    function fondness_cta_btn_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

/*=============Work Section==============*/
if ( ! function_exists( 'fondness_work_sub_title_partial' ) ) :
    // work_sub_title
    function fondness_work_sub_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['work_sub_title'] );
    }
endif;

if ( ! function_exists( 'fondness_work_title_partial' ) ) :
    // work_title
    function fondness_work_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['work_title'] );
    }
endif;

if ( ! function_exists( 'fondness_work_short_description_partial' ) ) :
    // work_short_description
    function fondness_work_short_description_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['work_short_description'] );
    }
endif;

/*=============Latest Posts Section==============*/

if ( ! function_exists( 'fondness_latest_posts_sub_title_partial' ) ) :
    // latest_posts_sub_title
    function fondness_latest_posts_sub_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['latest_posts_sub_title'] );
    }
endif;

if ( ! function_exists( 'fondness_latest_posts_title_partial' ) ) :
    // latest_posts_title
    function fondness_latest_posts_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['latest_posts_title'] );
    }
endif;

/*=============Subscription Section==============*/

if ( ! function_exists( 'fondness_subscription_title_partial' ) ) :
    // subscription_title
    function fondness_subscription_title_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['subscription_title'] );
    }
endif;

if ( ! function_exists( 'fondness_subscription_description_partial' ) ) :
    // subscription_description
    function fondness_subscription_description_partial() {
        $options = fondness_get_theme_options();
        return esc_html( $options['subscription_description'] );
    }
endif;
<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function fondness_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'fondness' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function fondness_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'fondness' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of events for post choices.
 * @return Array Array of post ids and name.
 */
function fondness_event_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'tp-event' ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'fondness' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

/**
 * List of trips for post choices.
 * @return Array Array of post ids and name.
 */
function fondness_trip_choices() {
    $posts = get_posts( array( 'post_type' => 'itineraries', 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'fondness' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    return  $choices;
}

function fondness_product_choices() {
    $full_product_list = array();
    $product_id = array();
    $loop = new WP_Query(array('post_type' => array('product', 'product_variation'), 'posts_per_page' => -1));
    while ($loop->have_posts()) : $loop->the_post();
        $product_id[] = get_the_id();
    endwhile;
    wp_reset_postdata();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'fondness' );
    foreach ( $product_id  as $id ) {
        $choices[ $id ] = get_the_title( $id );
    }
    return  $choices;
}

if ( ! function_exists( 'fondness_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function fondness_selected_sidebar() {
        $fondness_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'fondness' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar 1', 'fondness' ),
            'optional-sidebar-2'    => esc_html__( 'Optional Sidebar 2', 'fondness' ),
            'optional-sidebar-3'    => esc_html__( 'Optional Sidebar 3', 'fondness' ),
            'optional-sidebar-4'    => esc_html__( 'Optional Sidebar 4', 'fondness' ),
        );

        $output = apply_filters( 'fondness_selected_sidebar', $fondness_selected_sidebar );

        return $output;
    }
endif;

if ( ! function_exists( 'fondness_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function fondness_site_layout() {
        $fondness_site_layout = array(
            'wide-layout'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
        );

        $output = apply_filters( 'fondness_site_layout', $fondness_site_layout );
        return $output;
    }
endif;


if ( ! function_exists( 'fondness_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function fondness_global_sidebar_position() {
        $fondness_global_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'fondness_global_sidebar_position', $fondness_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'fondness_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function fondness_sidebar_position() {
        $fondness_sidebar_position = array(
            'right-sidebar' => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'fondness_sidebar_position', $fondness_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'fondness_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function fondness_pagination_options() {
        $fondness_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'fondness' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'fondness' ),
        );

        $output = apply_filters( 'fondness_pagination_options', $fondness_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'fondness_get_spinner_list' ) ) :
    /**
     * List of spinner icons options.
     * @return array List of all spinner icon options.
     */
    function fondness_get_spinner_list() {
        $arr = array(
            'default'               => esc_html__( 'Default', 'fondness' ),
            'spinner-wheel'         => esc_html__( 'Wheel', 'fondness' ),
            'spinner-double-circle' => esc_html__( 'Double Circle', 'fondness' ),
            'spinner-two-way'       => esc_html__( 'Two Way', 'fondness' ),
            'spinner-umbrella'      => esc_html__( 'Umbrella', 'fondness' ),
            'spinner-dots'          => esc_html__( 'Dots', 'fondness' ),
            'spinner-one-way'       => esc_html__( 'One Way', 'fondness' ),
            'spinner-fidget'        => esc_html__( 'Fidget', 'fondness' ),
        );
        return apply_filters( 'fondness_spinner_list', $arr );
    }
endif;

if ( ! function_exists( 'fondness_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function fondness_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'fondness' ),
            'off'       => esc_html__( 'Disable', 'fondness' )
        );
        return apply_filters( 'fondness_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'fondness_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function fondness_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'fondness' ),
            'off'       => esc_html__( 'No', 'fondness' )
        );
        return apply_filters( 'fondness_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'fondness_heading_tags' ) ) :
    /**
     * Destination Options
     * @return array site gallery options
     */
    function fondness_heading_tags() {
        
        $fondness_heading_tags = array(
			'h1'	=> esc_html__('H1', 'fondness'),
			'h2'	=> esc_html__('H2', 'fondness'),
			'h3'	=> esc_html__('H3', 'fondness'),
			'h4'	=> esc_html__('H4', 'fondness'),
			'h5'	=> esc_html__('H5', 'fondness'),
			'h6'	=> esc_html__('H6', 'fondness'),
			'p'		=> esc_html__('Paragraph', 'fondness'),
		);

        $output = apply_filters( 'fondness_heading_tags', $fondness_heading_tags );


        return $output;
    }
endif;
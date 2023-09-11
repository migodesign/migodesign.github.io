<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Fondness
	 * @since Fondness 1.0.0
	 */

	/**
	 * fondness_doctype hook
	 *
	 * @hooked fondness_doctype -  10
	 *
	 */
	do_action( 'fondness_doctype' );

?>
<head>
<?php
	/**
	 * fondness_before_wp_head hook
	 *
	 * @hooked fondness_head -  10
	 *
	 */
	do_action( 'fondness_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * fondness_page_start_action hook
	 *
	 * @hooked fondness_page_start -  10
	 *
	 */
	do_action( 'fondness_page_start_action' ); 

	/**
	 * fondness_loader_action hook
	 *
	 * @hooked fondness_loader -  10
	 *
	 */
	do_action( 'fondness_before_header' );

	/**
	 * fondness_header_action hook
	 *
	 * @hooked fondness_header_start -  10
	 * @hooked fondness_site_branding -  20
	 * @hooked fondness_site_navigation -  30
	 * @hooked fondness_header_end -  50
	 *
	 */
	do_action( 'fondness_header_action' );

	/**
	 * fondness_content_start_action hook
	 *
	 * @hooked fondness_content_start -  10
	 *
	 */
	do_action( 'fondness_content_start_action' );

	/**
	 * fondness_header_image_action hook
	 *
	 * @hooked fondness_header_image -  10
	 *
	 */
	do_action( 'fondness_header_image_action' );

	if ( fondness_is_frontpage() ) {
    	$options = fondness_get_theme_options();
    	$sorted = array();
    	if ( ! empty( $options['sortable'] ) ) {
			$sorted = explode( ',' , $options['sortable'] );
		}

		foreach ( $sorted as $section ) {
			add_action( 'fondness_primary_content', 'fondness_add_'. $section .'_section' );
		}

		do_action( 'fondness_primary_content' );
	}
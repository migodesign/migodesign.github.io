<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

/**
 * fondness_footer_primary_content hook
 *
 * @hooked fondness_add_contact_section -  10
 *
 */
do_action( 'fondness_footer_primary_content' );

/**
 * fondness_content_end_action hook
 *
 * @hooked fondness_content_end -  10
 *
 */
do_action( 'fondness_content_end_action' );

/**
 * fondness_content_end_action hook
 *
 * @hooked fondness_footer_start -  10
 * @hooked fondness_footer_widgets->add_footer_widgets -  20
 * @hooked fondness_footer_site_info -  40
 * @hooked fondness_footer_end -  100
 *
 */
do_action( 'fondness_footer' );

/**
 * fondness_page_end_action hook
 *
 * @hooked fondness_page_end -  10
 *
 */
do_action( 'fondness_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
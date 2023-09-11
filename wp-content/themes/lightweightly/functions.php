<?php 
add_action( 'wp_enqueue_scripts', 'lightweightly_enqueue_styles' );
function lightweightly_enqueue_styles() {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
} 

include("custom_css.php");

function lightweightly_load_google_fonts() {
	wp_enqueue_style( 'lightweightly-google-fonts', '//fonts.googleapis.com/css2?family=Raleway:wght@400;500;600&display=swap' ); 
}
add_action( 'wp_enqueue_scripts', 'lightweightly_load_google_fonts' ); 



require_once( get_stylesheet_directory() . '/inc/custom-header.php' );



function lightweightly_customize_register( $wp_customize ) {

	$wp_customize->add_section( 'lightweightly_section', array(
		'title'      => __('Lightweightly Features','lightweightly'),
		'priority'   => 1,
		'capability' => 'edit_theme_options',
	) );

	$wp_customize->add_setting( 'toggle_headline_shadow', array(
		'default' => 0,
		'sanitize_callback' => 'lightweightly_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'toggle_headline_shadow', array(
		'label'    => __( 'Add text shadow to post/page headline', 'lightweightly' ),
		'section'  => 'lightweightly_section',
		'priority' => 1,
		'settings' => 'toggle_headline_shadow',
		'type'     => 'checkbox',
	) );


	$wp_customize->add_setting( 'toggle_post_author_category', array(
		'default' => 0,
		'sanitize_callback' => 'lightweightly_sanitize_checkbox',
	) );

	$wp_customize->add_control( 'toggle_post_author_category', array(
		'label'    => __( 'Show post author & category on post feed', 'lightweightly' ),
		'section'  => 'lightweightly_section',
		'priority' => 1,
		'settings' => 'toggle_post_author_category',
		'type'     => 'checkbox',
	) );



	function lightweightly_sanitize_checkbox( $input ) {
		return ( ( isset( $input ) && true == $input ) ? true : false );
	}

}
add_action('customize_register','lightweightly_customize_register');





if(! function_exists('lightweightly_css_from_customizer_php' ) ):
	function lightweightly_css_from_customizer_php(){
		?>

		<style type="text/css">

<?php if ( get_theme_mod( 'toggle_post_author_category' ) == '1' ) : ?>

	.postinfo span:nth-of-type(2),
.postinfo span:nth-of-type(3) {
      display: inline-block;
}
.postinfo span:first-of-type:after{
      display: inline-block;
}
<?php endif; ?>
			<?php if ( get_theme_mod( 'toggle_headline_shadow' ) == '1' ) : ?>
				.info{
					text-shadow:0 2px 3px rgba(0,0,0,0.2)
				}
			<?php endif; ?>
			.header a.logo, .logo:hover { color: <?php echo esc_attr(get_theme_mod( 'logo_color')); ?>; }
			.has-sidebar #secondary{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_background_color')); ?>; }
			.has-sidebar #secondary h2, .has-sidebar #secondary h1, .has-sidebar #secondary h3, .has-sidebar #secondary h4, .has-sidebar #secondary h5, .has-sidebar #secondary h6, .has-sidebar #secondary th{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_title_color')); ?>; }
			.has-sidebar #secondary p, .has-sidebar #secondary .widget, .has-sidebar #secondary li, .has-sidebar #secondary ol, .has-sidebar #secondary ul,.has-sidebar #secondary dd, .has-sidebar #secondary span, .has-sidebar #secondary  div{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_text_color')); ?>; }
			.has-sidebar #secondary button.search-submit{ background: <?php echo esc_attr(get_theme_mod( 'sidebar_button_bg_color')); ?>; color:#fff; }
			.has-sidebar #secondary a{ color: <?php echo esc_attr(get_theme_mod( 'sidebar_link_color')); ?>; }
			.has-sidebar #secondary *, .has-sidebar #secondary .widget h2{ border-color: <?php echo esc_attr(get_theme_mod( 'sidebar_border_color')); ?>; }
			.blog .wrapmain article, .archive .wrapmain article, .search-results .wrapmain article{ background: <?php echo esc_attr(get_theme_mod( 'blogposts_background')); ?>; }
			.blog .wrapmain article h2, .archive .wrapmain article h2, .search-results .wrapmain article h2,.blog .wrapmain article h2 a, .archive .wrapmain article h2 a, .search-results .wrapmain article h2 a{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_headline')); ?>; }
			.postinfo, .postinfo *{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_meta')); ?>; }
			.blog .wrapmain article .entry-content p, .archive .wrapmain article .entry-content p, .search-results .wrapmain article .entry-content p{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_text')); ?>; }
			a.button.button-readmore{ background: <?php echo esc_attr(get_theme_mod( 'blogposts_button_bg')); ?>; }
			a.button.button-readmore{ color: <?php echo esc_attr(get_theme_mod( 'blogposts_button_text')); ?>; }
			.error404 .content-area, .search-no-results .content-area,.single .wrapmain article, .page .wrapmain article, #commentform{ background: <?php echo esc_attr(get_theme_mod( 'postpages_background')); ?>; }
			#commentform label, h3#reply-title, h2.comments-title, .page .wrapmain article h1, .page .wrapmain article h2, .page .wrapmain article h3, .page .wrapmain article h4, .page .wrapmain article h5, .page .wrapmain article h6, .page .wrapmain article th,.single .wrapmain article h1, .single .wrapmain article h2, .single .wrapmain article h3, .single .wrapmain article h4, .single .wrapmain article h5, .single .wrapmain article h6, .single .wrapmain article th{ color: <?php echo esc_attr(get_theme_mod( 'postpages_headline')); ?>; }
			.error404 .content-area p, .search-no-results .content-area p, .single .wrapmain article, .single .wrapmain article p, .single .wrapmain article dd, .single .wrapmain article li, .single .wrapmain article ul, .single .wrapmain article ol, .single .wrapmain article address, .single .wrapmain article table, .single .wrapmain article th, .single .wrapmain article td, .single .wrapmain article blockquote, .single .wrapmain article span, .single .wrapmain article div .page .wrapmain article, .page .wrapmain article p, .page .wrapmain article dd, .page .wrapmain article li, .page .wrapmain article ul, .page .wrapmain article ol, .page .wrapmain article address, .page .wrapmain article table, .page .wrapmain article th, .page .wrapmain article td, .page .wrapmain article blockquote, .page .wrapmain article span, .page .wrapmain article div{ color: <?php echo esc_attr(get_theme_mod( 'postpages_text')); ?>; }
			.single .wrapmain article a, .page .wrapmain article a{ color: <?php echo esc_attr(get_theme_mod( 'postpages_link')); ?>; }
			.wrapmain .search-submit, .page .wrapmain article a.button, .single .wrapmain article a.button, .nav-links span.button, form#commentform input#submit{ background: <?php echo esc_attr(get_theme_mod( 'postpages_buttons_bg')); ?>; }
			.wrapmain .search-submit, .nav-links span.button, form#commentform input#submit{ color: <?php echo esc_attr(get_theme_mod( 'postpages_buttons_text')); ?>; }
			.page .wrapmain article td,.single .wrapmain article td,.page .wrapmain article th, .single .wrapmain article th,.single .wrapmain article *, .page .wrapmain article *{ border-color: <?php echo esc_attr(get_theme_mod( 'postpages_borders')); ?>; }
			.footer-column-three h3{ color: <?php echo esc_attr(get_theme_mod( 'footer_headline')); ?>; }
			footer{ background: <?php echo esc_attr(get_theme_mod( 'footer_background')); ?>; }
			.footer-column-wrapper .widget a{ color: <?php echo esc_attr(get_theme_mod( 'footer_link')); ?>; }
			.footer-column-wrapper .widget *{ border-color: <?php echo esc_attr(get_theme_mod( 'footer_border')); ?>; }
			.footer-column-wrapper .widget .search-submit{ background: <?php echo esc_attr(get_theme_mod( 'footer_button_bg')); ?>; }
			.footer-column-wrapper .widget .search-submit{ color: <?php echo esc_attr(get_theme_mod( 'footer_button_text')); ?>; }
			.site-info, .site-info *,.footer-column-wrapper .widget, .footer-column-wrapper .widget li, .footer-column-wrapper .widget p, .footer-column-wrapper abbr, .footer-column-wrapper cite, .footer-column-wrapper table caption, .footer-column-wrapper td, .footer-column-wrapper th{ color: <?php echo esc_attr(get_theme_mod( 'footer_text')); ?>; }
			<?php if ( get_theme_mod( 'hide_logo' ) == '1' ) : ?>.logo, .logo:hover {display:none !important;}<?php endif; ?>
			<?php if ( get_theme_mod( 'hide_navigation' ) == '1' ) : ?>.mobile-bar {display:none !important;}<?php endif; ?>
		</style>
	<?php }
	add_action( 'wp_head', 'lightweightly_css_from_customizer_php' );
endif;





/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1 for child theme Lightweightly for publication on WordPress.org
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

/**
 * Include the TGM_Plugin_Activation class.
 *
 * Depending on your implementation, you may want to change the include call:
 *
 * Parent Theme:
 * require_once get_template_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Child Theme:
 * require_once get_stylesheet_directory() . '/path/to/class-tgm-plugin-activation.php';
 *
 * Plugin:
 * require_once dirname( __FILE__ ) . '/path/to/class-tgm-plugin-activation.php';
 */
require_once get_stylesheet_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'lightweightly_register_required_plugins' );

/**
 * Register the required plugins for this theme.
 *
 * In this example, we register five plugins:
 * - one included with the TGMPA library
 * - two from an external source, one from an arbitrary source, one from a GitHub repository
 * - two from the .org repo, where one demonstrates the use of the `is_callable` argument
 *
 * The variables passed to the `tgmpa()` function should be:
 * - an array of plugin arrays;
 * - optionally a configuration array.
 * If you are not changing anything in the configuration array, you can remove the array and remove the
 * variable from the function call: `tgmpa( $plugins );`.
 * In that case, the TGMPA default settings will be used.
 *
 * This function is hooked into `tgmpa_register`, which is fired on the WP `init` action on priority 10.
 */
function lightweightly_register_required_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(
		array(
			'name'      => 'Tables',
			'slug'      => 'superb-tables',
			'required'  => false,
		),
				array(
			'name'      => 'Social Share and Follow Buttons',
			'slug'      => 'superb-social-share-and-follow-buttons',
			'required'  => false,
		),
	);

	/*
	 * Array of configuration settings. Amend each line as needed.
	 *
	 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
	 * strings available, please help us make TGMPA even better by giving us access to these translations or by
	 * sending in a pull-request with .po file(s) with the translations.
	 *
	 * Only uncomment the strings in the config array if you want to customize the strings.
	 */
	$config = array(
		'id'           => 'lightweightly',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}

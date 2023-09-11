<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

$options = fondness_get_theme_options();


if ( ! function_exists( 'fondness_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Fondness 1.0.0
	 */
	function fondness_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'fondness_doctype', 'fondness_doctype', 10 );


if ( ! function_exists( 'fondness_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'fondness_before_wp_head', 'fondness_head', 10 );

if ( ! function_exists( 'fondness_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fondness' ); ?></a>

		<?php
	}
endif;
add_action( 'fondness_page_start_action', 'fondness_page_start', 10 );

if ( ! function_exists( 'fondness_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_header_start() {
		$options = fondness_get_theme_options();
		?>
		<div class="menu-overlay"></div>
		
		<header id="masthead" class="site-header" role="banner">
		<div class="wrapper">
		<?php
	}
endif;
add_action( 'fondness_header_action', 'fondness_header_start', 20 );

if ( ! function_exists( 'fondness_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'fondness_page_end_action', 'fondness_page_end', 10 );

if ( ! function_exists( 'fondness_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_site_branding() {
		$options  = fondness_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];		
		?>
		
		
		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( fondness_is_latest_posts() || fondness_is_frontpage() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->
		
		<?php
	}
endif;
add_action( 'fondness_header_action', 'fondness_site_branding', 20 );

if ( ! function_exists( 'fondness_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_site_navigation() {
		$options = fondness_get_theme_options();
		?>
		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<?php
				echo fondness_get_svg( array( 'icon' => 'menu' ) );
				echo fondness_get_svg( array( 'icon' => 'close' ) );
				?>					
			</button>

			<?php  

			$social = '';
				            	
					$social .= '<li class="social-menu"><div class="social-icons">';
					$social .= wp_nav_menu( 
						$social_defaults = array(
            			'theme_location' => 'social',
            			'container' => false,
            			'menu_class' => '',
            			'echo' => false,
            			'fallback_cb' => 'fondness_menu_fallback_cb',
            			'depth' => 1,
            			'link_before' => '<span class="screen-reader-text">',
						'link_after' => '</span>',
            		)
					 );
					$social .= '</div></li>';

					$search = '<li class="search-menu"><a href="#">';
					$search .= fondness_get_svg( array( 'icon' => 'search' ) );
					$search .= fondness_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search" style="display: none;">';
					$search .= get_search_form( $echo = false );
					$search .= '</div></li>';
                
        		wp_nav_menu( array(
        			'theme_location' => 'primary',
        			'container' => 'div',
        			'menu_class' => 'menu nav-menu',
        			'menu_id' => 'primary-menu',
        			'echo' => true,
        			'fallback_cb' => 'fondness_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'  . $search . $social . '</ul>',
        		) );
        	?>
		</nav><!-- #site-navigation -->
		<?php
	}
endif;
add_action( 'fondness_header_action', 'fondness_site_navigation', 30 );


if ( ! function_exists( 'fondness_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_header_end() {
		?>
</div><!-- .wrapper -->
</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'fondness_header_action', 'fondness_header_end', 50 );

if ( ! function_exists( 'fondness_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'fondness_content_start_action', 'fondness_content_start', 10 );

if ( ! function_exists( 'fondness_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_header_image() {
		$options  = fondness_get_theme_options();
		if ( fondness_is_frontpage() )
			return;
		$header_image = get_header_image();
		?>

    	<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
            <div class="overlay"></div>
            <div class="wrapper">
                <header class="page-header">
                    <?php fondness_custom_header_banner_title(); ?>
                </header>
                <?php fondness_add_breadcrumb(); ?>
            </div>
        </div><!-- #page-site-header -->
    	

	<?php
	}
endif;
add_action( 'fondness_header_image_action', 'fondness_header_image', 10 );

if ( ! function_exists( 'fondness_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Fondness 1.0.0
	 */
	function fondness_add_breadcrumb() {
		$options = fondness_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( fondness_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * fondness_simple_breadcrumb hook
				 *
				 * @hooked fondness_simple_breadcrumb -  10
				 *
				 */
				do_action( 'fondness_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'fondness_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'fondness_content_end_action', 'fondness_content_end', 10 );

if ( ! function_exists( 'fondness_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_footer_start() {

		$options = fondness_get_theme_options();
		?>
		<footer id="colophon" class="site-footer" role="contentinfo">

		<div class="footer-logo-wrapper wrapper">
		
		<?php if( !empty( $options['footer_logo'] ) ): ?>
                <div class="footer-logo">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo esc_url( $options['footer_logo'] ); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                </div><!-- .footer-logo -->
            <?php endif; ?>

            <?php 

            	$search = '';
					$search = '<li class="search-menu"><a href="#">';
					$search .= fondness_get_svg( array( 'icon' => 'search' ) );
					$search .= fondness_get_svg( array( 'icon' => 'close' ) );
					$search .= '</a><div id="search" style="display: none;">';
					$search .= get_search_form( $echo = false );
					$search .= '</div></li>';

                wp_nav_menu( array(
        			'theme_location' => 'footer-menu',
        			'container' => 'div',
        			'container_class' => 'footer-menu',
        			'menu_class' => '',
        			'menu_id' => '',
        			'echo' => true,
        			'fallback_cb' => 'fondness_menu_fallback_cb',
        			'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'  . $search . '</ul>',
        		) );

             ?>

            </div><!-- .footer-logo-wrapper -->

		<?php
	}
endif;
add_action( 'fondness_footer', 'fondness_footer_start', 10 );

if ( ! function_exists( 'fondness_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_footer_site_info() {
		$options = fondness_get_theme_options();
		$theme_data = wp_get_theme();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );

		$copyright_text = $options['copyright_text'] ? $options['copyright_text'] : '';
		?>
			
		<div class="site-info">
            <div class="wrapper">
                <span>
					<?php echo fondness_santize_allow_tag( $copyright_text ); ?>
				
					<?php echo esc_html__( ' All Rights Reserved | ', 'fondness' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'fondness' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
				</span>
            </div><!-- .wrapper -->    
        </div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'fondness_footer', 'fondness_footer_site_info', 40 );

if ( ! function_exists( 'fondness_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_footer_scroll_to_top() {
		$options  = fondness_get_theme_options();
		?>
			<div class="backtotop"><?php echo fondness_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php 
	}
endif;
add_action( 'fondness_footer', 'fondness_footer_scroll_to_top', 40 );

if ( ! function_exists( 'fondness_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'fondness_footer', 'fondness_footer_end', 100 );

if ( ! function_exists( 'fondness_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_loader() {
		$options = fondness_get_theme_options();
		?>

			<div id="loader">
            <div class="loader-container">
	                <div id="preloader">
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                    <span></span>
	                </div>
            </div>
        </div><!-- #loader -->
		<?php
	}
endif;
add_action( 'fondness_before_header', 'fondness_loader', 10 );

if ( ! function_exists( 'fondness_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Fondness 1.0.0
	 *
	 */
	function fondness_infinite_loader_spinner() { 
		global $post;
		$options = fondness_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . fondness_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'fondness_infinite_loader_spinner_action', 'fondness_infinite_loader_spinner', 10 );
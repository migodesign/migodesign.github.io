/**
 * File customizer.js.
 *
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {

	const fondness_section_lists = ['slider_section','solution_section','cta_section','work_section','latest_posts_section','subscription_section','counter_section','service_section','testimonial_section','partners_section'];
    fondness_section_lists.forEach( fondness_homepage_scroll_preview );

    function fondness_homepage_scroll_preview(item, index) {
    	// Collect information from customize-controls.js about which panels are opening.
		wp.customize.bind( 'preview-ready', function() {
			
			// Initially hide the theme option placeholders on load.
			$( '.panel-placeholder' ).hide();
			wp.customize.preview.bind( item, function( data ) {
				// Only on the front page.
				if ( ! $( 'body' ).hasClass( 'home' ) ) {
					return;
				}

				// When the section is expanded, show and scroll to the content placeholders, exposing the edit links.
				if ( true === data.expanded ) {
					$('html, body').animate({
				        'scrollTop' : $('#fondness_'+item).position().top
				    });
				} 
			});

		});
 	}

	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );

	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a, .site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a, .site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header title color.
	wp.customize( 'fondness_theme_options[header_title_color]', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title a' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title a' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-title a' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Header tagline color.
	wp.customize( 'fondness_theme_options[header_tagline_color]', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-description' ).css( {
					'clip': 'auto',
					'position': 'relative'
				} );
				$( '.site-description' ).css( {
					'color': to
				} );
			}
		} );
	} );

	// Color scheme.
	wp.customize( 'fondness_theme_options[colorscheme]', function( value ) {
		value.bind( function( to ) {

			// Update color body class.
			$( 'body' )
				.removeClass( 'colors-light colors-dark colors-custom' )
				.addClass( 'colors-' + to );
		});
	});

	// Custom color hue.
	wp.customize( 'fondness_theme_options[colorscheme_hue]', function( value ) {
		value.bind( function( to ) {

			// Update custom color CSS
			var style = $( '#custom-theme-colors' ),
			    color = style.data( 'color' ),
			    css = style.html();
			css = css.split( color ).join( to );
			style.html( css )
			     .data( 'color', to );
		} );
	} );
} )( jQuery );

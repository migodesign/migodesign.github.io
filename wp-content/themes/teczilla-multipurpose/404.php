<?php
/**
 * The template for displaying the 404 template in the Teczilla theme.
 *
 */
 
get_header();
$teczilla_404_image = get_theme_mod(
    "404_background_image",
    get_stylesheet_directory_uri() . "/resource/images/404.jpg"
);

?>
	<div class="section section-x page-extra-pd tc-bunker align-middle-md error-44" style="background-image: url('<?php echo esc_url(
    $teczilla_404_image
); ?>');">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-6 col-md-8 text-center">
					<div class="error-content">
						<span class="error-text-large"><?php esc_html_e( '404', 'teczilla-multipurpose' ); ?></span>
						<h5><?php esc_html_e( 'Opps! Why you are here?', 'teczilla-multipurpose' ); ?></h5>
						<p><?php esc_html_e( 'We are very sorry for inconvenience. It looks like you are tring to access a page that either has been deleted or never existed.', 'teczilla-multipurpose' ); ?></p>
						<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="btn"><?php esc_html_e( 'Go to Home', 'teczilla-multipurpose' ); ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
?>
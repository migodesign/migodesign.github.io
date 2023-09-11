<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */


?>
<article id="post-<?php the_ID(); ?>" <?php post_class( ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<img src="<?php the_post_thumbnail_url( 'post-thumbnail' ) ?>" alt="<?php the_title_attribute(); ?>">
		</div><!-- .featured-image -->
	<?php endif; ?>

    <div class="post-wrapper">
    	<?php if ( fondness_is_frontpage() ) : ?>
			<header class="entry-header">
				<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
			</header><!-- .entry-header -->
		<?php endif; ?>
    	<div class="entry-container">
			<div class="entry-content">
				<?php
					the_content();

					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fondness' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->

			<?php if ( get_edit_post_link() ) : ?>
				<footer class="entry-footer">
					<?php
						edit_post_link(
							sprintf(
								/* translators: %s: Name of current post */
								esc_html__( 'Edit %s', 'fondness' ),
								the_title( '<span class="screen-reader-text">"', '"</span>', false )
							),
							'<span class="edit-link">',
							'</span>'
						);
					?>
				</footer><!-- .entry-footer -->
			<?php endif; ?>
		</div><!-- .entry-container -->
	</div><!-- .post-wrapper -->
</article><!-- #post-## -->
<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'hentry' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<div class="featured-image">
			<img src="<?php the_post_thumbnail_url( 'post-thumbnail' ) ?>" alt="<?php the_title_attribute(); ?>">
		</div><!-- .featured-image -->
	<?php endif; ?>

	<div class="entry-container">
		<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fondness' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fondness' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
		</div><!-- .entry-container -->

		<div class="entry-meta">
			<?php 
			echo fondness_author_meta();
			
			fondness_posted_on(); 
			?>

			<?php fondness_entry_footer(); ?> 
		</div><!-- .entry-meta -->
	</article>
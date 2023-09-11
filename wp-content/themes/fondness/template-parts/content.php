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
$class = has_post_thumbnail() ? 'has-post-thumbnail' : 'no-post-thumbnail';
$options = fondness_get_theme_options();
$btn = !empty( $options['blog_page_post_btn'] ) ? $options['blog_page_post_btn'] : '';
?>

<article <?php post_class( $class ); ?>>
    <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
        <a href="<?php the_permalink(); ?>" class="post-thumbnail-link"></a>
    </div><!-- .featured-image -->

    <div class="entry-container">
        <header class="entry-header">
            <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        </header>

        <div class="entry-meta">
            <?php echo fondness_article_header_meta(); ?><!-- .cat-links -->

            <?php fondness_posted_on(); ?>
        </div><!-- .entry-meta -->

        <div class="entry-content">
            <?php the_excerpt(); ?>
        </div><!-- .entry-content -->

        <?php if( !empty( $btn ) ): ?>
            <div class="read-more">
                <a href="<?php the_permalink(); ?>" class="btn"><?php echo esc_html( $btn ); ?></a>
            </div><!-- .read-more -->
        <?php endif; ?>
    </div><!-- .entry-container -->
</article>
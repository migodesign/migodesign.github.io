<?php
/**
 * Our Solution section
 *
 * This is the template for the content of solution section
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */
if ( ! function_exists( 'fondness_add_solution_section' ) ) :
    /**
    * Add solution section
    *
    *@since Fondness 1.0.0
    */
    function fondness_add_solution_section() {
        $options = fondness_get_theme_options();
        // Check if solution is enabled on frontpage
        $solution_enable = apply_filters( 'fondness_section_status', true, 'solution_section_enable' );

        if ( true !== $solution_enable ) {
            return false;
        }
        // Get solution section details
        $section_details = array();
        $section_details = apply_filters( 'fondness_filter_solution_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render solution section now.
        fondness_render_solution_section( $section_details );
    }
endif;

if ( ! function_exists( 'fondness_get_solution_section_details' ) ) :
    /**
    * solution section details.
    *
    * @since Fondness 1.0.0
    * @param array $input solution section details.
    */
    function fondness_get_solution_section_details( $input ) {
        $options = fondness_get_theme_options();

        $content = array();
       $post_id = ! empty( $options['solution_content_post'] ) ? $options['solution_content_post'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'p'                 => $post_id,
                    'posts_per_page'    => 1,
                    );

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = fondness_trim_content( 30 );
                    $page_post['url']       = get_the_permalink();
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// solution section content details.
add_filter( 'fondness_filter_solution_section_details', 'fondness_get_solution_section_details' );


if ( ! function_exists( 'fondness_render_solution_section' ) ) :
  /**
   * Start solution section
   *
   * @return string solution content
   * @since Fondness 1.0.0
   *
   */
   function fondness_render_solution_section( $content_details = array() ) {
        $options = fondness_get_theme_options();
        $solution_btn_title = ! empty( $options['solution_btn_title'] ) ? $options['solution_btn_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        
         <div id="fondness_solution_section">

        <div id="our-solution" class="relative page-section same-background">
                <div class="wrapper">
                <?php if ( is_customize_preview()):
                    fondness_section_tooltip( 'our-solution' );
                    endif; ?>

                    <?php foreach ( $content_details as $content ) : ?>

                    <article class="has-post-thumbnail clear">
                        <div class="featured-image">
                            <a href="<?php echo esc_url( $content['url'] ) ; ?>"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="hero-banner"></a>
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <div class="section-header">
                            <?php if( !empty( $options['solution_sub_title'] ) ): ?>
                                <p class="section-subtitle"><?php echo esc_html( $options['solution_sub_title'] ); ?></p>
                            <?php endif; ?>
                                <h2 class="section-title"><?php echo esc_html( $content['title'] ) ; ?></h2>
                            </div><!-- .section-header -->

                            <div class="section-content">
                            <?php if( !empty( $options['solution_short_description'] ) ): ?>
                                <span><?php echo esc_html( $options['solution_short_description'] ); ?></span>
                            <?php endif; ?>
                                <p><?php echo esc_html( $content['excerpt'] ) ; ?></p>
                            </div>

                             <?php if ( ! empty( $solution_btn_title ) && !empty( $content['url'] ) ): ?>

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $solution_btn_title ); ?></a>
                            </div><!-- .read-more -->

                        <?php endif; ?>
                        
                        </div><!-- .entry-container -->
                    </article>

                    <?php endforeach; ?>

                </div><!-- .wrapper -->
            </div><!-- #about-us -->

            </div>

    <?php 
}
endif;


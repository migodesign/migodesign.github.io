<?php
/**
 * Latest Posts section
 *
 * This is the template for the content of latest_posts section
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */
if ( ! function_exists( 'fondness_add_latest_posts_section' ) ) :
    /**
    * Add latest_posts section
    *
    *@since Fondness 1.0.0
    */
    function fondness_add_latest_posts_section() {
        $options = fondness_get_theme_options();
        // Check if latest_posts is enabled on frontpage
        $latest_posts_enable = apply_filters( 'fondness_section_status', true, 'latest_posts_section_enable' );

        if ( true !== $latest_posts_enable ) {
            return false;
        }
        // Get latest_posts section details
        $section_details = array();
        $section_details = apply_filters( 'fondness_filter_latest_posts_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render latest_posts section now.
        fondness_render_latest_posts_section( $section_details );
    }
endif;

if ( ! function_exists( 'fondness_get_latest_posts_section_details' ) ) :
    /**
    * latest_posts section details.
    *
    * @since Fondness 1.0.0
    * @param array $input latest_posts section details.
    */
    function fondness_get_latest_posts_section_details( $input ) {
        $options = fondness_get_theme_options();

        // Content type.
        $latest_posts_content_type  = $options['latest_posts_content_type'];
        $latest_posts_count = !empty( $options['latest_posts_count'] ) ? $options['latest_posts_count'] : 3;
        $content = array();
        switch ( $latest_posts_content_type ) {

            case 'post':
                $post_ids = array();
                $author = array();

                for ( $i = 1; $i <= $latest_posts_count; $i++ ) {
                    if ( ! empty( $options['latest_posts_content_post_' . $i] ) ) :
                        $post_ids[] = $options['latest_posts_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( $latest_posts_count ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['latest_posts_content_category'] ) ? $options['latest_posts_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( $latest_posts_count ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
            
            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// latest_posts section content details.
add_filter( 'fondness_filter_latest_posts_section_details', 'fondness_get_latest_posts_section_details' );


if ( ! function_exists( 'fondness_render_latest_posts_section' ) ) :
  /**
   * Start latest_posts section
   *
   * @return string latest_posts content
   * @since Fondness 1.0.0
   *
   */
   function fondness_render_latest_posts_section( $content_details = array() ) {
        $options = fondness_get_theme_options();

        $section_sub_title = !empty( $options['latest_posts_sub_title'] ) ? $options['latest_posts_sub_title'] : '';
        $section_title = !empty( $options['latest_posts_title'] ) ? $options['latest_posts_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="fondness_latest_posts_section" class="relative page-section same-background">
        
        <div id="latest-posts">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                fondness_section_tooltip( 'latest-posts' );
                endif; ?>
                <div class="section-header">

                    <?php if( !empty( $section_sub_title ) ): ?>
                        <p class="section-subtitle"><?php echo esc_html( $section_sub_title ); ?></p>
                    <?php endif;

                    if( !empty( $section_title ) ):
                        ?>
                    <h2 class="section-title"><?php echo esc_html( $section_title ); ?></h2>

                <?php endif; ?>

            </div><!-- .section-header -->

            <div class="blog-posts-wrapper col-3 clear">

                <?php foreach ( $content_details as $content ) : ?>

                    <article>
                        <div class="featured-image" style="background-image:url('<?php echo esc_url( $content['image'] ); ?>')">
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <div class="entry-meta">
                                <span class="cat-links">
                                    <?php the_category(',', '', $content['id']); ?>
                                </span><!-- .cat-links -->
                                <?php fondness_posted_on( $content['id'] ); ?>

                            </div><!-- .entry-meta -->

                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                            </header>
                        </div><!-- .entry-container -->
                    </article>

                <?php endforeach; ?>

            </div>
        </div><!-- .wrapper -->
    </div><!-- #latest-posts -->

    </div>

    <?php }
endif;
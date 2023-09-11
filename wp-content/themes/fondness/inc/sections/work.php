<?php
/**
 * Work section
 *
 * This is the template for the content of work section
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */
if ( ! function_exists( 'fondness_add_work_section' ) ) :
    /**
    * Add work section
    *
    *@since Fondness 1.0.0
    */
    function fondness_add_work_section() {
    	$options = fondness_get_theme_options();
        // Check if work is enabled on frontpage
        $work_enable = apply_filters( 'fondness_section_status', true, 'work_section_enable' );

        if ( true !== $work_enable ) {
            return false;
        }
        // Get work section details
        $section_details = array();
        $section_details = apply_filters( 'fondness_filter_work_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render work section now.
        fondness_render_work_section( $section_details );
    }
endif;

if ( ! function_exists( 'fondness_get_work_section_details' ) ) :
    /**
    * work section details.
    *
    * @since Fondness 1.0.0
    * @param array $input work section details.
    */
    function fondness_get_work_section_details( $input ) {
        $options = fondness_get_theme_options();

        // Content type.
        $work_content_type  = $options['work_content_type'];
        $content = array();
        switch ( $work_content_type ) {

            case 'post':
                $post_ids = array();

                for ( $i = 1; $i <= 13; $i++ ) {
                    if ( ! empty( $options['work_content_post_' . $i] ) )
                        $post_ids[] = $options['work_content_post_' . $i];
                }
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 13 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['work_content_category'] ) ? $options['work_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( 13 ),
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
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// work section content details.
add_filter( 'fondness_filter_work_section_details', 'fondness_get_work_section_details' );


if ( ! function_exists( 'fondness_render_work_section' ) ) :
  /**
   * Start work section
   *
   * @return string work content
   * @since Fondness 1.0.0
   *
   */
   function fondness_render_work_section( $content_details = array() ) {
        $options = fondness_get_theme_options();

        $sub_title = ! empty( $options['work_sub_title'] ) ? $options['work_sub_title'] : '';
        $title = ! empty( $options['work_title'] ) ? $options['work_title'] : '';
        $short_description = ! empty( $options['work_short_description'] ) ? $options['work_short_description'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>

<div id="fondness_work_section" class="relative page-section same-background">

        <div id="work-section">
            <div class="section-header-wrapper wrapper clear">
            <?php if ( is_customize_preview()):
                fondness_section_tooltip( 'work-section' );
                endif; ?>
                <div class="section-header">
                    <?php if( !empty( $sub_title ) ): ?>

                        <p class="section-subtitle"><?php echo esc_html( $sub_title ); ?></p>

                    <?php endif;

                    if( !empty( $title ) ): ?>

                    <h2 class="section-title"><?php echo esc_html( $title ); ?></h2>

                <?php endif; ?>

            </div><!-- .section-header -->

            <?php if( !empty( $short_description ) ): ?>

                <div class="section-content">
                    <p><?php echo esc_html( $short_description ); ?></p>
                </div>

            <?php endif; ?>
        </div><!-- .section-header-wrapper -->

        <div class="grid">

            <?php foreach ($content_details as $content ) : ?>

                <article class="grid-item">
                    <div class="hover-item">
                        <a href="<?php echo esc_url( $content['url'] ); ?>">
                            <img src="<?php echo esc_url( $content['image'] ); ?>">
                        </a>
                    </div>
                </article>

            <?php endforeach; ?>

        </div>
    </div><!-- #work-section -->

    </div>

    <?php }
endif;
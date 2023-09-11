<?php
/**
 * CTA section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */
if ( ! function_exists( 'fondness_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Fondness 1.0.0
    */
    function fondness_add_cta_section() {
        $options = fondness_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'fondness_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'fondness_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        fondness_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'fondness_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Fondness 1.0.0
    * @param array $input cta section details.
    */
    function fondness_get_cta_section_details( $input ) {
        $options = fondness_get_theme_options();
        
        $content = array();
        $post_id = ! empty( $options['cta_content_post'] ) ? $options['cta_content_post'] : '';
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
                    $page_post['excerpt']   = fondness_trim_content( 15 );
                    $page_post['url']       = get_the_permalink();

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
// cta section content details.
add_filter( 'fondness_filter_cta_section_details', 'fondness_get_cta_section_details' );


if ( ! function_exists( 'fondness_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Fondness 1.0.0
   *
   */
   function fondness_render_cta_section( $content_details = array() ) {
        $options = fondness_get_theme_options();
        $cta_btn_title = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : '';
        $cta_image = ! empty( $options['cta_bg_image'] ) ? $options['cta_bg_image'] : '';

        if ( empty( $content_details ) ) {
            return;
        } 
        ?>
        <?php foreach ( $content_details as $content ) : ?>

        <div id="fondness_cta_section">

            <div id="cta" class="page-section" style="background-image: url('<?php echo esc_url( $cta_image ); ?>');">
                <div class="wrapper">
                 <?php if ( is_customize_preview()):
                 fondness_section_tooltip( 'cta' );
                 endif; ?>
                 <div class="cta-wrapper">
                    <div class="section-header">
                        <?php if( !empty( $options['cta_sub_title'] ) ): ?>
                            <p class="section-subtitle"><?php echo esc_html( $options['cta_sub_title'] ); ?></p>
                        <?php endif; ?>

                        <h2 class="section-title"><?php echo esc_html( $content['title'] ) ; ?></h2>
                    </div><!-- .section-header -->

                    <div class="section-content">
                        <p><?php echo esc_html( $content['excerpt'] ) ; ?></p>
                    </div><!-- .section-content -->

                    <?php if ( ! empty( $cta_btn_title ) && !empty( $content['url'] ) ): ?>

                        <div class="read-more">
                           <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( $cta_btn_title ); ?></a>
                       </div><!-- .read-more -->

                   <?php endif; ?>

               </div><!-- .cta-wrapper -->
           </div><!-- .wrapper -->
       </div><!-- #cta -->

   </div>


 <?php

 endforeach;
}
endif;
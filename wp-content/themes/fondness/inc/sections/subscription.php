<?php
/**
 * Subscription section
 *
 * This is the template for the content of subscription section
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 */
if ( ! function_exists( 'fondness_add_subscription_section' ) ) :
    /**
    * Add subscription section
    *
    *@since Fondness 1.0.0
    */
    function fondness_add_subscription_section() {
        $options = fondness_get_theme_options();

        // Check if subscription is enabled on frontpage
        $subscription_enable = apply_filters( 'fondness_section_status', true, 'subscription_section_enable' );

        if ( true !== $subscription_enable ) {
           return false;
        }

        // Render subscription section now.
        fondness_render_subscription_section();
    }
endif;

if ( ! function_exists( 'fondness_render_subscription_section' ) ) :
  /**
   * Start subscription section
   *
   * @return string subscription content
   * @since Fondness 1.0.0
   *
   */
   function fondness_render_subscription_section() {
        if ( ! class_exists( 'Jetpack' ) ) {
           return;
        } elseif ( class_exists( 'Jetpack' ) ) {
            if ( ! Jetpack::is_module_active( 'subscriptions' ) )
               return;
        }
        $options = fondness_get_theme_options();

        $subscription_title             = ! empty( $options['subscription_title'] ) ? $options['subscription_title'] : '';
        $subscription_description       = ! empty( $options['subscription_description'] ) ? $options['subscription_description'] : '';
        $subscription_btn_title         = ! empty( $options['subscription_btn_title'] ) ? $options['subscription_btn_title'] : esc_html__( 'Subscribe Now', 'fondness' );
   
        ?>

        <div id="fondness_subscription_section">

        <div id="subscribe-now" class="relative page-section">
            <div class="wrapper">
                <?php if ( is_customize_preview()):
                fondness_section_tooltip( 'subscribe-now' );
                endif; ?>
                <div class="section-header-wrapper">
                    <?php if( !empty( $subscription_title ) ): ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html($subscription_title); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif;

                    if( !empty( $subscription_description ) ):

                        ?>

                    <div class="section-content">
                        <p><?php echo esc_html($subscription_description); ?></p>
                    </div><!-- .section-content -->

                <?php endif; ?>

            </div>

            <div class="subscribe-form-wrapper">
                <?php 
                $subscription_shortcode = '[jetpack_subscription_form title="" subscribe_text="" subscribe_button="' . esc_html( $subscription_btn_title ) . '" show_subscribers_total="0"]';
                echo do_shortcode( wp_kses_post( $subscription_shortcode ) ); 
                ?>
            </div><!-- .subscribe-form-wrapper -->
        </div><!-- .wrapper -->
    </div><!-- #subscribe-now -->

    </div>

    <?php }
endif;
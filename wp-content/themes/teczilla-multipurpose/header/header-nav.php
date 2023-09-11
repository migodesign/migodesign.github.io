<div class="full-width-header">
           
  
            <!--Header Start-->
            <header id="tec-header" class="tec-header">
                <!-- Menu Start -->
    <?php $teczilla_sticky_thumb = get_theme_mod('teczilla_sticky_thumb',0);
     if($teczilla_sticky_thumb==0){
    ?>
            <div class="teczilla-menu-area menu-sticky <?php if(is_user_logged_in()) { ?> tec-agncy-stick <?php } ?>">
                <?php } else { ?>
                <div class="menu-area">
                    <?php } ?> 
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-2">
                                <div class="logo-area">
                                     <?php
                                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                                        the_custom_logo();
                                        } 
                                        if (display_header_text()==true){ 
                                        ?>
                                         <h1 class="teczilla-title">
                                             <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                             <?php esc_html(bloginfo( 'title' )); ?>
                                             </a>
                                         </h1>
                                        <p class="teczilla-desc">
                                        <?php esc_html(bloginfo( 'description')); ?>
                                        </p>
                                        <?php } ?>
                                </div>
                            </div>
                            <div class="col-lg-8 text-center">
                                <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Top Menu">
                                    <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
                                     <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'primary',
                                            'menu_id'        => 'primary-menu',
                                        ) );
                                     ?>
                                </nav>
                            </div>
                            <div class="col-lg-2 cocial">
                                <div class="toolbar-sl-share">
                                    <ul class="text-right">
                                        <?php
                                        $teczilla_services_no        = 4;
                                        $teczilla_services_icons     = array();
                                        for( $i = 1; $i <= $teczilla_services_no; $i++ ) {
                                            $teczilla_services_icons = get_theme_mod('teczilla_service_page_icon'.$i);
                                        $teczilla_service_page_url = get_theme_mod('teczilla_service_page_url'.$i);

                                        if(!empty($teczilla_services_icons)) {
                                        ?>
                                        <li><a href="<?php echo esc_url($teczilla_service_page_url); ?>"><i class="fa <?php echo esc_attr($teczilla_services_icons); ?>"></i></a></li>
                                       <?php

                                       } }?> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu End -->
            </header>
            <!--Header End-->
        </div>
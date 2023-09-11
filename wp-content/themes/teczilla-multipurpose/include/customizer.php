<?php
function teczilla_multipurpose_sections_settings( $wp_customize ) {
    $wp_customize->remove_setting( 'teczilla_menubar_bg_color' );
     $wp_customize->remove_setting( 'teczilla_menu_item_color' );
      $wp_customize->remove_setting( 'teczilla_menu_item_hover_color' );
       $wp_customize->remove_setting( 'teczilla_menu_link_bg_color' );
       $wp_customize->remove_setting( 'teczilla_submnubg_scheme' );
        $wp_customize->remove_setting( 'teczilla_submnu_link' );
        $wp_customize->remove_section( 'teczilla_top_header' );


        $wp_customize->add_setting('teczilla_theme_color_scheme',array(
        'default' => esc_html__('#ff726d','teczilla-multipurpose'),
        'sanitize_callback' => 'sanitize_hex_color'
    ));
    
    $wp_customize->add_control(
        new WP_Customize_Color_Control($wp_customize,'teczilla_theme_color_scheme',array(
            'label' => esc_html__('Theme Color','teczilla-multipurpose'),           
            'description' => esc_html__('Change Theme Color','teczilla-multipurpose'),
            'section' => 'colors',
            'settings' => 'teczilla_theme_color_scheme'
        ))
    ); 

    $wp_customize->add_section('teczilla_main_top_header',array(
            'title' => esc_html__('Top Header','teczilla-multipurpose'),
            'panel' => 'section_settings',
            'priority'       => 7,
            ));

    $wp_customize->add_setting('teczilla_top_header_enable',
        array(
            'sanitize_callback' => 'teczilla_sanitize_checkbox',
            'default'           => 0,
        )
    );
    $wp_customize->add_control('teczilla_top_header_enable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Enable Top Header Section?', 'teczilla-multipurpose'),
            'section'     => 'teczilla_main_top_header',
            'description' => esc_html__('Check this box to Enable Top Header section.', 'teczilla-multipurpose'),
        )
    );

    for( $i = 1; $i <=4; $i++ ){


        $wp_customize->add_setting(
            'teczilla_service_page_icon'.$i,
            array(
                'default'           => '',
                'sanitize_callback' => 'teczilla_sanitize_text'
            )
        );

        $wp_customize->add_control(
            new Avadanta_Fontawesome_Icon_Chooser(
                $wp_customize,
                'teczilla_service_page_icon'.$i,
                array(
                    'settings'      => 'teczilla_service_page_icon'.$i,
                    'section'       => 'teczilla_main_top_header',
                    'type'          => 'icon',
                    'label'         => esc_html__( 'Social Media Icon', 'teczilla-multipurpose' )
                )
            )
        );

          $wp_customize->add_setting(
            'teczilla_service_page_url'.$i,
            array(
                'default'           => '',
                'sanitize_callback' => 'teczilla_sanitize_text'
            )
        );

        $wp_customize->add_control(
                'teczilla_service_page_url'.$i,
                array(
                    'settings'      => 'teczilla_service_page_url'.$i,
                    'section'       => 'teczilla_main_top_header',
                    'type'          => 'url',
                    'label'         => esc_html__( 'Social Media Icon url', 'teczilla-multipurpose' )
                
            )
        );
    }

    $wp_customize->add_section("teczilla_404_section", array(
        "priority" => null,
        "title" => esc_html__("404 Page Setting", "teczilla-multipurpose"),
        "description" => "",
        "panel" => "section_settings",
    ));

    $wp_customize->add_setting("404_background_image", array(
        "default" => get_stylesheet_directory_uri() . "/resource/images/404.jpg",

        "sanitize_callback" => "esc_url_raw",
    ));

    $wp_customize->add_control(
        new WP_Customize_Image_Control($wp_customize, "404_background_image", array(
            "label" => __("404 Background Image", "teczilla-multipurpose"),
            "section" => "teczilla_404_section",
            "settings" => "404_background_image",
        ))
    );
}
add_action( 'customize_register', 'teczilla_multipurpose_sections_settings', 30);
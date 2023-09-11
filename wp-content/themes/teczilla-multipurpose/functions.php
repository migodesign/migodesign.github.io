<?php 

// teczilla multipurpose css js enqueue

load_theme_textdomain('teczilla-multipurpose', get_stylesheet_directory_uri() .'/lang');


function teczilla_multipurpose_theme_sidebars() {

    // Blog Sidebar

    register_sidebar(array(
        'name' => esc_html__( 'Blog Sidebar', "teczilla-multipurpose"),
        'id' => 'top-sidebar',
        'description' => esc_html__( 'Sidebar on the blog layout.', "teczilla-multipurpose"),
        'before_widget' => '<div id="%1$s" class="sidebar-search sidebar-widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<div class="sidebar-title"><h3 class="title semi-bold mb-20">',
        'after_title' => '</h3></div>',
    ));
        
}
add_action( 'widgets_init', 'teczilla_multipurpose_theme_sidebars' );



function teczilla_multipurpose_scripts_enqueue() {

    $avadanta_typography_show = get_theme_mod('teczilla_show_typography', 0);
    If($avadanta_typography_show == 0) {
      wp_enqueue_style('teczilla-font', 'https://fonts.googleapis.com/css2?family=Space+Grotesk&display=swap'); 
    }
    $teczilla_multipurpose_depend = array( 'bootstrap-min', 'aoff-canvas','owl-carousel','responsive','teczilla-main');
	wp_enqueue_style( 'teczilla-multipurpose-parent-style', get_template_directory_uri() . '/style.css',array('animate'));	
	wp_enqueue_style('teczilla-multipurpose-tecz',get_stylesheet_directory_uri() .'/resource/tecz.css',$teczilla_multipurpose_depend);
	
}
add_action('wp_enqueue_scripts', 'teczilla_multipurpose_scripts_enqueue');

function teczilla_multipurpose_inline_css(){
	
$teczilla_theme_color_scheme = get_theme_mod('teczilla_theme_color_scheme','#252628');
$teczilla_custom_css      = '';           
$teczilla_color_scheme = get_theme_mod( 'teczilla_color_scheme', '#1b1b1b' );

$teczilla_custom_css      .= '.tec-footer{background-color: ' . esc_attr( $teczilla_color_scheme) . ';}';

$teczilla_footer_widgets_title_color = get_theme_mod( 'teczilla_footer_widgets_title_color','#fff' );

$teczilla_custom_css      .= '.tec-footer .footer-content .widget-title,.footer-widget.widget_block h2{color: ' . esc_attr( $teczilla_footer_widgets_title_color) . ';}';

$teczilla_footer_widgets_text_color = get_theme_mod( 'teczilla_footer_widgets_text_color','#fff' );

$teczilla_custom_css      .= '.tec-footer a,.tec-footer.widget_categories li,.tec-footer.widget_meta li a,.tec-footer.widget_calendar td,.tec-footer.widget_nav_menu div li a, .tec-footer.widget_pages li a,.tec-footer .recentcomments,.tec-footer .recentcomments a,.tec-footer .textwidget p,.readon.banner-style:hover,.footer-widget.widget_block p{color: ' . esc_attr( $teczilla_footer_widgets_text_color) . ';}';



$teczilla_breadcrumb_title_color = get_theme_mod('teczilla_breadcrumb_title_color','#fff');

$teczilla_custom_css      .= '.tec-breadcrumbs .inner-title h2{color: ' . esc_attr( $teczilla_breadcrumb_title_color) . ';}';

$teczilla_header_bg_color = get_theme_mod('teczilla_header_bg_color','#000');

$teczilla_custom_css      .= '.tec-breadcrumbs:before{background: ' . esc_attr( $teczilla_header_bg_color) . ';}';


$teczilla_theme_color_scheme = get_theme_mod('teczilla_theme_color_scheme','#ff726d');               

$teczilla_custom_css      .= '.full-width-header .toolbar-area,.home-slider .container .slider-caption:after,.sec-title .sub-title.primary:after,.readon,.tec-services.style2 .service-wrap .image-part i,.bg21,.tec-portfolio.style3 .portfolio-item .content-part .middle .categories a,.tec-carousel.dot-style1 .owl-dots .owl-dot,.tec-team.inner .team-item .text-bottom .team-social ul li,#scrollUp i,#scrollUp i:hover,.tec-footer .footer-content .widget-title:before,.comment-respond .form-submit input,
       .widget_tag_cloud .tagcloud a:hover,.main-header-area .main-menu-area nav ul li ul > li:hover, .main-header-area .main-menu-area nav ul li ul > li .active,.sidebar-grid .sidebar-title .title:after,.sidebar-grid ul::before,
       .main-slider-three .owl-carousel .owl-nav .owl-next:hover,.comment-respond .form-submit input:hover,.widget_tag_cloud .tagcloud a:hover,.srvc .bg-darker,.project-area.project-call,.header-search .input-search:focus,.sub-modals,.dialog-content #save-dialog,.error-content .btn,.readon:hover,.home-slider .container .slider-caption .slider-bottom .slider-btn,.main-navigation ul li:hover > ul, .main-navigation ul li.focus > ul,.widget_tag_cloud .wp-block-tag-cloud a
       {background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';}';

$teczilla_custom_css      .= '.nav-links .page-numbers,.social li
       {
        background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';
        border: 1px solid '. esc_attr( $teczilla_theme_color_scheme) . '}';

$teczilla_custom_css      .= 'blockquote
       {
        border-left: 5px solid '. esc_attr( $teczilla_theme_color_scheme) . '}';

$teczilla_custom_css      .= '.comment-respond .form-submit input{border-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';}';

$teczilla_custom_css      .= '
       .sec-title .sub-title.primary,.tec-testimonial.style1 .testi-item .content-part .icon-part i,
       .tec-blog.style1 .blog-wrap .content-part .blog-meta .user-data i,.tec-blog.style1 .blog-wrap .content-part .blog-meta .date i,.tec-blog.inner .blog-wrap .content-part .blog-meta li i,.sidebar-widget.widget_archive li:before, .sidebar-widget.widget_categories li:before, .sidebar-widget.widget_meta li:before,.trail-begin a,.breadcrumb-item a{
                     color: ' . esc_attr( $teczilla_theme_color_scheme) . '!important; ;
                }';


$teczilla_custom_css      .= '.btn-read-more-fill{border-bottom: 1px solid ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';


$teczilla_custom_css      .= ' .nav-links .page-numbers:hover{background-color:  #fff;
                     border-bottom: 1px solid ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;
                     color:' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';


$teczilla_custom_css      .= '.contact-banner-area .color-theme, .projects-2-featured-area .featuredContainer .featured-box:hover .overlay,.sidebar-title:before{background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ';opacity:0.8;}';

$teczilla_custom_css      .= '.bg-primary,.slick-dots li.slick-active,.post-full .post-date,.preloader.preloader-dalas:before,
.preloader.preloader-dalas:after,.back-to-top{background-color: ' . esc_attr( $teczilla_theme_color_scheme) . ' !important;}';

$teczilla_custom_css .='.blog-wrap a{color: #000 !important;}';


$teczilla_brdcrmb_opacity_section = get_theme_mod('teczilla_brdcrmb_opacity_section','0.75');

$teczilla_custom_css      .= '.tec-breadcrumbs:before{opacity: ' . esc_attr( $teczilla_brdcrmb_opacity_section) . ';}';


$teczilla_footer_opacity = get_theme_mod('teczilla_footer_opacity_section','0.0');

$teczilla_custom_css      .= '.tc-light.footer-s1::after{opacity: ' . esc_attr( $teczilla_footer_opacity) . ';}';


$braedcrumb_height = get_theme_mod('braedcrumb_height','300');

$teczilla_custom_css      .= '.tec-breadcrumbs{height: ' . esc_attr( $braedcrumb_height) . 'px;}';


wp_add_inline_style( 'teczilla-style', $teczilla_custom_css );

}

add_action( 'wp_enqueue_scripts', 'teczilla_multipurpose_inline_css',20 );

require( get_stylesheet_directory() . '/include/customizer.php');


  function avadant_multipurpose_custom_header_setup()
    {
        add_theme_support('custom-header', apply_filters('avadanta_custom_header_args', array(
            'default-image'          => get_stylesheet_directory_uri() . '/resource/images/header-bg.jpg',
            'default-text-color' => 'fff',
            'width'              => 1000,
            'height'             => 250,
            'flex-height'        => true,
            'wp-head-callback'   => 'avadanta_multipurpose_header_style',
        )));
    }

    add_action( 'after_setup_theme', 'avadant_multipurpose_custom_header_setup' );


if ( !function_exists('avadanta_multipurpose_header_style') ) :
    /**
     * Add Header And background Images
     */
    function avadanta_multipurpose_header_style()
    {
        $header_text_color = get_header_textcolor();

        ?>
        <style type="text/css">
            <?php
                // When Text Is Hidden
                if (  display_header_text() ) :
            ?>
            .header-bg-image
           {
            background-image:url('<?php header_image(); ?>') !important;
           }
           
            .teczilla-title a,
            .teczilla-desc
            {
                color: #000 !important;
            }

            <?php endif; ?>
        </style>
        <?php
    }
endif;
<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Fondness
 * @since Fondness 1.0.0
 * @return array An array of default values
 */

function fondness_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$fondness_default_options = array(
		// Color Options
		'header_title_color'			=> '#000',
		'header_tagline_color'			=> '#666',
		'header_txt_logo_extra'			=> 'show-all',
		
		// typography Options
		'theme_typography' 				=> 'default',
		'body_theme_typography' 		=> 'default',

		//body typography
		'body_font_family'			=> 'Muli',
		'body_font_weight'			=> 300,
		'body_font_size'			=> 16,
		'body_font_style'			=> 'normal',
		'body_text_transform'		=> 'none',

		//h1 typography
		'heading_h1_font_family'		=> 'Raleway',
		'heading_h1_font_weight'		=> 300,
		'heading_h1_text_transform'		=> 'none',
		'heading_h1_font_style'			=> 'normal',

		//h2 typography
		'heading_h2_font_family'		=> 'Raleway',
		'heading_h2_font_weight'		=> 700,
		'heading_h2_text_transform'		=> 'none',
		'heading_h2_font_style'			=> 'normal',

		//h3 typography
		'heading_h3_font_family'		=> 'Raleway',
		'heading_h3_font_weight'		=> 700,
		'heading_h3_text_transform'		=> 'none',
		'heading_h3_font_style'			=> 'normal',

		//h4 typography
		'heading_h4_font_family'		=> 'Raleway',
		'heading_h4_font_weight'		=> 700,
		'heading_h4_text_transform'		=> 'none',
		'heading_h4_font_style'			=> 'normal',

		//h5 typography
		'heading_h5_font_family'		=> 'Raleway',
		'heading_h5_font_weight'		=> 700,
		'heading_h5_text_transform'		=> 'none',
		'heading_h5_font_style'			=> 'normal',

		//h6 typography
		'heading_h6_font_family'		=> 'Raleway',
		'heading_h6_font_weight'		=> 700,
		'heading_h6_text_transform'		=> 'none',
		'heading_h6_font_style'			=> 'normal',

		//p typography
		'heading_p_font_family'			=> 'Muli',
		'heading_p_font_weight'			=> 400,
		'heading_p_text_transform'		=> 'none',
		'heading_p_font_style'			=> 'normal',

		//button
		'button_background_color'		=> '#e5f8fc',
		'button_text_color'		=> '#00afe9',

		// breadcrumb
		'breadcrumb_enable'				=> true,
		'breadcrumb_separator'			=> '/',
		
		// layout 
		'site_layout'         			=> 'wide-layout',
		'sidebar_position'         		=> 'right-sidebar',
		'post_sidebar_position' 		=> 'right-sidebar',
		'page_sidebar_position' 		=> 'right-sidebar',

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'fondness' ), '[the-year]', '[site-link]' ),

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// homepage sections sortable
		'sortable' 						=> 'slider,solution,cta,work,latest_posts,subscription',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'fondness' ),
		'single_post_hide_banner'		=> false,
		'hide_banner'					=> false,
		'blog_page_post_btn' 			=> esc_html__( 'Read More', 'fondness' ),

		/* Front Page */

		// Slider
		'slider_section_enable'		=> false,
		'slider_btn_label'			=> esc_html__( 'Explore More', 'fondness' ),

		// solution
		'solution_section_enable'		=> false,
		'solution_sub_title'			=> esc_html__( 'OUR SOLUTION', 'fondness' ),
		'solution_short_description'	=> esc_html__( 'Welcome back! Let’s go ahead and talk about some of the highest paying freelance skills in 2021.', 'fondness' ),
		'solution_btn_title'				=> esc_html__( 'GET STARTED NOW', 'fondness' ),

		// cta
		'cta_section_enable'		=> false,
		'cta_sub_title'				=> esc_html__( 'DISCOVER MORE', 'fondness' ),
		'cta_btn_title'				=> esc_html__( 'CALL TO ACTION', 'fondness' ),

		// Work
		'work_section_enable'		=> false,
		'work_sub_title'			=> esc_html__( 'WORK WITH US', 'fondness' ),
		'work_title'				=> esc_html__( 'Craft Digital Products For Business & User Goals', 'fondness' ),
		'work_short_description'	=> esc_html__( 'Let me put it this way, for almost every app / software or game, there are graphic designers behind it to make it visually look better. Some graphic designers can make thousands per project, although this is a pretty competitive field, it’s still a very lucrative field.Based off the national average, a web designer could actually be one of the highest freelancing skills out there. Now, there is alot that encompasses this skill, you should be able to essentially develop websites.', 'fondness' ),
		'work_content_type'			=> 'category',

		//latest_posts
		'latest_posts_section_enable'	=> false,
		'latest_posts_content_type'		=> 'post',
		'latest_posts_sub_title'		=> esc_html__( 'ARTICLE', 'fondness' ),
		'latest_posts_title'			=> esc_html__( 'A Blog Post About Design, Travel & Coffee', 'fondness' ),

		// subscription
		'subscription_section_enable'	=> false,
		'subscription_title'			=> esc_html__( 'Ask Questions and Get Help From The Community', 'fondness' ),
		'subscription_description'		=> esc_html__( 'Sign up with your email address to receive news and updates.', 'fondness' ),
		'subscription_btn_title'		=> esc_html__( 'Subscribe Now', 'fondness' ),

	);

	$output = apply_filters( 'fondness_default_theme_options', $fondness_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}
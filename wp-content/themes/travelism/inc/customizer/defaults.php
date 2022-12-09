<?php
/**
 * Customizer default options
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 * @return array An array of default values
 */

function travelism_get_default_theme_options() {
	$theme_data = wp_get_theme();
	$travelism_default_options = array(
		// Color Options
		'header_title_color'			=> '#000',
		'header_tagline_color'			=> '#fff',
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
		'menu_btn_label'				=> esc_html__( 'BOOK A TOUR', 'travelism' ),

		// excerpt options
		'long_excerpt_length'           => 25,
		
		// pagination options
		'pagination_enable'         	=> true,
		'pagination_type'         		=> 'default',

		// footer options
		'copyright_text'           		=> sprintf( esc_html_x( 'Copyright &copy; %1$s %2$s', '1: Year, 2: Site Title with home URL', 'travelism' ), '[the-year]', '[site-link]' ),
		'scroll_top_visible'        	=> true,

		// reset options
		'reset_options'      			=> false,
		
		// homepage options
		'enable_frontpage_content' 		=> false,

		// all sortable sortable
		'all_sortable' 						=> 'hero_banner,northface_jacket,gallery,wildlife,happy_clients,articles',

		// blog/archive options
		'your_latest_posts_title' 		=> esc_html__( 'Blogs', 'travelism' ),
		'single_post_hide_banner'		=> false,
		'hide_banner'					=> false,		
		'blog_column'					=> 'col-2',


		// single post theme options
		'single_post_hide_category'		=> false,

		/* Front Page */

		// hero_banner
		'hero_banner_section_enable'		=> false,
		'hero_banner_sub_title'				=> esc_html__( 'ALL YOU NEED IS TRAVELISM', 'travelism' ),
		'hero_banner_btn_title'				=> esc_html__( 'EXPLORE DESTINATIONS', 'travelism' ),

		//northface_jacket jacket
		'northface_jacket_section_enable'		=> false,
		'northface_jacket_title'				=> esc_html__( 'JACKET-AP', 'travelism' ),
		'northface_jacket_sub_title'			=> esc_html__( 'THE NORTH FACE', 'travelism' ),

		// wildlife
		'wildlife_section_enable'		=> false,
		'wildlife_sub_title'			=> esc_html__('WILDLIFE','travelism'),
		'wildlife_btn_label'			=> esc_html__( 'Explore More', 'travelism' ),

		// gallery
		'gallery_section_enable'		=> false,
		'gallery_content_type'			=> 'trip',
		'gallery_title'					=> esc_html__( 'Make your own memories', 'travelism' ),
		'gallery_sub_title'				=> esc_html__('OUR GALLERY','travelism'),
		'gallery_btn_label'				=> esc_html__( 'View All', 'travelism' ),

		// happy_clients
		'happy_clients_section_enable'		=> false,
		'happy_clients_section_title'		=> esc_html__( 'Our Happy Clients', 'travelism' ),
		'happy_clients_section_sub_title'	=> esc_html__( 'THANK YOU!', 'travelism' ),

		// articles
		'articles_section_enable'	=> false,
		'articles_content_type'		=> 'category',
		'articles_title'			=> esc_html__( 'LATEST ARTICLES', 'travelism' ),
		'articles_sub_title'		=> esc_html__( 'Blog', 'travelism' ),

	);

	$output = apply_filters( 'travelism_default_theme_options', $travelism_default_options );

	// Sort array in ascending order, according to the key:
	if ( ! empty( $output ) ) {
		ksort( $output );
	}

	return $output;
}
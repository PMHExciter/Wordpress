<?php    
/**
 *chamiers-lite Theme Customizer
 *
 * @package Chamiers Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function chamiers_lite_customize_register( $wp_customize ) {	
	
	function chamiers_lite_sanitize_dropdown_pages( $page_id, $setting ) {
	  // Ensure $input is an absolute integer.
	  $page_id = absint( $page_id );	
	  // If $page_id is an ID of a published page, return it; otherwise, return the default.
	  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
	}

	function chamiers_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	} 
	
	function chamiers_lite_sanitize_phone_number( $phone ) {
		// sanitize phone
		return preg_replace( '/[^\d+]/', '', $phone );
	} 
	
	
	function chamiers_lite_sanitize_excerptrange( $number, $setting ) {	
		// Ensure input is an absolute integer.
		$number = absint( $number );	
		// Get the input attributes associated with the setting.
		$atts = $setting->manager->get_control( $setting->id )->input_attrs;	
		// Get minimum number in the range.
		$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );	
		// Get maximum number in the range.
		$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );	
		// Get step.
		$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );	
		// If the number is within the valid range, return it; otherwise, return the default
		return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
	}

	function chamiers_lite_sanitize_number_absint( $number, $setting ) {
		// Ensure $number is an absolute integer (whole number, zero or greater).
		$number = absint( $number );		
		// If the input is an absolute integer, return it; otherwise, return the default
		return ( $number ? $number : $setting->default );
	}
	
	// Ensure is an absolute integer
	function chamiers_lite_sanitize_choices( $input, $setting ) {
		global $wp_customize; 
		$control = $wp_customize->get_control( $setting->id ); 
		if ( array_key_exists( $input, $control->choices ) ) {
			return $input;
		} else {
			return $setting->default;
		}
	}
	
		
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.logo h1 a',
		'render_callback' => 'chamiers_lite_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.logo p',
		'render_callback' => 'chamiers_lite_customize_partial_blogdescription',
	) );
		
	 	
	//Panel for section & control
	$wp_customize->add_panel( 'chamiers_lite_theme_options_panel', array(
		'priority' => 4,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Chamiers Lite Theme Settings', 'chamiers-lite' ),		
	) );

	$wp_customize->add_section('chamiers_lite_layout_options',array(
		'title' => __('Site Layout Options','chamiers-lite'),			
		'priority' => 1,
		'panel' => 	'chamiers_lite_theme_options_panel',          
	));		
	
	$wp_customize->add_setting('chamiers_lite_layoutoption',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_layoutoption', array(
    	'section'   => 'chamiers_lite_layout_options',    	 
		'label' => __('Check to Show Box Layout','chamiers-lite'),
		'description' => __('check for box layout','chamiers-lite'),
    	'type'      => 'checkbox'
     )); //Box Layout Options 
	
	$wp_customize->add_setting('chamiers_lite_colorscheme',array(
		'default' => '#bc9873',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'chamiers_lite_colorscheme',array(
			'label' => __('Color Scheme','chamiers-lite'),			
			'section' => 'colors',
			'settings' => 'chamiers_lite_colorscheme'
		))
	);
	
	$wp_customize->add_setting('chamiers_lite_menufontcolor',array(
		'default' => '#333333',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'chamiers_lite_menufontcolor',array(
			'label' => __('Navigation font Color','chamiers-lite'),			
			'section' => 'colors',
			'settings' => 'chamiers_lite_menufontcolor'
		))
	);
	
	
	$wp_customize->add_setting('chamiers_lite_menufontactivecolor',array(
		'default' => '#bc9873',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'chamiers_lite_menufontactivecolor',array(
			'label' => __('Navigation Hover/Active Color','chamiers-lite'),			
			'section' => 'colors',
			'settings' => 'chamiers_lite_menufontactivecolor'
		))
	);
	
	 //Header Reserve Button Part
	$wp_customize->add_section('chamiers_lite_topbookbtn_section',array(
		'title' => __('Header Button Area','chamiers-lite'),				
		'priority' => null,
		'panel' => 	'chamiers_lite_theme_options_panel',
	));	
	
	 $wp_customize->add_setting('chamiers_lite_tablebookbtn',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('chamiers_lite_tablebookbtn',array(	
		'type' => 'text',
		'label' => __('Enter button name here','chamiers-lite'),
		'setting' => 'chamiers_lite_tablebookbtn',
		'section' => 'chamiers_lite_topbookbtn_section'
	));	
	
	$wp_customize->add_setting('chamiers_lite_tablebookbtnlink',array(
		'default' => null,
		'sanitize_callback' => 'esc_url_raw'
	));
	
	$wp_customize->add_control('chamiers_lite_tablebookbtnlink',array(
		'label' => __('Add button link here','chamiers-lite'),		
		'setting' => 'chamiers_lite_tablebookbtnlink',
		'section' => 'chamiers_lite_topbookbtn_section'
	));
	
	$wp_customize->add_setting('chamiers_lite_show_topbookbtn_section',array(
		'default' => false,
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'chamiers_lite_show_topbookbtn_section', array(
	   'settings' => 'chamiers_lite_show_topbookbtn_section',
	   'section'   => 'chamiers_lite_topbookbtn_section',
	   'label'     => __('Check To show Top Book Button Section','chamiers-lite'),
	   'type'      => 'checkbox'
	 ));//Show top Book Button Section
	 
		 	
	//Homepage Slide Section		
	$wp_customize->add_section( 'chamiers_lite_frontpage_slidersection', array(
		'title' => __('FrontPage Slider Sections', 'chamiers-lite'),
		'priority' => null,
		'description' => __('Default image size for slider is 1400 x 850 pixel.','chamiers-lite'), 
		'panel' => 	'chamiers_lite_theme_options_panel',           			
    ));
	
	$wp_customize->add_setting('chamiers_lite_frontslider1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('chamiers_lite_frontslider1',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 1:','chamiers-lite'),
		'section' => 'chamiers_lite_frontpage_slidersection'
	));	
	
	$wp_customize->add_setting('chamiers_lite_frontslider2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('chamiers_lite_frontslider2',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 2:','chamiers-lite'),
		'section' => 'chamiers_lite_frontpage_slidersection'
	));	
	
	$wp_customize->add_setting('chamiers_lite_frontslider3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('chamiers_lite_frontslider3',array(
		'type' => 'dropdown-pages',
		'label' => __('Select page for slider 3:','chamiers-lite'),
		'section' => 'chamiers_lite_frontpage_slidersection'
	));	//frontpage Slider Section	
	
	//Slider Excerpt Length
	$wp_customize->add_setting( 'chamiers_lite_excerpt_length_frontslider', array(
		'default'              => 0,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'chamiers_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'chamiers_lite_excerpt_length_frontslider', array(
		'label'       => __( 'Slider Excerpt length','chamiers-lite' ),
		'section'     => 'chamiers_lite_frontpage_slidersection',
		'type'        => 'range',
		'settings'    => 'chamiers_lite_excerpt_length_frontslider','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	$wp_customize->add_setting('chamiers_lite_frontslider_btntext',array(
		'default' => null,
		'sanitize_callback' => 'sanitize_text_field'	
	));
	
	$wp_customize->add_control('chamiers_lite_frontslider_btntext',array(	
		'type' => 'text',
		'label' => __('enter button name here','chamiers-lite'),
		'section' => 'chamiers_lite_frontpage_slidersection',
		'setting' => 'chamiers_lite_frontslider_btntext'
	)); //Frontslider read more button text
	
	$wp_customize->add_setting('chamiers_lite_show_frontpage_slidersection',array(
		'default' => false,
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'chamiers_lite_show_frontpage_slidersection', array(
	    'settings' => 'chamiers_lite_show_frontpage_slidersection',
	    'section'   => 'chamiers_lite_frontpage_slidersection',
	    'label'     => __('Check To Show This Section','chamiers-lite'),
	   'type'      => 'checkbox'
	 ));//Show Frontpage Slider Settings	
	 
	 
	 //Three Page Box Sections
	$wp_customize->add_section('chamiers_lite_3pagebox_sections', array(
		'title' => __('Three Page Box Sections','chamiers-lite'),
		'description' => __('Select pages from the dropdown for three box sections','chamiers-lite'),
		'priority' => null,
		'panel' => 	'chamiers_lite_theme_options_panel',          
	));
		
	$wp_customize->add_setting('chamiers_lite_3pagebox1',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'chamiers_lite_3pagebox1',array(
		'type' => 'dropdown-pages',			
		'section' => 'chamiers_lite_3pagebox_sections',
	));		
	
	$wp_customize->add_setting('chamiers_lite_3pagebox2',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'chamiers_lite_3pagebox2',array(
		'type' => 'dropdown-pages',			
		'section' => 'chamiers_lite_3pagebox_sections',
	));
	
	$wp_customize->add_setting('chamiers_lite_3pagebox3',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'chamiers_lite_3pagebox3',array(
		'type' => 'dropdown-pages',			
		'section' => 'chamiers_lite_3pagebox_sections',
	));		

	$wp_customize->add_setting( 'chamiers_lite_excerpt_length_for3pagebox', array(
		'default'              => 10,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'chamiers_lite_sanitize_excerptrange',		
	) );
	
	$wp_customize->add_control( 'chamiers_lite_excerpt_length_for3pagebox', array(
		'label'       => __( 'excerpt length for three page boxes','chamiers-lite' ),
		'section'     => 'chamiers_lite_3pagebox_sections',
		'type'        => 'range',
		'settings'    => 'chamiers_lite_excerpt_length_for3pagebox','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );	
	
	$wp_customize->add_setting('chamiers_lite_show_3pagebox_sections',array(
		'default' => false,
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'chamiers_lite_show_3pagebox_sections', array(
	   'settings' => 'chamiers_lite_show_3pagebox_sections',
	   'section'   => 'chamiers_lite_3pagebox_sections',
	   'label'     => __('Check To Show This Section','chamiers-lite'),
	   'type'      => 'checkbox'
	 ));//Show Three page Boxes sections
	 
	 
	//Welcome Sections
	$wp_customize->add_section('chamiers_lite_welcome_sections', array(
		'title' => __('Welcome Sections','chamiers-lite'),
		'description' => __('Select pages from the dropdown for Welcome section','chamiers-lite'),
		'priority' => null,
		'panel' => 	'chamiers_lite_theme_options_panel',          
	));	
		
	$wp_customize->add_setting('chamiers_lite_2colwelcomepage',array(
		'default' => '0',			
		'capability' => 'edit_theme_options',
		'sanitize_callback' => 'chamiers_lite_sanitize_dropdown_pages'
	));
 
	$wp_customize->add_control(	'chamiers_lite_2colwelcomepage',array(
		'type' => 'dropdown-pages',			
		'section' => 'chamiers_lite_welcome_sections',
	));

	$wp_customize->add_setting( 'chamiers_lite_2colwelcomepage_excerpt_length', array(
		'default'              => 40,
		'type'                 => 'theme_mod',		
		'sanitize_callback'    => 'chamiers_lite_sanitize_excerptrange',		
	) );
	$wp_customize->add_control( 'chamiers_lite_2colwelcomepage_excerpt_length', array(
		'label'       => __( 'page excerpt length','chamiers-lite' ),
		'section'     => 'chamiers_lite_welcome_sections',
		'type'        => 'range',
		'settings'    => 'chamiers_lite_2colwelcomepage_excerpt_length','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	
	$wp_customize->add_setting('chamiers_lite_show_welcome_sections',array(
		'default' => false,
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));		
	
	$wp_customize->add_control( 'chamiers_lite_show_welcome_sections', array(
	   'settings' => 'chamiers_lite_show_welcome_sections',
	   'section'   => 'chamiers_lite_welcome_sections',
	   'label'     => __('Check To Show This Section','chamiers-lite'),
	   'type'      => 'checkbox'
	 ));//Show Welcome Sections
	 
	 		 
	 //Blog Posts Settings
	$wp_customize->add_panel( 'chamiers_lite_blogsettings_panel', array(
		'priority' => 3,
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => __( 'Blog Posts Settings', 'chamiers-lite' ),		
	) );
	
	$wp_customize->add_section('chamiers_lite_blogmeta_options',array(
		'title' => __('Blog Meta Options','chamiers-lite'),			
		'priority' => null,
		'panel' => 	'chamiers_lite_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('chamiers_lite_hide_blogdate',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_hide_blogdate', array(
    	'label' => __('Check to hide post date','chamiers-lite'),	
		'section'   => 'chamiers_lite_blogmeta_options', 
		'setting' => 'chamiers_lite_hide_blogdate',		
    	'type'      => 'checkbox'
     )); //Blog Post Date
	 
	 
	 $wp_customize->add_setting('chamiers_lite_hide_postcats',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_hide_postcats', array(
		'label' => __('Check to hide post category','chamiers-lite'),	
    	'section'   => 'chamiers_lite_blogmeta_options',		
		'setting' => 'chamiers_lite_hide_postcats',		
    	'type'      => 'checkbox'
     )); //blog Posts category	 
	 
	 
	 $wp_customize->add_section('chamiers_lite_postfeatured_image',array(
		'title' => __('Posts Featured image','chamiers-lite'),			
		'priority' => null,
		'panel' => 	'chamiers_lite_blogsettings_panel', 	         
	));		
	
	$wp_customize->add_setting('chamiers_lite_hide_postfeatured_image',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_hide_postfeatured_image', array(
		'label' => __('Check to hide post featured image','chamiers-lite'),
    	'section'   => 'chamiers_lite_postfeatured_image',		
		'setting' => 'chamiers_lite_hide_postfeatured_image',	
    	'type'      => 'checkbox'
     )); //Posts featured image
	 
	 
	 $wp_customize->add_setting('chamiers_lite_featuredimg_right',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_featuredimg_right', array(
		'label' => __('Check to featured image Right Side','chamiers-lite'),
    	'section'   => 'chamiers_lite_postfeatured_image',		
		'setting' => 'chamiers_lite_featuredimg_right',	
    	'type'      => 'checkbox'
     )); //posts featured Right
	 
	
	$wp_customize->add_section('chamiers_lite_blogpost_content_settings',array(
		'title' => __('Posts Excerpt Options','chamiers-lite'),			
		'priority' => null,
		'panel' => 	'chamiers_lite_blogsettings_panel', 	         
	 ));	 
	 
	$wp_customize->add_setting( 'chamiers_lite_blogexcerptrange', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'chamiers_lite_sanitize_excerptrange',		
	) );
	
	$wp_customize->add_control( 'chamiers_lite_blogexcerptrange', array(
		'label'       => __( 'Excerpt length','chamiers-lite' ),
		'section'     => 'chamiers_lite_blogpost_content_settings',
		'type'        => 'range',
		'settings'    => 'chamiers_lite_blogexcerptrange','input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('chamiers_lite_blogfullcontent',array(
        'default' => 'Excerpt',     
        'sanitize_callback' => 'chamiers_lite_sanitize_choices'
	));
	
	$wp_customize->add_control('chamiers_lite_blogfullcontent',array(
        'type' => 'select',
        'label' => __('Posts Content','chamiers-lite'),
        'section' => 'chamiers_lite_blogpost_content_settings',
        'choices' => array(
        	'Content' => __('Content','chamiers-lite'),
            'Excerpt' => __('Excerpt','chamiers-lite'),
            'No Content' => __('No Excerpt','chamiers-lite')
        ),
	) ); 
	
	
	$wp_customize->add_section('chamiers_lite_postsinglemeta',array(
		'title' => __('Posts Single Settings','chamiers-lite'),			
		'priority' => null,
		'panel' => 	'chamiers_lite_blogsettings_panel', 	         
	));	
	
	$wp_customize->add_setting('chamiers_lite_hide_postdate_fromsingle',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_hide_postdate_fromsingle', array(
    	'label' => __('Check to hide post date from single','chamiers-lite'),	
		'section'   => 'chamiers_lite_postsinglemeta', 
		'setting' => 'chamiers_lite_hide_postdate_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide Posts date from single
	 
	 
	 $wp_customize->add_setting('chamiers_lite_hide_postcats_fromsingle',array(
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
	));	 

	$wp_customize->add_control( 'chamiers_lite_hide_postcats_fromsingle', array(
		'label' => __('Check to hide post category from single','chamiers-lite'),	
    	'section'   => 'chamiers_lite_postsinglemeta',		
		'setting' => 'chamiers_lite_hide_postcats_fromsingle',		
    	'type'      => 'checkbox'
     )); //Hide blogposts category single
	 
	 
	 //Sidebar Settings
	$wp_customize->add_section('chamiers_lite_sidebarsettings', array(
		'title' => __('Sidebar Settings','chamiers-lite'),		
		'priority' => null,
		'panel' => 	'chamiers_lite_blogsettings_panel',          
	));		
	 
	$wp_customize->add_setting('chamiers_lite_hidesidebar_blogposts',array(
		'default' => false,
		'sanitize_callback' => 'chamiers_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));	 
	
	$wp_customize->add_control( 'chamiers_lite_hidesidebar_blogposts', array(
	   'settings' => 'chamiers_lite_hidesidebar_blogposts',
	   'section'   => 'chamiers_lite_sidebarsettings',
	   'label'     => __('Check to hide sidebar from homepage','chamiers-lite'),
	   'type'      => 'checkbox'
	 ));//Hide Sidebar From Front Page
	
		 
}
add_action( 'customize_register', 'chamiers_lite_customize_register' );

function chamiers_lite_custom_css(){ 
?>
	<style type="text/css"> 					
        a,
        #sidebar ul li a:hover,
		#sidebar ol li a:hover,							
        .article-Listing h3 a:hover,
		.site-footer ul li a:hover, 
		.site-footer ul li.current_page_item a,		
        .postmeta a:hover,
		.aboutliststyle ul li::before,
		h4.sub_title,
		.quotebtn h4 a:hover,
		.col-lg-30:hover h4 a,			 			
        .button:hover,
		h2.services_title span,			
		.blog-postmeta a:hover,
		.blog-postmeta a:focus,
		blockquote::before	
            { color:<?php echo esc_html( get_theme_mod('chamiers_lite_colorscheme','#bc9873')); ?>;}					 
            
        .pagination ul li .current, .pagination ul li a:hover, 
        #commentform input#submit:hover,
		.col-lg-30:hover a.more-bgbtn,
		.sixcirclecolumn:hover .thumbbx,
		.col-lg-30:hover a.more-bgbtn:after,
        .nivo-controlNav a.active,
		.sd-search input, .sd-top-bar-nav .sd-search input,			
		a.blogreadmore,
		.hdr-topstrip,
		.copyrigh-wrapper:before,										
        #sidebar .search-form input.search-submit,				
        .wpcf7 input[type='submit'],				
        nav.pagination .page-numbers.current,		
		.morebutton,
		.nivo-caption .slidermorebtn,
		.top-bar-100 .header-request-quote .custombtn a,
		.top-bar-100 .header-request-quote .custombtn a:after,	
		.nivo-directionNav a:hover,	
		.nivo-caption .slidermorebtn:hover		
            { background-color:<?php echo esc_html( get_theme_mod('chamiers_lite_colorscheme','#bc9873')); ?>;}
			
		.tagcloud a:hover,
		.logo::after,
		 blockquote
            { border-color:<?php echo esc_html( get_theme_mod('chamiers_lite_colorscheme','#bc9873')); ?>;}
			
		.sixcirclecolumn:hover .thumbbx:before
            { border-top-color:<?php echo esc_html( get_theme_mod('chamiers_lite_colorscheme','#bc9873')); ?>;}				
			
		a:focus,
		input[type="date"]:focus,
		input[type="search"]:focus,
		input[type="number"]:focus,
		input[type="tel"]:focus,
		input[type="button"]:focus,
		input[type="month"]:focus,
		button:focus,
		input[type="text"]:focus,
		input[type="email"]:focus,
		input[type="range"]:focus,		
		input[type="password"]:focus,
		input[type="datetime"]:focus,
		input[type="week"]:focus,
		input[type="submit"]:focus,
		input[type="datetime-local"]:focus,		
		input[type="url"]:focus,
		input[type="time"]:focus,
		input[type="reset"]:focus,
		input[type="color"]:focus,
		textarea:focus
            { outline:1px solid <?php echo esc_html( get_theme_mod('chamiers_lite_colorscheme','#bc9873')); ?>;}	
			
		
		.header-navigation a,
		.header-navigation ul li.current_page_parent ul.sub-menu li a,
		.header-navigation ul li.current_page_parent ul.sub-menu li.current_page_item ul.sub-menu li a,
		.header-navigation ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a  			
            { color:<?php echo esc_html( get_theme_mod('chamiers_lite_menufontcolor','#333333')); ?>;}	
			
		
		.header-navigation ul.nav-menu .current_page_item > a,
		.header-navigation ul.nav-menu .current-menu-item > a,
		.header-navigation ul.nav-menu .current_page_ancestor > a,
		.header-navigation ul.nav-menu .current-menu-ancestor > a, 
		.header-navigation .nav-menu a:hover,
		.header-navigation .nav-menu a:focus,
		.header-navigation .nav-menu ul a:hover,
		.header-navigation .nav-menu ul a:focus,
		.header-navigation ul li a:hover, 
		.header-navigation ul li.current-menu-item a,			
		.header-navigation ul li.current_page_parent ul.sub-menu li.current-menu-item a,
		.header-navigation ul li.current_page_parent ul.sub-menu li a:hover,
		.header-navigation ul li.current-menu-item ul.sub-menu li a:hover,
		.header-navigation ul li.current-menu-ancestor ul.sub-menu li.current-menu-item ul.sub-menu li a:hover 		 			
            { color:<?php echo esc_html( get_theme_mod('chamiers_lite_menufontactivecolor','#bc9873')); ?>;}
			
		.hdrtopcart .cart-count
            { background-color:<?php echo esc_html( get_theme_mod('chamiers_lite_menufontactivecolor','#bc9873')); ?>;}		
			
		#SiteWrapper .header-navigation a:focus		 			
            { outline:1px solid <?php echo esc_html( get_theme_mod('chamiers_lite_menufontactivecolor','#bc9873')); ?>;}	
	
    </style> 
<?php    
}
         
add_action('wp_head','chamiers_lite_custom_css');	 

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function chamiers_lite_customize_preview_js() {
	wp_enqueue_script( 'chamiers_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '19062019', true );
}
add_action( 'customize_preview_init', 'chamiers_lite_customize_preview_js' );
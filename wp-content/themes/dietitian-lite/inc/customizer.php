<?php
/**
 * Dietitian Lite Theme Customizer
 *
 * @package Dietitian Lite
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function dietitian_lite_customize_register( $wp_customize ) {
	
	function dietitian_lite_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
	
	$wp_customize->get_setting( 'blogname' )->tranport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->tranport  = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
	    'selector' => 'h1.site-title',
	    'render_callback' => 'dietitian_lite_customize_partial_blogname',
	) );

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
	    'selector' => 'p.site-description',
	    'render_callback' => 'dietitian_lite_customize_partial_blogdescription',
	) );
	
	/***************************************
	** Color Scheme
	***************************************/
	$wp_customize->add_setting('diet_headerbg_color', array(
		'default' => '#ffffff',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'diet_headerbg_color',array(
			'label' => __('Header Background color','dietitian-lite'),
			'description'	=> __('Select background color for header.','dietitian-lite'),
			'section' => 'colors',
			'settings' => 'diet_headerbg_color'
		))
	);

	$wp_customize->add_setting('color_scheme', array(
		'default' => '#86B049',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','dietitian-lite'),
			'description' => __('Select theme main color from here.','dietitian-lite'),
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	$wp_customize->add_setting('sub_color_scheme', array(
		'default' => '#151618',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'sub_color_scheme',array(
			'label' => __('Sub Color Scheme','dietitian-lite'),
			'description' => __('Select theme sub color from here.','dietitian-lite'),
			'section' => 'colors',
			'settings' => 'sub_color_scheme'
		))
	);

	$wp_customize->add_setting('diet_footer_color', array(
		'default' => '#20242C',
		'sanitize_callback'	=> 'sanitize_hex_color',
	));

	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'diet_footer_color',array(
			'label' => __('Footer Background Color','dietitian-lite'),
			'description' => __('Select background color for footer.','dietitian-lite'),
			'section' => 'colors',
			'settings' => 'diet_footer_color'
		))
	);

	/***************************************
	** Registerd Theme Setup Panel
	***************************************/
	$wp_customize->add_panel( 'diet_theme_panel',
		array(
			'title'            => __( 'Theme Setup', 'dietitian-lite' ),
			'description'      => __( 'Theme Modifications like color scheme, header info, slider and sections can be done here', 'dietitian-lite' ),
		)
	);

	/***************************************
	** Slider Section
	***************************************/
	$wp_customize->add_section(
		'diet_theme_slider',
		array(
			'title' => __('Theme Slider', 'dietitian-lite'),
			'priority' => null,
			'description'	=> __('Recommended image size (1600x900). Slider will work only when you select the static front page.','dietitian-lite'),
			'panel' => 'diet_theme_panel',
		)
	);

	$wp_customize->add_setting('slide1',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide1',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','dietitian-lite'),
			'section'	=> 'diet_theme_slider'
	));

	$wp_customize->add_setting('slide2',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide2',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','dietitian-lite'),
			'section'	=> 'diet_theme_slider'
	));

	$wp_customize->add_setting('slide3',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('slide3',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','dietitian-lite'),
			'section'	=> 'diet_theme_slider'
	));

	$wp_customize->add_setting('slide_more',array(
		'default'	=> __('','dietitian-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('slide_more',array(
		'label'	=> __('Add slider link button text.','dietitian-lite'),
		'section'	=> 'diet_theme_slider',
		'setting'	=> 'slide_more',
		'type'	=> 'text'
	));

	$wp_customize->add_setting('diet_hide_slider',array(
		'default' => true,
		'sanitize_callback' => 'dietitian_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	)); 

	$wp_customize->add_control( 'diet_hide_slider', array(
	   'settings' => 'diet_hide_slider',
	   'section'   => 'diet_theme_slider',
	   'label'     => __('Check this to hide slider.','dietitian-lite'),
	   'type'      => 'checkbox'
	));

	/***************************************
	** Features Section
	***************************************/
	$wp_customize->add_section(
		'diet_feat_sec',
		array(
			'title' => __('Features Section', 'dietitian-lite'),
			'priority' => null,
			'description'	=> __('Select pages for homepage first section. This section will be displayed only when you select the static front page.','dietitian-lite'),
			'panel' => 'diet_theme_panel',
		)
	);

	$wp_customize->add_setting('featsec_ttl',array(
		'sanitize_callback'	=> 'wp_filter_nohtml_kses',
	));

	$wp_customize->add_control('featsec_ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add section title here','dietitian-lite'),
		'section'	=> 'diet_feat_sec'
	));

	$wp_customize->add_setting('feat1',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat1',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for first column','dietitian-lite'),
		'section'	=> 'diet_feat_sec'
	));

	$wp_customize->add_setting('feat2',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat2',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for second column','dietitian-lite'),
		'section'	=> 'diet_feat_sec'
	));

	$wp_customize->add_setting('feat3',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint'
	));

	$wp_customize->add_control('feat3',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for third column','dietitian-lite'),
		'section'	=> 'diet_feat_sec'
	));

	$wp_customize->add_setting('diet_hide_feat',array(
		'default' => true,
		'sanitize_callback' => 'dietitian_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'diet_hide_feat', array(
	   'settings' => 'diet_hide_feat',
	   'section'   => 'diet_feat_sec',
	   'label'     => __('Check this to hide features section.','dietitian-lite'),
	   'type'      => 'checkbox'
	));

	/***************************************
	** About Section
	***************************************/
	$wp_customize->add_section(
		'diet_intro_sec',
		array(
			'title' => __('About us Section', 'dietitian-lite'),
			'priority' => null,
			'description'	=> __('Select page for homepage first section. This section will be displayed only when you select the static front page.','dietitian-lite'),
			'panel' => 'diet_theme_panel',
		)
	);
	
	$wp_customize->add_setting('diet_intro_ttl',array(
		'sanitize_callback'	=> 'sanitize_text_field',
		'transport' => 'refresh'
	));
	
	$wp_customize->add_control('diet_intro_ttl',array(
		'type'	=> 'text',
		'label'	=> __('Add Section Sub Title Here','dietitian-lite'),
		'section'	=> 'diet_intro_sec'
	));
	
	$wp_customize->add_setting('diet_intro',array(
		'default' => '0',
		'capability' => 'edit_theme_options',
		'sanitize_callback'	=> 'absint',
		'transport' => 'refresh'
	));

	$wp_customize->add_control('diet_intro',array(
		'type'	=> 'dropdown-pages',
		'label'	=> __('Select page for display first section','dietitian-lite'),
		'section'	=> 'diet_intro_sec'
	));
	
	$wp_customize->selective_refresh->add_partial('diet_intro', array(
        'selector' => '.intro-content'
    ));
	
	$wp_customize->add_setting('intro_more',array(
		'default'	=> __('','dietitian-lite'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('intro_more',array(
		'label'	=> __('Add read more button text.','dietitian-lite'),
		'section'	=> 'diet_intro_sec',
		'setting'	=> 'intro_more',
		'type'	=> 'text'
	));
	
	$wp_customize->add_setting('diet_hide_intro',array(
		'default' => true,
		'sanitize_callback' => 'dietitian_lite_sanitize_checkbox',
		'capability' => 'edit_theme_options',
	));

	$wp_customize->add_control( 'diet_hide_intro', array(
	   'settings' => 'diet_hide_intro',
	   'section'   => 'diet_intro_sec',
	   'label'     => __('Check this to hide first section.','dietitian-lite'),
	   'type'      => 'checkbox'
	));
}
add_action( 'customize_register', 'dietitian_lite_customize_register' );

function dietitian_lite_css_func(){ ?>
<style>
	#header{
		background-color:<?php echo esc_attr(get_theme_mod('diet_headerbg_color','#ffffff')); ?>;
	}
	a,
	.tm_client strong,
	.postmeta a:hover,
	.blog-post h3.entry-title,
	a.blog-more:hover,
	#commentform input#submit,
	input.search-submit,
	.blog-date .date,
	p.site-description,
	.sitenav ul li.current_page_item a,
	.sitenav ul li a:hover,
	.sitenav ul li.current_page_item ul li a:hover,
	h2.section_title span{
		color:<?php echo esc_attr(get_theme_mod('color_scheme','#86B049'));?>;
	}
	h3.widget-title,
	.nav-links .page-numbers.current,
	.nav-links a:hover,
	p.form-submit input[type="submit"],
	input[type="submit"].search-submit,
	.nivo-controlNav a,
	.diet-slider .inner-caption .sliderbtn,
	.read-more a,
	h4.section_sub_title,
	.imagebox-data h3:before,
	.imagebox-more a{
		background-color:<?php echo esc_attr(get_theme_mod('color_scheme','#86B049')); ?>;
	}
	h2.section_title span:before,
	h2.section_title span:after{
		border-color:<?php echo esc_attr(get_theme_mod('color_scheme','#86B049')); ?>;
	}
	a:hover,
	#sidebar ul li a:hover{
		color:<?php echo esc_attr(get_theme_mod('sub_color_scheme','#151618')); ?>;
	}
	.slider-caption{
		border-color:<?php echo esc_attr(get_theme_mod('sub_color_scheme','#151618')); ?>;
	}
	input[type="submit"].search-submit:hover,
	input[type="submit"].search-submit:focus,
	.nav-links .page-numbers,
	.diet-slider .inner-caption .sliderbtn:hover,
	.read-more a:hover,
	.nivo-controlNav a.active,
	.imagebox:hover .imagebox-more a{
		background-color:<?php echo esc_attr(get_theme_mod('sub_color_scheme','#151618')); ?>;
	}
	.copyright-wrapper{
		background-color:<?php echo esc_attr(get_theme_mod('diet_footer_color','#20242C')); ?>;
	}
</style>
<?php }
add_action('wp_head','dietitian_lite_css_func');

function dietitian_lite_customize_preview_js() {
	wp_enqueue_script( 'dietitian-lite-customize-preview', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20141216', true );
}
add_action( 'customize_preview_init', 'dietitian_lite_customize_preview_js' );
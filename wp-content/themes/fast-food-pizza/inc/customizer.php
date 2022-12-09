<?php
/**
 * Fast Food Pizza Theme Customizer
 * @package Fast Food Pizza
 */

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-sizer.php' );
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function fast_food_pizza_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . 'inc/custom-control.php' );
	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-changer.php' );

	$wp_customize->add_setting( 'fast_food_pizza_logo_sizer',array(
		'default' => 50,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_logo_sizer',array(
		'label' => esc_html__( 'Logo Sizer','fast-food-pizza' ),
		'section' => 'title_tagline',
		'priority'    => 9,
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('fast_food_pizza_site_title_enable',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_site_title_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Site Title','fast-food-pizza'),
		'section' => 'title_tagline'
	));

 	$wp_customize->add_setting('fast_food_pizza_site_title_font_size',array(
		'default'=> 25,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_site_title_font_size',array(
		'label' => esc_html__( 'Site Title Font Size (px)','fast-food-pizza' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

   $wp_customize->add_setting('fast_food_pizza_site_tagline_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
   ));
   $wp_customize->add_control('fast_food_pizza_site_tagline_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable Site Tagline','fast-food-pizza'),
      'section' => 'title_tagline'
   ));

   $wp_customize->add_setting('fast_food_pizza_site_tagline_font_size',array(
		'default'=> 13,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_site_tagline_font_size',array(
		'label' => esc_html__( 'Site Tagline Font Size (px)','fast-food-pizza' ),
		'section'=> 'title_tagline',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

    $wp_customize->add_setting('fast_food_pizza_site_logo_inline',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_site_logo_inline',array(
       'type' => 'checkbox',
       'label' => __('Site logo inline with site title','fast-food-pizza'),
       'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('fast_food_pizza_background_skin',array(
        'default' => 'Without Background',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_background_skin',array(
        'type' => 'radio',
        'label' => __('Background Skin','fast-food-pizza'),
        'description' => __('Here you can add the background skin along with the background image.','fast-food-pizza'),
        'section' => 'background_image',
        'choices' => array(
            'With Background' => __('With Background Skin','fast-food-pizza'),
            'Without Background' => __('Without Background Skin','fast-food-pizza'),
        ),
	) );

	//add home page setting pannel
	$wp_customize->add_panel( 'fast_food_pizza_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Theme Settings', 'fast-food-pizza' ),
	    'description' => __( 'Description of what this panel does.', 'fast-food-pizza' ),
	) );

	$fast_food_pizza_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One', 
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower', 
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit', 
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two', 
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda', 
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli', 
		'Marck Script'           => 'Marck Script', 
		'Noto Serif'             => 'Noto Serif', 
		'Open Sans'              => 'Open Sans', 
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen', 
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display', 
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik', 
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo', 
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two', 
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn', 
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	//Typography
	$wp_customize->add_section('fast_food_pizza_typography', array(
		'title'    => __('Typography', 'fast-food-pizza'),
		'panel'    => 'fast_food_pizza_panel_id',
	));

	// This is Paragraph Color picker setting
	$wp_customize->add_setting('fast_food_pizza_paragraph_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_paragraph_color', array(
		'label'    => __('Paragraph Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_paragraph_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control(	'fast_food_pizza_paragraph_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('Paragraph Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	$wp_customize->add_setting('fast_food_pizza_paragraph_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_paragraph_font_size', array(
		'label'   => __('Paragraph Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_paragraph_font_size',
		'type'    => 'text',
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('fast_food_pizza_atag_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_atag_color', array(
		'label'    => __('"a" Tag Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_atag_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control(	'fast_food_pizza_atag_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('"a" Tag Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting('fast_food_pizza_li_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_li_color', array(
		'label'    => __('"li" Tag Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_li_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control(	'fast_food_pizza_li_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('"li" Tag Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h1_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h1_color', array(
		'label'    => __('H1 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h1_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control('fast_food_pizza_h1_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('H1 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h1_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h1_font_size', array(
		'label'   => __('H1 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h1_font_size',
		'type'    => 'text',
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h2_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h2_color', array(
		'label'    => __('h2 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h2_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control(
	'fast_food_pizza_h2_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('h2 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h2_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h2_font_size', array(
		'label'   => __('H2 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h2_font_size',
		'type'    => 'text',
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h3_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h3_color', array(
		'label'    => __('H3 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h3_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control(
	'fast_food_pizza_h3_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('H3 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h3_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h3_font_size', array(
		'label'   => __('H3 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h3_font_size',
		'type'    => 'text',
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h4_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h4_color', array(
		'label'    => __('H4 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h4_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control('fast_food_pizza_h4_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('H4 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h4_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h4_font_size', array(
		'label'   => __('H4 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h4_font_size',
		'type'    => 'text',
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h5_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h5_color', array(
		'label'    => __('H5 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h5_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control('fast_food_pizza_h5_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('H5 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h5_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h5_font_size', array(
		'label'   => __('H5 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h5_font_size',
		'type'    => 'text',
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting('fast_food_pizza_h6_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_h6_color', array(
		'label'    => __('H6 Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_typography',
		'settings' => 'fast_food_pizza_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('fast_food_pizza_h6_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control('fast_food_pizza_h6_font_family', array(
		'section' => 'fast_food_pizza_typography',
		'label'   => __('H6 Fonts', 'fast-food-pizza'),
		'type'    => 'select',
		'choices' => $fast_food_pizza_font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('fast_food_pizza_h6_font_size', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	));
	$wp_customize->add_control('fast_food_pizza_h6_font_size', array(
		'label'   => __('H6 Font Size', 'fast-food-pizza'),
		'section' => 'fast_food_pizza_typography',
		'setting' => 'fast_food_pizza_h6_font_size',
		'type'    => 'text',
	));

	//layout setting
	$wp_customize->add_section( 'fast_food_pizza_option', array(
    	'title'      => __( 'Layout Settings', 'fast-food-pizza' ),
    	'panel'    => 'fast_food_pizza_panel_id',
	) );

	$wp_customize->add_setting('fast_food_pizza_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_preloader',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Preloader','fast-food-pizza'),
       'section' => 'fast_food_pizza_option'
    ));

   $wp_customize->add_setting('fast_food_pizza_preloader_type',array(
     	'default' => 'First Preloader Type',
     	'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_preloader_type',array(
      'type' => 'radio',
      'label' => __('Preloader Types','fast-food-pizza'),
      'section' => 'fast_food_pizza_option',
      'choices' => array(
         'First Preloader Type' => __('First Preloader Type','fast-food-pizza'),
         'Second Preloader Type' => __('Second Preloader Type','fast-food-pizza'),
      ),
	) );

	$wp_customize->add_setting('fast_food_pizza_preloader_bg_color_option', array(
		'default'           => '#dc3836',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_preloader_bg_color_option', array(
		'label'    => __('Preloader Background Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_option',
	)));

	$wp_customize->add_setting('fast_food_pizza_preloader_icon_color_option', array(
		'default'           => '#fff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_preloader_icon_color_option', array(
		'label'    => __('Preloader Icon Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_option',
	)));

	$wp_customize->add_setting('fast_food_pizza_width_layout_options',array(
		'default' => 'Default',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_width_layout_options',array(
		'type' => 'radio',
		'label' => __('Container Box','fast-food-pizza'),
		'description' => __('Here you can change the Width layout. ','fast-food-pizza'),
		'section' => 'fast_food_pizza_option',
		'choices' => array(
		   'Default' => __('Default','fast-food-pizza'),
		   'Container Layout' => __('Container Layout','fast-food-pizza'),
		   'Box Layout' => __('Box Layout','fast-food-pizza'),
		),
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('fast_food_pizza_layout_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	) );
	$wp_customize->add_control('fast_food_pizza_layout_options', array(
        'type' => 'select',
        'label' => __('Select different post sidebar layout','fast-food-pizza'),
        'section' => 'fast_food_pizza_option',
        'choices' => array(
            'One Column' => __('One Column','fast-food-pizza'),
            'Grid Layout' => __('Grid Layout','fast-food-pizza'),
            'Left Sidebar' => __('Left Sidebar','fast-food-pizza'),
            'Right Sidebar' => __('Right Sidebar','fast-food-pizza')
        ),
	)   );

	$wp_customize->add_setting('fast_food_pizza_sidebar_size',array(
        'default' => 'Sidebar 1/3',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_sidebar_size',array(
        'type' => 'radio',
        'label' => __('Sidebar Size Option','fast-food-pizza'),
        'section' => 'fast_food_pizza_option',
        'choices' => array(
            'Sidebar 1/3' => __('Sidebar 1/3','fast-food-pizza'),
            'Sidebar 1/4' => __('Sidebar 1/4','fast-food-pizza'),
        ),
	) );

	$wp_customize->add_setting( 'fast_food_pizza_image_border_radius', array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize,  'fast_food_pizza_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	)) );

	$wp_customize->add_setting( 'fast_food_pizza_image_box_shadow',array(
		'default' => 0,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize,  'fast_food_pizza_image_box_shadow',array(
		'label' => esc_html__( 'Featured Image Shadow','fast-food-pizza' ),
		'section' => 'fast_food_pizza_option',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
		'type'		=> 'range'
	)));

	//Blog Post Settings
	$wp_customize->add_section('fast_food_pizza_post_settings', array(
		'title'    => __('Post General Settings', 'fast-food-pizza'),
		'panel'    => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_post_layouts',array(
     'default' => 'Layout 1',
     'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_post_layouts', array(
		'type' => 'select',
		'label' => __('Post Layouts','fast-food-pizza'),
		'description' => __('Here you can change the 3 different layouts of post','fast-food-pizza'),
		'section' => 'fast_food_pizza_post_settings',
		'choices' => array(
		   'Layout 1' => __('Layouts 1','fast-food-pizza'),
		   'Layout 2' => __('Layouts 2','fast-food-pizza'),
		   'Layout 3' => __('Layouts 3','fast-food-pizza'),
	)));

	$wp_customize->add_setting('fast_food_pizza_metafields_date',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_metafields_date',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Date ','fast-food-pizza'),
		'section' => 'fast_food_pizza_post_settings'
	));

	$wp_customize->add_setting('fast_food_pizza_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_post_date_icon',array(
		'label'	=> __('Post Date Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('fast_food_pizza_metafields_author',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_metafields_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','fast-food-pizza'),
       'section' => 'fast_food_pizza_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_post_author_icon',array(
		'label'	=> __('Post Author Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('fast_food_pizza_metafields_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_metafields_comment',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Comments','fast-food-pizza'),
       'section' => 'fast_food_pizza_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_post_comment_icon',array(
		'label'	=> __('Post Comment Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_post_settings',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting('fast_food_pizza_metafields_time',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_metafields_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','fast-food-pizza'),
       'section' => 'fast_food_pizza_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_post_time_icon',array(
		'label'	=> __('Post Time Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_post_featured_image',array(
       'default' => 'Image',
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_choices'
    ));
    $wp_customize->add_control('fast_food_pizza_post_featured_image',array(
       'type' => 'select',
       'label'	=> __('Post Image Options','fast-food-pizza'),
       'choices' => array(
            'Image' => __('Image','fast-food-pizza'),
            'Color' => __('Color','fast-food-pizza'),
            'None' => __('None','fast-food-pizza'),
        ),
      	'section'	=> 'fast_food_pizza_post_settings',
    ));

    $wp_customize->add_setting('fast_food_pizza_post_featured_color', array(
		'default'           => '#5c727d',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_post_featured_color', array(
		'label'    => __('Post Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_post_settings',
		'settings' => 'fast_food_pizza_post_featured_color',
		'active_callback' => 'fast_food_pizza_post_color_enabled'
	)));

	$wp_customize->add_setting( 'fast_food_pizza_custom_post_color_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_custom_post_color_width',	array(
		'label' => esc_html__( 'Color Post Custom Width','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'fast_food_pizza_show_post_color'
	)));

	$wp_customize->add_setting( 'fast_food_pizza_custom_post_color_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_custom_post_color_height',array(
		'label' => esc_html__( 'Color Post Custom Height','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'fast_food_pizza_show_post_color'
	)));

	$wp_customize->add_setting('fast_food_pizza_post_featured_image_dimention',array(
       'default' => 'Default',
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_choices'
    ));
    $wp_customize->add_control('fast_food_pizza_post_featured_image_dimention',array(
       'type' => 'select',
       'label'	=> __('Post Featured Image Dimention','fast-food-pizza'),
       'choices' => array(
            'Default' => __('Default','fast-food-pizza'),
            'Custom' => __('Custom','fast-food-pizza'),
        ),
      	'section'	=> 'fast_food_pizza_post_settings',
      	'active_callback' => 'fast_food_pizza_enable_post_featured_image'
    ));

    $wp_customize->add_setting( 'fast_food_pizza_post_featured_image_custom_width',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_post_featured_image_custom_width',	array(
		'label' => esc_html__( 'Post Featured Image Custom Width','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 500,
			'step' => 1,
		),
		'active_callback' => 'fast_food_pizza_enable_post_image_custom_dimention'
	)));

	$wp_customize->add_setting( 'fast_food_pizza_post_featured_image_custom_height',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_post_featured_image_custom_height',	array(
		'label' => esc_html__( 'Post Featured Image Custom Height','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 350,
			'step' => 1,
		),
		'active_callback' => 'fast_food_pizza_enable_post_image_custom_dimention'
	)));

    //Post excerpt
	$wp_customize->add_setting( 'fast_food_pizza_post_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'absint',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'fast_food_pizza_post_excerpt_number', array(
		'label'       => esc_html__( 'Blog Post Content Limit','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_post_settings',
		'type'        => 'number',
		'settings'    => 'fast_food_pizza_post_excerpt_number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('fast_food_pizza_content_settings',array(
        'default' =>'Excerpt',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_content_settings',array(
        'type' => 'radio',
        'label' => __('Content Settings','fast-food-pizza'),
        'section' => 'fast_food_pizza_post_settings',
        'choices' => array(
            'Excerpt' => __('Excerpt','fast-food-pizza'),
            'Content' => __('Content','fast-food-pizza'),
        ),
	) );

	$wp_customize->add_setting( 'fast_food_pizza_post_discription_suffix', array(
		'default'   => __('[...]','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'fast_food_pizza_post_discription_suffix', array(
		'label'       => esc_html__( 'Post Excerpt Suffix','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_post_settings',
		'type'        => 'text',
		'settings'    => 'fast_food_pizza_post_discription_suffix',
	) );

	$wp_customize->add_setting( 'fast_food_pizza_blog_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'fast_food_pizza_blog_post_meta_seperator', array(
		'label'       => esc_html__( 'Meta Box','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','fast-food-pizza'),
		'type'        => 'text',
		'settings'    => 'fast_food_pizza_blog_post_meta_seperator',
	) );

	$wp_customize->add_setting('fast_food_pizza_button_text',array(
		'default'=> __('View More','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_button_text',array(
		'label'	=> __('Add Button Text','fast-food-pizza'),
		'section'=> 'fast_food_pizza_post_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'fast_food_pizza_post_button_padding_top',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_post_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_post_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_post_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_post_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_post_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('fast_food_pizza_enable_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_enable_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Blog Page Pagination','fast-food-pizza'),
       'section' => 'fast_food_pizza_post_settings'
    ));

    $wp_customize->add_setting( 'fast_food_pizza_post_pagination_position', array(
        'default'			=>  'Bottom', 
        'sanitize_callback'	=> 'fast_food_pizza_sanitize_choices'
    ));
    $wp_customize->add_control( 'fast_food_pizza_post_pagination_position', array(
        'section' => 'fast_food_pizza_post_settings',
        'type' => 'select',
        'label' => __( 'Post Pagination Position', 'fast-food-pizza' ),
        'choices'		=> array(
            'Top'  => __( 'Top', 'fast-food-pizza' ),
            'Bottom' => __( 'Bottom', 'fast-food-pizza' ),
            'Both Top & Bottom' => __( 'Both Top & Bottom', 'fast-food-pizza' ),
    )));

	$wp_customize->add_setting( 'fast_food_pizza_pagination_settings', array(
        'default'			=> 'Numeric Pagination',
        'sanitize_callback'	=> 'fast_food_pizza_sanitize_choices'
    ));
    $wp_customize->add_control( 'fast_food_pizza_pagination_settings', array(
        'section' => 'fast_food_pizza_post_settings',
        'type' => 'radio',
        'label' => __( 'Post Pagination', 'fast-food-pizza' ),
        'choices'		=> array(
            'Numeric Pagination'  => __( 'Numeric Pagination', 'fast-food-pizza' ),
            'next-prev' => __( 'Next / Previous', 'fast-food-pizza' ),
    )));

    $wp_customize->add_setting('fast_food_pizza_post_block_option',array(
        'default' => 'By Block',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_post_block_option',array(
        'type' => 'select',
        'label' => __('Blog Post Shown','fast-food-pizza'),
        'section' => 'fast_food_pizza_post_settings',
        'choices' => array(
            'By Block' => __('By Block','fast-food-pizza'),
            'By Without Block' => __('By Without Block','fast-food-pizza'),
        ),
	) );

    //Single Post Settings
	$wp_customize->add_section('fast_food_pizza_single_post_settings', array(
		'title'    => __('Single Post Settings', 'fast-food-pizza'),
		'panel'    => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_single_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_single_post_date',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Date ','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_single_post_date_icon',array(
		'default'	=> 'far fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_single_post_date_icon',array(
		'label'	=> __('Single Post Date Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_single_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_single_post_author',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Author','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

   $wp_customize->add_setting('fast_food_pizza_single_post_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
      $wp_customize,'fast_food_pizza_single_post_author_icon',array(
		'label'	=> __('Single Post Author Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_single_post_comment',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_single_post_comment',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Comments','fast-food-pizza'),
		'section' => 'fast_food_pizza_single_post_settings'
	));

 	$wp_customize->add_setting('fast_food_pizza_single_post_comment_icon',array(
		'default'	=> 'fas fa-comments',
		'sanitize_callback' => 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer( $wp_customize, 'fast_food_pizza_single_post_comment_icon', array(
		'label'	=> __('Single Post Comment Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_single_post_tags',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_single_post_tags',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Tags','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_single_post_time',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_single_post_time',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Time','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings',
    ));

    $wp_customize->add_setting('fast_food_pizza_single_post_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_single_post_time_icon',array(
		'label'	=> __('Single Post Time Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_single_post_settings',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_post_comment_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_post_comment_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable post comment','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings',
    ));

	$wp_customize->add_setting('fast_food_pizza_single_post_featured_image',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_single_post_featured_image',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Featured image','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings',
    ));

	$wp_customize->add_setting('fast_food_pizza_single_post_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	) );
	$wp_customize->add_control('fast_food_pizza_single_post_layout', array(
        'type' => 'select',
        'label' => __('Select different Single post sidebar layout','fast-food-pizza'),
        'section' => 'fast_food_pizza_single_post_settings',
        'choices' => array(
            'One Column' => __('One Column','fast-food-pizza'),
            'Left Sidebar' => __('Left Sidebar','fast-food-pizza'),
            'Right Sidebar' => __('Right Sidebar','fast-food-pizza')
        ),
	)   );

	$wp_customize->add_setting( 'fast_food_pizza_single_post_meta_seperator', array(
		'default'   => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'fast_food_pizza_single_post_meta_seperator', array(
		'label'       => esc_html__( 'Single Post Meta Box Seperator','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_single_post_settings',
		'description' => __('Here you can add the seperator for meta box. e.g. "|",  ",", "/", etc. ','fast-food-pizza'),
		'type'        => 'text',
		'settings'    => 'fast_food_pizza_single_post_meta_seperator',
	) );

	$wp_customize->add_setting( 'fast_food_pizza_comment_form_width',array(
		'default' => '',
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_comment_form_width',	array(
		'label' => esc_html__( 'Comment Form Width','fast-food-pizza' ),
		'section' => 'fast_food_pizza_single_post_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 100,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('fast_food_pizza_title_comment_form',array(
       'default' => __('Leave a Reply','fast-food-pizza'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('fast_food_pizza_title_comment_form',array(
       'type' => 'text',
       'label' => __('Comment Form Heading Text','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_comment_form_button_content',array(
       'default' => __('Post Comment','fast-food-pizza'),
       'sanitize_callback'	=> 'sanitize_text_field'
    ));
    $wp_customize->add_control('fast_food_pizza_comment_form_button_content',array(
       'type' => 'text',
       'label' => __('Comment Form Button Text','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

	$wp_customize->add_setting('fast_food_pizza_enable_single_post_pagination',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_enable_single_post_pagination',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Single Post Pagination','fast-food-pizza'),
       'section' => 'fast_food_pizza_single_post_settings'
    ));

	//Related Post Settings
	$wp_customize->add_section('fast_food_pizza_related_settings', array(
		'title'    => __('Related Post Settings', 'fast-food-pizza'),
		'panel'    => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting( 'fast_food_pizza_related_enable_disable',array(
		'default' => true,
      	'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ) );
    $wp_customize->add_control('fast_food_pizza_related_enable_disable',array(
    	'type' => 'checkbox',
        'label' => __( 'Enable / Disable Related Post','fast-food-pizza' ),
        'section' => 'fast_food_pizza_related_settings'
    ));

    $wp_customize->add_setting('fast_food_pizza_related_title',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_related_title',array(
		'label'	=> __('Add Section Title','fast-food-pizza'),
		'section'	=> 'fast_food_pizza_related_settings',
		'type'		=> 'text'
	));

	$wp_customize->add_setting( 'fast_food_pizza_related_posts_count_number', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'fast_food_pizza_related_posts_count_number', array(
		'label'       => esc_html__( 'Related Post Count','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_related_settings',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 10,
		),
	) );

	$wp_customize->add_setting('fast_food_pizza_related_posts_taxanomies',array(
        'default' => 'categories',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_related_posts_taxanomies',array(
        'type' => 'radio',
        'label' => __('Post Taxonomies','fast-food-pizza'),
        'section' => 'fast_food_pizza_related_settings',
        'choices' => array(
            'categories' => __('Categories','fast-food-pizza'),
            'tags' => __('Tags','fast-food-pizza'),
        ),
	) );

	$wp_customize->add_setting( 'fast_food_pizza_related_post_excerpt_number',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_related_post_excerpt_number',	array(
		'label' => esc_html__( 'Content Limit','fast-food-pizza' ),
		'section' => 'fast_food_pizza_related_settings',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Header Section
	$wp_customize->add_section('fast_food_pizza_header',array(
		'title'	=> __('Header','fast-food-pizza'),
		'description'	=> __('Add header content here','fast-food-pizza'),
		'priority'	=> null,
		'panel' => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_phone_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('fast_food_pizza_phone_text',array(
		'type' => 'text',
		'label' => __('Add Phone Text','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
	) );

	$wp_customize->add_setting('fast_food_pizza_phone_number',array(
		'default' => '',
		'sanitize_callback' => 'fast_food_pizza_sanitize_phone_number'
 	));
 	$wp_customize->add_control('fast_food_pizza_phone_number',array(
		'type' => 'text',
		'label' => __('Add Phone Number','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
	) );

	$wp_customize->add_setting('fast_food_pizza_header_btn_text',array(
		'default' => '',
		'sanitize_callback' => 'sanitize_text_field'
 	));
 	$wp_customize->add_control('fast_food_pizza_header_btn_text',array(
		'type' => 'text',
		'label' => __('Add Button Text','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
	) );

	$wp_customize->add_setting('fast_food_pizza_header_btn_url',array(
		'default' => '',
		'sanitize_callback' => 'esc_url_raw'
 	));
 	$wp_customize->add_control('fast_food_pizza_header_btn_url',array(
		'type' => 'text',
		'label' => __('Add Button URL','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
	) );

	$wp_customize->add_setting('fast_food_pizza_menu_font_size_option',array(
		'default'=> 12,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize,'fast_food_pizza_menu_font_size_option',array(
		'label'	=> __('Menu Font Size ','fast-food-pizza'),
		'section'=> 'fast_food_pizza_header',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
     	),
	)));

	$wp_customize->add_setting('fast_food_pizza_menu_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize,'fast_food_pizza_menu_padding',array(
		'label'	=> __('Main Menu Padding','fast-food-pizza'),
		'section'=> 'fast_food_pizza_header',
		'input_attrs' => array(
         'step' => 1,
			'min'  => 0,
			'max'  => 50,
      ),
	)));

	$wp_customize->add_setting('fast_food_pizza_text_tranform_menu',array(
		'default' => 'Uppercase',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
 	));
 	$wp_customize->add_control('fast_food_pizza_text_tranform_menu',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
		'choices' => array(
		   'Uppercase' => __('Uppercase','fast-food-pizza'),
		   'Lowercase' => __('Lowercase','fast-food-pizza'),
		   'Capitalize' => __('Capitalize','fast-food-pizza'),
		),
	) );

	$wp_customize->add_setting('fast_food_pizza_font_weight_option_menu',array(
		'default' => '',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
 	));
 	$wp_customize->add_control('fast_food_pizza_font_weight_option_menu',array(
		'type' => 'select',
		'label' => __('Menu Font Weight','fast-food-pizza'),
		'section' => 'fast_food_pizza_header',
		'choices' => array(
		   'Bold' => __('Bold','fast-food-pizza'),
		   'Normal' => __('Normal','fast-food-pizza'),
		),
	) );

	$wp_customize->add_setting('fast_food_pizza_responsive_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_responsive_menu_open_icon',array(
		'label'	=> __('Responsive Open Menu Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_header',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_responsive_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_responsive_menu_close_icon',array(
		'label'	=> __('Responsive Close Menu Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_header',
		'type'		=> 'icon'
	)));

	//Header Section
	$wp_customize->add_section('fast_food_pizza_social_icons',array(
		'title'	=> __('Social Icons','fast-food-pizza'),
		'priority'	=> null,
		'panel' => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_facebook_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('fast_food_pizza_facebook_url',array(
		'type' => 'url',
		'label' => __('Add Facebook URL','fast-food-pizza'),
		'section' => 'fast_food_pizza_social_icons',
	));

	$wp_customize->add_setting('fast_food_pizza_twitter_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('fast_food_pizza_twitter_url',array(
		'type' => 'url',
		'label' => __('Add Twitter URL','fast-food-pizza'),
		'section' => 'fast_food_pizza_social_icons',
	));

	$wp_customize->add_setting('fast_food_pizza_instagram_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('fast_food_pizza_instagram_url',array(
		'type' => 'url',
		'label' => __('Add Instagram URL','fast-food-pizza'),
		'section' => 'fast_food_pizza_social_icons',
	));

	$wp_customize->add_setting('fast_food_pizza_pinterest_url',array(
		'default' => '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('fast_food_pizza_pinterest_url',array(
		'type' => 'url',
		'label' => __('Add Pinterest URL','fast-food-pizza'),
		'section' => 'fast_food_pizza_social_icons',
	));

	//Slider Section
	$wp_customize->add_section( 'fast_food_pizza_slider_section' , array(
    	'title'      => __( 'Slider Section', 'fast-food-pizza' ),
		'priority'   => null,
		'panel' => 'fast_food_pizza_panel_id'
	) );

	$wp_customize->add_setting('fast_food_pizza_slider_hide',array(
		'default' => false,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_slider_hide',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable slider','fast-food-pizza'),
		'section' => 'fast_food_pizza_slider_section',
	));

	for ( $count = 1; $count <= 4; $count++ ) {
		$wp_customize->add_setting( 'fast_food_pizza_slider_setting' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'fast_food_pizza_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'fast_food_pizza_slider_setting' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'fast-food-pizza' ),
			'description' => __('Slider image size (1400px x 600px)','fast-food-pizza'),
			'section'  => 'fast_food_pizza_slider_section',
			'allow_addition' => true,
			'type'     => 'dropdown-pages'
		) );
	}

	$wp_customize->add_setting('fast_food_pizza_slider_heading',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_slider_heading',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Heading','fast-food-pizza'),
		'section' => 'fast_food_pizza_slider_section'
	));

	$wp_customize->add_setting('fast_food_pizza_slider_text',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_slider_text',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Slider Text','fast-food-pizza'),
		'section' => 'fast_food_pizza_slider_section'
	));

	//content layout
   $wp_customize->add_setting('fast_food_pizza_slider_content_layout',array(
    	'default' => 'Center',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_slider_content_layout',array(
		'type' => 'radio',
		'label' => __('Slider Content Layout','fast-food-pizza'),
		'section' => 'fast_food_pizza_slider_section',
		'choices' => array(
		   'Center' => __('Center','fast-food-pizza'),
		   'Left' => __('Left','fast-food-pizza'),
		   'Right' => __('Right','fast-food-pizza'),
		),
	) );

	//Slider excerpt
	$wp_customize->add_setting( 'fast_food_pizza_slider_excerpt_number', array(
		'default'            => 15,
		'type'               => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'	=> 'sanitize_text_field'
	) );
	$wp_customize->add_control( 'fast_food_pizza_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Content Limit','fast-food-pizza' ),
		'section'     => 'fast_food_pizza_slider_section',
		'type'        => 'number',
		'settings'    => 'fast_food_pizza_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'fast_food_pizza_slider_speed',array(
		'default' => 3000,
		'transport' => 'refresh',
		'type' => 'theme_mod',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_slider_speed',array(
		'label' => esc_html__( 'Slider Slide Speed','fast-food-pizza' ),
		'section' => 'fast_food_pizza_slider_section',
		'input_attrs' => array(
			'min' => 1000,
			'max' => 5000,
			'step' => 500,
		),
	)));

	//Our Services
  	$wp_customize->add_section('fast_food_pizza_product_section',array(
		'title' => __('Products Section','fast-food-pizza'),
		'description' => '',
		'priority'  => null,
		'panel' => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_product_enable',array(
		'default' => false,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_product_enable',array(
		'type' => 'checkbox',
		'label' => __('Enable / Disable Products Section','fast-food-pizza'),
		'section' => 'fast_food_pizza_product_section'
	));

	$wp_customize->add_setting('fast_food_pizza_product_section_title',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_product_section_title',array(
		'type' => 'text',
		'label' => __('Section Title','fast-food-pizza'),
		'section' => 'fast_food_pizza_product_section'
	));

	$args = array(
		'type'         => 'product',
		'child_of'     => 0,
		'parent'       => '',
		'orderby'      => 'term_group',
		'order'        => 'ASC',
		'hide_empty'   => false,
		'hierarchical' => 1,
		'number'       => '',
		'taxonomy'     => 'product_cat',
		'pad_counts'   => false
	);
 	$categories = get_categories( $args );
 	$cats = array();
 	$i = 0;
 	foreach($categories as $category){
     	if($i==0){
         $default = $category->slug;
         $i++;
     	} 
     $cats[$category->slug] = $category->name;
 	}
 	$wp_customize->add_setting('fast_food_pizza_product_category',array(
     	'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
 	));
	$wp_customize->add_control('fast_food_pizza_product_category',array(
		'type'    => 'select',
		'choices' => $cats,
		'label' => __('Select Product Category','fast-food-pizza'),
		'section' => 'fast_food_pizza_product_section',
 	));

	//footer text
	$wp_customize->add_section('fast_food_pizza_footer_section',array(
		'title'	=> __('Footer Text','fast-food-pizza'),
		'panel' => 'fast_food_pizza_panel_id'
	));

	$wp_customize->add_setting('fast_food_pizza_footer_bg_color', array(
		'default'           => '#0d0d0f',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'fast_food_pizza_footer_bg_color', array(
		'label'    => __('Footer Background Color', 'fast-food-pizza'),
		'section'  => 'fast_food_pizza_footer_section',
	)));

	$wp_customize->add_setting('fast_food_pizza_footer_bg_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'fast_food_pizza_footer_bg_image',array(
		'label' => __('Footer Background Image','fast-food-pizza'),
		'section' => 'fast_food_pizza_footer_section'
	)));

	$wp_customize->add_setting('footer_widget_areas',array(
		'default'           => 4,
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	));
	$wp_customize->add_control('footer_widget_areas',array(
		'type'        => 'radio',
		'label'       => __('Footer widget area', 'fast-food-pizza'),
		'section'     => 'fast_food_pizza_footer_section',
		'description' => __('Select the number of widget areas you want in the footer. After that, go to Appearance > Widgets and add your widgets.', 'fast-food-pizza'),
		'choices' => array(
		   '1'     => __('One', 'fast-food-pizza'),
		   '2'     => __('Two', 'fast-food-pizza'),
		   '3'     => __('Three', 'fast-food-pizza'),
		   '4'     => __('Four', 'fast-food-pizza')
		),
	));

	$wp_customize->add_setting('fast_food_pizza_hide_show_scroll',array(
		'default' => true,
		'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
	));
	$wp_customize->add_control('fast_food_pizza_hide_show_scroll',array(
     	'type' => 'checkbox',
      	'label' => __('Enable / Disable Back To Top','fast-food-pizza'),
      	'section' => 'fast_food_pizza_footer_section',
	));

	$wp_customize->add_setting('fast_food_pizza_back_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Fast_Food_Pizza_Icon_Changer(
        $wp_customize,'fast_food_pizza_back_to_top_icon',array(
		'label'	=> __('Back to Top Icon','fast-food-pizza'),
		'transport' => 'refresh',
		'section'	=> 'fast_food_pizza_footer_section',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('fast_food_pizza_scroll_icon_font_size',array(
		'default'=> 22,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_scroll_icon_font_size',array(
		'label'	=> __('Back To Top Icon Font Size','fast-food-pizza'),
		'section'=> 'fast_food_pizza_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting('fast_food_pizza_footer_options',array(
        'default' => 'Right align',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_footer_options',array(
        'type' => 'radio',
        'label' => __('Back To Top Alignment','fast-food-pizza'),
        'section' => 'fast_food_pizza_footer_section',
        'choices' => array(
            'Left align' => __('Left Align','fast-food-pizza'),
            'Right align' => __('Right Align','fast-food-pizza'),
            'Center align' => __('Center Align','fast-food-pizza'),
        ),
	) );

	$wp_customize->add_setting( 'fast_food_pizza_top_bottom_scroll_padding',array(
		'default' => 7,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_top_bottom_scroll_padding',	array(
		'label' => esc_html__( 'Top Bottom Scroll Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_left_right_scroll_padding',array(
		'default' => 17,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_left_right_scroll_padding',	array(
		'label' => esc_html__( 'Left Right Scroll Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_back_to_top_border_radius',array(
		'default' => 50,
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_back_to_top_border_radius', array(
		'label' => esc_html__( 'Back to Top Border Radius (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));
	
	$wp_customize->add_setting('fast_food_pizza_footer_copy',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fast_food_pizza_footer_copy',array(
		'label'	=> __('Copyright Text','fast-food-pizza'),
		'section'	=> 'fast_food_pizza_footer_section',
		'description'	=> __('Add some text for footer like copyright etc.','fast-food-pizza'),
		'type'		=> 'text'
	));

	$wp_customize->add_setting('fast_food_pizza_footer_text_align',array(
        'default' => 'center',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_footer_text_align',array(
        'type' => 'radio',
        'label' => __('Copyright Text Alignment ','fast-food-pizza'),
        'section' => 'fast_food_pizza_footer_section',
        'choices' => array(
            'left' => __('Left Align','fast-food-pizza'),
            'right' => __('Right Align','fast-food-pizza'),
            'center' => __('Center Align','fast-food-pizza'),
        ),
	) );

	$wp_customize->add_setting('fast_food_pizza_copyright_text_font_size',array(
		'default'=> 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_copyright_text_font_size',array(
		'label' => esc_html__( 'Copyright Font Size (px)','fast-food-pizza' ),
		'section'=> 'fast_food_pizza_footer_section',
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_footer_text_padding',array(
		'default' => 20,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_footer_text_padding',	array(
		'label' => esc_html__( 'Copyright Text Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_footer_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	//Responsive Media Settings
	$wp_customize->add_section('fast_food_pizza_responsive_media',array(
		'title'	=> __('Responsive Media','fast-food-pizza'),
		'panel' => 'fast_food_pizza_panel_id',
	));

	$wp_customize->add_setting('fast_food_pizza_display_post_date',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_post_date',array(
       'type' => 'checkbox',
       'label' => __('Display Post Date','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    $wp_customize->add_setting('fast_food_pizza_display_post_author',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_post_author',array(
       'type' => 'checkbox',
       'label' => __('Display Post Author','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    $wp_customize->add_setting('fast_food_pizza_display_post_comment',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_post_comment',array(
       'type' => 'checkbox',
       'label' => __('Display Post Comment','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    $wp_customize->add_setting('fast_food_pizza_display_slider',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_slider',array(
       'type' => 'checkbox',
       'label' => __('Display Slider','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

	$wp_customize->add_setting('fast_food_pizza_display_sidebar',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_sidebar',array(
       'type' => 'checkbox',
       'label' => __('Display Sidebar','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    $wp_customize->add_setting('fast_food_pizza_display_scrolltop',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_scrolltop',array(
       'type' => 'checkbox',
       'label' => __('Display Scroll To Top','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    $wp_customize->add_setting('fast_food_pizza_display_preloader',array(
       'default' => false,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_display_preloader',array(
       'type' => 'checkbox',
       'label' => __('Display Preloader','fast-food-pizza'),
       'section' => 'fast_food_pizza_responsive_media'
    ));

    //404 Page Setting
	$wp_customize->add_section('fast_food_pizza_page_not_found',array(
		'title'	=> __('404 Page Not Found / No Result','fast-food-pizza'),
		'panel' => 'fast_food_pizza_panel_id',
	));	

	$wp_customize->add_setting('fast_food_pizza_page_not_found_heading',array(
		'default'=> __('404 Not Found','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_page_not_found_heading',array(
		'label'	=> __('404 Heading','fast-food-pizza'),
		'section'=> 'fast_food_pizza_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fast_food_pizza_page_not_found_text',array(
		'default'=> __('Looks like you have taken a wrong turn. Dont worry it happens to the best of us.','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_page_not_found_text',array(
		'label'	=> __('404 Content','fast-food-pizza'),
		'section'=> 'fast_food_pizza_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fast_food_pizza_page_not_found_button',array(
		'default'=>  __('Back to Home Page','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_page_not_found_button',array(
		'label'	=> __('404 Button','fast-food-pizza'),
		'section'=> 'fast_food_pizza_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fast_food_pizza_no_search_result_heading',array(
		'default'=> __('Nothing Found','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_no_search_result_heading',array(
		'label'	=> __('No Search Results Heading','fast-food-pizza'),
		'description'=>__('The search page heading display when no results are found.','fast-food-pizza'),
		'section'=> 'fast_food_pizza_page_not_found',
		'type'=> 'text'
	));

	$wp_customize->add_setting('fast_food_pizza_no_search_result_text',array(
		'default'=> __('Sorry, but nothing matched your search terms. Please try again with some different keywords.','fast-food-pizza'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fast_food_pizza_no_search_result_text',array(
		'label'	=> __('No Search Results Text','fast-food-pizza'),
		'description'=>__('The search page text display when no results are found.','fast-food-pizza'),
		'section'=> 'fast_food_pizza_page_not_found',
		'type'=> 'text'
	));

	//Woocommerce Section
	$wp_customize->add_section( 'fast_food_pizza_woocommerce_section' , array(
    	'title'      => __( 'Woocommerce Settings', 'fast-food-pizza' ),
    	'description'=>__('The below settings are apply on woocommerce pages.','fast-food-pizza'),
		'priority'   => null,
		'panel' => 'fast_food_pizza_panel_id'
	) );

	/**
	 * Product Columns
	 */
	$wp_customize->add_setting( 'fast_food_pizza_per_columns' , array(
		'default'           => 3,
		'transport'         => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_choices',
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'fast_food_pizza_per_columns', array(
		'label'    => __( 'Product per columns', 'fast-food-pizza' ),
		'section'  => 'fast_food_pizza_woocommerce_section',
		'type'     => 'select',
		'choices'  => array(
			'2' => '2',
			'3' => '3',
			'4' => '4',
			'5' => '5',
		),
	) ) );

	$wp_customize->add_setting('fast_food_pizza_product_per_page',array(
		'default'	=> 9,
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('fast_food_pizza_product_per_page',array(
		'label'	=> __('Product per page','fast-food-pizza'),
		'section'	=> 'fast_food_pizza_woocommerce_section',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('fast_food_pizza_shop_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_shop_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable shop page sidebar','fast-food-pizza'),
       'section' => 'fast_food_pizza_woocommerce_section',
    ));

    $wp_customize->add_setting('fast_food_pizza_product_page_sidebar_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_product_page_sidebar_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable product page sidebar','fast-food-pizza'),
       'section' => 'fast_food_pizza_woocommerce_section',
    ));

    $wp_customize->add_setting('fast_food_pizza_related_product_enable',array(
       'default' => true,
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
    ));
    $wp_customize->add_control('fast_food_pizza_related_product_enable',array(
       'type' => 'checkbox',
       'label' => __('Enable / Disable Related product','fast-food-pizza'),
       'section' => 'fast_food_pizza_woocommerce_section',
    ));

    $wp_customize->add_setting( 'fast_food_pizza_woo_product_sale_border_radius',array(
		'default' => 0,
		'sanitize_callback' => 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woo_product_sale_border_radius', array(
        'label'  => __('Woocommerce Product Sale Border Radius','fast-food-pizza'),
        'section'  => 'fast_food_pizza_woocommerce_section',
        'type'        => 'number',
        'input_attrs' => array(
        	'step'=> 1,
            'min' => 0,
            'max' => 50,
        )
    )));

    $wp_customize->add_setting('fast_food_pizza_wooproduct_sale_font_size',array(
		'default'=> 14,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_wooproduct_sale_font_size',array(
		'label'	=> __('Woocommerce Product Sale Font Size','fast-food-pizza'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'fast_food_pizza_woocommerce_section',
	)));

    $wp_customize->add_setting('fast_food_pizza_woo_product_sale_top_bottom_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woo_product_sale_top_bottom_padding',array(
		'label'	=> __('Woocommerce Product Sale Top Bottom Padding ','fast-food-pizza'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'fast_food_pizza_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('fast_food_pizza_woo_product_sale_left_right_padding',array(
		'default'=> 0,
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woo_product_sale_left_right_padding',array(
		'label'	=> __('Woocommerce Product Sale Left Right Padding','fast-food-pizza'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'fast_food_pizza_woocommerce_section',
		'type'=> 'number'
	)));

	$wp_customize->add_setting('fast_food_pizza_woo_product_sale_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'fast_food_pizza_sanitize_choices'
	));
	$wp_customize->add_control('fast_food_pizza_woo_product_sale_position',array(
        'type' => 'select',
        'label' => __('Woocommerce Product Sale Position','fast-food-pizza'),
        'section' => 'fast_food_pizza_woocommerce_section',
        'choices' => array(
            'Right' => __('Right','fast-food-pizza'),
            'Left' => __('Left','fast-food-pizza'),
        ),
	));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_button_padding_top',array(
		'default' => 12,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_button_padding_top',	array(
		'label' => esc_html__( 'Button Top Bottom Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_button_padding_right',array(
		'default' => 15,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_button_padding_right',	array(
		'label' => esc_html__( 'Button Right Left Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_button_border_radius',array(
		'default' => 5,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_button_border_radius',array(
		'label' => esc_html__( 'Button Border Radius (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

   $wp_customize->add_setting('fast_food_pizza_woocommerce_product_border_enable',array(
      'default' => true,
      'sanitize_callback'	=> 'fast_food_pizza_sanitize_checkbox'
   ));
   $wp_customize->add_control('fast_food_pizza_woocommerce_product_border_enable',array(
      'type' => 'checkbox',
      'label' => __('Enable / Disable product border','fast-food-pizza'),
      'section' => 'fast_food_pizza_woocommerce_section',
   ));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_product_padding_top',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_product_padding_top',	array(
		'label' => esc_html__( 'Product Top Bottom Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_product_padding_right',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_product_padding_right',	array(
		'label' => esc_html__( 'Product Right Left Padding (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_product_border_radius',array(
		'default' => 3,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_product_border_radius',array(
		'label' => esc_html__( 'Product Border Radius (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting( 'fast_food_pizza_woocommerce_product_box_shadow',array(
		'default' => 0,
		'transport' => 'refresh',
		'sanitize_callback' => 'fast_food_pizza_sanitize_integer'
	));
	$wp_customize->add_control( new Fast_Food_Pizza_Custom_Control( $wp_customize, 'fast_food_pizza_woocommerce_product_box_shadow',array(
		'label' => esc_html__( 'Product Box Shadow (px)','fast-food-pizza' ),
		'section' => 'fast_food_pizza_woocommerce_section',
		'input_attrs' => array(
			'min' => 0,
			'max' => 50,
			'step' => 1,
		),
	)));

	$wp_customize->add_setting('fast_food_pizza_wooproducts_nav',array(
       'default' => 'Yes',
       'sanitize_callback'	=> 'fast_food_pizza_sanitize_choices'
    ));
    $wp_customize->add_control('fast_food_pizza_wooproducts_nav',array(
       'type' => 'select',
       'label' => __('Shop Page Products Navigation','fast-food-pizza'),
       'choices' => array(
            'Yes' => __('Yes','fast-food-pizza'),
            'No' => __('No','fast-food-pizza'),
        ),
       'section' => 'fast_food_pizza_woocommerce_section',
    ));
	
}
add_action( 'customize_register', 'fast_food_pizza_customize_register' );	

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Fast_Food_Pizza_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Fast_Food_Pizza_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Fast_Food_Pizza_Customize_Section_Pro(
				$manager,
				'fast_food_pizza_example_1',
				array(
					'title'   =>  esc_html__( 'Fast Food Pizza Pro', 'fast-food-pizza' ),
					'pro_text' => esc_html__( 'Go Pro', 'fast-food-pizza' ),
					'pro_url'  => esc_url( 'https://www.buywptemplates.com/themes/fast-food-wordpress-theme/' ),
					'priority'   => 9
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'fast-food-pizza-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'fast-food-pizza-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/css/customize-controls.css' );
	}

	//Footer widget areas
	function fast_food_pizza_sanitize_choices( $input ) {
	    $valid = array(
	        '1'     => __('One', 'fast-food-pizza'),
	        '2'     => __('Two', 'fast-food-pizza'),
	        '3'     => __('Three', 'fast-food-pizza'),
	        '4'     => __('Four', 'fast-food-pizza')
	    );
	    if ( array_key_exists( $input, $valid ) ) {
	        return $input;
	    } else {
	        return '';
	    }
	}
}

// Doing this customizer thang!
Fast_Food_Pizza_Customize::get_instance();
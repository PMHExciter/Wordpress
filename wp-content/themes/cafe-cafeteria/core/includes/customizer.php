<?php

if ( class_exists("Kirki")){

	// LOGO

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'cafe_cafeteria_logo_resizer',
		'label'       => esc_html__( 'Adjust Your Logo Size ', 'cafe-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => 70,
		'choices'     => [
			'min'  => 10,
			'max'  => 300,
			'step' => 10,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_logo_text',
		'section'     => 'title_tagline',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Site Title and Tagline', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_display_header_title',
		'label'       => esc_html__( 'Site Title Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_display_header_text',
		'label'       => esc_html__( 'Tagline Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'title_tagline',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	// FONT STYLE TYPOGRAPHY

	Kirki::add_panel( 'cafe_cafeteria_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Typography', 'cafe-cafeteria' ),
	) ); 

	Kirki::add_section( 'cafe_cafeteria_font_style_section', array(
		'title'      => esc_attr__( 'Typography Option',  'cafe-cafeteria' ),
		'priority'   => 2,
		'capability' => 'edit_theme_options',
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_all_headings_typography',
		'section'     => 'cafe_cafeteria_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading Of All Sections',  'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'cafe_cafeteria_all_headings_typography',
		'label'       => esc_attr__( 'Heading Typography',  'cafe-cafeteria' ),
		'description' => esc_attr__( 'Select the typography options for your heading.',  'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'h1','h2','h3','h4','h5','h6', ),
			),
		),
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_body_content_typography',
		'section'     => 'cafe_cafeteria_font_style_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Body Content',  'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'global', array(
		'type'        => 'typography',
		'settings'    => 'cafe_cafeteria_body_content_typography',
		'label'       => esc_attr__( 'Content Typography',  'cafe-cafeteria' ),
		'description' => esc_attr__( 'Select the typography options for your content.',  'cafe-cafeteria' ),		
		'section'     => 'cafe_cafeteria_font_style_section',
		'priority'    => 10,
		'default'     => array(
			'font-family'    => '',
			'variant'        => '',
		),
		'output' => array(
			array(
				'element' => array( 'body', ),
			),
		),
	) );

	// PANEL

	Kirki::add_panel( 'cafe_cafeteria_panel_id', array(
	    'priority'    => 10,
	    'title'       => esc_html__( 'Theme Options', 'cafe-cafeteria' ),
	) );

	// Scroll Top

	Kirki::add_section( 'cafe_cafeteria_section_scroll', array(
	    'title'          => esc_html__( 'Additional Settings', 'cafe-cafeteria' ),
	    'description'    => esc_html__( 'Scroll To Top', 'cafe-cafeteria' ),
	    'panel'          => 'cafe_cafeteria_panel_id',
	    'priority'       => 10,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'toggle',
		'settings'    => 'cafe_cafeteria_scroll_enable_setting',
		'label'       => esc_html__( 'Here you can enable or disable your scroller.', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_scroll',
		'default'     => '1',
		'priority'    => 10,
	] );

	// COLOR SECTION

	Kirki::add_section( 'cafe_cafeteria_section_color', array(
	    'title'          => esc_html__( 'Global Color', 'cafe-cafeteria' ),
	    'description'    => esc_html__( 'Theme Color Settings', 'cafe-cafeteria' ),
	    'panel'          => 'cafe_cafeteria_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_global_colors',
		'section'     => 'cafe_cafeteria_section_color',
		'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Here you can change your theme color on one click.', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'cafe_cafeteria_global_color',
		'label'       => __( 'choose your Appropriate Color', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_color',
		'default'     => '#dfb581',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'color',
		'settings'    => 'cafe_cafeteria_global_color_2',
		'label'       => __( 'Choose Your Second Color', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_color',
		'default'     => '#723626',
	] );

	// POST SECTION

	Kirki::add_section( 'cafe_cafeteria_section_post', array(
	    'title'          => esc_html__( 'Post Settings', 'cafe-cafeteria' ),
	    'description'    => esc_html__( 'Here you can get different post settings', 'cafe-cafeteria' ),
	    'panel'          => 'cafe_cafeteria_panel_id',
	    'priority'       => 160,
	) );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_post_heading',
		'section'     => 'cafe_cafeteria_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Post Settings.', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_blog_date_enable',
		'label'       => esc_html__( 'Post Date Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_blog_admin_enable',
		'label'       => esc_html__( 'Post Author Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_blog_comment_enable',
		'label'       => esc_html__( 'Post Comment Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_post',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_post_excerpt_heading',
		'section'     => 'cafe_cafeteria_section_post',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text.', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'cafe_cafeteria_post_excerpt_number',
		'label'       => esc_html__( 'Post Content Range', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_post',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

	// HEADER SECTION

	Kirki::add_section( 'cafe_cafeteria_section_header', array(
	    'title'          => esc_html__( 'Header Settings', 'cafe-cafeteria' ),
	    'description'    => esc_html__( 'Here you can add different type of social icons.', 'cafe-cafeteria' ),
	    'panel'          => 'cafe_cafeteria_panel_id',
	    'priority'       => 160,
	) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_socail_link',
		'section'     => 'cafe_cafeteria_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Social Media Link', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'repeater',
		'section'     => 'cafe_cafeteria_section_header',
		'priority'    => 10,
		'row_label' => [
			'type'  => 'field',
			'value' => esc_html__( 'Social Icon', 'cafe-cafeteria' ),
			'field' => 'link_text',
		],
		'button_label' => esc_html__('Add New Social Icon', 'cafe-cafeteria' ),
		'settings'     => 'cafe_cafeteria_social_links_settings',
		'default'      => '',
		'fields' 	   => [
			'link_text' => [
				'type'        => 'text',
				'label'       => esc_html__( 'Icon', 'cafe-cafeteria' ),
				'description' => esc_html__( 'Add the fontawesome class ex: "fab fa-facebook-f".', 'cafe-cafeteria' ),
				'default'     => '',
			],
			'link_url' => [
				'type'        => 'url',
				'label'       => esc_html__( 'Social Link', 'cafe-cafeteria' ),
				'description' => esc_html__( 'Add the social icon url here.', 'cafe-cafeteria' ),
				'default'     => '',
			],
		],
		'choices' => [
			'limit' => 5
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_button1_text',
		'section'     => 'cafe_cafeteria_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button 1 Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => __( 'Add Text', 'cafe-cafeteria' ),
		'settings' => 'cafe_cafeteria_register_text',
		'section'  => 'cafe_cafeteria_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'    => __( 'Add Link', 'cafe-cafeteria' ),
		'settings' => 'cafe_cafeteria_register_link',
		'section'  => 'cafe_cafeteria_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_button2_text',
		'section'     => 'cafe_cafeteria_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Button 2 Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'label'    => __( 'Add Text', 'cafe-cafeteria' ),
		'settings' => 'cafe_cafeteria_login_text',
		'section'  => 'cafe_cafeteria_section_header',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'link',
		'label'    => __( 'Add Link', 'cafe-cafeteria' ),
		'settings' => 'cafe_cafeteria_login_link',
		'section'  => 'cafe_cafeteria_section_header',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_search',
		'section'     => 'cafe_cafeteria_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Search Box', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_search_box_enable',
		'label'       => esc_html__( 'Search Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_cart',
		'section'     => 'cafe_cafeteria_section_header',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Cart', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_cart_box_enable',
		'label'       => esc_html__( 'Cart Enable / Disable Button', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_section_header',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	// SLIDER SECTION

	Kirki::add_section( 'cafe_cafeteria_blog_slide_section', array(
        'title'          => esc_html__( ' Slider Settings', 'cafe-cafeteria' ),
        'description'    => esc_html__( 'You have to select post category to show slider.', 'cafe-cafeteria' ),
        'panel'          => 'cafe_cafeteria_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_enable_heading',
		'section'     => 'cafe_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Slider', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_blog_box_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_slide_title_enable_disable',
		'label'       => esc_html__( 'Slide Title Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	 Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_slide_text_enable_disable',
		'label'       => esc_html__( 'Slide Text Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	  Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_slide_btn_enable_disable',
		'label'       => esc_html__( 'Slider Button Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_slider_heading',
		'section'     => 'cafe_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'number',
		'settings'    => 'cafe_cafeteria_blog_slide_number',
		'label'       => esc_html__( 'Number of slides to show', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 80,
			'step' => 1,
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'select',
		'settings'    => 'cafe_cafeteria_blog_slide_category',
		'label'       => esc_html__( 'Select the category to show slider ( Image Dimension 1600 x 600 )', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => '',
		'placeholder' => esc_html__( 'Select an category...', 'cafe-cafeteria' ),
		'priority'    => 10,
		'choices'     => cafe_cafeteria_get_categories_select(),
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_excerpt_number',
		'section'     => 'cafe_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'cafe_cafeteria_slide_excerpt_number',
		'label'       => esc_html__( 'Slide Content Range', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_blog_slide_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_slider_button_heading',
		'section'     => 'cafe_cafeteria_blog_slide_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Slider Button Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cafe_cafeteria_slider_button_text',
		'section'  => 'cafe_cafeteria_blog_slide_section',
		'default'  => 'Shop Now',
		'priority' => 10,
	] );


	// OUR STORY SECTION

	Kirki::add_section( 'cafe_cafeteria_our_story_section', array(
        'title'          => esc_html__( 'Our Story Settings', 'cafe-cafeteria' ),
        'description'    => esc_html__( 'You have to select page to show our story section.', 'cafe-cafeteria' ),
        'panel'          => 'cafe_cafeteria_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_services_enable_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Our Story Section', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_our_story_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_our_story_section',
		'default'     => '0',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_section_title_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Secton Title', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cafe_cafeteria_our_story_section_title',
		'section'  => 'cafe_cafeteria_our_story_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_image1_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Image 1', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'image',
		'settings'    => 'cafe_cafeteria_our_story_image1',
		'section'     => 'cafe_cafeteria_our_story_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_image2_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Image 2', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'image',
		'settings'    => 'cafe_cafeteria_our_story_image2',
		'section'     => 'cafe_cafeteria_our_story_section',
		'default'     => '',
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_text_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Heading', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cafe_cafeteria_our_story_heading_text',
		'section'  => 'cafe_cafeteria_our_story_section',
		'default'  => '',
		'priority' => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_page_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Page Dropdown', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'dropdown-pages',
		'settings'    => 'cafe_cafeteria_our_story',
		'section'     => 'cafe_cafeteria_our_story_section',
		'default'     => 42,
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_our_story_xcerpt_heading',
		'section'     => 'cafe_cafeteria_our_story_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Number Of Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

	Kirki::add_field( 'theme_config_id', [
		'type'        => 'slider',
		'settings'    => 'cafe_cafeteria_story_excerpt_number',
		'label'       => esc_html__( 'About Us Content Range', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_our_story_section',
		'default'     => 15,
		'choices'     => [
			'min'  => 0,
			'max'  => 100,
			'step' => 1,
		],
	] );
	
	// FOOTER SECTION

	Kirki::add_section( 'cafe_cafeteria_footer_section', array(
        'title'          => esc_html__( 'Footer Settings', 'cafe-cafeteria' ),
        'description'    => esc_html__( 'Here you can change copyright text', 'cafe-cafeteria' ),
        'panel'          => 'cafe_cafeteria_panel_id',
        'priority'       => 160,
    ) );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_footer_text_heading',
		'section'     => 'cafe_cafeteria_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Footer Copyright Text', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'     => 'text',
		'settings' => 'cafe_cafeteria_footer_text',
		'section'  => 'cafe_cafeteria_footer_section',
		'default'  => '',
		'priority' => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'custom',
		'settings'    => 'cafe_cafeteria_footer_enable_heading',
		'section'     => 'cafe_cafeteria_footer_section',
			'default'         => '<h3 style="color: #2271b1; padding:10px; background:#fff; margin:0; border-left: solid 5px #2271b1; ">' . __( 'Enable / Disable Footer Link', 'cafe-cafeteria' ) . '</h3>',
		'priority'    => 10,
	] );

    Kirki::add_field( 'theme_config_id', [
		'type'        => 'switch',
		'settings'    => 'cafe_cafeteria_copyright_enable',
		'label'       => esc_html__( 'Section Enable / Disable', 'cafe-cafeteria' ),
		'section'     => 'cafe_cafeteria_footer_section',
		'default'     => '1',
		'priority'    => 10,
		'choices'     => [
			'on'  => esc_html__( 'Enable', 'cafe-cafeteria' ),
			'off' => esc_html__( 'Disable', 'cafe-cafeteria' ),
		],
	] );	
}
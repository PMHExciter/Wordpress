<?php
/**
 * Hill Sine functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Hill_Sine
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', '1.0.0' );
}

function hill_sine_setup() {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'title-tag' );

	add_theme_support( 'post-thumbnails' );

	register_nav_menus(
		array(
			'menu-1' => esc_html__( 'Primary', 'hill-sine' ),
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'hill_sine_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'hill_sine_setup' );

function hill_sine_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'hill_sine_content_width', 640 );
}
add_action( 'after_setup_theme', 'hill_sine_content_width', 0 );

function hill_sine_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'hill-sine' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'hill-sine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer1', 'hill-sine' ),
			'id'            => 'footer-1',
			'description'   => esc_html__( 'Add widgets here.', 'hill-sine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer2', 'hill-sine' ),
			'id'            => 'footer-2',
			'description'   => esc_html__( 'Add widgets here.', 'hill-sine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer3', 'hill-sine' ),
			'id'            => 'footer-3',
			'description'   => esc_html__( 'Add widgets here.', 'hill-sine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer4', 'hill-sine' ),
			'id'            => 'footer-4',
			'description'   => esc_html__( 'Add widgets here.', 'hill-sine' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'hill_sine_widgets_init' );

function hill_sine_scripts() {
	wp_enqueue_style( 'hill-sine-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'hill-sine-style', 'rtl', 'replace' );

	wp_enqueue_script( 'hill-sine-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_style( 'hill-sine-default-style', esc_url(get_template_directory_uri()).'/assets/css/default-style.css' , array(), _S_VERSION );
	wp_enqueue_style( 'hill-sine-theme-style', esc_url(get_template_directory_uri()).'/assets/css/theme-style.css' , array(), _S_VERSION );
	wp_enqueue_style( 'hill-sine-fontawesome-css', esc_url(get_template_directory_uri()).'/assets/fontawesome/css/font-awesome.css' , array(), _S_VERSION );
}
add_action( 'wp_enqueue_scripts', 'hill_sine_scripts' );
require get_template_directory() . '/inc/admin-comman.php';
require get_template_directory() . '/inc/comman.php';
require get_template_directory() . '/inc/global.php';
require get_template_directory() . '/inc/custom-header.php';
require get_template_directory() . '/inc/template-tags.php';
require get_template_directory() . '/inc/template-functions.php';
require get_template_directory() . '/inc/customizer.php';
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'hill_sine_register_required_plugins' );

function hill_sine_register_required_plugins() {
	
	$plugins = array(   
        array(
            'name' => esc_html__('Hill Extension','hill-sine'),
            'slug' => 'hill-extension',
            'required' => false,
        ),
        array(
            'name' => esc_html__('WooCommerce','hill-sine'),
            'slug' => 'woocommerce',
            'required' => false,
        ),
    );

	
	$config = array(
		'id'           => 'hill-sine',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.

	);

	tgmpa( $plugins, $config );
}
require get_template_directory() . '/inc/front-action.php';

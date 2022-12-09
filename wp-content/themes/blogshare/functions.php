<?php
/**
 * BlogShare functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blogshare
 */

if ( ! function_exists( 'blogshare_setup' ) ) :

function blogshare_setup() {

	load_theme_textdomain( 'blogshare', get_template_directory() . '/languages' );

	add_theme_support( "wp-block-styles" );
	add_theme_support( "responsive-embeds" );
	add_theme_support( "align-wide" );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	// Add theme support for Custom Logo.
	// Custom logo.
	$logo_width  = 300;
	$logo_height = 90;

	// If the retina setting is active, double the recommended width and height.
	if ( get_theme_mod( 'retina_logo', false ) ) {
		$logo_width  = floor( $logo_width * 2 );
		$logo_height = floor( $logo_height * 2 );
	}

	$args = array(
		'height'      => $logo_height,
		'width'       => $logo_width,
		'flex-height' => true,
		'flex-width'  => true,
	);

	add_theme_support('custom-logo', $args);

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary Menu', 'blogshare' ),	
		'left' => esc_html__( 'Left Menu', 'blogshare' ),				
		'footer' => esc_html__( 'Footer Menu', 'blogshare' ),	
		'mobile' => esc_html__( 'Mobile Menu', 'blogshare' ),						
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'blogshare_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );

	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	$editor_stylesheet_path = './assets/css/editor-style.css';

	// Enqueue editor styles.
	add_editor_style( $editor_stylesheet_path );  

}
endif;

add_action( 'after_setup_theme', 'blogshare_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
// Set content-width.
global $content_width;

if ( ! isset( $content_width ) ) {
	$content_width = 858;
}

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blogshare_sidebar_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'blogshare' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here.', 'blogshare' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'blogshare' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'blogshare' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Home Right Sidebar', 'blogshare' ),
		'id'            => 'home-sidebar',
		'description'   => esc_html__( 'Add widgets here.', 'blogshare' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Columns', 'blogshare' ),
		'id'            => 'footer',
		'description'   => esc_html__( '4 Columns widget area.', 'blogshare' ),
		'before_widget' => '<div id="%1$s" class="widget footer-widget footer-column ht_grid_1_4 %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );		

}
add_action( 'widgets_init', 'blogshare_sidebar_init' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * SVG Icons.
 */
require get_template_directory() . '/inc/classes/class-blogshare-svg-icons.php';

/**
 * Menu Walker.
 */
require get_template_directory() . '/inc/classes/class-blogshare-walker-page.php';

// Block Patterns.
require get_template_directory() . '/inc/block-patterns.php';

// Block Styles.
require get_template_directory() . '/inc/block-styles.php';

/**
 * Load about page.
 */
require get_template_directory() . '/inc/about.php';

/**
 * Enqueues scripts and styles.
 */
function blogshare_scripts() {

    // load jquery if it isn't

    wp_enqueue_script('jquery');

	//  Enqueues Javascripts
	wp_enqueue_script( 'superfish', get_template_directory_uri() . '/assets/js/superfish.js', array(), '', true );
	wp_enqueue_script( 'html5', get_template_directory_uri() . '/assets/js/html5.js', array(), '', true );

	wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/assets/js/owl.carousel.js', array(), '', true ); 
    wp_enqueue_script( 'tabslet', get_template_directory_uri() . '/assets/js/jquery.tabslet.js', array(), '20220401', true );	           		
	wp_enqueue_script( 'theia-sticky-sidebar', get_template_directory_uri() . '/assets/js/theia-sticky-sidebar.js', array(), '', true );                                          		
    wp_enqueue_script( 'blogshare-index', get_template_directory_uri() . '/assets/js/index.js', array(), '20220520', true );                                       	
	wp_enqueue_script( 'blogshare-custom', get_template_directory_uri() . '/assets/js/jquery.custom.js', array(), '20220520', true );	

    // Enqueues CSS styles
    wp_enqueue_style( 'blogshare-googlefonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap', array(), null );    
    wp_enqueue_style( 'blogshare-style', get_stylesheet_uri(), array(), '20220520' );   
	wp_enqueue_style( 'blogshare-responsive-style',   get_template_directory_uri() . '/responsive.css', array(), '20220520' );       
	wp_enqueue_style( 'font-awesome-style',   get_template_directory_uri() . '/assets/css/font-awesome.css', array(), '20220520' );       	
    wp_enqueue_style( 'genericons-style',   get_template_directory_uri() . '/genericons/genericons.css' );
	
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }    
}
add_action( 'wp_enqueue_scripts', 'blogshare_scripts' );

/**
 * Post Thumbnails.
 */
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 300, 300, true ); // default Post Thumbnail dimensions (cropped)
    add_image_size( 'blogshare_featured_thumb', 660, 330, true );
    add_image_size( 'blogshare_featured_grid_thumb', 600, 360, true );            
    add_image_size( 'blogshare_widget_thumb', 300, 150, true );     
    
}

/**
 * Registers custom widgets.
 */
function blogshare_widgets_init() {

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-recent.php';
    register_widget( 'BlogShare_Recent_Widget' );     

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-most-commented.php';
    register_widget( 'BlogShare_Most_Commented_Widget' );        

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-category-posts.php';
    register_widget( 'BlogShare_Category_Posts_Widget' );   

    require trailingslashit( get_template_directory() ) . 'inc/widgets/widget-tabs.php';
    register_widget( 'BlogShare_Tabs_Widget' ); 
    																
}
add_action( 'widgets_init', 'blogshare_widgets_init' );

// Disable WordPress 5.5+ Lazy Load
add_filter( 'wp_lazy_loading_enabled', '__return_false' );

// Disables the block editor from managing widgets in the Gutenberg plugin.
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );

// Disables the block editor from managing widgets.
add_filter( 'use_widgets_block_editor', '__return_false' );

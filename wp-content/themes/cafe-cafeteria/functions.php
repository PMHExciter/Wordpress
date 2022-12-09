<?php

/*-----------------------------------------------------------------------------------*/
/* Enqueue script and styles */
/*-----------------------------------------------------------------------------------*/

function cafe_cafeteria_google_fonts() {
    wp_enqueue_style( 'cafe-cafeteria-google-fonts-great-vibes', 'https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap', false );
    wp_enqueue_style( 'cafe-cafeteria-google-fonts-lora', 'https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap', false );
}
add_action( 'wp_enqueue_scripts', 'cafe_cafeteria_google_fonts' );


if (!function_exists('cafe_cafeteria_enqueue_scripts')) {

	function cafe_cafeteria_enqueue_scripts() {

		wp_enqueue_style(
			'bootstrap-css',
			esc_url( get_template_directory_uri() ) . '/css/bootstrap.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'fontawesome-css',
			esc_url( get_template_directory_uri() ) . '/css/fontawesome-all.css',
			array(),'4.5.0'
		);

		wp_enqueue_style(
			'owl.carousel-css',
			esc_url( get_template_directory_uri() ) . '/css/owl.carousel.css',
			array(),'2.3.4'
		);

		wp_enqueue_style('cafe-cafeteria-style', get_stylesheet_uri(), array() );

		wp_style_add_data('cafe-cafeteria-style', 'rtl', 'replace');

		wp_enqueue_style(
			'cafe-cafeteria-media-css',
			esc_url( get_template_directory_uri() ) . '/css/media.css',
			array(),'2.3.4'
		);

		wp_enqueue_style(
			'cafe-cafeteria-woocommerce-css',
			esc_url( get_template_directory_uri() ) . '/css/woocommerce.css',
			array(),'2.3.4'
		);

		wp_enqueue_script(
			'cafe-cafeteria-navigation',
			esc_url( get_template_directory_uri() ) . '/js/navigation.js',
			FALSE,
			'1.0',
			TRUE
		);

		wp_enqueue_script(
			'owl.carousel-js',
			esc_url( get_template_directory_uri() ) . '/js/owl.carousel.js',
			array('jquery'),
			'2.3.4',
			TRUE
		);

		wp_enqueue_script(
			'cafe-cafeteria-script',
			esc_url( get_template_directory_uri() ) . '/js/script.js',
			array('jquery'),
			'1.0',
			TRUE
		);

		if ( is_singular() ) wp_enqueue_script( 'comment-reply' );

		$css = '';

		if ( get_header_image() ) :

			$css .=  '
				header.header {
					background-image: url('.esc_url(get_header_image()).');
					-webkit-background-size: cover !important;
					-moz-background-size: cover !important;
					-o-background-size: cover !important;
					background-size: cover !important;
				}';

		endif;

		wp_add_inline_style( 'cafe-cafeteria-style', $css );

	}

	add_action( 'wp_enqueue_scripts', 'cafe_cafeteria_enqueue_scripts' );

}

/*-----------------------------------------------------------------------------------*/
/* Setup theme */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('cafe_cafeteria_after_setup_theme')) {

	function cafe_cafeteria_after_setup_theme() {

		if ( ! isset( $content_width ) ) $content_width = 900;

		register_nav_menus( array(
			'main-menu' => esc_html__( 'Main menu', 'cafe-cafeteria' ),
		));

		add_theme_support( 'align-wide' );
		add_theme_support( 'woocommerce' );
		add_theme_support('title-tag');
		add_theme_support('automatic-feed-links');
		add_theme_support('post-thumbnails');
		add_theme_support( "responsive-embeds" );
		add_theme_support( 'wp-block-styles' );
		add_theme_support( 'custom-background', array(
		  'default-color' => 'ffffff'
		));

		add_theme_support( 'custom-logo', array(
			'height'      => 70,
			'width'       => 70,
		) );

		add_theme_support( 'custom-header', array(
			'width' => 1920,
			'height' => 100
		));

		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		add_editor_style( array( '/css/editor-style.css' ) );
	}

	add_action( 'after_setup_theme', 'cafe_cafeteria_after_setup_theme', 999 );

}

require get_template_directory() .'/core/includes/main.php';
require get_template_directory() .'/core/includes/tgm.php';
require get_template_directory() . '/core/includes/customizer.php';
load_template( trailingslashit( get_template_directory() ) . '/core/includes/class-upgrade-pro.php' );

/**------------------------------------------------------------------------------------------
 * Enqueue theme logo style.
 */
function cafe_cafeteria_logo_resizer() {

    $theme_logo_size_css = '';
    $cafe_cafeteria_logo_resizer = get_theme_mod('cafe_cafeteria_logo_resizer');

	$theme_logo_size_css = '
		.custom-logo{
			height: '.esc_attr($cafe_cafeteria_logo_resizer).'px !important;
			width: '.esc_attr($cafe_cafeteria_logo_resizer).'px !important;
		}
	';
    wp_add_inline_style( 'cafe-cafeteria-style',$theme_logo_size_css );	

}
add_action( 'wp_enqueue_scripts', 'cafe_cafeteria_logo_resizer' );

/*-----------------------------------------------------------------------------------*/
/* Enqueue Global color style */
/*-----------------------------------------------------------------------------------*/
function cafe_cafeteria_global_color() {

    $theme_color_css = '';
    $cafe_cafeteria_global_color = get_theme_mod('cafe_cafeteria_global_color');
    $cafe_cafeteria_global_color_2 = get_theme_mod('cafe_cafeteria_global_color_2');

	$theme_color_css = '
		#main-menu ul.children li a:hover,#main-menu ul.sub-menu li a:hover,p.slider_btn a:hover,.pagination .nav-links a:hover,.pagination .nav-links a:focus,.pagination .nav-links span.current,.cafe-cafeteria-pagination span.current,.cafe-cafeteria-pagination span.current:hover,.cafe-cafeteria-pagination span.current:focus,.cafe-cafeteria-pagination a span:hover,.cafe-cafeteria-pagination a span:focus,.comment-respond input#submi,.comment-reply a,.sidebar-area .tagcloud a:hover,.searchform input[type=submit],.searchform input[type=submit]:hover ,.searchform input[type=submit]:focus,.comment-respond input#submit,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce a.added_to_cart,nav.woocommerce-MyAccount-navigation ul li,.wp-block-search .wp-block-search__button:hover,.menu-toggle,.scroll-up a,p.slider_btn a:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale{
			background: '.esc_attr($cafe_cafeteria_global_color).';
		}
		scroll-up a:hover,.blog_inner_box h3.post-title a, #main-menu ul li.current-menu-item > a, #main-menu ul li.current_page_item > a,#main-menu a:hover, #main-menu ul li a:hover,.inner-box span {
			color: '.esc_attr($cafe_cafeteria_global_color).';
		}
		.content_inner_box hr,.call-us i,.slider .owl-carousel button.owl-dot.active,#courses hr,#checkout-payment #checkout-order-action button,.learnpress-page .lp-button,.learnpress-page #lp-button,p.slider_btn a {
			border-color: '.esc_attr($cafe_cafeteria_global_color).';
		}
		a.cart-customlocation p.cart-item-box,.tab-product span.onsale,.box-content a.button:hover,.box .box-content,.scroll-up a:hover,nav.woocommerce-MyAccount-navigation ul li:hover,.woocommerce ul.products li.product .onsale, .woocommerce span.onsale,.comment-respond input#submit:hover, .comment-reply a:hover,a.shop-btn,.woocommerce .cart .button:hover,.woocommerce a.button.alt:hover,a.shop-btn:hover,.woocommerce button.button.alt:hover,.woocommerce a.added_to_cart:hover,.comment-respond input#submit:hover,.woocommerce #respond input#submit:.woocommerce #respond input#submit:hover,.woocommerce #respond input#submit:hover,.woocommerce button.button.alt:hover,.woocommerce a.button:hover,.woocommerce a.added_to_cart:hover {
			background-color: '.esc_attr($cafe_cafeteria_global_color_2).';
		}
		.woocommerce a.button:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce a.added_to_cart:hover,.comment-respond input#submit:hover,.scroll-up a:hover,nav.woocommerce-MyAccount-navigation ul li:hover {
			background-color: '.esc_attr($cafe_cafeteria_global_color_2).'!important;
		}
		 a:hover,.inner-box h4 a,.logo a:hover,.post-meta i,.sidebar-area h4.title,.woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price{
			color: '.esc_attr($cafe_cafeteria_global_color_2).';
		}
		h3.text-center.mb-4 {
			color: '.esc_attr($cafe_cafeteria_global_color_2).'!important;
		}
		.slider .owl-carousel button.owl-dot.active,.sidebar-area h4.title  {
			border-color: '.esc_attr($cafe_cafeteria_global_color_2).';
		}
		@media screen and (min-width: 320px) and (max-width: 767px)
		.page-template-frontpage #site-navigation {
				background: '.esc_attr($cafe_cafeteria_global_color_2).' !important;
		}
	';
    wp_add_inline_style( 'cafe-cafeteria-style',$theme_color_css );
    wp_add_inline_style( 'cafe-cafeteria-woocommerce-css',$theme_color_css );
}
add_action( 'wp_enqueue_scripts', 'cafe_cafeteria_global_color' );

/*-----------------------------------------------------------------------------------*/
/* Get post comments */
/*-----------------------------------------------------------------------------------*/

if (!function_exists('cafe_cafeteria_comment')) :
    /**
     * Template for comments and pingbacks.
     *
     * Used as a callback by wp_list_comments() for displaying the comments.
     */
    function cafe_cafeteria_comment($comment, $args, $depth){

        if ('pingback' == $comment->comment_type || 'trackback' == $comment->comment_type) : ?>

            <li id="comment-<?php comment_ID(); ?>" <?php comment_class('media'); ?>>
            <div class="comment-body">
                <?php esc_html_e('Pingback:', 'cafe-cafeteria'); 
                comment_author_link(); ?><?php edit_comment_link(__('Edit', 'cafe-cafeteria'), '<span class="edit-link">', '</span>'); ?>
            </div>

        <?php else : ?>

        <li id="comment-<?php comment_ID(); ?>" <?php comment_class(empty($args['has_children']) ? '' : 'parent'); ?>>
            <article id="div-comment-<?php comment_ID(); ?>" class="comment-body media mb-4">
                <a class="pull-left" href="#">
                    <?php if (0 != $args['avatar_size']) echo get_avatar($comment, $args['avatar_size']); ?>
                </a>
                <div class="media-body">
                    <div class="media-body-wrap card">
                        <div class="card-header">
                            <h5 class="mt-0"><?php /* translators: %s: author */ printf('<cite class="fn">%s</cite>', get_comment_author_link() ); ?></h5>
                            <div class="comment-meta">
                                <a href="<?php echo esc_url(get_comment_link($comment->comment_ID)); ?>">
                                    <time datetime="<?php comment_time('c'); ?>">
                                        <?php /* translators: %s: Date */ printf( esc_attr('%1$s at %2$s', '1: date, 2: time', 'cafe-cafeteria'), esc_attr( get_comment_date() ), esc_attr( get_comment_time() ) ); ?>
                                    </time>
                                </a>
                                <?php edit_comment_link( __( 'Edit', 'cafe-cafeteria' ), '<span class="edit-link">', '</span>' ); ?>
                            </div>
                        </div>

                        <?php if ('0' == $comment->comment_approved) : ?>
                            <p class="comment-awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'cafe-cafeteria'); ?></p>
                        <?php endif; ?>

                        <div class="comment-content card-block">
                            <?php comment_text(); ?>
                        </div>

                        <?php comment_reply_link(
                            array_merge(
                                $args, array(
                                    'add_below' => 'div-comment',
                                    'depth' => $depth,
                                    'max_depth' => $args['max_depth'],
                                    'before' => '<footer class="reply comment-reply card-footer">',
                                    'after' => '</footer><!-- .reply -->'
                                )
                            )
                        ); ?>
                    </div>
                </div>
            </article>

            <?php
        endif;
    }
endif; // ends check for cafe_cafeteria_comment()

if (!function_exists('cafe_cafeteria_widgets_init')) {

	function cafe_cafeteria_widgets_init() {

		register_sidebar(array(

			'name' => esc_html__('Sidebar','cafe-cafeteria'),
			'id'   => 'cafe-cafeteria-sidebar',
			'description'   => esc_html__('This sidebar will be shown next to the content.', 'cafe-cafeteria'),
			'before_widget' => '<div id="%1$s" class="sidebar-widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

		register_sidebar(array(

			'name' => esc_html__('Footer sidebar','cafe-cafeteria'),
			'id'   => 'cafe-cafeteria-footer-sidebar',
			'description'   => esc_html__('This sidebar will be shown next at the bottom of your content.', 'cafe-cafeteria'),
			'before_widget' => '<div id="%1$s" class="col-lg-3 col-md-3 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="title">',
			'after_title'   => '</h4>'

		));

	}

	add_action( 'widgets_init', 'cafe_cafeteria_widgets_init' );

}

function cafe_cafeteria_get_categories_select() {
	$teh_cats = get_categories();
	$results;
	$count = count($teh_cats);
	for ($i=0; $i < $count; $i++) {
	if (isset($teh_cats[$i]))
  		$results[$teh_cats[$i]->slug] = $teh_cats[$i]->name;
	else
  		$count++;
	}
	return $results;
}

/**
 * Show cart contents / total Ajax
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'cafe_cafeteria_woocommerce_header_add_to_cart_fragment' );

function cafe_cafeteria_woocommerce_header_add_to_cart_fragment( $fragments ) {
	global $woocommerce;

	ob_start();

	?>
	<a class="cart-customlocation" href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'View Shopping Cart','cafe-cafeteria' ); ?>"><i class="fas fa-shopping-cart"></i><p class="cart-item-box"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></p></a>
	<?php
	$fragments['a.cart-customlocation'] = ob_get_clean();
	return $fragments;
}

/**
 * Change number or products per row to 3
 */
add_filter('loop_shop_columns', 'cafe_cafeteria_loop_columns', 999);
if (!function_exists('cafe_cafeteria_loop_columns')) {
	function cafe_cafeteria_loop_columns() {
		return 3; // 3 products per row
	}
}

function cafe_cafeteria_remove_sections( $wp_customize ) {
	$wp_customize->remove_control('display_header_text');
	$wp_customize->remove_setting('display_header_text');
}
add_action( 'customize_register', 'cafe_cafeteria_remove_sections');

//redirect
Function cafe_cafeteria_notice(){
    global $pagenow;
    if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
   		wp_safe_redirect( admin_url("themes.php?page=cafe-cafeteria-guide-page") );
   	}
}
add_action('after_setup_theme', 'cafe_cafeteria_notice');

?>
function wpex_wc_register_post_statuses() {
   register_post_status( 'wc-shipping-progress', array(
       'label'                     => _x( 'Đang giao hàng', 'WooCommerce Order status', 'text_domain' ),
       'public'                   => true,
       'exclude_from_search'       => false,
       'show_in_admin_all_list'   => true,
       'show_in_admin_status_list' => true,
      'label_count'               => _n_noop( 'Approved (%s)', 'Approved (%s)', 'text_domain' )
   ) );
}
add_filter( 'init', 'wpex_wc_register_post_statuses' );

// Add New Order Statuses to WooCommerce
function wpex_wc_add_order_statuses( $order_statuses ) {
   $order_statuses['wc-shipping-progress'] = _x( 'Đang giao hàng', 'WooCommerce Order status', 'text_domain' );
   return $order_statuses;

}
add_filter( 'wc_order_statuses', 'wpex_wc_add_order_statuses' );
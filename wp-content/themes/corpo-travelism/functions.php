<?php

if ( ! function_exists( 'corpo_travelism_enqueue_styles' ) ) :

	function corpo_travelism_enqueue_styles() {
		wp_enqueue_style( 'corpo-travelism-style-parent', get_template_directory_uri() . '/style.css' );

		wp_enqueue_style( 'corpo-travelism-style', get_stylesheet_directory_uri() . '/style.css', array( 'corpo-travelism-style-parent' ), '1.0.0' );
		wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' );
		wp_enqueue_style( 'font-awesome-all', get_template_directory_uri() . '/assets/css/all'. travelism_min() . '.css', array( 'fontawesome' ), '5.15.3', true );
     	wp_enqueue_style( 'magnific-popup-css', get_stylesheet_directory_uri() . '/assets/css/magnific-popup.css' );
		wp_enqueue_script( 'jquery-magnific-popup', get_stylesheet_directory_uri() . '/assets/js/jquery.magnific-popup' . travelism_min() . '.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'corpo-travelism-custom', get_stylesheet_directory_uri() . '/assets/js/custom-child' . travelism_min() . '.js', array( 'jquery' ), '', true );

	}

endif;

add_action( 'wp_enqueue_scripts', 'corpo_travelism_enqueue_styles', 99 );

//Dequeue Styles
function corpo_travelism_dequeue_unnecessary_styles() {
    wp_dequeue_style( 'font-awesome' );
        wp_deregister_style( 'font-awesome' );
}
add_action( 'wp_print_styles', 'corpo_travelism_dequeue_unnecessary_styles' );


function corpo_travelism_customize_control_style() {
	wp_enqueue_style( 'fontawesome', get_stylesheet_directory_uri() . '/assets/css/font-awesome.css' );
	wp_enqueue_style( 'simple-iconpicker-css', get_stylesheet_directory_uri() . '/assets/css/simple-iconpicker.css' );
	wp_enqueue_script( 'simple-iconpicker-js', get_stylesheet_directory_uri() . '/assets/js/simple-iconpicker.js', array( 'jquery' ), '', true );
	wp_enqueue_style( 'corpo-travelism-customize-controls', get_theme_file_uri() . '/customizer-control.css' );


}
add_action( 'customize_controls_enqueue_scripts', 'corpo_travelism_customize_control_style' );



function corpo_travelism_body_classes( $classes ) {
	$classes[] = 'third-design';
	$classes[] = 'lite-version';
		return $classes;
}
add_filter( 'body_class', 'corpo_travelism_body_classes' );

require get_theme_file_path() . '/inc/customizer.php';

require get_theme_file_path() . '/inc/front-sections/blog-slider.php';
require get_theme_file_path() . '/inc/front-sections/business-service.php';
require get_theme_file_path() . '/inc/front-sections/business-about.php';
require get_theme_file_path() . '/inc/front-sections/blog-cta.php';
require get_theme_file_path() . '/inc/front-sections/business-team.php';
require get_theme_file_path() . '/inc/front-sections/business-counter.php';
require get_theme_file_path() . '/inc/front-sections/logos.php';


if ( ! function_exists( 'corpo_travelism_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Corpo Travelism 1.0.0
	 *
	 */
	function corpo_travelism_site_navigation() {
		$options = travelism_get_theme_options();
		?>	

			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
				<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
					<span class="menu-label"><?php esc_html_e( 'Menu', 'corpo-travelism' ); ?></span>
					<?php
					echo travelism_get_svg( array( 'icon' => 'menu' ) );
					echo travelism_get_svg( array( 'icon' => 'close' ) );
					?>
				</button>
				<?php 

				$cart = '';

				if ( class_exists('WooCommerce') ) {
					$cart = '<li class="cart">
					<a href="'.wc_get_cart_url().'">
						<svg viewBox="0 0 511.997 511.997">
							<path d="M405.387,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
							S440.588,362.612,405.387,362.612z M405.387,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
							c14.083,0,25.536,11.453,25.536,25.536S419.47,451.988,405.387,451.988z"></path>

							<path d="M507.927,115.875c-3.626-4.641-9.187-7.348-15.079-7.348H118.22l-17.237-72.12c-2.062-8.618-9.768-14.702-18.629-14.702
							H19.152C8.574,21.704,0,30.278,0,40.856s8.574,19.152,19.152,19.152h48.085l62.244,260.443
							c2.062,8.625,9.768,14.702,18.629,14.702h298.135c8.804,0,16.477-6.001,18.59-14.543l46.604-188.329
							C512.849,126.562,511.553,120.516,507.927,115.875z M431.261,296.85H163.227l-35.853-150.019h341.003L431.261,296.85z"></path>

							<path d="M173.646,362.612c-35.202,0-63.84,28.639-63.84,63.84s28.639,63.84,63.84,63.84s63.84-28.639,63.84-63.84
							S208.847,362.612,173.646,362.612z M173.646,451.988c-14.083,0-25.536-11.453-25.536-25.536s11.453-25.536,25.536-25.536
							s25.536,11.453,25.536,25.536S187.729,451.988,173.646,451.988z"></path>
						</svg>'.WC()->cart->get_cart_contents_count().'
					</a>
				</li>';
			}

			$button = '';
			if ( ( !empty( $options['menu_btn_label'] ) && !empty( $options['menu_btn_url'] ) ) ) {
				$button = '<li class="header-button clear"><a href="'. esc_url( $options['menu_btn_url'] ) .'" class="custom-button">' . esc_html( $options['menu_btn_label'] ) . '</a></li>';
			}

			$cart .= $button;

			wp_nav_menu( array(
				'theme_location' => 'primary',
				'container' => 'div',
				'menu_class' => 'menu nav-menu',
				'menu_id' => 'primary-menu',
				'echo' => true,
				'fallback_cb' => 'travelism_menu_fallback_cb',
				'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s'  . $cart . '</ul>',
				) );

				?>
			</nav><!-- .main-navigation-->
		</div><!-- .wrapper -->
		<?php
	}
endif;

add_action( 'init', 'remove_actions_parent_theme');

function remove_actions_parent_theme() {

	remove_action( 'travelism_header_action', 'travelism_site_navigation', 30 );

	add_action( 'travelism_header_action', 'corpo_travelism_site_navigation', 30 );

};

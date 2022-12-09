<?php
/**
 * Theme Palace basic theme structure hooks
 *
 * This file contains structural hooks.
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */

$options = travelism_get_theme_options();


if ( ! function_exists( 'travelism_doctype' ) ) :
	/**
	 * Doctype Declaration.
	 *
	 * @since Travelism 1.0.0
	 */
	function travelism_doctype() {
	?>
		<!DOCTYPE html>
			<html <?php language_attributes(); ?>>
	<?php
	}
endif;

add_action( 'travelism_doctype', 'travelism_doctype', 10 );


if ( ! function_exists( 'travelism_head' ) ) :
	/**
	 * Header Codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_head() {
		?>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

		<link rel="profile" href="https://gmpg.org/xfn/11">
		<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
			<link rel="pingback" href="<?php esc_url( get_bloginfo( 'pingback_url' ) ); ?>">
		<?php endif;
	}
endif;
add_action( 'travelism_before_wp_head', 'travelism_head', 10 );

if ( ! function_exists( 'travelism_page_start' ) ) :
	/**
	 * Page starts html codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_page_start() {
		?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'travelism' ); ?></a>

		<?php
	}
endif;
add_action( 'travelism_page_start_action', 'travelism_page_start', 10 );

if ( ! function_exists( 'travelism_header_start' ) ) :
	/**
	 * Header start html codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_header_start() {
		$options  = travelism_get_theme_options();
		?>
		<div class="menu-overlay"></div>

		<?php if( !empty( $options['contact_number'] ) ): ?>

		<div id="top-contact" class="contact-info clear">
			<div class="wrapper">
				<a href="tel:<?php echo esc_attr( $options['contact_number'] ); ?>">
					<?php
						echo travelism_get_svg( array( 'icon' => 'phone' ) );
						echo esc_html( $options['contact_number'] );
					?>	
				</a>
			</div>
		</div>

	<?php endif; ?>

		<header id="masthead" class="site-header" role="banner">
		<?php
	}
endif;
add_action( 'travelism_header_action', 'travelism_header_start', 20 );

if ( ! function_exists( 'travelism_page_end' ) ) :
	/**
	 * Page end html codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_page_end() {
		?>
		</div><!-- #page -->
		<?php
	}
endif;
add_action( 'travelism_page_end_action', 'travelism_page_end', 10 );

if ( ! function_exists( 'travelism_site_branding' ) ) :
	/**
	 * Site branding codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_site_branding() {
		$options  = travelism_get_theme_options();
		$header_txt_logo_extra = $options['header_txt_logo_extra'];

		?>
		
		<div class="wrapper">

		<div class="masthead-wrapper">

		<div class="site-branding">
			<?php if ( in_array( $header_txt_logo_extra, array( 'show-all', 'logo-title', 'logo-tagline' ) )  ) { ?>
				<div class="site-logo">
					<?php the_custom_logo(); ?>
				</div>
			<?php } 
			if ( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title', 'show-all', 'tagline-only', 'logo-tagline' ) ) ) : ?>
				<div id="site-identity">
					<?php
					if( in_array( $header_txt_logo_extra, array( 'show-all', 'title-only', 'logo-title' ) )  ) {
						if ( travelism_is_latest_posts() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php
						endif;
					} 
					if ( in_array( $header_txt_logo_extra, array( 'show-all', 'tagline-only', 'logo-tagline' ) ) ) {
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
						<?php
						endif; 
					}?>
				</div>
			<?php endif; ?>
		</div><!-- .site-branding -->

		<?php if( !empty( $options['contact_number'] ) ): ?>

		<div class="contact-info clear">
			<a href="tel:<?php echo esc_attr( $options['contact_number'] ); ?>">
				<?php
					echo travelism_get_svg( array( 'icon' => 'phone' ) );
					echo esc_html( $options['contact_number'] );
				?>
			</a>
		</div>

	<?php endif; ?>

		<?php
	}
endif;
add_action( 'travelism_header_action', 'travelism_site_branding', 20 );

if ( ! function_exists( 'travelism_site_navigation' ) ) :
	/**
	 * Site navigation codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_site_navigation() {
		$options = travelism_get_theme_options();
		?>	

		<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="Primary Menu">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
				<span class="menu-label"><?php esc_html_e( 'Menu', 'travelism' ); ?></span>
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

        </div>

		</div><!-- .wrapper -->
		<?php
	}
endif;
add_action( 'travelism_header_action', 'travelism_site_navigation', 30 );


if ( ! function_exists( 'travelism_header_end' ) ) :
	/**
	 * Header end html codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_header_end() {
		?>
		</header><!-- #masthead -->
		<?php
	}
endif;

add_action( 'travelism_header_action', 'travelism_header_end', 50 );

if ( ! function_exists( 'travelism_content_start' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_content_start() {
		?>
		<div id="content" class="site-content">
		<?php
	}
endif;
add_action( 'travelism_content_start_action', 'travelism_content_start', 10 );

if ( ! function_exists( 'travelism_header_image' ) ) :
	/**
	 * Header Image codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_header_image() {
		$options  = travelism_get_theme_options();
		if ( travelism_is_frontpage() )
			return;
		$header_image = get_header_image();
		?>

		<?php if ( is_404() || is_search() ): ?>
    		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
	    		
	            <div class="overlay"></div>
	            <div class="header-wrapper">
		            <div class="wrapper">
		                <header class="page-header">
		                    <?php echo travelism_custom_header_banner_title(); ?>
		                </header>

		                <?php travelism_add_breadcrumb(); ?>
		            </div><!-- .wrapper -->
	            </div><!-- .header-wrapper -->
	        </div><!-- #page-site-header -->
    	<?php endif ?>

    	<?php if ( is_singular() && $options['single_post_hide_banner'] == false ): ?>
    		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
	    		
	            <div class="overlay"></div>
	            <div class="header-wrapper">
		            <div class="wrapper">
		                <header class="page-header">
		                    <?php echo travelism_custom_header_banner_title(); ?>
		                </header>

		                <?php travelism_add_breadcrumb(); ?>
		            </div><!-- .wrapper -->
	            </div><!-- .header-wrapper -->
	        </div><!-- #page-site-header -->
    	<?php endif ?>
    	<?php if (is_singular() && $options['single_post_hide_banner'] == true): ?>
    		<div class="header-wrapper wrapper">
                <header class="page-header">
                    <?php echo travelism_custom_header_banner_title(); ?>
                </header>

                <?php travelism_add_breadcrumb(); ?>
            </div><!-- .header-wrapper -->
    	<?php endif ?>

    	<?php if ( (  is_archive() || is_home() ) && $options['hide_banner'] == false ): ?>
    		<div id="page-site-header" class="relative" style="background-image: url('<?php echo esc_url( $header_image ); ?>');">
	    		
	            <div class="overlay"></div>
	            <div class="header-wrapper">
		            <div class="wrapper">
		                <header class="page-header">
		                    <?php echo travelism_custom_header_banner_title(); ?>
		                </header>

		                <?php travelism_add_breadcrumb(); ?>
		            </div><!-- .wrapper -->
	            </div><!-- .header-wrapper -->
	        </div><!-- #page-site-header -->
    	<?php endif ?>
    	<?php if ( ( is_archive() || is_home() ) && $options['hide_banner'] == true): ?>
    		<div class="header-wrapper wrapper">
                <header class="page-header">
                    <?php echo travelism_custom_header_banner_title(); ?>
                </header>

                <?php travelism_add_breadcrumb(); ?>
            </div><!-- .header-wrapper -->
    	<?php endif ?>

	<?php
	}
endif;
add_action( 'travelism_header_image_action', 'travelism_header_image', 10 );

if ( ! function_exists( 'travelism_add_breadcrumb' ) ) :
	/**
	 * Add breadcrumb.
	 *
	 * @since Travelism 1.0.0
	 */
	function travelism_add_breadcrumb() {
		$options = travelism_get_theme_options();
		// Bail if Breadcrumb disabled.
		$breadcrumb = $options['breadcrumb_enable'];
		if ( false === $breadcrumb ) {
			return;
		}
		
		// Bail if Home Page.
		if ( travelism_is_frontpage() ) {
			return;
		}

		echo '<div id="breadcrumb-list" >';
				/**
				 * travelism_simple_breadcrumb hook
				 *
				 * @hooked travelism_simple_breadcrumb -  10
				 *
				 */
				do_action( 'travelism_simple_breadcrumb' );
		echo '</div><!-- #breadcrumb-list -->';
		return;
	}
endif;

if ( ! function_exists( 'travelism_content_end' ) ) :
	/**
	 * Site content codes
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_content_end() {
		?>
		</div><!-- #content -->
		<?php
	}
endif;
add_action( 'travelism_content_end_action', 'travelism_content_end', 10 );

if ( ! function_exists( 'travelism_footer_start' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_footer_start() {
		$options = travelism_get_theme_options();
		$footer_bg_image = !empty( $options['footer_bg_image'] ) ? $options['footer_bg_image'] : '';
		?>
		<footer id="colophon" class="site-footer" role="contentinfo" style="background-image: url('<?php echo esc_url( $footer_bg_image ); ?>');">
		<div class="overlay"></div>
		<?php
	}
endif;
add_action( 'travelism_footer', 'travelism_footer_start', 10 );

if ( ! function_exists( 'travelism_footer_site_info' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_footer_site_info() {
		$options = travelism_get_theme_options();
		$theme_data = wp_get_theme();
		$search = array( '[the-year]', '[site-link]' );

        $replace = array( date( 'Y' ), '<a href="'. esc_url( home_url( '/' ) ) .'">'. esc_attr( get_bloginfo( 'name', 'display' ) ) . '</a>' );

        $options['copyright_text'] = str_replace( $search, $replace, $options['copyright_text'] );
		$copyright_text = $options['copyright_text'];
		?>

		<div class="site-info clear <?php echo esc_attr( has_nav_menu( 'social' ) ? 'col-2' : 'col-1' ); ?>">
			<div class="wrapper">


				<div class="copyright-text">
					<p>
						<?php if (!empty( $copyright_text ) ):

						echo travelism_santize_allow_tag( $copyright_text ); 
							if ( function_exists( 'the_privacy_policy_link' ) ) {
								the_privacy_policy_link( ' | ' );
							}
							
							endif; ?>
							
						<?php echo esc_html__( ' All Rights Reserved | ', 'travelism' ) . esc_html( $theme_data->get( 'Name') ) . '&nbsp;' . esc_html__( 'by', 'travelism' ). '&nbsp;<a target="_blank" href="'. esc_url( $theme_data->get( 'AuthorURI' ) ) .'">'. esc_html( ucwords( $theme_data->get( 'Author' ) ) ) .'</a>' ?>
					</p>
				</div><!-- .copyright-text -->


				<?php if ( has_nav_menu( 'social' ) ): ?>

					<div class="footer-menu">
					<?php 
					wp_nav_menu( 
						array(
							'theme_location' => 'social',
							'container' => false,
							'menu_class' => 'social-icons',
							'echo' => true,
							'link_before' => '<span class="screen-reader-text">',
							'link_after' => '</span>',
							)
						);				
						?>
					</div><!-- .footer-menu -->
					
				<?php endif; ?>

				</div><!-- .wrapper -->    
			</div><!-- .site-info -->

		<?php
	}
endif;
add_action( 'travelism_footer', 'travelism_footer_site_info', 40 );

if ( ! function_exists( 'travelism_footer_scroll_to_top' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_footer_scroll_to_top() {
		$options  = travelism_get_theme_options();
		if ( true === $options['scroll_top_visible'] ) : ?>
			<div class="backtotop"><?php echo travelism_get_svg( array( 'icon' => 'up' ) ); ?></div>
		<?php endif;
	}
endif;
add_action( 'travelism_footer', 'travelism_footer_scroll_to_top', 40 );

if ( ! function_exists( 'travelism_footer_end' ) ) :
	/**
	 * Footer starts
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_footer_end() {
		?>
		</footer>
		<div class="popup-overlay"></div>
		<?php
	}
endif;
add_action( 'travelism_footer', 'travelism_footer_end', 100 );

if ( ! function_exists( 'travelism_loader' ) ) :
	/**
	 * Start div id #loader
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_loader() {
		$options = travelism_get_theme_options();
		?>

		<div id="loader">
			<div class="loader-container">
				<div id="preloader">
					<span></span>
					<span></span>
					<span></span>
					<span></span>
					<span></span>
				</div>
			</div>
		</div><!-- #loader -->
		<?php
	}
endif;
add_action( 'travelism_before_header', 'travelism_loader', 10 );

if ( ! function_exists( 'travelism_infinite_loader_spinner' ) ) :
	/**
	 *
	 * @since Travelism 1.0.0
	 *
	 */
	function travelism_infinite_loader_spinner() { 
		global $post;
		$options = travelism_get_theme_options();
		if ( $options['pagination_type'] == 'infinite' ) :
			if ( count( $post ) > 0 ) {
				echo '<div class="blog-loader">' . travelism_get_svg( array( 'icon' => 'spinner-umbrella' ) ) . '</div>';
			}
		endif;
	}
endif;
add_action( 'travelism_infinite_loader_spinner_action', 'travelism_infinite_loader_spinner', 10 );
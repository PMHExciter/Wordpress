<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Travelism
	 * @since Corpo Travelism 1.0.0
	 */

	/**
	 * travelism_doctype hook
	 *
	 * @hooked travelism_doctype -  10
	 *
	 */
	do_action( 'travelism_doctype' );

?>
<head>
<?php
	/**
	 * travelism_before_wp_head hook
	 *
	 * @hooked travelism_head -  10
	 *
	 */
	do_action( 'travelism_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>

<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * travelism_page_start_action hook
	 *
	 * @hooked travelism_page_start -  10
	 *
	 */
	do_action( 'travelism_page_start_action' ); 

	/**
	 * travelism_loader_action hook
	 *
	 * @hooked travelism_loader -  10
	 *
	 */
	do_action( 'travelism_before_header' );

	/**
	 * travelism_header_action hook
	 *
	 * @hooked travelism_header_start -  10
	 * @hooked travelism_site_branding -  20
	 * @hooked travelism_site_navigation -  30
	 * @hooked travelism_header_end -  50
	 *
	 */
	do_action( 'travelism_header_action' );

	/**
	 * travelism_content_start_action hook
	 *
	 * @hooked travelism_content_start -  10
	 *
	 */
	do_action( 'travelism_content_start_action' );

	/**
	 * travelism_header_image_action hook
	 *
	 * @hooked travelism_header_image -  10
	 *
	 */
	do_action( 'travelism_header_image_action' );

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

	if ( travelism_is_frontpage() ) {
    	$options = travelism_get_theme_options();
    	$sorted  = array('blog_slider', 'business_service', 'business_about', 'blog_cta', 'business_team', 'business_counter', 'happy_clients', 'logos', 'articles');
    	foreach ( $sorted as $section ) {
			if ( $section == 'blog_slider' || $section == 'business_service' || $section == 'business_about' || $section == 'blog_cta' || $section == 'business_team' || $section == 'business_counter' || $section == 'logos') {
				add_action( 'corpo_travelism_primary_content', 'corpo_travelism_add_'. $section .'_section' );
			}else{
				add_action( 'corpo_travelism_primary_content', 'travelism_add_'. $section .'_section' );
			}	
		}
		do_action( 'corpo_travelism_primary_content' );
	}
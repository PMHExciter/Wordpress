<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package IT_Residence
 */

$layout = get_theme_mod( 'itre_site_layout', 'box' );
do_action('itre_content_wrapper_end', $layout);
?>

<?php do_action('itre_footer'); ?>

<footer id="colophon" class="site-footer">
<!-- 		.footer -->
	<div class="container">
		<div class="site-info">
			<?php printf(esc_html__('Theme Designed by %s', 'it-residence'), '<a href="https://indithemes.com">IndiThemes</a>'); ?>
			<span class="sep"> | </span>
				<?php echo ( get_theme_mod('itre_footer_text') == '' ) ? ('Copyright &copy; '.date_i18n( esc_html__( 'Y', 'it-residence' ) ).' ' . esc_html( get_bloginfo('name') ) . esc_html__('. All Rights Reserved.','it-residence')) : esc_html(get_theme_mod('itre_footer_text')); ?>
		</div><!-- .site-info -->
	</div>
</footer><!-- #colophon -->
</div><!-- #page -->

<nav id="menu" class="panel" role="navigation">
	<div id="panel-top-bar">
		<button class="go-to-bottom"></button>
		<button id="close-menu" class="menu-link"><i class="fa fa-times" aria-hidden="true"></i></button>
	</div>

	<?php if ( !empty( get_theme_mod('itre_cta_enable', '') ) ) : ?>
		<div class="itre-cta-wrapper">
			<?php
				printf("<a class='itre-cta cta-nav' href='%s'>%s</a>", esc_url( get_page_link( get_theme_mod( 'itre_cta_id' ) ) ), esc_html( get_theme_mod( 'itre_cta_text', 'Add Listing' ) ) );
			?>
		</div>
	<?php endif; ?>

	<?php wp_nav_menu( apply_filters( 'itre_mobile_nav_args', array(
			'menu_id'	=> 'menu-mobile',
			'container'		=> 'ul',
			'theme_location' => 'menu-2',
			'walker'         => has_nav_menu('menu-2') ? new itre_Mobile_Menu : '',
	 ) ) ); ?>

	<button class="go-to-top"></button>
</nav>

<?php wp_footer(); ?>

</body>
</html>

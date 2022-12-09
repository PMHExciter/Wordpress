<div class="left-sidebar left_sidebar">

	<?php
		the_custom_header_markup();
	?>

	<nav id="left-nav" class="left-navigation">

		<?php 
			if ( has_nav_menu( 'left' ) ) {
				wp_nav_menu( array( 'theme_location' => 'left', 'menu_id' => 'left-menu', 'menu_class' => 'sf-menu' ) );
			} else {
		?>

			<ul id="left-menu" class="sf-menu">
				<li><a href="<?php echo esc_url( home_url() ); ?>"><?php esc_html_e('Home', 'blogshare'); ?></a></li>
				<?php wp_list_categories('title_li='); ?>
			</ul><!-- .sf-menu -->

		<?php } ?>

	</nav><!-- #left-nav -->

	<div class="sidebar left-widget-area">

		<?php dynamic_sidebar( 'sidebar-2' ); ?>

	</div><!-- #secondary -->

</div><!-- .left-sidebar -->
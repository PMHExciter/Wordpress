<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hill_Sine
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php 
global $hill_global;
wp_body_open(); 
?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'hill-sine' ); ?></a>
	
	<?php
	do_action('hill_top_bar');
	?>
	<header id="masthead" class="site-header <?php echo apply_filters( 'hill_header_type', 'header2' );?>">
		<div class="hill-container">
			<div class="hill-header-inner">
				<?php
					do_action('hill_left_header_before');
				?>
				<div class="left-hill-header">
					<div class="site-branding">
						<?php
						the_custom_logo();
						if ( is_front_page() && is_home() ) :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						else :
							?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php
						endif;
						$hill_sine_description = get_bloginfo( 'description', 'display' );
						if ( $hill_sine_description || is_customize_preview() ) :
							?>
							<p class="site-description"><?php echo $hill_sine_description; ?></p>
						<?php endif; ?>
					</div><!-- .site-branding -->
				</div>
				<?php
					do_action('hill_center_header_before');
				?>
				<div class="center-hill-header">
					<nav id="site-navigation" class="main-navigation">
						<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars" aria-hidden="true"></i></button>
						<?php
						wp_nav_menu(
							array(
								'theme_location' => 'menu-1',
								'menu_id'        => 'primary-menu',
							)
						);
						?>
					</nav><!-- #site-navigation -->
				</div>
				<?php
					do_action('hill_right_header_before');
				?>
				<div class="right-hill-header">
					<?php
						do_action('hill_right_header');
					?>
				</div>
				<?php
					do_action('hill_right_header_after');
				?>
			</div>
		</div>
	</header><!-- #masthead -->
	<?php
		do_action('hill_section_body');
	?>
	<div class="hill-innner-body">
		<div class="hill-container">
			<div class="hill-container-main sidebar-position-<?php echo esc_attr($hill_global['sidebar_position']);?>">
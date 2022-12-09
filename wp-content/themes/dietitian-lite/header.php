<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Dietitian Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="https://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'dietitian-lite' ); ?>
</a>

<header id="header" class="header">
	<div class="container">
		<div class="flex-box">
			<div class="head-left">
				<div class="site-logo">
					<?php if ( has_custom_logo() ) { ?>
						<div class="custom-logo">
							<?php dietitian_lite_the_custom_logo(); ?>
						</div><!-- cutom logo -->
					<?php } ?>
					<div class="site-title-desc">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a>
						</h1>
						<?php
							$description = get_bloginfo( 'description', 'display' );
							if ( $description || is_customize_preview() ) :
								echo '<p class="site-description">'.esc_html($description).'</p>';
							endif;
						?>
					</div><!-- site-title-desc -->
				</div><!-- site-logo -->
			</div>
			<div class="head-right">
				<div class="toggle">
					<a class="toggleMenu" href="#"><?php esc_html_e('Menu','dietitian-lite'); ?></a>
				</div><!-- toggle --> 	
				<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
					<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
				</nav>
			</div><!-- header right -->
			
		</div><!-- flex-box -->
	</div><!-- inner -->
</header><!-- header -->
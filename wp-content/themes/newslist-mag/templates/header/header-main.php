<?php
/**
 * Content for header
 *
 * @since 1.0.0
 *
 * @package Newslist WordPress Theme
 */ ?>
<div class="<?php echo Newslist_Helper::with_prefix( 'header-wrapper' ); ?>">
	<div class="container">
		<section class="<?php echo Newslist_Helper::with_prefix( 'header-top' ); ?> image-both-side">
			<?php 
				Newslist_Mag::header_advertisement(array(
					'image'   => newslist_get( 'banner-image' ),
					'new-tab' => newslist_get( 'banner-link-open-newtab' ),
					'link'    => newslist_get( 'banner-link' )
				));  
			?>

			<div class="site-branding">
				<div>
					<?php the_custom_logo(); ?>
					<div>
						<?php if ( is_front_page() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
							<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
							<?php
						endif;
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) :	?>
							<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
						<?php endif; ?>
					</div>
				</div>
			</div>

			<?php  
				Newslist_Mag::header_advertisement(array(
					'image'   => newslist_get( 'banner-image-2' ),
					'new-tab' => newslist_get( 'banner-link-open-newtab-2' ),
					'link'    => newslist_get( 'banner-link-2' )
				)); 
			?>
		</section>
	</div>
</div>
<div class="<?php echo Newslist_Helper::with_prefix('navigation-n-options'); ?>">
	<div class="container">
		<div class="newslist-header-bottom">
			<div class="<?php echo Newslist_Helper::with_prefix( 'navigation-n-options' ); ?>">
				<nav class="newslist-main-menu" id="site-navigation">
					<?php Newslist_Helper::get_menu( 'primary', true ); ?>
				</nav>
			</div>
			<div class="newslist-header-right">	
				<div class="newslist-header-social">
					<div class="newslist-social-link-header newslist-social-menu">
						<?php Newslist_Helper::get_menu( 'social-menu-header', true ); ?>
					</div>
				</div>
				<div class="newslist-btns-wrapper">			
					<?php do_action( Newslist_Helper::fn_prefix( 'after_primary_menu' ) ); ?>
				</div> 
				<div class="<?php echo Newslist_Helper::with_prefix( 'header-search' ); ?>">
					<button class="circular-focus screen-reader-text" data-goto=".newslist-header-search .newslist-toggle-search">
					<span class="screen-reader-text"> <?php esc_html__( 'Search', 'newslist-mag' ); ?> </span>
						<?php esc_html_e( 'Circular focus', 'newslist-mag' ); ?>
					</button>
					<?php get_search_form(); ?>
					<button type="button" class="close <?php echo Newslist_Helper::with_prefix( 'toggle-search' ); ?>">
						<i class="fa fa-times" aria-hidden="true"></i>
					</button>
					<button class="circular-focus screen-reader-text" data-goto=".newslist-header-search .search-field">
						<?php esc_html_e( 'Circular focus', 'newslist-mag' ); ?>
					</button>
				</div>
			<div>	
		</div>
	</div>
</div>

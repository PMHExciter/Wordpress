<?php
/**
 * The Header for our theme.
 * @package Fast Food Pizza
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <?php if ( function_exists( 'wp_body_open' ) ) {
    wp_body_open(); 
  } else { 
    do_action( 'wp_body_open' ); 
  } ?>
  <?php if(get_theme_mod('fast_food_pizza_preloader',false) != '' || get_theme_mod( 'fast_food_pizza_display_preloader',false) != ''){ ?>
    <div class="frame w-100 h-100">
      <div class="loader">
        <div class="dot-1"></div>
        <div class="dot-2"></div>
        <div class="dot-3"></div>
      </div>
    </div>
  <?php }?>
  <header role="banner" class="header-box">
    <a class="screen-reader-text skip-link" href="#skip_content"><?php esc_html_e( 'Skip to content', 'fast-food-pizza' ); ?></a>
    
    <div id="header">
      <?php
      if(has_nav_menu('responsive-menu')){ ?>
        <div class="toggle-menu responsive-menu">
          <button role="tab" onclick="fast_food_pizza_menu_open()" class="mobiletoggle"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_responsive_menu_open_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Menu','fast-food-pizza'); ?></span>
          </button>
        </div>
        <div id="navbar-header" class="menu-brand primary-nav resp-menu">
          <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'fast-food-pizza' ); ?>">
            <?php
              wp_nav_menu( array( 
                'theme_location' => 'responsive-menu',
                'container_class' => 'main-menu-navigation clearfix' ,
                'menu_class' => 'clearfix',
                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0">%3$s</ul>',
                'fallback_cb' => 'wp_page_menu',
              ) ); 
            ?>
          </nav>
          <a href="javascript:void(0)" class="closebtn responsive-menu" onclick="fast_food_pizza_menu_close()"><i class="<?php echo esc_attr(get_theme_mod('fast_food_pizza_responsive_menu_close_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Menu','fast-food-pizza'); ?></span></a>
        </div>
      <?php }?>
      <div class="topbar">
        <div class="container">
          <div class="row">
            <div class="col-lg-5 col-md-4">
              <?php
              if(has_nav_menu('left-menu')){ ?>
                <div id="navbar-header" class="menu-brand primary-nav">
                  <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'fast-food-pizza' ); ?>">
                    <?php
                      wp_nav_menu( array( 
                        'theme_location' => 'left-menu',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) ); 
                    ?>
                  </nav>
                </div>
              <?php }?>
            </div>
            <div class="col-lg-2 col-md-4 position-relative">
              <div class="logo text-md-center">
                <div class="row">
                  <div class="<?php if( get_theme_mod( 'fast_food_pizza_site_logo_inline') != '') { ?>col-lg-5 col-md-5 col-5<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php if ( has_custom_logo() ) : ?>
                      <div class="site-logo"><?php the_custom_logo(); ?></div>
                    <?php endif; ?>
                  </div>
                  <div class="<?php if( get_theme_mod( 'fast_food_pizza_site_logo_inline') != '') { ?>col-lg-7 col-md-7 col-7 site-logo-inline"<?php } else { ?>col-lg-12 col-md-12 <?php } ?>">
                    <?php $blog_info = get_bloginfo( 'name' ); ?>
                    <?php if ( ! empty( $blog_info ) ) : ?>
                      <?php if( get_theme_mod('fast_food_pizza_site_title_enable',true) != ''){ ?>
                        <?php if ( is_front_page() && is_home() ) : ?>
                          <h1 class="site-title pb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                        <?php else : ?>
                          <p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                        <?php endif; ?>
                      <?php }?>
                    <?php endif; ?>
                    <?php
                    $description = get_bloginfo( 'description', 'display' );
                    if ( $description || is_customize_preview() ) : ?>
                      <?php if( get_theme_mod('fast_food_pizza_site_tagline_enable',true) != ''){ ?>
                        <p class="site-description"><?php echo esc_html($description); ?></p>
                      <?php }?>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-5 col-md-4">
              <?php
              if(has_nav_menu('right-menu')){ ?>
                <div id="navbar-header" class="menu-brand primary-nav">
                  <nav id="site-navigation" class="primary-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'fast-food-pizza' ); ?>">
                    <?php
                      wp_nav_menu( array( 
                        'theme_location' => 'right-menu',
                        'container_class' => 'main-menu-navigation clearfix' ,
                        'menu_class' => 'clearfix',
                        'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav m-0 ps-0 text-lg-end">%3$s</ul>',
                        'fallback_cb' => 'wp_page_menu',
                      ) ); 
                    ?>
                  </nav>
                </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
      <div class="bottom-header py-3 px-md-0 px-3">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-4 align-self-center phone mb-md-0 mb-3">
              <?php if (get_theme_mod('fast_food_pizza_phone_number') != '' || get_theme_mod('fast_food_pizza_phone_text') != '') {?>
                <div class="row">
                  <div class="col-lg-2 col-md-2 col-2 align-self-center">
                    <i class="fas fa-truck"></i>
                  </div>
                  <div class="col-lg-10 col-md-10 col-10 align-self-center">
                    <span><?php echo esc_html(get_theme_mod('fast_food_pizza_phone_text')); ?></span>
                    <a href="tel:<?php echo esc_attr(get_theme_mod('fast_food_pizza_phone_number')); ?>"><?php echo esc_html(get_theme_mod('fast_food_pizza_phone_number')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('fast_food_pizza_phone_number')); ?></span></a>
                  </div>
                </div>
              <?php }?>
            </div>
            <div class="col-lg-2 col-md-2 align-self-center px-md-0">
              <div class="social-icon">
                <?php if(get_theme_mod('fast_food_pizza_facebook_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('fast_food_pizza_facebook_url')); ?>"><i class="fab fa-facebook-f"></i><span class="screen-reader-text"><?php echo esc_html('Facebook', 'fast-food-pizza'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('fast_food_pizza_twitter_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('fast_food_pizza_twitter_url')); ?>"><i class="fab fa-twitter"></i><span class="screen-reader-text"><?php echo esc_html('Twitter', 'fast-food-pizza'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('fast_food_pizza_instagram_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('fast_food_pizza_instagram_url')); ?>"><i class="fab fa-instagram"></i><span class="screen-reader-text"><?php echo esc_html('Instagram', 'fast-food-pizza'); ?></span></a>
                <?php }?>
                <?php if(get_theme_mod('fast_food_pizza_pinterest_url') != ''){ ?>
                  <a href="<?php echo esc_url(get_theme_mod('fast_food_pizza_pinterest_url')); ?>"><i class="fab fa-pinterest-p"></i><span class="screen-reader-text"><?php echo esc_html('Pinterest', 'fast-food-pizza'); ?></span></a>
                <?php }?>
              </div>
            </div>
            <div class="offset-lg-2 col-lg-3 col-md-3 woo-icons align-self-center text-md-end my-md-0 my-3">
              <div class="main-search d-inline-block me-4">
                <span><a href="#"><i class="fas fa-search"></i></a></span>
              </div>
              <div class="searchform_page w-100 h-100">
                <div class="close w-100 text-end me-lg-4 me-3"><a href="#maincontent"><i class="fa fa-times"></i></a></div>
                <div class="search_input">
                  <?php get_search_form(); ?>
                </div>
              </div>
              <?php if ( class_exists('woocommerce') ) { ?>
                <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" class="me-lg-4 me-3"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','fast-food-pizza' );?></span></a>
                <?php if(defined('YITH_WCWL')){ ?>
                  <a class="wishlist_view position-relative me-lg-4 me-3" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="fas fa-heart"></i><span class="screen-reader-text"><?php esc_html_e( 'Wishlist','fast-food-pizza' );?></span></a>
                <?php }?>
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" class="cart-icon"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','fast-food-pizza' );?></span></a>
              <?php }?>
            </div>
            <div class="col-lg-2 col-md-3 align-self-center text-md-end">
              <?php if(get_theme_mod('fast_food_pizza_header_btn_text') != '' || get_theme_mod('fast_food_pizza_header_btn_url') != ''){ ?>
                <a href="<?php echo esc_url(get_theme_mod('fast_food_pizza_header_btn_url')); ?>" class="pizza-btn"><?php echo esc_html(get_theme_mod('fast_food_pizza_header_btn_text')); ?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('fast_food_pizza_header_btn_text')); ?></span></a>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
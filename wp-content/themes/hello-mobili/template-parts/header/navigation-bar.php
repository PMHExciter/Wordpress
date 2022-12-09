<?php
/**
 * Navigation bar
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>

<div class="bottom-menu">
    <div class="bottom-menu-bar">
        <div class="container">
            <ul class="bar-grid">
                <li class="grid-item grid-item-back grid-item--hidden"
                    data-slug="back">
                    <button type="button" class="item-button" aria-label="<?php _e('Navigate to back', 'hello-mobili'); ?>">
                        <i class="button-icon fas <?php echo is_rtl() ? 'fa-arrow-right' : 'fa-arrow-left'; ?>"></i>
                        <span class="button-title"><?php _e('Back', 'hello-mobili'); ?></span>
                    </button>
                </li>
                <li class="grid-item <?php echo is_home() || is_front_page() ? 'grid-item--current grid-item--active' : ''; ?>">
                    <a href="<?php echo site_url(); ?>" class="item-button" aria-label="<?php _e('Navigate to home page', 'hello-mobili'); ?>">
                        <i class="button-icon fas fa-home"></i>
                        <span class="button-title"><?php _e('Home', 'hello-mobili'); ?></span>
                    </a>
                </li>
                <li class="grid-item" data-slug="search">
                    <button type="button" class="item-button" aria-label="<?php _e('Navigate to search form', 'hello-mobili'); ?>">
                        <i class="button-icon fas fa-search"></i>
                        <span class="button-title"><?php _e('Search', 'hello-mobili'); ?></span>
                    </button>
                </li>
                <?php if (function_exists('wc_get_page_id')) : ?>
                    <li class="grid-item <?php echo get_the_ID() === wc_get_page_id('myaccount') ? 'grid-item--current grid-item--active' : ''; ?>">
                        <a href="<?php echo get_permalink(wc_get_page_id('myaccount')); ?>" class="item-button" aria-label="<?php _e('Navigate to account page', 'hello-mobili'); ?>">
                            <i class="button-icon fas fa-user"></i>
                            <span class="button-title"><?php _e('Account', 'hello-mobili'); ?></span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="grid-item" data-slug="menu">
                    <button type="button" class="item-button" aria-label="<?php _e('Navigate to menu list', 'hello-mobili'); ?>">
                        <i class="button-icon fas fa-bars"></i>
                        <span class="button-title"><?php _e('Menu', 'hello-mobili'); ?></span>
                    </button>
                </li>
            </ul>
        </div>
    </div>
    <div class="bottom-menu-content">
        <div class="content-item" data-slug="search">
            <div class="container">
                <h3 class="item-title"><?php _e('Search', 'hello-mobili'); ?></h3>
                <?php get_search_form(); ?>
            </div>
            <button class="item-close btn show-in-focus" data-slug="back"><?php _e('Close search form','hello-mobili'); ?></button>
        </div>
        <div class="content-item" data-slug="menu">
            <div class="container">
                <h3 class="item-title"><?php _e('Quick Access', 'hello-mobili'); ?></h3>
                <?php hm_nav_menu(['theme_location' => 'primary', 'container_class' => 'responsive-menu']); ?>
                <button class="item-close btn show-in-focus" data-slug="back"><?php _e('Close menus','hello-mobili'); ?></button>
            </div>
        </div>
    </div>
</div>

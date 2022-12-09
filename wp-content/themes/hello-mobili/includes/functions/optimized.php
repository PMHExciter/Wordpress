<?php
/**
 * Wordpress optimized functions
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

function hm_nav_menu($args = [])
{
    $args = array_merge([
        'menu' => '',
        'theme_location' => '',
        'echo' => true
    ], $args);

    if (empty($args['menu']) && (empty($args['theme_location']) || !has_nav_menu($args['theme_location']))) {
        if (empty($args['theme_location'])) {
            $setMenuText = __('Add or set the menu.', 'hello-mobili');
        } else {
            $setMenuText = sprintf(__('Set the menu for %s location.', 'hello-mobili'),$args['theme_location']);
        }

        if ($args['echo']) {
            echo sprintf('<div class="alert--placeholder"><a href="%s">%s</a></div>', admin_url(), esc_html($setMenuText));
            return false;
        } else {
            return sprintf('<div class="alert--placeholder"><a href="%s">%s</a></div>', admin_url(), esc_html($setMenuText));
        }
    }

    if (!$args['echo']) {
        return wp_nav_menu($args);
    } else {
        wp_nav_menu($args);
    }
}
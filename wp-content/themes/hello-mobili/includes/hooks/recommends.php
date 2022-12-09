<?php
/**
 * Theme admin recommends
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

if (!function_exists('hello_mobili_admin_notices')) {
    function hello_mobili_admin_notices()
    {
        if (!function_exists('is_plugin_active')) {
            include_once ABSPATH . 'wp-admin/includes/plugin.php';
        }
        if (is_plugin_active('mobili/mobili.php')) {
            return;
        }
        echo '<div class="notice notice-warning is-dismissible">';
        printf('<p><b style="font-size: 1.4rem">%s</b></p>', __('Set to display in mobile mode', 'hello-mobili'));
        printf('<p>%s <a href="%s" class="button button-primary">%s</a></p>',
            __('With the mobili plugin, you can set this template to be displayed only when the user enters your site with a mobile device.', 'hello-mobili'),
            admin_url('plugin-install.php?tab=plugin-information&plugin=mobili'),
            __('Install now!', 'hello-mobili')
        );
        echo '</div>';
    }
}
add_action('admin_notices', 'hello_mobili_admin_notices');
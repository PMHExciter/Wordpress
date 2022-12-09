<?php
/**
 * Enqueue WordPress styles and scripts
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

/**
 * Register frontend styles and scripts
 */
function hello_mobili_enqueue_scripts()
{
    $themeVersion = wp_get_theme()->get('Version');

    // Enqueue styles.
    if (is_rtl()) {
        wp_enqueue_style('main-styles', get_template_directory_uri() . '/rtl.css', [], $themeVersion);
    } else {
        wp_enqueue_style('main-styles', get_template_directory_uri() . '/style.css', [], $themeVersion);
    }
    wp_enqueue_style('fontawesome', get_template_directory_uri() . '/assets/fonts/fontawesome/css/all.min.css', [], $themeVersion);

    // Enqueue scripts.
    wp_enqueue_script('main-scripts', get_template_directory_uri() . '/dist/scripts.js', ['jquery'], $themeVersion);
    wp_localize_script('main-scripts', 'localizedVariable', [
        'menuToggle' => __('Show/Hide sub menus','hello-mobili')
    ]);
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'hello_mobili_enqueue_scripts');
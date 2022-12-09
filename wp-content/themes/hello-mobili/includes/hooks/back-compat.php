<?php
/**
 * Back compat functionality
 *
 * Prevents the theme from running on WordPress versions prior to 5.3,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 5.3.
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

/**
 * Display upgrade notice on theme switch.
 *
 * @return void
 * @since 1.0.0
 */
function hello_mobili_admin_init()
{
    add_action('admin_notices', 'hello_mobili_upgrade_notice');
}

add_action('admin_init', 'hello_mobili_admin_init');

/**
 * Adds a message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * the theme on WordPress versions prior to 5.3.
 *
 * @return void
 * @global string $wp_version WordPress version.
 *
 * @since 1.0.0
 */
function hello_mobili_upgrade_notice()
{
    echo '<div class="error"><p>';
    printf(
    /* translators: %s: WordPress Version. */
        esc_html__('This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'hello-mobili'),
        esc_html($GLOBALS['wp_version'])
    );
    echo '</p></div>';
}

/**
 * Prevents the Customizer from being loaded on WordPress versions prior to 5.3.
 *
 * @return void
 * @global string $wp_version WordPress version.
 *
 * @since 1.0.0
 */
function hello_mobili_customize()
{
    wp_die(
        sprintf(
        /* translators: %s: WordPress Version. */
            esc_html__('This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'hello-mobili'),
            esc_html($GLOBALS['wp_version'])
        ),
        '',
        array(
            'back_link' => true,
        )
    );
}

add_action('load-customize.php', 'hello_mobili_customize');

/**
 * Prevents the Theme Preview from being loaded on WordPress versions prior to 5.3.
 *
 * @return void
 * @global string $wp_version WordPress version.
 *
 * @since 1.0.0
 */
function hello_mobili_preview()
{
    if (isset($_GET['preview'])) { // phpcs:ignore WordPress.Security.NonceVerification
        wp_die(
            sprintf(
            /* translators: %s: WordPress Version. */
                esc_html__('This theme requires WordPress 5.3 or newer. You are running version %s. Please upgrade.', 'hello-mobili'),
                esc_html($GLOBALS['wp_version'])
            )
        );
    }
}

add_action('template_redirect', 'hello_mobili_preview');

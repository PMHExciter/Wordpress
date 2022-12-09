<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

get_header();
?>
    <div class="container">
        <header class="page-header">
            <p class="page-sub-title"><?php esc_html_e('404 Error', 'hello-mobili'); ?></p>
            <h1 class="page-title"><?php esc_html_e('Nothing here', 'hello-mobili'); ?></h1>
        </header><!-- .page-header -->

        <div class="error-404 not-found">
            <div class="page-content">
                <p><?php esc_html_e('It looks like nothing was found at this location. :(', 'hello-mobili'); ?></p>
            </div><!-- .page-content -->
        </div><!-- .error-404 -->
    </div>
<?php
get_footer();

<?php
/**
 * The template for displaying search results pages
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

get_header();
global $wp_query;
if (have_posts()) {
    ?>
    <div class="container">
    <header class="page-header">
        <p class="page-sub-title">
            <?php
            printf(
                esc_html(
                /* translators: %d: The number of search results. */
                    _n(
                        'We found %d result for your search.',
                        'We found %d results for your search.',
                        (int)$wp_query->found_posts,
                        'hello-mobili'
                    )
                ),
                (int)$wp_query->found_posts
            );
            ?>
        </p><!-- .search-result-count -->
        <h1 class="page-title">
            <?php
            printf(
            /* translators: %s: Search term. */
                esc_html__('Results for "%s"', 'hello-mobili'),
                '<span class="page-description search-term">' . esc_html(get_search_query()) . '</span>'
            );
            ?>
        </h1>
    </header><!-- .page-header -->
    <?php
    echo '<div class="row">';
    // Start the Loop.
    while (have_posts()) {
        the_post();

        echo '<div class="col-md-6">';
        get_template_part('template-parts/content/content-card');
        echo '</div>';
    } // End the loop.
    echo '</div>';

    // Previous/next page navigation.
    echo hello_mobili_pagination();

    // If no content, include the "No posts found" template.
} else {
    get_template_part('template-parts/content/content-none');
}
?>
    </div>
<?php
get_footer();

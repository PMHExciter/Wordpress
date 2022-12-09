<?php
/**
 * The template for displaying all single posts
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

get_header();

echo '<div class="container">';

/* Start the Loop */
while (have_posts()) :
    the_post();
    get_template_part('template-parts/content/content-single');

    // If comments are open or there is at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
endwhile; // End of the loop.
echo '</div>';
get_footer();

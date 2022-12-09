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

    if (is_attachment()) {
        // Parent post navigation.
        the_post_navigation(
            array(
                /* translators: %s: Parent post link. */
                'prev_text' => sprintf(__('<span class="meta-nav">Published in</span><span class="post-title">%s</span>', 'hello-mobili'), '%title'),
            )
        );
    }
    // If comments are open or there is at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        comments_template();
    }

    // Previous/next post navigation.
    $nextLabel = esc_html__('Next post', 'hello-mobili');
    $previousLabel = esc_html__('Previous post', 'hello-mobili');

    if (is_rtl()){
        $nextIcon = '<i class="fas fa-angle-left"></i>';
        $previousIcon = '<i class="fas fa-angle-right"></i>';
    }else{
        $nextIcon = '<i class="fas fa-angle-right"></i>';
        $previousIcon = '<i class="fas fa-angle-left"></i>';
    }

    the_post_navigation(
        array(
            'next_text' => $nextIcon . '<div><p class="meta-nav">' . $nextLabel . '</p><p class="post-title">%title</p></div>',
            'prev_text' => $previousIcon . '<div><p class="meta-nav">' . $previousLabel . '</p><p class="post-title">%title</p></div>',
        )
    );
endwhile; // End of the loop.
echo '</div>';
get_footer();

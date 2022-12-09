<?php
/**
 * Templates functions
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

if (!function_exists('hello_mobili_posted_on')) {
    /**
     * Prints HTML with meta information for the current post-date/time.
     *
     * @return void
     * @since 1.0.0
     *
     */
    function hello_mobili_posted_on()
    {
        $time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

        $time_string = sprintf(
            $time_string,
            esc_attr(get_the_date(DATE_W3C)),
            esc_html(get_the_date())
        );
        echo '<span class="posted-on"><i class="fas fa-clock"></i> ';
        printf(
        /* translators: %s: Publish date. */
            esc_html__('Published %s', 'hello-mobili'),
            $time_string // phpcs:ignore WordPress.Security.EscapeOutput
        );
        echo '</span>';
    }
}


if (!function_exists('hello_mobili_posted_by')) {
    /**
     * Prints HTML with meta information about theme author.
     *
     * @return void
     * @since 1.0.0
     */
    function hello_mobili_posted_by()
    {
        if (!get_the_author_meta('description') && post_type_supports(get_post_type(), 'author')) {
            echo '<span class="byline"><i class="fas fa-user"></i> ';
            printf(
            /* translators: %s: Author name. */
                esc_html__('By %s', 'hello-mobili'),
                '<a href="' . esc_url(get_author_posts_url(get_the_author_meta('ID'))) . '" rel="author">' . esc_html(get_the_author()) . '</a>'
            );
            echo '</span>';
        }
    }
}

if (!function_exists('hello_mobili_entry_meta_footer')) {
    /**
     * Prints HTML with meta information for the categories, tags and comments.
     * Footer entry meta is displayed differently in archives and single posts.
     *
     * @return void
     * @since 1.0.0
     *
     */
    function hello_mobili_entry_meta_footer()
    {

        // Early exit if not a post.
        if ('post' !== get_post_type()) {
            return;
        }

        // Hide meta information on pages.
        echo '<div class="posted-by">';
        // Posted on.
        hello_mobili_posted_on();
        // Posted by.
        hello_mobili_posted_by();
        // Edit post link.
        edit_post_link(
            sprintf(
            /* translators: %s: Name of current post. Only visible to screen readers. */
                '<i class="fas fa-pen"></i> ' . esc_html__('Edit %s', 'hello-mobili'),
                '<span class="screen-reader-text">' . get_the_title() . '</span>'
            ),
            '<span class="edit-link">',
            '</span>'
        );
        echo '</div>';

        if (has_tag()) {

            echo '<div class="post-taxonomies">';
            /* translators: Used between list items, there is a space after the comma. */
            $tags_list = get_the_tag_list('', __(', ', 'hello-mobili'));
            if ($tags_list) {
                printf(
                /* translators: %s: List of tags. */
                    '<span class="tags-links"><i class="fas fa-tag"></i>' . esc_html__('Tagged %s', 'hello-mobili') . '</span>',
                    $tags_list // phpcs:ignore WordPress.Security.EscapeOutput
                );
            }
            echo '</div>';
        }

    }
}
if (!function_exists('hello_mobili_pagination')) {
    /**
     * Parsed pagination function.
     *
     * @param string|array $args
     * @return string
     * @since 1.0.0
     */

    function hello_mobili_pagination($args = ''): string
    {
        global $wp_query;
        $total = isset($wp_query->max_num_pages) ? $wp_query->max_num_pages : 1;
        if (isset($args['total']) && is_numeric($args['total'])) {
            $total = $args['total'];
        }
        if ($total <= 1) {
            return '';
        }
        $output = '<div class="pagination">';
        $output .= paginate_links($args);
        $output .= '</div>';
        return $output;
    }
}

/**
 * Print the first instance of a block in the content, and then break away.
 *
 *
 * @param string      $block_name The full block type name, or a partial match.
 *                                Example: `core/image`, `core-embed/*`.
 * @param string|null $content    The content to search in. Use null for get_the_content().
 * @param int         $instances  How many instances of the block will be printed (max). Default  1.
 * @return bool Returns true if a block was located & printed, otherwise false.
 */
function hello_mobili_print_first_instance_of_block( $block_name, $content = null, $instances = 1 ) {
    $instances_count = 0;
    $blocks_content  = '';

    if ( ! $content ) {
        $content = get_the_content();
    }

    // Parse blocks in the content.
    $blocks = parse_blocks( $content );

    // Loop blocks.
    foreach ( $blocks as $block ) {

        // Sanity check.
        if ( ! isset( $block['blockName'] ) ) {
            continue;
        }

        // Check if this the block matches the $block_name.
        $is_matching_block = false;

        // If the block ends with *, try to match the first portion.
        if ( '*' === $block_name[-1] ) {
            $is_matching_block = 0 === strpos( $block['blockName'], rtrim( $block_name, '*' ) );
        } else {
            $is_matching_block = $block_name === $block['blockName'];
        }

        if ( $is_matching_block ) {
            // Increment count.
            $instances_count++;

            // Add the block HTML.
            $blocks_content .= render_block( $block );

            // Break the loop if the $instances count was reached.
            if ( $instances_count >= $instances ) {
                break;
            }
        }
    }

    if ( $blocks_content ) {
        /** This filter is documented in wp-includes/post-template.php */
        echo apply_filters( 'the_content', $blocks_content ); // phpcs:ignore WordPress.Security.EscapeOutput
        return true;
    }

    return false;
}

<?php
/**
 * Content for pages
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item card'); ?>>
    <?php if (!is_front_page() || has_post_thumbnail()): ?>
        <header class="entry-header alignwide">
            <?php if (!is_front_page()) {
                the_title('<h1 class="entry-title">', '</h1>');

                if (has_category() || has_tag()) {

                    echo '<div class="post-taxonomies">';

                    /* translators: Used between list items, there is a space after the comma. */
                    $categories_list = get_the_category_list(__(', ', 'hello-mobili'));
                    if ($categories_list) {
                        printf(
                        /* translators: %s: List of categories. */
                            '<span class="cat-links">' . esc_html__('Categorized as %s', 'hello-mobili') . ' </span>',
                            $categories_list // phpcs:ignore WordPress.Security.EscapeOutput
                        );
                    }
                    echo '</div>';
                }
            }
            if (has_post_thumbnail()) { ?>
                <figure class="entry-thumbnail">
                    <?php the_post_thumbnail('full'); ?>
                </figure>
            <?php } ?>
        </header><!-- .entry-header -->
    <?php endif; ?>
    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(
            array(
                'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'hello-mobili') . '">',
                'after' => '</nav>',
                /* translators: %: Page number. */
                'pagelink' => esc_html__('Page %', 'hello-mobili'),
            )
        );
        ?>
    </div><!-- .entry-content -->


    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer default-max-width">
            <?php
            edit_post_link(
                sprintf(
                /* translators: %s: Name of current post. Only visible to screen readers. */
                    esc_html__('Edit %s', 'hello-mobili'),
                    '<span class="screen-reader-text">' . get_the_title() . '</span>'
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->

<?php
/**
 * Content for single pages
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-item card'); ?>>

    <header class="entry-header alignwide">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
        <?php
        if (has_category()) {

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
        ?>
        <?php if (has_post_thumbnail()): ?>
            <figure class="entry-thumbnail">
                <?php the_post_thumbnail('full'); ?>
            </figure>
        <?php endif; ?>
    </header><!-- .entry-header -->

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

    <footer class="entry-footer default-max-width">
        <?php hello_mobili_entry_meta_footer(); ?>
    </footer><!-- .entry-footer -->

    <?php if (!is_singular('attachment')) : ?>
        <?php if ((bool)get_the_author_meta('description') && post_type_supports(get_post_type(), 'author')) : ?>
            <div class="author-bio <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">
                <?php echo get_avatar(get_the_author_meta('ID'), '85'); ?>
                <div class="author-bio-content">
                    <h2 class="author-title">
                        <?php
                        printf(
                        /* translators: %s: Author name. */
                            esc_html__('By %s', 'hello-mobili'),
                            get_the_author()
                        );
                        ?>
                    </h2>
                    <p class="author-description"> <?php the_author_meta('description'); ?></p>
                    <!-- .author-description -->
                    <?php
                    printf(
                        '<a class="author-link" href="%1$s" rel="author">%2$s</a>',
                        esc_url(get_author_posts_url(get_the_author_meta('ID'))),
                        sprintf(
                        /* translators: %s: Author name. */
                            esc_html__('View all of %s\'s posts.', 'hello-mobili'),
                            get_the_author()
                        )
                    );
                    ?>
                </div><!-- .author-bio-content -->
            </div><!-- .author-bio -->
        <?php endif; ?>
    <?php endif; ?>

</article><!-- #post-<?php the_ID(); ?> -->

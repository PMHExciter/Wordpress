<?php
/**
 * The template for displaying comments
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password,
 * return early without loading the comments.
 */
if (post_password_required()) {
    return;
}

$commentsCount = get_comments_number();
?>

<div id="comments"
     class="comments-area card mt-4 default-max-width <?php echo get_option('show_avatars') ? 'show-avatars' : ''; ?>">

    <?php
    if (have_comments()) :
        ?>
        <h2 class="comments-title card-title">
            <?php
            echo '<i class="fas fa-comments card-icon"></i>';
            if ('1' === $commentsCount) {
                esc_html_e('1 comment', 'hello-mobili');
            } else {
                printf(
                /* translators: %s: Comment count number. */
                    esc_html(_nx('%s comment', '%s comments', $commentsCount, 'Comments title', 'hello-mobili')),
                    esc_html(number_format_i18n($commentsCount))
                );
            }
            ?>
        </h2><!-- .comments-title -->

        <ol class="comment-list">
            <?php
            wp_list_comments(
                [
                    'avatar_size' => 40,
                    'style' => 'ol',
                    'short_ping' => true,
                    'walker' => new \HelloMobili\Walker_Comment()
                ]
            );
            ?>
        </ol><!-- .comment-list -->

        <?php
        the_comments_pagination();
        ?>

        <?php if (!comments_open()) : ?>
        <p class="no-comments"><?php esc_html_e('Comments are closed.', 'hello-mobili'); ?></p>
    <?php endif; ?>
    <?php endif; ?>

    <?php
    comment_form(
        array(
            'title_reply' => esc_html__('Leave a comment', 'hello-mobili'),
            'title_reply_before' => '<h2 id="reply-title" class="comment-reply-title card-title">',
            'title_reply_after' => '</h2>',
            'class_submit' => 'btn btn-primary',
            'cancel_reply_link' => '<i class="fas fa-close"></i><span class="screen-reader-text">' . __('Cancel reply','hello-mobili') . '</span>'
        )
    );
    ?>

</div><!-- #comments -->

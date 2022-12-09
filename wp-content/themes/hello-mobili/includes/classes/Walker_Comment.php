<?php
/**
 * Comment API: Walker_Comment class
 *
 * @package WordPress
 * @subpackage Comments
 * @since 4.4.0
 */

namespace HelloMobili;

use WP_Comment;

/**
 * Core walker class used to create an HTML list of comments.
 *
 * @since 2.7.0
 *
 * @see Walker
 */
class Walker_Comment extends \Walker_Comment
{
    /**
     * Outputs a comment in the HTML5 format.
     *
     * @param WP_Comment $comment Comment to display.
     * @param int $depth Depth of the current comment.
     * @param array $args An array of arguments.
     * @see wp_list_comments()
     *
     * @since 3.6.0
     *
     */
    protected function html5_comment($comment, $depth, $args)
    {
        $tag = ('div' === $args['style']) ? 'div' : 'li';

        $commenter = wp_get_current_commenter();
        $show_pending_links = !empty($commenter['comment_author']);

        if ($commenter['comment_author_email']) {
            $moderation_note = __('Your comment is awaiting moderation.', 'hello-mobili');
        } else {
            $moderation_note = __('Your comment is awaiting moderation. This is a preview; your comment will be visible after it has been approved.', 'hello-mobili');
        }
        ?>
        <<?php echo $tag; ?> id="comment-<?php comment_ID(); ?>" <?php comment_class($this->has_children ? 'parent' : '', $comment); ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
            <footer class="comment-meta">
                <?php if (0 != $args['avatar_size']): ?>
                    <div class="comment-avatar">
                        <?php echo get_avatar($comment, $args['avatar_size']); ?>
                    </div><!-- .comment-avatar -->
                <?php endif; ?>

                <div class="comment-details">
                    <div class="comment-author vcard">
                        <?php
                        $comment_author = get_comment_author_link($comment);

                        if ('0' == $comment->comment_approved && !$show_pending_links) {
                            $comment_author = get_comment_author($comment);
                        }

                        printf(
                        /* translators: %s: Comment author link. */
                            __('%s <span class="says">says:</span>', 'hello-mobili'),
                            sprintf('<b class="fn">%s</b>', $comment_author)
                        );
                        ?>
                    </div><!-- .comment-author -->

                    <div class="comment-metadata">
                        <?php
                        printf(
                            '<a href="%s"><time datetime="%s">%s</time></a>',
                            esc_url(get_comment_link($comment, $args)),
                            get_comment_time('c'),
                            sprintf(
                            /* translators: 1: Comment date, 2: Comment time. */
                                __('%1$s at %2$s', 'hello-mobili'),
                                get_comment_date('', $comment),
                                get_comment_time()
                            )
                        );

                        edit_comment_link(__('Edit', 'hello-mobili'), ' <span class="edit-link">', '</span>');
                        ?>
                    </div><!-- .comment-metadata -->
                </div><!-- .comment-details -->
            </footer><!-- .comment-meta -->

            <div class="comment-content">
                <?php comment_text(); ?>

                <?php if ('0' == $comment->comment_approved) : ?>
                    <br><em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
                <?php endif; ?>
            </div><!-- .comment-content -->

            <?php
            if ('1' == $comment->comment_approved || $show_pending_links) {
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => 'div-comment',
                            'depth' => $depth,
                            'max_depth' => $args['max_depth'],
                            'before' => '<div class="reply">',
                            'after' => '</div>',
                        )
                    )
                );
            }
            ?>
        </article><!-- .comment-body -->
        <?php
    }
}

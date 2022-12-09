<?php
/**
 * Content for cards
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-card card'); ?>>
    <h2 class="post-card-title"><a class="link--normalized" href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
    </h2>
    <?php
    if (has_category()):
        echo '<div class="post-card-category">';
        printf(__('Categorized as %s', 'hello-mobili'), get_the_category_list(', '));
        echo '</div>';
    else: ?>
        <div class="post-card-author">
            <?php _e('Posted by', 'hello-mobili'); ?>
            <?php the_author_link(); ?>
        </div>
    <?php endif; ?>
    <?php get_template_part('template-parts/content/card/format', get_post_format()); ?>
    <div class="post-card-excerpt"><?php the_excerpt(); ?></div>
    <ul class="post-card-meta">
        <li class="meta-item">
            <i class="far fa-clock item-icon"></i> <?php echo get_the_date(); ?>
        </li>
        <?php if (has_category()): ?>
            <li class="meta-item">
                <i class="far fa-user item-icon"></i> <?php the_author_link(); ?>
            </li>
        <?php endif; ?>
    </ul>
</article>
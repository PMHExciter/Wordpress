<?php
/**
 * Audio post format header
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>
<div class="post-card-thumbnail post-card-thumbnail--media">
    <?php
    $content = get_the_content();

    if (has_block('core/audio', $content)) {
        hello_mobili_print_first_instance_of_block('core/audio', $content);
        printf('<button type="submit" aria-label="%s" class="btn btn--animated play-button"><i class="fas fa-play play-icon"></i></button>',
            __('Play video', 'hello-mobili'));
    }
    ?>
    <?php the_post_thumbnail('medium_large'); ?>
</div>
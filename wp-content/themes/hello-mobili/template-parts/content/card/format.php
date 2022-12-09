<?php
/**
 * Default post format header
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

?>
<a href="<?php the_permalink(); ?>">
    <figure class="post-card-thumbnail">
        <?php the_post_thumbnail('medium_large'); ?>
    </figure>
</a>

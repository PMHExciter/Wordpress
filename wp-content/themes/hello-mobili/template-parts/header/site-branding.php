<?php
/**
 * Displays header site branding
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

$blogInfo = get_bloginfo('name');
$description = get_bloginfo('description', 'display');
$headerClass = !has_custom_logo() ? 'site-title' : 'screen-reader-text';
?>

<div class="site-branding text-center">
    <?php if (has_custom_logo()) : ?>
        <div class="site-logo"><?php the_custom_logo(); ?></div>
    <?php elseif ($blogInfo) : ?>
        <?php if (is_front_page() && !is_paged()) : ?>
            <h1 class="<?php echo esc_attr($headerClass); ?>"><?php echo esc_html($blogInfo); ?></h1>
        <?php elseif (is_front_page() && !is_home()) : ?>
            <h1 class="<?php echo esc_attr($headerClass); ?>"><a
                        href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blogInfo); ?></a></h1>
        <?php else : ?>
            <p class="<?php echo esc_attr($headerClass); ?>"><a
                        href="<?php echo esc_url(home_url('/')); ?>"><?php echo esc_html($blogInfo); ?></a></p>
        <?php endif; ?>
    <?php endif; ?>

    <?php if ($description && true === get_theme_mod('display_title_and_tagline', true)) : ?>
        <p class="site-description">
            <?php echo esc_html($description); ?>
        </p>
    <?php endif; ?>
</div><!-- .site__branding -->

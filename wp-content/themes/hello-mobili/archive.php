<?php
/**
 * The template for displaying archive pages
 *
 * @package WP-Mobili
 * @subpackage hello-mobili
 * @since 1.0.0
 */

get_header();

$description = get_the_archive_description();
global $wp_query;
?>
<div class="container">
    <?php if (have_posts()) : ?>
        <header class="page-header">
            <p class="page-sub-title"><?php
                if ($wp_query->post_count > 1) {
                    printf(__('%s results found.', 'hello-mobili'), $wp_query->post_count);
                } else if ($wp_query->post_count === 1) {
                    _e('One result found.', 'hello-mobili');
                } else {
                    _e('No results found.', 'hello-mobili');
                }
                ?></p>
            <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
            <?php if ($description) : ?>
                <div class="header-description"><?php echo wp_kses_post(wpautop($description)); ?></div>
            <?php endif; ?>
        </header><!-- .page-header -->
        <div class="row">
            <?php while (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="col-md-6">
                    <?php get_template_part('template-parts/content/content-card'); ?>
                </div>
            <?php endwhile; ?>
        </div>
        <?php echo hello_mobili_pagination(); ?>
    <?php else : ?>
        <?php get_template_part('template-parts/content/content-none'); ?>
    <?php endif; ?>
</div>
<?php get_footer(); ?>

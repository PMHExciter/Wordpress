<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
$options = travelism_get_theme_options();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( $class ); ?>>
    <div class="post-wrapper">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'post-thumbnail' ); ?>');">
        </div><!-- .featured-image -->
    <?php endif; ?>

        <div class="entry-container">
            <div class="entry-meta">
                <?php echo travelism_article_header_meta();  ?>
            </div><!-- .entry-meta -->

            <header class="entry-header">
                <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            </header>

            <div class="entry-content">
                <?php the_excerpt(); ?>
            </div><!-- .entry-content -->

        </div><!-- .entry-container -->
    </div><!-- .post-wrapper -->
</article>
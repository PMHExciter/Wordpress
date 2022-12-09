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
$options = travelism_get_theme_options();
$class = has_post_thumbnail() ? '' : 'no-post-thumbnail';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'clear ' . $class ); ?>>

	<?php if( has_post_thumbnail() ){ ?>

	<div class="featured-image">
		<a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url( 'large' ) ?>" alt="<?php the_title_attribute(); ?>"></a>
	</div>

	<?php } ?>
	
	<div class="entry-container">

		<div class="entry-content">
			<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'travelism' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'travelism' ),
				'after'  => '</div>',
				) );
				?>
			</div><!-- .entry-content -->
				
		</div><!-- .entry-container -->

		<div class="entry-meta">
			<?php 
				echo travelism_author_meta();

				travelism_posted_on(); 

				travelism_entry_footer(); ?>
		</div><!-- .entry-meta -->
	</article>
<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Hill_Sine
 */
global $hill_global;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				hill_sine_posted_on();
				hill_sine_posted_by();
				?>
				<?php hill_sine_entry_footer(); ?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php hill_sine_post_thumbnail(); ?>

	<div class="entry-content">
		<?php
		if ( is_search() || ! is_singular() || is_front_page()){
				if(empty(get_theme_mod( 'hill_excerpt_length', $hill_global['hill_excerpt_length'] ))){
						the_content();
				}else{
					$content = get_the_excerpt();
					echo '<p>';
					echo esc_attr(substr($content, 0, get_theme_mod( 'hill_excerpt_length', $hill_global['hill_excerpt_length'] )));
					echo '</p>';
				}
				
		}else{
			the_content(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'hill-sine' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hill-sine' ),
					'after'  => '</div>',
				)
			);
		}
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php
		if(!is_singular()){
		?>
			<div class="read_btn">	
				<a class='read_more buttons btn btn-primary btn-like-icon' href="<?php echo esc_url( get_permalink() ); ?>">
					<?php echo esc_html('Read More');?>
				</a>
			</div>
		<?php
		}
		?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->

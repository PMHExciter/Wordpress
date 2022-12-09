<?php

/**
 * Template part for displaying page content in index.php and archive.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @since 1.0.0
 * @package Newslist WordPress Theme
 */
$id = get_the_ID();
$thumbnail = get_the_post_thumbnail_url();
$enable_dummy = newslist_get( 'blog-enable-dummy-image' );
?>
<article <?php Newslist_Helper::schema_body( 'article' ); ?> id="post-<?php the_ID(); ?>" <?php post_class( Newslist_Helper::with_prefix( 'post' ) ); ?>>
	<div class="newslist-post-inner-box">
		<?php if( !empty( $thumbnail ) || $enable_dummy && empty( $thumbnail ) ): ?>
			<div class="newslist-post-image"> 
				<a href="<?php the_permalink() ?>">
					<div class="image-full post-image" style="background-image: url( '<?php the_post_thumbnail_url( array( 360, 252 ) ); ?>' ) , url( '<?php echo esc_attr( Newslist_Helper::get_theme_uri( 'assets/img/default-image.jpg' ) ); ?>' )">
						<?php Newslist_Helper::post_format_icon() ?>
					</div>
				</a>
			</div>
		<?php endif; ?>
		<div class="post-content-wrap">
			<?php

			$order = newslist_get( 'meta-sections-order' );

			if ( '' != $order ) {
				$order = json_decode( $order );
				foreach ( $order as $o ) {
					if ( 'title' == $o ) {
						Newslist_Helper::get_title();
					} elseif ( 'date' == $o ) {
						get_template_part('templates/meta', 'info');
					} elseif ( 'excerpt' == $o ) {
						the_excerpt();
					} elseif ( 'category' == $o ) {
						$category = newslist_get('post-category');
						if ( 'post' === get_post_type() && $category ) {
							echo Newslist_Helper::the_category();
						}
					} elseif ( 'comment' == $o ) {
						Newslist_Helper::get_comment_number();
					}
				}
			}
			?>
		</div>
	</div>
</article>
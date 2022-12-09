<?php
/**
 * Gallery section
 *
 * This is the template for the content of Gallery section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_gallery_section' ) ) :
	/**
	* Add Gallery section
	*
	*@since Travelism 1.0.0
	*/
	function travelism_add_gallery_section() {
		$options = travelism_get_theme_options();

			// Check if Destination is enabled on frontpage
			$gallery_enable = apply_filters( 'travelism_section_status', true, 'gallery_section_enable' );
			
			if ( true !== $gallery_enable ) {
				return false;
			}
			// Get Destination section details
			$section_details = array();
			$section_details = apply_filters( 'travelism_filter_gallery_section_details', $section_details );
			if ( empty( $section_details ) ) {
				return;
			}

			// Render Destination section now.
			travelism_render_gallery_section( $section_details );
		}
endif;

if ( ! function_exists( 'travelism_get_gallery_section_details' ) ) :
	/**
	* Gallery section details.
	*
	* @since Travelism 1.0.0
	* @param array $input popular destination section details.
	*/
	function travelism_get_gallery_section_details( $input ) {
		$options = travelism_get_theme_options();

		// Content type.
		$gallery_content_type  = $options['gallery_content_type'];
		$gallery_count = ! empty( $options['gallery_count'] ) ? $options['gallery_count'] : 4;
		
		$content 		= array();
		$args 			= array();
        $content['cats'] = array();
		switch ( $gallery_content_type ) {

			case 'post':
				$post_ids = array();

				for ( $i = 1; $i <= $gallery_count; $i++ ) {
					if ( ! empty( $options['gallery_content_post_' . $i] ) )
						$post_ids[] = $options['gallery_content_post_' . $i];
				}
				$args = array(
					'post_type'         	=> 'post',
					'post__in'          	=> ( array ) $post_ids,
					'posts_per_page'    	=> absint( $gallery_count ),
					'orderby'           	=> 'post__in',
					'ignore_sticky_posts'   => true,
					);                    
			break;

			case 'trip':
				if ( ! class_exists( 'WP_Travel' ) )
					return;

				$page_ids = array();

				for ( $i = 1; $i <= $gallery_count; $i++ ) {
					if ( ! empty( $options['gallery_content_trip_' . $i] ) )
						$page_ids[] = $options['gallery_content_trip_' . $i];
				}
				
				$args = array(
					'post_type'         => 'itineraries',
					'post__in'          => ( array ) $page_ids,
					'posts_per_page'    => absint( $gallery_count ),
					'orderby'           => 'post__in',
					);   

				$content['taxonomy'] = 'travel_locations';

			break;

			default:
			break;
		}

		$content['details'] = array();
		$query = new WP_Query( $args );
		if ( $query->have_posts() ) : 
			while ( $query->have_posts() ) : $query->the_post();
				$page_post['id']        = get_the_id();
				$page_post['title']     = get_the_title();
				$page_post['url']       = get_the_permalink();
				$page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : get_template_directory_uri() . '/assets/uploads/no-gallery-image-590x650.jpg';
				// Push to the main array.
				array_push( $content['details'], $page_post );
			endwhile;
		endif;

		wp_reset_postdata();
		if ( ! empty( $content ) ) {
				$input = $content;
		}
		return $input;
	}
endif;

// Destination section content details.
add_filter( 'travelism_filter_gallery_section_details', 'travelism_get_gallery_section_details' );


if ( ! function_exists( 'travelism_render_gallery_section' ) ) :
	/**
	 * Start Destination section
	 *
	 * @return string Destination content
	 * @since Travelism 1.0.0
	 *
	 */
	 function travelism_render_gallery_section( $content_details = array() ) {
		$options = travelism_get_theme_options();

		$gallery_sub_title 		= !empty($options['gallery_sub_title']) ? $options['gallery_sub_title'] : '';
		$gallery_title 			= !empty($options['gallery_title']) ? $options['gallery_title'] : '';
		$gallery_btn_label 		= !empty($options['gallery_btn_label']) ? $options['gallery_btn_label'] : '';
		$gallery_btn_url 		= !empty($options['gallery_btn_url']) ? $options['gallery_btn_url'] : '';

		if ( empty( $content_details ) ) {
				return;
		} ?>
		
		<div id="travelism_gallery_section" class="relative page-section same-background">
			<div class="wrapper">
				<div class="section-header">
					<?php if( !empty( $gallery_sub_title ) ): ?>
						<h3 class="section-subtitle"><?php echo esc_html( $gallery_sub_title ); ?></h3>
					<?php endif;
					if( !empty( $gallery_title ) ):
						?>
					<h2 class="section-title"><?php echo esc_html( $gallery_title ); ?></h2>
				<?php endif; ?>
			</div><!-- .section-header -->

			<div class="gallery-content" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": false }'>

				<?php foreach ( $content_details['details'] as $content ):

				$taxonomy = isset($content_details['taxonomy']) ? $content_details['taxonomy'] : 'category';
				$terms =  get_the_terms( $content['id'], $taxonomy);

				?>


				<article class="has-post-thumbnail" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
					<div class="entry-header-wrapper clear">
						<header class="entry-header">
							<?php if( ! empty( $terms ) && ! is_wp_error( $terms ) ) : ?>
								<span class="location">
									<a href="<?php echo esc_url(get_term_link($terms[0]->term_id, $taxonomy)); ?>"><?php echo esc_html($terms[0]->name); ?></a>
								</span>
							<?php endif; ?>
							<h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
						</header>   
					</article>

				<?php endforeach; ?>

			</div><!-- .gallery-content -->

			<?php if( !empty( $gallery_btn_url ) && !empty( $gallery_btn_label ) ): ?>
				<div class="read-story">
					<a href="<?php echo esc_url( $gallery_btn_url ); ?>" class="btn"><?php echo esc_html( $gallery_btn_label ); ?></a>
				</div>
			<?php endif; ?>
		</div><!-- .wrapper -->
	</div><!-- #travelism_gallery_section -->
	
<?php }
endif;
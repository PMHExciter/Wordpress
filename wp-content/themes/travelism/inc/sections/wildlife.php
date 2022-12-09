<?php
/**
 * Wildlife section
 *
 * This is the template for the content of wildlife section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_wildlife_section' ) ) :
    /**
    * Add wildlife section
    *
    *@since Travelism 1.0.0
    */
    function travelism_add_wildlife_section() {
    	$options = travelism_get_theme_options();
        // Check if wildlife is enabled on frontpage
        $wildlife_enable = apply_filters( 'travelism_section_status', true, 'wildlife_section_enable' );

        if ( true !== $wildlife_enable ) {
            return false;
        }
        // Get wildlife section details
        $section_details = array();
        $section_details = apply_filters( 'travelism_filter_wildlife_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render wildlife section now.
        travelism_render_wildlife_section( $section_details );
    }
endif;

if ( ! function_exists( 'travelism_get_wildlife_section_details' ) ) :
    /**
    * wildlife section details.
    *
    * @since Travelism 1.0.0
    * @param array $input wildlife section details.
    */
    function travelism_get_wildlife_section_details( $input ) {
        $options = travelism_get_theme_options();
        
        $content = array();
        $post_ids = array();

                for ( $i = 1; $i <= 1; $i++ ) {
                    if ( ! empty( $options['wildlife_content_post'] ) )
                        $post_ids[] = $options['wildlife_content_post'];
                }
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 1 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );


            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = travelism_trim_content( 40 );
                    $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : '';

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();
            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// wildlife section content details.
add_filter( 'travelism_filter_wildlife_section_details', 'travelism_get_wildlife_section_details' );


if ( ! function_exists( 'travelism_render_wildlife_section' ) ) :
  /**
   * Start wildlife section
   *
   * @return string wildlife content
   * @since Travelism 1.0.0
   *
   */
   function travelism_render_wildlife_section( $content_details = array() ) {
        $options = travelism_get_theme_options();
        $wildlife_sub_title        = !empty($options['wildlife_sub_title']) ? $options['wildlife_sub_title'] : '';
        $wildlife_btn_label        = !empty($options['wildlife_btn_label']) ? $options['wildlife_btn_label'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="travelism_wildlife_section" class="relative page-section">
        	<div class="wrapper">

        		<?php foreach ($content_details as $content ): ?>

        			<article class="has-post-thumbnail">
        				<div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
        					<a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
        				</div><!-- .featured-image -->

        				<div class="entry-container">
        					<div class="section-header">
        						<?php if( !empty( $wildlife_sub_title ) ): ?>
        							<h3 class="section-subtitle"><?php echo esc_html( $wildlife_sub_title ); ?></h3>
        						<?php endif; ?>
        						<h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
        					</div><!-- .section-header -->

        					<div class="entry-content">
        						<p><?php echo esc_html( $content['excerpt'] ); ?></p>
        					</div><!-- .entry-content -->

        					<?php if( !empty( $wildlife_btn_label ) ): ?>
        						<div class="read-story">
        							<a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $wildlife_btn_label ); ?></a>
        						</div>
        					<?php endif; ?>
        				</div><!-- .entry-container -->
        			</article>

        		<?php endforeach; ?>

        	</div>
        </div><!-- #travelism_wildlife_section -->
       
    <?php }
endif;
<?php
/**
 * Blog Slider section
 *
 * This is the template for the content of blog_slider section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_blog_slider_section' ) ) :
    /**
    * Add blog_slider section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_blog_slider_section() {
        
        // Check if client is enabled on frontpage
        if ( get_theme_mod( 'blog_slider_section_enable' ) == false ) {
            return false;
        }

        // Get blog_slider section details
        $section_details = array();
        $section_details = apply_filters( 'corpo_travelism_filter_blog_slider_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog_slider section now.
        corpo_travelism_render_blog_slider_section( $section_details );
    }

endif;

if ( ! function_exists( 'corpo_travelism_get_blog_slider_section_details' ) ) :
    /**
    * blog_slider section details.
    *
    * @since Corpo Travelism 1.0.0
    * @param array $input blog_slider section details.
    */
    function corpo_travelism_get_blog_slider_section_details( $input ) {
        $content  = array();
        $post_ids = array();
        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( get_theme_mod( 'blog_slider_content_post_'.$i ) ) )
                $post_ids[] = get_theme_mod( 'blog_slider_content_post_'.$i );
        }

        $args = array(
            'post_type'         => 'post',
            'post__in'          => ( array ) $post_ids,
            'posts_per_page'    => absint( 3 ),
            'orderby'           => 'post__in',
        );

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = travelism_trim_content( 25 );
                    $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// blog_slider section content details.
add_filter( 'corpo_travelism_filter_blog_slider_section_details', 'corpo_travelism_get_blog_slider_section_details' );


if ( ! function_exists( 'corpo_travelism_render_blog_slider_section' ) ) :
  /**
   * Start blog_slider section
   *
   * @return string blog_slider content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_blog_slider_section( $content_details = array() ) {

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="travelism_blog_slider_section" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1500, "dots": true, "arrows": false, "autoplay": false, "draggable": true, "fade": false }'>
            <?php foreach ( $content_details as $content ): ?>
                <article style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                    <div class="wrapper">
                        <div class="blog-slider-content">
                            <?php if (!empty(get_theme_mod( 'blog_slider_title', __( 'We Provide', 'corpo-travelism' )))) : ?>
                                <h4 class="sub-title"><?php echo esc_html( get_theme_mod( 'blog_slider_title', __( 'We Provide', 'corpo-travelism' ) ) ); ?></h4>
                            <?php endif; ?>
                            <header class="entry-header">
                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                            </header> 
                            <div class="entry-content">
                                 <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->

                            <?php if ( !empty(get_theme_mod( 'blog_slider_btn_title', __( 'Learn More', 'corpo-travelism' )))) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn btn-primary" tabindex="-1"><?php echo esc_html( get_theme_mod( 'blog_slider_btn_title', __( 'Learn More', 'corpo-travelism' ) ) ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .blog-slider-content -->
                    </div><!-- .wrapper -->
                </article>
            <?php endforeach; ?>
        </div><!-- #travelism_blog_slider_section -->

<?php }
endif;
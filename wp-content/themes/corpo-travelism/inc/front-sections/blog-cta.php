<?php
/**
 * Blog CTA section
 *
 * This is the template for the content of blog_cta section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_blog_cta_section' ) ) :
    /**
    * Add blog_cta section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_blog_cta_section() {
        
        // Check if client is enabled on frontpage
        if ( get_theme_mod( 'blog_cta_section_enable' ) == false ) {
            return false;
        }

        // Get blog_cta section details
        $section_details = array();
        $section_details = apply_filters( 'corpo_travelism_filter_blog_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render blog_cta section now.
        corpo_travelism_render_blog_cta_section( $section_details );
    }

endif;

if ( ! function_exists( 'corpo_travelism_get_blog_cta_section_details' ) ) :
    /**
    * blog_cta section details.
    *
    * @since Corpo Travelism 1.0.0
    * @param array $input blog_cta section details.
    */
    function corpo_travelism_get_blog_cta_section_details( $input ) {
        $content  = array();
        $page_id = ! empty( get_theme_mod('blog_cta_content_page') ) ? get_theme_mod('blog_cta_content_page') : '';

        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => absint( 1 ),
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
// blog_cta section content details.
add_filter( 'corpo_travelism_filter_blog_cta_section_details', 'corpo_travelism_get_blog_cta_section_details' );


if ( ! function_exists( 'corpo_travelism_render_blog_cta_section' ) ) :
  /**
   * Start blog_cta section
   *
   * @return string blog_cta content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_blog_cta_section( $content_details = array() ) {

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <?php foreach ( $content_details as $content ): ?>
            <div id="travelism_blog_cta_section" class="relative page-section same-background">
                <div class="wrapper">
                    <article style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        <div class="overlay"></div>
                        <div class="entry-container">
                            <?php if(!empty(get_theme_mod('blog_cta_video_url'))) : ?>
                                <div class="video-button">
                                    <a href="<?php echo esc_url(get_theme_mod('blog_cta_video_url')); ?>" class="popup-video"><i class="fa fa-play"></i></a>
                                </div><!-- .video-button -->
                            <?php endif; ?>

                            <header class="entry-header">
                                <h2 class="entry-title"><?php echo esc_html( $content['title'] ) ; ?></h2>
                            </header> 

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                        </div>
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #travelism_blog_call-to-action_section -->
        <?php endforeach; ?>
<?php }
endif;
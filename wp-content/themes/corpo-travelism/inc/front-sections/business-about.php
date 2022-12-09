<?php
/**
 * Business About section
 *
 * This is the template for the content of business_about section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_business_about_section' ) ) :
    /**
    * Add business_about section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_business_about_section() {
        
        // Check if client is enabled on frontpage
        if ( get_theme_mod( 'business_about_section_enable' ) == false ) {
            return false;
        }

        // Get business_about section details
        $section_details = array();
        $section_details = apply_filters( 'corpo_travelism_filter_business_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render business_about section now.
        corpo_travelism_render_business_about_section( $section_details );
    }

endif;

if ( ! function_exists( 'corpo_travelism_get_business_about_section_details' ) ) :
    /**
    * business_about section details.
    *
    * @since Corpo Travelism 1.0.0
    * @param array $input business_about section details.
    */
    function corpo_travelism_get_business_about_section_details( $input ) {
        $content  = array();
        $page_id = ! empty( get_theme_mod('business_about_content_page') ) ? get_theme_mod('business_about_content_page') : '';

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
// business_about section content details.
add_filter( 'corpo_travelism_filter_business_about_section_details', 'corpo_travelism_get_business_about_section_details' );


if ( ! function_exists( 'corpo_travelism_render_business_about_section' ) ) :
  /**
   * Start business_about section
   *
   * @return string business_about content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_business_about_section( $content_details = array() ) {

        if ( empty( $content_details ) ) {
            return;
        } ?>
        <?php foreach ( $content_details as $content ): ?>
            <div id="travelism_business_about_section" class="relative page-section same-background">
                <div class="wrapper">
                    <article class="has-post-thumbnail">
                        <div class="featured-image"  style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        </div><!-- .featured-image -->

                        <div class="entry-container">
                            <div class="section-header">
                                <?php if (!empty(get_theme_mod( 'business_about_title', __( 'Creative Vision', 'corpo-travelism' )))) : ?>
                                    <p class="section-subtitle"><?php echo esc_html( get_theme_mod( 'business_about_title', __( 'Creative Vision', 'corpo-travelism' ) ) ); ?></p>
                                <?php endif; ?>
                                <h2 class="section-title"><a href="?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html($content['title']); ?></a></h2>
                            </div><!-- .section-header -->

                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->
                            <?php if ( !empty(get_theme_mod( 'business_about_btn_title', __( 'More About Us', 'corpo-travelism' )))) : ?>
                                <div class="read-more">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="btn"><?php echo esc_html( get_theme_mod( 'business_about_btn_title', __( 'More About Us', 'corpo-travelism' ) ) ); ?></a>
                                </div><!-- .read-more -->
                            <?php endif; ?>
                        </div><!-- .entry-container -->
                    </article>
                </div><!-- .wrapper -->
            </div><!-- #travelism_business_about_section -->
        <?php endforeach; ?>
<?php }
endif;
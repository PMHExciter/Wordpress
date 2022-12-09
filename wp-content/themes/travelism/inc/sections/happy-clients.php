<?php
/**
 * Happy Clients section
 *
 * This is the template for the content of happy_clients section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_happy_clients_section' ) ) :
    /**
    * Add happy_clients section
    *
    *@since Travelism 1.0.0
    */
    function travelism_add_happy_clients_section() {
        $options = travelism_get_theme_options();
        // Check if happy_clients is enabled on frontpage
        $happy_clients_enable = apply_filters( 'travelism_section_status', true, 'happy_clients_section_enable' );

        if ( true !== $happy_clients_enable ) {
            return false;
        }
        // Get happy_clients section details
        $section_details = array();
        $section_details = apply_filters( 'travelism_filter_happy_clients_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render happy_clients section now.
        travelism_render_happy_clients_section( $section_details );
    }
endif;

if ( ! function_exists( 'travelism_get_happy_clients_section_details' ) ) :
    /**
    * happy_clients section details.
    *
    * @since Travelism 1.0.0
    * @param array $input happy_clients section details.
    */
    function travelism_get_happy_clients_section_details( $input ) {
        $options = travelism_get_theme_options();

        $content = array();
         $page_ids = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['happy_clients_content_page_' . $i] ) ) :
                        $page_ids[] = $options['happy_clients_content_page_' . $i];
                        
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'page',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( 3 ),
                    'orderby'           => 'post__in',
                    ); 

        // Run The Loop.
        $query = new WP_Query( $args );
        $i = 0;
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = travelism_trim_content( 30 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

                // Push to the main array.
                array_push( $content, $page_post );
                $i++;
            endwhile;
        endif;
        wp_reset_postdata();
    
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// happy_clients section content details.
add_filter( 'travelism_filter_happy_clients_section_details', 'travelism_get_happy_clients_section_details' );

if ( ! function_exists( 'travelism_render_happy_clients_section' ) ) :
  /**
   * Start happy_clients section
   *
   * @return string happy_clients content
   * @since Travelism 1.0.0
   *
   */
   function travelism_render_happy_clients_section( $content_details = array() ) {
        $options = travelism_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } ?>
       
       <div id="travelism_happy_clients_section" class="relative page-section">
                <div class="wrapper">
                    <div class="section-header">
                    <?php if( !empty( $options['happy_clients_section_sub_title'] ) ): ?>
                        <h3 class="section-subtitle"><?php echo esc_html( $options['happy_clients_section_sub_title'] ); ?></h3>
                    <?php endif;

                    if( !empty( $options['happy_clients_section_title'] ) ): ?>
                        <h2 class="section-title"><?php echo esc_html( $options['happy_clients_section_title'] ); ?></h2>
                    <?php endif; ?>
                    </div><!-- .section-header -->

                    <div class="happy-clients-content" data-slick='{"slidesToShow": 3, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":false, "autoplay": false, "draggable": true, "fade": false }'>
                        
                        <?php $i = 1 ; foreach ( $content_details as $content ) : ?>

                        <article>
                            <div class="testimonial-item">
                                <div class="entry-container">
                                    <div class="entry-content">
                                        <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                    <?php echo travelism_get_svg( array( 'icon' => 'quote' ) ); ?>
                                </div><!-- .entry-container -->

                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><img src="<?php echo esc_url( $content['image'] ); ?>" alt="testimonial"></a>
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>" tabindex="0"><?php echo esc_html( $content['title'] ); ?></a></h2>

                                        <?php if( !empty( $options['happy_clients_client_position_'.$i] ) ): ?>

                                        <span class="testimonial-position"><?php echo esc_html( $options['happy_clients_client_position_'.$i] ); ?></span>

                                    <?php endif; ?>

                                    </header>
                                </div><!-- .featured-image -->
                            </div>
                        </article>

                        <?php $i++ ; endforeach ; ?>

                    </div>

                </div>
            </div><!-- #travelism_happy_clients_section -->
       
    <?php }
endif;

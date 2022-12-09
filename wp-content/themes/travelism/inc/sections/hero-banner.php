<?php
/**
 * Hero Banner section
 *
 * This is the template for the content of hero banner section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_hero_banner_section' ) ) :
    /**
    * Add hero banner section
    *
    *@since Travelism 1.0.0
    */
    function travelism_add_hero_banner_section() {
    	$options = travelism_get_theme_options();
        // Check if hero banner is enabled on frontpage
        $hero_banner_enable = apply_filters( 'travelism_section_status', true, 'hero_banner_section_enable' );

        if ( true !== $hero_banner_enable ) {
            return false;
        }
        // Get hero banner section details
        $section_details = array();
        $section_details = apply_filters( 'travelism_filter_hero_banner_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render hero banner section now.
        travelism_render_hero_banner_section( $section_details );
    }
endif;

if ( ! function_exists( 'travelism_get_hero_banner_section_details' ) ) :
    /**
    * hero banner section details.
    *
    * @since Travelism 1.0.0
    * @param array $input hero banner section details.
    */
    function travelism_get_hero_banner_section_details( $input ) {
        $options = travelism_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['hero_banner_content_page'] ) ? $options['hero_banner_content_page'] : '';
                $args = array(
                    'post_type'         => 'page',
                    'page_id'           => $page_id,
                    'posts_per_page'    => 1,
                    );  

            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['id']        = get_the_id();
                    $page_post['title']     = get_the_title();
                    $page_post['excerpt']   = travelism_trim_content( 50 );
                    $page_post['url']       = get_the_permalink();
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
// hero banner section content details.
add_filter( 'travelism_filter_hero_banner_section_details', 'travelism_get_hero_banner_section_details' );


if ( ! function_exists( 'travelism_render_hero_banner_section' ) ) :
  /**
   * Start hero banner section
   *
   * @return string hero banner content
   * @since Travelism 1.0.0
   *
   */
   function travelism_render_hero_banner_section( $content_details = array() ) {
        $options = travelism_get_theme_options();

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : 
            $hero_banner_bg_image = !empty( $options['hero_banner_bg_image'] ) ? $options['hero_banner_bg_image'] : '';
            $hero_banner_sub_title = !empty( $options['hero_banner_sub_title'] ) ? $options['hero_banner_sub_title'] : '';
            $hero_banner_btn_title = !empty( $options['hero_banner_btn_title'] ) ? $options['hero_banner_btn_title'] : '';
            $content_bg_image = !empty( $options['hero_banner_content_bg_image'] ) ? $options['hero_banner_content_bg_image'] : '';
        ?>
            
            <div id="travelism_hero_banner_section" style="background-image: url('<?php echo esc_url( $hero_banner_bg_image ); ?>');">
                <div class="wrapper">

                    <article class="has-post-thumbnail">
                        <div class="featured-image hero-match-height" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                        </div>
                        <div class="entry-container hero-match-height" style="background-image: url('<?php echo esc_url( $content_bg_image ); ?>');">
                            <header class="entry-header">

                            <?php if( !empty( $content['title'] ) ): ?>

                                <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>

                            <?php endif; ?>

                                <h3 class="section-subtitle"><?php echo esc_html( $hero_banner_sub_title ); ?></h3>
                            </header>
                            <div class="entry-content">
                                <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                            </div><!-- .entry-content -->

                            <?php if( !empty( $hero_banner_btn_title ) ): ?>

                            <div class="read-more">
                                <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn"><?php echo esc_html( $hero_banner_btn_title ); ?></a>
                            </div>

                        <?php endif; ?>

                        </div>
                    </article>
                
                </div>
            </div><!-- #travelism_hero_banner_section -->
            
        <?php endforeach;
    }
endif;
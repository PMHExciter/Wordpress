<?php
/**
 * Business Team section
 *
 * This is the template for the content of business_team section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_business_team_section' ) ) :
    /**
    * Add business_team section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_business_team_section() {
        
        // Check if client is enabled on frontpage
        if ( get_theme_mod( 'business_team_section_enable' ) == false ) {
            return false;
        }

        // Get business_team section details
        $section_details = array();
        $section_details = apply_filters( 'corpo_travelism_filter_business_team_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render business_team section now.
        corpo_travelism_render_business_team_section( $section_details );
    }

endif;

if ( ! function_exists( 'corpo_travelism_get_business_team_section_details' ) ) :
    /**
    * business_team section details.
    *
    * @since Corpo Travelism 1.0.0
    * @param array $input business_team section details.
    */
    function corpo_travelism_get_business_team_section_details( $input ) {
        $content  = array();
        $post_ids = array();
        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( get_theme_mod( 'business_team_content_post_'.$i ) ) )
                $post_ids[] = get_theme_mod( 'business_team_content_post_'.$i );
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
// business_team section content details.
add_filter( 'corpo_travelism_filter_business_team_section_details', 'corpo_travelism_get_business_team_section_details' );


if ( ! function_exists( 'corpo_travelism_render_business_team_section' ) ) :
  /**
   * Start business_team section
   *
   * @return string business_team content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_business_team_section( $content_details = array() ) {

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="travelism_business_team_section" class="relative page-section same-background">
            <div class="wrapper">
                <div class="section-header">
                    <?php if(!empty(get_theme_mod( 'business_team_subtitle', __( 'OUR TEAM', 'corpo-travelism' )))) : ?>
                        <p class="section-subtitle"><?php echo esc_html(get_theme_mod( 'business_team_subtitle', __( 'OUR TEAM', 'corpo-travelism' ))); ?></p>
                    <?php endif; ?>
                    <?php if(!empty(get_theme_mod( 'business_team_title', __( 'Who We Have', 'corpo-travelism' )))) : ?>
                        <h2 class="section-title"><?php echo esc_html(get_theme_mod( 'business_team_title', __( 'Who We Have', 'corpo-travelism' ))); ?></h2>
                    <?php endif; ?>
                </div><!-- .section-header -->

                <div class="section-content col-3 clear">
                    <?php $i=1; foreach ( $content_details as $content ): ?>
                        <article>
                            <div class="team-item-wrapper">
                                <div class="featured-image">
                                    <a href="<?php echo esc_url( $content['url'] ) ; ?>"><img src="<?php echo esc_url( $content['image'] ) ; ?>" alt="team"></a>
                                </div><!-- .featured-image -->

                                <div class="entry-container">
                                    <header class="entry-header">
                                        <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ) ; ?>"><?php echo esc_html( $content['title'] ) ; ?></a></h2>
                                        <?php if( !empty( get_theme_mod('business_team_position_'.$i) ) ): ?>
                                            <span class="team-position"><?php echo esc_html( get_theme_mod('business_team_position_'.$i) ) ?></span>
                                        <?php endif; ?>
                                    </header>

                                    <div class="social-icons">
                                        <ul>
                                            <?php 
                                            $business_team_socials = ! empty(get_theme_mod('business_team_social_' . $i) ) ? explode( '|',get_theme_mod('business_team_social_' . $i) ) : array(); 

                                            foreach ( $business_team_socials as $business_team_social ) : ?>
                                                <li>
                                                    <a href="<?php echo esc_url( $business_team_social ); ?>"><?php echo travelism_return_social_icon( $business_team_social ); ?></a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div><!-- .social-icons -->
                                </div><!-- .entry-container -->
                            </div><!-- team-item-wrapper -->
                        </article>
                    <?php $i++; endforeach; ?>   
                </div><!-- .col-3 -->
            </div><!-- .wrapper -->
        </div><!-- #travelism_business_team_section -->

<?php }
endif;
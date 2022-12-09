<?php
/**
 * Logos section
 *
 * This is the template for the content of partners section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_logos_section' ) ) :
    /**
    * Add partners section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_logos_section() {
         // Check if featured_posts is enabled on frontpage
        if ( get_theme_mod( 'logos_section_enable' ) == false ) {
            return false;
        }
        // Render partners section now.
        corpo_travelism_render_logos_section();
    }
endif;

if ( ! function_exists( 'corpo_travelism_render_logos_section' ) ) :
  /**
   * Start partners section
   *
   * @return string partners content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_logos_section() {      
        ?>

      <div id="travelism_logos_section" class="logos col-4 relative same-background page-section">
        <div class="wrapper">

            <?php for ( $i = 1; $i <= 4; $i++){ ?>

            <article>
              <?php if( !empty( get_theme_mod( 'logos_url_' . $i ) ) && !empty( get_theme_mod( 'logos_image_' . $i ) ) ): ?>
                <div class="featured-image">
                  <a href="<?php echo esc_url(get_theme_mod( 'logos_url_' . $i )); ?>" target="_blank"><img src="<?php echo esc_url(get_theme_mod( 'logos_image_' . $i )); ?>" alt="sponsor"></a>
                </div><!-- .featured-image -->
              <?php endif; ?>
            </article>

            <?php } ?>

        </div><!-- .wrapper -->
      </div><!-- #corpo_travelism_our_logos_section -->
            
    <?php }
endif;
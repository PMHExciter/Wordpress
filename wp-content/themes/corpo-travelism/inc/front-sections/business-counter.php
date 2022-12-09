<?php
/**
 * Counter section
 *
 * This is the template for the content of counter section
 *
 * @package Theme Palace
 * @subpackage Corpo Travelism
 * @since Corpo Travelism 1.0.0
 */
if ( ! function_exists( 'corpo_travelism_add_business_counter_section' ) ) :
    /**
    * Add counter section
    *
    *@since Corpo Travelism 1.0.0
    */
    function corpo_travelism_add_business_counter_section() {
        if ( get_theme_mod( 'business_counter_section_enable' ) == false ) {
            return false;
        }

        // Render counter section now.
        corpo_travelism_render_business_counter_section();
    }
endif;

if ( ! function_exists( 'corpo_travelism_render_business_counter_section' ) ) :
  /**
   * Start counter section
   *
   * @return string counter content
   * @since Corpo Travelism 1.0.0
   *
   */
   function corpo_travelism_render_business_counter_section() {
        $image   = !empty( get_theme_mod( 'business_counter_image' ) ) ? get_theme_mod( 'business_counter_image' ) : ''; 
        ?>

        <div id="travelism_business_counter_section" class="relative page-section" style="background-image: url('<?php echo esc_url($image); ?>');">
          <div class="overlay"></div>
          <div class="wrapper">
            <div class="section-content col-4 clear">
              <?php for ( $i = 1; $i <= 4; $i++){
                $icon =  empty( get_theme_mod( 'business_counter_icon_'.$i ) ) ? 'fa-handshake-o' : get_theme_mod( 'business_counter_icon_'.$i ) ;
                ?>
                <article>
                  <div class="counter-item">
                    <div class="counter-icon">
                      <i class="fa <?php echo esc_attr( $icon ); ?>"></i>
                    </div>
                    <?php if( !empty( get_theme_mod( 'business_counter_value_' . $i ) ) ): ?>
                      <h2 class="counter-value"><?php echo esc_html( get_theme_mod( 'business_counter_value_' . $i ) ); ?></h2>
                    <?php endif;

                    if( !empty( get_theme_mod( 'business_counter_label_' . $i ) ) ):
                      ?>
                      <h3 class="counter-title"><?php echo esc_html( get_theme_mod( 'business_counter_label_' . $i ) ); ?></h3>
                    <?php endif; ?>
                  </div><!-- .counter-item -->
                </article>
              <?php } ?>
            </div><!-- .section-content -->
          </div><!-- .wrapper -->
        </div><!-- #travelism_business_counter_section -->    
    <?php }
endif;
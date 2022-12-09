<?php
/**
 * northface_jacket section
 *
 * This is the template for the content of northface_jacket section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_northface_jacket_section' ) ) :
    /**
    * Add northface_jacket section
    *
    *@since Travelism 1.0.0
    */
    function travelism_add_northface_jacket_section() {
    	$options = travelism_get_theme_options();
        // Check if northface_jacket is enabled on frontpage
        $northface_jacket_enable = apply_filters( 'travelism_section_status', true, 'northface_jacket_section_enable' );

        if ( ( true !== $northface_jacket_enable ) || ! class_exists( 'WooCommerce' ) ) {
            return false;
        }
        // Get northface_jacket section details
        $section_details = array();
        $section_details = apply_filters( 'travelism_filter_northface_jacket_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render northface_jacket section now.
        travelism_render_northface_jacket_section( $section_details );
    }
endif;

if ( ! function_exists( 'travelism_get_northface_jacket_section_details' ) ) :
    /**
    * northface_jacket section details.
    *
    * @since Travelism 1.0.0
    * @param array $input northface_jacket section details.
    */
    function travelism_get_northface_jacket_section_details( $input ) {
        $options = travelism_get_theme_options();
        
        $content = array();
         $page_ids = array();

                for ( $i = 1; $i <= 2; $i++ ) {
                    if ( ! empty( $options['northface_jacket_content_page_' . $i] ) )
                        $page_ids[] = $options['northface_jacket_content_page_' . $i];
                }

                $args = array(
                    'post_type'         => 'product',
                    'post__in'          => ( array ) $page_ids,
                    'posts_per_page'    => absint( 2 ),
                    'orderby'           => 'post__in',
                    );

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = travelism_trim_content( 30 );
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
// northface_jacket section content details.
add_filter( 'travelism_filter_northface_jacket_section_details', 'travelism_get_northface_jacket_section_details' );


if ( ! function_exists( 'travelism_render_northface_jacket_section' ) ) :
  /**
   * Start northface_jacket section
   *
   * @return string northface_jacket content
   * @since Travelism 1.0.0
   *
   */
   function travelism_render_northface_jacket_section( $content_details = array() ) {
        $options = travelism_get_theme_options();

        $bg_image = !empty( $options['northface_jacket_bg_image'] ) ? $options['northface_jacket_bg_image'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>
        
        <div id="travelism_northface_jacket_section" class="relative page-section">
                <div class="wrapper">
                    <div class="section-header">
                    <?php if( !empty( $options['northface_jacket_sub_title'] ) ): ?>
                        <p class="section-subtitle"><?php echo esc_html( $options['northface_jacket_sub_title'] ); ?></p>
                    <?php endif;

                    		if( !empty( $options['northface_jacket_title'] ) ):
                     ?>
                        <h2 class="section-title"><?php echo esc_html( $options['northface_jacket_title'] ); ?></h2>

                    <?php endif; ?>
                    </div>
                     <ul class="products-slider" style="background-image: url('<?php echo esc_url( $bg_image ); ?>');" data-slick='{"slidesToShow": 1, "slidesToScroll": 1, "infinite": true, "speed": 1000, "dots": false, "arrows":true, "autoplay": false, "draggable": true, "fade": true }'>
                        
                        <?php foreach ( $content_details as $content ): 
                                $image = $content['image'] == '' ? get_template_directory_uri().'/assets/uploads/no-featured-image-590x650.jpg' : $content['image'] ;
                            ?>

                        <li class="product featured-products">
                            <div class="featured-image">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <img src="<?php echo esc_url($image); ?>">
                                </a>
                            </div>
                            <div class="product-content">
                                <a href="<?php echo esc_url( $content['url'] ) ; ?>" class="woocommerce-LoopProduct-link woocommerce-loop-product__link">
                                    <h2 class="woocommerce-loop-product__title"><?php echo esc_html( $content['title'] ); ?></h2>
                                </a>
                                
                                <span class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </span>
                                <span class="price">
                                   <?php 
                                        $product = new WC_Product( $content['id'] );
                                        echo $product->get_price_html();
                                        ?>
                                </span>
                                <span class="per-piece">
                                    <?php _e('Per Piece', 'travelism'); ?>
                                </span>
                                <a href="<?php echo do_shortcode( '[add_to_cart_url id="' . absint( $content['id'] ) . '"]' ); ?>" class="button product_type_simple add_to_cart_button ajax_add_to_cart"><?php esc_html_e('Add to cart', 'travelism'); ?></a>
                            </div>
                        </li>

                        <?php endforeach; ?>

                    </ul><!-- .product-slider -->
                </div><!-- .wrapper -->
            </div><!-- #travelism_northface_jacket_section -->
     
    <?php }
endif;
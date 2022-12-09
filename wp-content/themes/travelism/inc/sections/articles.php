<?php
/**
 * Articles section
 *
 * This is the template for the content of articles section
 *
 * @package Theme Palace
 * @subpackage Travelism
 * @since Travelism 1.0.0
 */
if ( ! function_exists( 'travelism_add_articles_section' ) ) :
    /**
    * Add articles section
    *
    *@since Travelism 1.0.0
    */
    function travelism_add_articles_section() {
        $options = travelism_get_theme_options();
        // Check if articles is enabled on frontpage
        $articles_enable = apply_filters( 'travelism_section_status', true, 'articles_section_enable' );

        if ( true !== $articles_enable ) {
            return false;
        }
        // Get articles section details
        $section_details = array();
        $section_details = apply_filters( 'travelism_filter_articles_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render articles section now.
        travelism_render_articles_section( $section_details );
    }
endif;

if ( ! function_exists( 'travelism_get_articles_section_details' ) ) :
    /**
    * articles section details.
    *
    * @since Travelism 1.0.0
    * @param array $input articles section details.
    */
    function travelism_get_articles_section_details( $input ) {
        $options = travelism_get_theme_options();

        // Content type.
        $articles_content_type  = $options['articles_content_type'];
        $content = array();
        switch ( $articles_content_type ) {

            case 'post':
                $post_ids = array();
                $author = array();

                for ( $i = 1; $i <= 3; $i++ ) {
                    if ( ! empty( $options['articles_content_post_' . $i] ) ) :
                        $post_ids[] = $options['articles_content_post_' . $i];
                    endif;
                }
                
                $args = array(
                    'post_type'         => 'post',
                    'post__in'          => ( array ) $post_ids,
                    'posts_per_page'    => absint( 3 ),
                    'orderby'           => 'post__in',
                    'ignore_sticky_posts'   => true,
                    );                    
            break;

            case 'category':
                $cat_id = ! empty( $options['articles_content_category'] ) ? $options['articles_content_category'] : '';
                $args = array(
                    'post_type'         => 'post',
                    'posts_per_page'    => absint( 3 ),
                    'cat'               => absint( $cat_id ),
                    'ignore_sticky_posts'   => true,
                    );                    
            break;
            
            default:
            break;
        }

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['id']        = get_the_id();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = travelism_trim_content( 15 );
                $page_post['image']     = has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'large' ) : get_template_directory_uri() . '/assets/uploads/no-featured-image-590x650.jpg';

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
// articles section content details.
add_filter( 'travelism_filter_articles_section_details', 'travelism_get_articles_section_details' );


if ( ! function_exists( 'travelism_render_articles_section' ) ) :
  /**
   * Start articles section
   *
   * @return string articles content
   * @since Travelism 1.0.0
   *
   */
   function travelism_render_articles_section( $content_details = array() ) {
        $options = travelism_get_theme_options();

        $articles_sub_title = !empty( $options['articles_sub_title'] ) ? $options['articles_sub_title'] : '';
        $articles_title = !empty( $options['articles_title'] ) ? $options['articles_title'] : '';

        if ( empty( $content_details ) ) {
            return;
        } ?>
       
        <div id="travelism_articles_section" class="relative page-section">
            <div class="wrapper">
                <div class="section-header">
                    <?php if( !empty( $articles_sub_title ) ): ?>
                        <h3 class="section-subtitle"><?php echo esc_html( $articles_sub_title ); ?></h3>
                    <?php endif;
                    if( !empty( $articles_title ) ):
                        ?>
                    <h2 class="section-title"><?php echo esc_html( $articles_title ); ?></h2>
                <?php endif; ?>
            </div><!-- .section-header -->

            <div class="articles-content col-3 clear">

                <?php foreach ($content_details as $content ): ?>

                    <article class="has-post-thumbnail">
                        <div class="post-wrapper">
                            <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                <div class="date">
                                    <?php 
                                    $day = get_the_date( 'd', $content['id'] );
                                    $month = get_the_date( 'M', $content['id'] );
                                    ?>
                                    <span class="day"><?php echo esc_html( $day ); ?></span>
                                    <span class="month"><?php echo esc_html( $month ); ?></span>
                                </div>
                            </div><!-- .featured-image -->

                            <div class="entry-container">
                                <div class="entry-meta">
                                    <span class="cat-links">
                                        <?php the_category( '', '', $content['id'] ); ?>
                                    </span><!-- .cat-links -->
                                </div><!-- .entry-meta -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div><!-- .entry-content -->
                            </div><!-- .entry-container -->
                        </div><!-- .post-wrapper -->
                    </article>

                <?php endforeach; ?>

            </div>
        </div>
    </div><!-- #travelism_articles_section -->

    <?php }
endif;
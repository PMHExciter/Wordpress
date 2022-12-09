<?php if ( get_theme_mod('cafe_cafeteria_our_story_enable') ) : ?>
  
  <section id="story" class="py-5">
    <div class="container">
      <?php if ( get_theme_mod('cafe_cafeteria_our_story_section_title') ) : ?>
        <h3 class="text-center mb-4"><?php echo esc_html(get_theme_mod('cafe_cafeteria_our_story_section_title')) ?></h3>
      <?php endif; ?>
      <div class="row">
        <div class="col-lg-3 col-md-3 col-sm-6 align-self-center mb-2 mb-md-2">
          <?php if ( get_theme_mod('cafe_cafeteria_our_story_image1') ) : ?>
            <img src="<?php echo esc_url(get_theme_mod('cafe_cafeteria_our_story_image1')) ?>">
          <?php endif; ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-6 align-self-center mb-2 mb-md-2">
          <?php if ( get_theme_mod('cafe_cafeteria_our_story_image2') ) : ?>
            <img src="<?php echo esc_url(get_theme_mod('cafe_cafeteria_our_story_image2')) ?>">
          <?php endif; ?>
        </div>
        <div class="col-lg-5 col-md-5 col-sm-12 align-self-center">
          <?php $cafe_cafeteria_slider_pages = array();
            $mod = intval( get_theme_mod( 'cafe_cafeteria_our_story' ));
            if ( 'page-none-selected' != $mod ) {
              $cafe_cafeteria_slider_pages[] = $mod;
            }
            if( !empty($cafe_cafeteria_slider_pages) ) :
              $args = array(
                'post_type' => 'page',
                'post__in' => $cafe_cafeteria_slider_pages,
                'orderby' => 'post__in'
              );
              $query = new WP_Query( $args );
              if ( $query->have_posts() ) :
                $i = 1;
          ?>
          <div class="inner-box p-3">
            <?php  while ( $query->have_posts() ) : $query->the_post(); ?>
              <?php if ( get_theme_mod('cafe_cafeteria_our_story_heading_text') ) : ?>
                <span class="pb-2"><?php echo esc_html(get_theme_mod('cafe_cafeteria_our_story_heading_text')) ?></span>
              <?php endif; ?>
              <h4 class="pb-2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
              <?php echo wp_trim_words( get_the_content(), get_theme_mod('cafe_cafeteria_story_excerpt_number',15) ); ?>
            <?php $i++; endwhile; 
            wp_reset_postdata();?>
          </div>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
          endif;?>  
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </section>

<?php endif; ?>
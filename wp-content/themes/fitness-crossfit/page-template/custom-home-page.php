<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">
  <?php do_action( 'vw_fitness_gym_before_slider' ); ?>

  <?php if( get_theme_mod( 'vw_fitness_gym_slider_hide_show', false) != '' || get_theme_mod( 'vw_fitness_gym_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'vw_fitness_gym_slider_speed',4000)) ?>">
        <?php $vw_fitness_gym_slider_pages = array();
          for ( $count = 1; $count <= 4; $count++ ) {
            $mod = intval( get_theme_mod( 'vw_fitness_gym_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $vw_fitness_gym_slider_pages[] = $mod;
            }
          }
          if( !empty($vw_fitness_gym_slider_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $vw_fitness_gym_slider_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>     
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php if(has_post_thumbnail()){
                the_post_thumbnail();
              } else{?>
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/block-patterns/images/banner.png" alt="" />
              <?php } ?>
              <div class="carousel-caption">
                <div class="inner_carousel">
                  <h1 class="wow slideInRight" data-wow-duration="2s"><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php echo the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                  <p class="wow slideInLeft" data-wow-duration="2s"><?php $excerpt = get_the_excerpt(); echo esc_html( vw_fitness_gym_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_fitness_gym_slider_excerpt_number','30')))); ?></p>
                  <?php if( get_theme_mod('vw_fitness_gym_slider_button_text','READ MORE') != ''){ ?>
                    <div class="more-btn wow slideInRight" data-wow-duration="3s">
                      <a href="<?php echo esc_url(get_permalink()); ?>"><?php echo esc_html(get_theme_mod('vw_fitness_gym_slider_button_text',__('READ MORE','fitness-crossfit')));?><span class="screen-reader-text"><?php echo esc_html(get_theme_mod('vw_fitness_gym_slider_button_text',__('READ MORE','fitness-crossfit')));?></span></a>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
            <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','fitness-crossfit' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','fitness-crossfit' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php } ?>

  <?php do_action( 'vw_fitness_gym_after_slider' ); ?>

  <?php if(get_theme_mod('vw_fitness_gym_section_title') != '' || get_theme_mod('vw_fitness_gym_sectio_sub_title') != '' || get_theme_mod('vw_fitness_gym_about_image') != '' || get_theme_mod('vw_fitness_gym_services') != '') {?>
    <section id="about-us">
      <div class="container">
        <?php if( get_theme_mod( 'vw_fitness_gym_section_title') != '' ) { ?>
          <h2 class="wow fadeInDown delay-1000"><?php echo esc_html(get_theme_mod('vw_fitness_gym_section_title',''));?></h2>
        <?php }?>
        <?php if( get_theme_mod( 'vw_fitness_gym_sectio_sub_title') != '' ) { ?>
          <h3 class="wow fadeInDown delay-1000"><?php echo esc_html(get_theme_mod('vw_fitness_gym_sectio_sub_title',''));?></h3>
        <?php }?>
        <div class="row">
          <?php if( get_theme_mod( 'vw_fitness_gym_about_image') != '' ) { ?>
          <div class="col-lg-4 col-md-4">        
              <img src="<?php echo esc_url(get_theme_mod('vw_fitness_gym_about_image','')); ?>" alt="About Image"/>
          </div>
          <?php }?>
          <div class="<?php if( get_theme_mod( 'vw_fitness_gym_about_image') != '') { ?>col-lg-8 col-md-8"<?php } else { ?>col-lg-12 col-md-12 <?php } ?> ">
            <div class="row">
              <?php
                $vw_fitness_gym_catData =  get_theme_mod('vw_fitness_gym_services','');
                if($vw_fitness_gym_catData){
                $page_query = new WP_Query(array( 'category_name' => esc_html($vw_fitness_gym_catData,'fitness-crossfit'))); ?>
                <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
                <div class="<?php if( get_theme_mod( 'vw_fitness_gym_about_image') != '') { ?>col-lg-6 col-md-6"<?php } else { ?>col-lg-4 col-md-4 <?php } ?> ">
                  <div class="serv-box wow fadeInUp delay-1000">
                    <?php the_post_thumbnail(); ?>
                    <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?><span class="screen-reader-text"><?php the_title(); ?></span></a></h4>
                    <p><?php $excerpt = get_the_excerpt(); echo esc_html( vw_fitness_gym_string_limit_words( $excerpt, esc_attr(get_theme_mod('vw_fitness_gym_services_excerpt_number','30')))); ?></p>
                  </div>
                </div>
                <?php endwhile;
                wp_reset_postdata();
              } ?>
            </div>
          </div>
        </div>
      </div>  
    </section>
  <?php }?>

  <?php do_action( 'vw_fitness_gym_after_second_section' ); ?>

  <?php if (get_theme_mod('fitness_crossfit_bmi_hide_show', false) == true) {?>
    <section id="bmi-section" class="py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6">
            <div class="bmi-head">
              <?php if(get_theme_mod('fitness_crossfit_bmi_small_title') != ''){ ?>
                <span class="small-title"><?php echo esc_html(get_theme_mod('fitness_crossfit_bmi_small_title')); ?></span>
              <?php }?>
              <?php if(get_theme_mod('fitness_crossfit_bmi_section_title') != ''){ ?>
                <h3><?php echo esc_html(get_theme_mod('fitness_crossfit_bmi_section_title')); ?></h3>
              <?php }?>
            </div>
            <form name="bmi_calculator">
              <div class="row bmi-calculator py-3">
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <select name="weight_measure_in" id="weight_measure_in">
                    <option value="kg"><?php echo esc_html('Weight in KG', 'fitness-crossfit');?></option>
                    <option value="pounds"><?php echo esc_html('Weight in Pounds', 'fitness-crossfit');?></option>
                  </select>
                  <input class="textInput" type="text" id="bmi_weight" name="bmi_weight" placeholder="<?php echo esc_attr_x('Value', 'placeholder', 'fitness-crossfit');?>">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                  <select name="height_measure_in" id="height_measure_in">
                    <option value="feet"><?php echo esc_html('Height in Feet', 'fitness-crossfit');?>
                    </option>
                    <option value="inches"><?php echo esc_html('Height in Inches', 'fitness-crossfit');?></option>
                  </select>
                  <input class="textInput" type="text" id="bmi_height" name="bmi_height" placeholder="<?php echo esc_attr_x('Value', 'placeholder', 'fitness-crossfit');?>">
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                  <input type="button" onclick="calculateBMI()" value="<?php echo esc_html('Calculate', 'fitness-crossfit');?>" class="bmi_button">
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                  <div id="bmi_results_graph">
                    <div class="bmi_value"><input type="text" placeholder="<?php echo esc_html('Result', 'fitness-crossfit');?>"></div>
                  </div>
                </div>
                <div class="clearfix"></div>
              </div>
            </form>
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="bmi-graph">
              <table>
                <thead>
                  <tr>
                    <td><?php echo esc_html('BMI', 'fitness-crossfit') ?></td>
                    <td><?php echo esc_html('WEIGHT STATUS', 'fitness-crossfit') ?></td>
                  </tr>
                </thead>
                <tbody>
                  <?php for ($i=1; $i <= 4 ; $i++) { ?>
                    <tr>
                      <td><?php echo esc_html(get_theme_mod('fitness_crossfit_bmi_value'.$i)); ?></td>
                      <td><?php echo esc_html(get_theme_mod('fitness_crossfit_weight_status'.$i)); ?></td>
                    </tr>
                  <?php }?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php }?>

  <div class="content-vw entry-content">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>

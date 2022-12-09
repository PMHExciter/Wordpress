<?php
/**
 * The template part for top header
 *
 * @package Fitness Crossfit 
 * @subpackage fitness-crossfit
 * @since Fitness Crossfit 1.0
 */
?>

<div id="topbar">
  <div class="container">
    <div class="row">
      <div class=" offset-lg-3 col-lg-2 col-md-4 align-self-center">
       <?php dynamic_sidebar('social-widgets'); ?>
      </div>
      <div class="col-lg-2 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'vw_fitness_gym_phone_number') != '' ) { ?>
          <span class="call-info"><i class="<?php echo esc_attr(get_theme_mod('vw_fitness_gym_phone_no_icon','fas fa-phone')); ?>"></i><a href="tel:<?php echo esc_attr( get_theme_mod('vw_fitness_gym_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('vw_fitness_gym_phone_number',''));?></a></span>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-4 align-self-center">
        <?php if( get_theme_mod( 'vw_fitness_gym_email_address') != '' ) { ?>
          <span class="call-info"><i class="<?php echo esc_attr(get_theme_mod('vw_fitness_gym_email_icon','fas fa-envelope-open')); ?>"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('vw_fitness_gym_email_address',''));?>"><?php echo esc_html(get_theme_mod('vw_fitness_gym_email_address',''));?></a></span>
        <?php }?>
      </div>
      <div class="offset-lg-0 col-lg-2 offset-md-4 col-md-8 align-self-center">
        <?php if( get_theme_mod( 'fitness_crossfit_topbar_location') != '' ) { ?>
          <span class="call-info"><i class="fas fa-map-marker-alt"></i><?php echo esc_html(get_theme_mod('fitness_crossfit_topbar_location',''));?></span>
        <?php }?>
      </div>
    </div>
  </div>
</div>
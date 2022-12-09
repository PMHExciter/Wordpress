<footer>
  <div class="container">
    <?php
      if ( is_active_sidebar('cafe-cafeteria-footer-sidebar')) {
        echo '<div class="row sidebar-area">';
          dynamic_sidebar('cafe-cafeteria-footer-sidebar');
        echo '</div>';
      }
    ?>

    <div class="row">
      <div class="col-md-12">
        <p class="mb-0 py-3 text-center">
          <?php
            if (!get_theme_mod('cafe_cafeteria_footer_text') ) { ?>
              <a href="<?php echo esc_url(__('https://www.misbahwp.com/themes/free-cafe-wordpress-theme/', 'cafe-cafeteria' )); ?>" target="_blank">
              <?php esc_html_e('Cafe WordPress Theme','cafe-cafeteria'); ?></a>
            <?php } else {
              echo esc_html(get_theme_mod('cafe_cafeteria_footer_text'));
            }
          ?>
          <?php if ( get_theme_mod('cafe_cafeteria_copyright_enable', true) == true ) : ?>
            <?php 
            /* translators: %s: Misbah WP */ 
            printf( esc_html__( 'by %s', 'cafe-cafeteria' ), 'Misbah WP' ); ?>
            <a href="<?php echo esc_url(__('https://wordpress.org', 'cafe-cafeteria' )); ?>" rel="generator"><?php  /* translators: %s: WordPress */  printf( esc_html__( ' | Proudly powered by %s', 'cafe-cafeteria' ), 'WordPress' ); ?></a>
          <?php endif; ?>
        </p>
      </div>
    </div>
    <?php if ( get_theme_mod('cafe_cafeteria_scroll_enable_setting', true) == true ) : ?>
      <div class="scroll-up">
          <a href="#tobottom"><i class="fa fa-arrow-up"></i></a>
      </div>
    <?php endif; ?>
  </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>

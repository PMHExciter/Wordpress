<?php
  global $post;
?>

<div id="post-<?php the_ID(); ?>" <?php post_class('post-box mb-4'); ?>>
  <?php if ( has_post_thumbnail() ) { ?>
    <div class="post-thumbnail">
      <a href="<?php echo esc_url(get_permalink($post->ID)); ?>" title="<?php the_title_attribute(); ?>">
        <?php the_post_thumbnail(); ?>
      </a>
    </div>
  <?php }?>
  <div class="p-3">
    <h3 class="post-title mb-3 mt-0"><a href="<?php echo esc_url(get_permalink($post->ID)); ?>"><?php the_title(); ?></a></h3>
    <div class="post-content">
      <?php echo wp_trim_words( get_the_content(), get_theme_mod('cafe_cafeteria_post_excerpt_number', 15) ); ?>
    </div>
    <?php if ( get_theme_mod('cafe_cafeteria_blog_date_enable',true) || get_theme_mod('cafe_cafeteria_blog_admin_enable',true) || get_theme_mod('cafe_cafeteria_blog_comment_enable',true) ) : ?>
    <div class="post-meta border-top border-bottom py-2">
      <?php if ( get_theme_mod('cafe_cafeteria_blog_date_enable',true) ) : ?>
        <i class="far fa-calendar-alt mr-2"></i><?php echo '<span class="date-day">' . get_the_date( 'd' ) . '</span>'; echo ' <span class="date-month">' . get_the_date( 'M' ) . '</span>'; echo ' <span class="date-year">' . get_the_date( 'Y' ) . '</span>'; ?>
      <?php endif; ?>
      <?php if ( get_theme_mod('cafe_cafeteria_blog_admin_enable',true) ) : ?>
        <i class="far fa-user ml-3 mr-2"></i><a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' )) ); ?>"><?php the_author(); ?></a>
      <?php endif; ?>
      <?php if ( get_theme_mod('cafe_cafeteria_blog_comment_enable',true) ) : ?> 
        <span class="ml-3"><i class="far fa-comments mr-2"></i> <?php comments_number( esc_attr('0', 'cafe-cafeteria'), esc_attr('0', 'cafe-cafeteria'), esc_attr('%', 'cafe-cafeteria') ); ?> <?php esc_html_e('comments','cafe-cafeteria'); ?></span>
      <?php endif; ?>  
    </div>
    <?php endif; ?>  
  </div>
</div>
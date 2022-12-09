<?php
/**
 * The Features Section for our theme.
 *
 * Display all information related to features section
 *
 * @package Dietitian Lite
*/

$diethidefeat = get_theme_mod( 'diet_hide_feat','1' );

if( $diethidefeat == '' ){
    echo '<section class="features-section"><div class="container">';
 
    $diet_featttl = get_theme_mod('featsec_ttl');
    if( !empty( $diet_featttl ) ){
      echo '<div class="section_head"><h2 class="section_title">'.esc_html($diet_featttl).'<span><i class="fa fa-pagelines" aria-hidden="true"></i></span></h2></div>';
    }

        echo '<div class="flex-box">';
            for( $feat = 1; $feat<4; $feat++ ){
                if( get_theme_mod( 'feat'.$feat,true ) !='' ){
                    $featquery = new WP_Query( array( 'page_id' => get_theme_mod( 'feat'.$feat ) ) );
                    while( $featquery->have_posts() ) : $featquery->the_post();
                        $shwthumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
                        $image_id = get_post_thumbnail_id();
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        echo '<div class="col"><div class="imagebox"><div class="inner-imagebox">';
                            if( has_post_thumbnail() ) {
                              echo '<div class="imagebox-thumb image-hover-effect"><a href="'.get_the_permalink().'"><img src="'.esc_url($shwthumb[0]).'" alt="'.esc_attr($image_alt).'"/></a></div><!-- feature box thumb -->';
                            }
                            echo '<div class="imagebox-data"><h3>'.get_the_title().'</h3><p>'.get_the_excerpt().'</p><div class="imagebox-more"><a href="'.get_the_permalink().'"><i class="fa fa-plus"></i></a></div></div>';
                        echo '</div></div></div>';
                    endwhile; wp_reset_postdata();
                }
            }
    echo '</div></div></section>';
}
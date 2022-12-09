<?php
/**
 * The First Section for our theme.
 *
 * Display all information related to First section
 *
 * @package Dietitian Lite
*/

$diet_hide_intro = get_theme_mod('diet_hide_intro', '1');

if($diet_hide_intro  == '') {

	$diet_intro_more = get_theme_mod('intro_more');
	if( !empty( $diet_intro_more ) ){
	  $shwdiet_intro_more .= '<div class="read-more"><a href="'.get_the_permalink().'">'.esc_html($diet_intro_more).'</a></div>';
	}
	$diet_fsecttl = get_theme_mod('diet_intro_ttl');
	if( !empty( $diet_fsecttl ) ){
	  $shwdiet_fsec_ttl .= '<h4 class="section_sub_title">'.esc_html($diet_fsecttl).'</h4>';
	}

	echo '<section class="introduction"><div class="container"><div class="intro-box"><div class="flex-box">';
	if(get_theme_mod('diet_intro') != '') {
		$intro_query = new WP_Query(array('page_id' => get_theme_mod('diet_intro')));

		while( $intro_query->have_posts() ) : $intro_query->the_post();
			if( has_post_thumbnail() ) {
				$src = wp_get_attachment_image_src( get_post_thumbnail_id($post_id), 'full' );
				$url = $src[0];
				$image_id = get_post_thumbnail_id();
				$image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
			  echo '<div class="thumb"><img src="'.esc_url($url).'" alt="'.esc_attr($image_alt).'"></div><!-- thumb -->';
			}
			echo '<div class="intro-content"><div class="section_head">'.esc_html($shwdiet_fsec_ttl).'<h2 class="section_title">'.get_the_title().'</h2></div><p>'.get_the_excerpt().'</p>'.esc_html($shwdiet_intro_more).'</div>';
		endwhile;
	}
	echo '</div></div></div></section>';
}
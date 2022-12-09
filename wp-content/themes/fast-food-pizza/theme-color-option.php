<?php

	/*---------------------------Width Layout -------------------*/
	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_width_layout_options','Default');
    if($fast_food_pizza_theme_lay == 'Default'){
		$fast_food_pizza_custom_css .='body{';
			$fast_food_pizza_custom_css .='max-width: 100%;';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Container Layout'){
		$fast_food_pizza_custom_css .='body{';
			$fast_food_pizza_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Box Layout'){
		$fast_food_pizza_custom_css .='body{';
			$fast_food_pizza_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$fast_food_pizza_custom_css .='}';
	}

	/*---------------------------Slider Content Layout -------------------*/
	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_slider_content_layout','Center');
    if($fast_food_pizza_theme_lay == 'Left'){
		$fast_food_pizza_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$fast_food_pizza_custom_css .='text-align:left;';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Center'){
		$fast_food_pizza_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn{';
			$fast_food_pizza_custom_css .='text-align:center; ';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Right'){
		$fast_food_pizza_custom_css .='#slider .carousel-caption, #slider .inner_carousel, #slider .inner_carousel h1, #slider .inner_carousel p, #slider .more-btn {';
			$fast_food_pizza_custom_css .='text-align:right;';
		$fast_food_pizza_custom_css .='}';
	}

	/*-------------- Footer Text -------------------*/
	$fast_food_pizza_footer_text_align = get_theme_mod('fast_food_pizza_footer_text_align');
	$fast_food_pizza_custom_css .='.copyright-wrapper{';
		$fast_food_pizza_custom_css .='text-align: '.esc_attr($fast_food_pizza_footer_text_align).';';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_footer_text_padding = get_theme_mod('fast_food_pizza_footer_text_padding');
	$fast_food_pizza_custom_css .='.copyright-wrapper{';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_footer_text_padding).'px; padding-bottom: '.esc_attr($fast_food_pizza_footer_text_padding).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_footer_bg_color = get_theme_mod('fast_food_pizza_footer_bg_color');
	$fast_food_pizza_custom_css .='.footer-wp{';
		$fast_food_pizza_custom_css .='background-color: '.esc_attr($fast_food_pizza_footer_bg_color).';';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_footer_bg_image = get_theme_mod('fast_food_pizza_footer_bg_image');
	if($fast_food_pizza_footer_bg_image != false){
		$fast_food_pizza_custom_css .='.footer-wp{';
			$fast_food_pizza_custom_css .='background: url('.esc_attr($fast_food_pizza_footer_bg_image).');';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_copyright_text_font_size = get_theme_mod('fast_food_pizza_copyright_text_font_size', 15);
	$fast_food_pizza_custom_css .='.copyright-wrapper p, .copyright-wrapper a{';
		$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_copyright_text_font_size).'px;';
	$fast_food_pizza_custom_css .='}';

	/*------------- Back to Top  -------------------*/
	$fast_food_pizza_back_to_top_border_radius = get_theme_mod('fast_food_pizza_back_to_top_border_radius');
	$fast_food_pizza_custom_css .='#scrollbutton {';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_back_to_top_border_radius).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_scroll_icon_font_size = get_theme_mod('fast_food_pizza_scroll_icon_font_size', 22);
	$fast_food_pizza_custom_css .='#scrollbutton {';
		$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_scroll_icon_font_size).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_top_bottom_scroll_padding = get_theme_mod('fast_food_pizza_top_bottom_scroll_padding', 7);
	$fast_food_pizza_custom_css .='#scrollbutton {';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_top_bottom_scroll_padding).'px; padding-bottom: '.esc_attr($fast_food_pizza_top_bottom_scroll_padding).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_left_right_scroll_padding = get_theme_mod('fast_food_pizza_left_right_scroll_padding', 17);
	$fast_food_pizza_custom_css .='#scrollbutton {';
		$fast_food_pizza_custom_css .='padding-left: '.esc_attr($fast_food_pizza_left_right_scroll_padding).'px; padding-right: '.esc_attr($fast_food_pizza_left_right_scroll_padding).'px;';
	$fast_food_pizza_custom_css .='}';

	/*-------------- Post Button  -------------------*/
	$fast_food_pizza_post_button_padding_top = get_theme_mod('fast_food_pizza_post_button_padding_top');
	$fast_food_pizza_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_post_button_padding_top).'px; padding-bottom: '.esc_attr($fast_food_pizza_post_button_padding_top).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_post_button_padding_right = get_theme_mod('fast_food_pizza_post_button_padding_right');
	$fast_food_pizza_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$fast_food_pizza_custom_css .='padding-left: '.esc_attr($fast_food_pizza_post_button_padding_right).'px; padding-right: '.esc_attr($fast_food_pizza_post_button_padding_right).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_post_button_border_radius = get_theme_mod('fast_food_pizza_post_button_border_radius');
	$fast_food_pizza_custom_css .='.postbtn a, #comments input[type="submit"].submit{';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_post_button_border_radius).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_post_comment_enable = get_theme_mod('fast_food_pizza_post_comment_enable',true);
	if($fast_food_pizza_post_comment_enable == false){
		$fast_food_pizza_custom_css .='#comments{';
			$fast_food_pizza_custom_css .='display: none;';
		$fast_food_pizza_custom_css .='}';
	}

	/*----------- Preloader Color Option  ----------------*/
	$fast_food_pizza_preloader_bg_color_option = get_theme_mod('fast_food_pizza_preloader_bg_color_option');
	$fast_food_pizza_preloader_icon_color_option = get_theme_mod('fast_food_pizza_preloader_icon_color_option');
	$fast_food_pizza_custom_css .='.frame{';
		$fast_food_pizza_custom_css .='background-color: '.esc_attr($fast_food_pizza_preloader_bg_color_option).';';
	$fast_food_pizza_custom_css .='}';
	$fast_food_pizza_custom_css .='.dot-1,.dot-2,.dot-3{';
		$fast_food_pizza_custom_css .='background-color: '.esc_attr($fast_food_pizza_preloader_icon_color_option).';';
	$fast_food_pizza_custom_css .='}';

	// preloader type
	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_preloader_type','First Preloader Type');
    if($fast_food_pizza_theme_lay == 'First Preloader Type'){
		$fast_food_pizza_custom_css .='.dot-1, .dot-2, .dot-3{';
			$fast_food_pizza_custom_css .='';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Second Preloader Type'){
		$fast_food_pizza_custom_css .='.dot-1, .dot-2, .dot-3{';
			$fast_food_pizza_custom_css .='border-radius:0;';
		$fast_food_pizza_custom_css .='}';
	}

	/*------------------ Skin Option  -------------------*/
	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_background_skin','Without Background');
    if($fast_food_pizza_theme_lay == 'With Background'){
		$fast_food_pizza_custom_css .='.inner-service,#sidebar .widget,.woocommerce ul.products li.product, .woocommerce-page ul.products li.product,.front-page-content,.background-img-skin{';
			$fast_food_pizza_custom_css .='background-color: #fff; padding:20px;';
		$fast_food_pizza_custom_css .='}';
		$fast_food_pizza_custom_css .='.login-box a{';
			$fast_food_pizza_custom_css .='background-color: #fff;';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Without Background'){
		$fast_food_pizza_custom_css .='{';
			$fast_food_pizza_custom_css .='background-color: transparent;';
		$fast_food_pizza_custom_css .='}';
	}

	/*-------------- Woocommerce Button  -------------------*/
	$fast_food_pizza_woocommerce_button_padding_top = get_theme_mod('fast_food_pizza_woocommerce_button_padding_top',12);
	$fast_food_pizza_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_woocommerce_button_padding_top).'px; padding-bottom: '.esc_attr($fast_food_pizza_woocommerce_button_padding_top).'px;';
	$fast_food_pizza_custom_css .='}';
	

	$fast_food_pizza_woocommerce_button_padding_right = get_theme_mod('fast_food_pizza_woocommerce_button_padding_right',15);
	$fast_food_pizza_custom_css .='.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
		$fast_food_pizza_custom_css .='padding-left: '.esc_attr($fast_food_pizza_woocommerce_button_padding_right).'px; padding-right: '.esc_attr($fast_food_pizza_woocommerce_button_padding_right).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woocommerce_button_border_radius = get_theme_mod('fast_food_pizza_woocommerce_button_border_radius',5);
	$fast_food_pizza_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart{';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_woocommerce_button_border_radius).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_related_product_enable = get_theme_mod('fast_food_pizza_related_product_enable',true);
	if($fast_food_pizza_related_product_enable == false){
		$fast_food_pizza_custom_css .='.related.products{';
			$fast_food_pizza_custom_css .='display: none;';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_woocommerce_product_border_enable = get_theme_mod('fast_food_pizza_woocommerce_product_border_enable',true);
	if($fast_food_pizza_woocommerce_product_border_enable == false){
		$fast_food_pizza_custom_css .='.products li{';
			$fast_food_pizza_custom_css .='border: none;';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_woocommerce_product_padding_top = get_theme_mod('fast_food_pizza_woocommerce_product_padding_top',0);
	$fast_food_pizza_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_woocommerce_product_padding_top).'px !important; padding-bottom: '.esc_attr($fast_food_pizza_woocommerce_product_padding_top).'px !important;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woocommerce_product_padding_right = get_theme_mod('fast_food_pizza_woocommerce_product_padding_right',0);
	$fast_food_pizza_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$fast_food_pizza_custom_css .='padding-left: '.esc_attr($fast_food_pizza_woocommerce_product_padding_right).'px !important; padding-right: '.esc_attr($fast_food_pizza_woocommerce_product_padding_right).'px !important;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woocommerce_product_border_radius = get_theme_mod('fast_food_pizza_woocommerce_product_border_radius',3);
	$fast_food_pizza_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_woocommerce_product_border_radius).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woocommerce_product_box_shadow = get_theme_mod('fast_food_pizza_woocommerce_product_box_shadow', 0);
	$fast_food_pizza_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
		$fast_food_pizza_custom_css .='box-shadow: '.esc_attr($fast_food_pizza_woocommerce_product_box_shadow).'px '.esc_attr($fast_food_pizza_woocommerce_product_box_shadow).'px '.esc_attr($fast_food_pizza_woocommerce_product_box_shadow).'px #ddd;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woo_product_sale_top_bottom_padding = get_theme_mod('fast_food_pizza_woo_product_sale_top_bottom_padding', 0);
	$fast_food_pizza_woo_product_sale_left_right_padding = get_theme_mod('fast_food_pizza_woo_product_sale_left_right_padding', 0);
	$fast_food_pizza_custom_css .='.woocommerce span.onsale{';
		$fast_food_pizza_custom_css .='padding-top: '.esc_attr($fast_food_pizza_woo_product_sale_top_bottom_padding).'px; padding-bottom: '.esc_attr($fast_food_pizza_woo_product_sale_top_bottom_padding).'px; padding-left: '.esc_attr($fast_food_pizza_woo_product_sale_left_right_padding).'px; padding-right: '.esc_attr($fast_food_pizza_woo_product_sale_left_right_padding).'px; display:inline-block;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woo_product_sale_border_radius = get_theme_mod('fast_food_pizza_woo_product_sale_border_radius',0);
	$fast_food_pizza_custom_css .='.woocommerce span.onsale {';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_woo_product_sale_border_radius).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_woo_product_sale_position = get_theme_mod('fast_food_pizza_woo_product_sale_position', 'Left');
	if($fast_food_pizza_woo_product_sale_position == 'Right' ){
		$fast_food_pizza_custom_css .='.woocommerce ul.products li.product .onsale{';
			$fast_food_pizza_custom_css .=' left:auto; right:0;';
		$fast_food_pizza_custom_css .='}';
	}elseif($fast_food_pizza_woo_product_sale_position == 'Left' ){
		$fast_food_pizza_custom_css .='.woocommerce ul.products li.product .onsale{';
			$fast_food_pizza_custom_css .=' left:0; right:auto;';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_wooproduct_sale_font_size = get_theme_mod('fast_food_pizza_wooproduct_sale_font_size',14);
	$fast_food_pizza_custom_css .='.woocommerce span.onsale{';
		$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_wooproduct_sale_font_size).'px;';
	$fast_food_pizza_custom_css .='}';

	// Responsive Media
	$fast_food_pizza_post_date = get_theme_mod( 'fast_food_pizza_display_post_date',true);
	if($fast_food_pizza_post_date == true && get_theme_mod( 'fast_food_pizza_metafields_date',true) != true){
    	$fast_food_pizza_custom_css .='.metabox .entry-date{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_post_date == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.metabox .entry-date{';
			$fast_food_pizza_custom_css .='display:inline-block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_post_date == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.metabox .entry-date{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_post_author = get_theme_mod( 'fast_food_pizza_display_post_author',true);
	if($fast_food_pizza_post_author == true && get_theme_mod( 'fast_food_pizza_metafields_author',true) != true){
    	$fast_food_pizza_custom_css .='.metabox .entry-author{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_post_author == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.metabox .entry-author{';
			$fast_food_pizza_custom_css .='display:inline-block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_post_author == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.metabox .entry-author{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_post_comment = get_theme_mod( 'fast_food_pizza_display_post_comment',true);
	if($fast_food_pizza_post_comment == true && get_theme_mod( 'fast_food_pizza_metafields_comment',true) != true){
    	$fast_food_pizza_custom_css .='.metabox .entry-comments{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_post_comment == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.metabox .entry-comments{';
			$fast_food_pizza_custom_css .='display:inline-block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_post_comment == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.metabox .entry-comments{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_post_time = get_theme_mod( 'fast_food_pizza_display_post_time',false);
	if($fast_food_pizza_post_time == true && get_theme_mod( 'fast_food_pizza_metafields_time',false) != true){
    	$fast_food_pizza_custom_css .='.metabox .entry-time{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_post_time == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.metabox .entry-time{';
			$fast_food_pizza_custom_css .='display:inline-block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_post_time == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.metabox .entry-time{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	if($fast_food_pizza_post_date == false && $fast_food_pizza_post_author == false && $fast_food_pizza_post_comment == false && $fast_food_pizza_post_time == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
    	$fast_food_pizza_custom_css .='.metabox {';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_metafields_date = get_theme_mod( 'fast_food_pizza_metafields_date',true);
	$fast_food_pizza_metafields_author = get_theme_mod( 'fast_food_pizza_metafields_author',true);
	$fast_food_pizza_metafields_comment = get_theme_mod( 'fast_food_pizza_metafields_comment',true);
	$fast_food_pizza_metafields_time = get_theme_mod( 'fast_food_pizza_metafields_time',true);
	if($fast_food_pizza_metafields_date == false && $fast_food_pizza_metafields_author == false && $fast_food_pizza_metafields_comment == false && $fast_food_pizza_metafields_time == false){
		$fast_food_pizza_custom_css .='@media screen and (min-width:576px) {';
    	$fast_food_pizza_custom_css .='.metabox {';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_slider = get_theme_mod( 'fast_food_pizza_display_slider',false);
	if($fast_food_pizza_slider == true && get_theme_mod( 'fast_food_pizza_slider_hide', false) == false){
    	$fast_food_pizza_custom_css .='.slider-circle{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_slider == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.slider-circle{';
			$fast_food_pizza_custom_css .='display:block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_slider == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.slider-circle{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_sidebar = get_theme_mod( 'fast_food_pizza_display_sidebar',true);
    if($fast_food_pizza_sidebar == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='#sidebar{';
			$fast_food_pizza_custom_css .='display:block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_sidebar == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='#sidebar{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_scroll = get_theme_mod( 'fast_food_pizza_display_scrolltop',true);
	if($fast_food_pizza_scroll == true && get_theme_mod( 'fast_food_pizza_hide_show_scroll',true) != true){
    	$fast_food_pizza_custom_css .='#scrollbutton {';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_scroll == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='#scrollbutton {';
			$fast_food_pizza_custom_css .='display:block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_scroll == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='#scrollbutton {';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_preloader = get_theme_mod( 'fast_food_pizza_display_preloader',false);
	if($fast_food_pizza_preloader == true && get_theme_mod( 'fast_food_pizza_preloader',false) == false){
		$fast_food_pizza_custom_css .='@media screen and (min-width:575px) {';
    	$fast_food_pizza_custom_css .='.frame{';
			$fast_food_pizza_custom_css .=' visibility: hidden;';
		$fast_food_pizza_custom_css .='} }';
	}
    if($fast_food_pizza_preloader == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.frame{';
			$fast_food_pizza_custom_css .='visibility:visible;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_preloader == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.frame{';
			$fast_food_pizza_custom_css .='visibility: hidden;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_search = get_theme_mod( 'fast_food_pizza_display_search_category',true);
	if($fast_food_pizza_search == true && get_theme_mod( 'fast_food_pizza_search_enable_disable',true) != true){
    	$fast_food_pizza_custom_css .='.search-cat-box{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_search == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.search-cat-box{';
			$fast_food_pizza_custom_css .='display:block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_search == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.search-cat-box{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	$fast_food_pizza_myaccount = get_theme_mod( 'fast_food_pizza_display_myaccount',true);
	if($fast_food_pizza_myaccount == true && get_theme_mod( 'fast_food_pizza_myaccount_enable_disable',true) != true){
    	$fast_food_pizza_custom_css .='.login-box{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} ';
	}
    if($fast_food_pizza_myaccount == true){
    	$fast_food_pizza_custom_css .='@media screen and (max-width:575px) {';
		$fast_food_pizza_custom_css .='.login-box{';
			$fast_food_pizza_custom_css .='display:block;';
		$fast_food_pizza_custom_css .='} }';
	}else if($fast_food_pizza_myaccount == false){
		$fast_food_pizza_custom_css .='@media screen and (max-width:575px){';
		$fast_food_pizza_custom_css .='.login-box{';
			$fast_food_pizza_custom_css .='display:none;';
		$fast_food_pizza_custom_css .='} }';
	}

	// menu settings
	$fast_food_pizza_menu_font_size_option = get_theme_mod('fast_food_pizza_menu_font_size_option');
	$fast_food_pizza_custom_css .='.primary-navigation a{';
		$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_menu_font_size_option).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_menu_padding = get_theme_mod('fast_food_pizza_menu_padding');
	$fast_food_pizza_custom_css .='.primary-navigation a{';
		$fast_food_pizza_custom_css .='padding: '.esc_attr($fast_food_pizza_menu_padding).'px;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_text_tranform_menu','Uppercase');
    if($fast_food_pizza_theme_lay == 'Uppercase'){
		$fast_food_pizza_custom_css .='.primary-navigation a{';
			$fast_food_pizza_custom_css .='';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Lowercase'){
		$fast_food_pizza_custom_css .='.primary-navigation a{';
			$fast_food_pizza_custom_css .='text-transform: lowercase;';
		$fast_food_pizza_custom_css .='}';
	}
	else if($fast_food_pizza_theme_lay == 'Capitalize'){
		$fast_food_pizza_custom_css .='.primary-navigation a{';
			$fast_food_pizza_custom_css .='text-transform: Capitalize;';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_theme_lay = get_theme_mod( 'fast_food_pizza_font_weight_option_menu','');
    if($fast_food_pizza_theme_lay == 'Bold'){
		$fast_food_pizza_custom_css .='.primary-navigation a{';
			$fast_food_pizza_custom_css .='font-weight:bold;';
		$fast_food_pizza_custom_css .='}';
	}else if($fast_food_pizza_theme_lay == 'Normal'){
		$fast_food_pizza_custom_css .='.primary-navigation a{';
			$fast_food_pizza_custom_css .='font-weight: normal;';
		$fast_food_pizza_custom_css .='}';
	}

	//  comment form width
	$fast_food_pizza_comment_form_width = get_theme_mod( 'fast_food_pizza_comment_form_width');
	$fast_food_pizza_custom_css .='#comments textarea{';
		$fast_food_pizza_custom_css .='width: '.esc_attr($fast_food_pizza_comment_form_width).'%;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_title_comment_form = get_theme_mod('fast_food_pizza_title_comment_form', 'Leave a Reply');
	if($fast_food_pizza_title_comment_form == ''){
		$fast_food_pizza_custom_css .='#comments h2#reply-title {';
			$fast_food_pizza_custom_css .='display: none;';
		$fast_food_pizza_custom_css .='}';
	}

	$fast_food_pizza_comment_form_button_content = get_theme_mod('fast_food_pizza_comment_form_button_content', 'Post Comment');
	if($fast_food_pizza_comment_form_button_content == ''){
		$fast_food_pizza_custom_css .='#comments p.form-submit {';
			$fast_food_pizza_custom_css .='display: none;';
		$fast_food_pizza_custom_css .='}';
	}

	// featured image setting
	$fast_food_pizza_image_border_radius = get_theme_mod('fast_food_pizza_image_border_radius', 0);
	$fast_food_pizza_custom_css .='.box-image img, .content_box img{';
		$fast_food_pizza_custom_css .='border-radius: '.esc_attr($fast_food_pizza_image_border_radius).'%;';
	$fast_food_pizza_custom_css .='}';

	$fast_food_pizza_image_box_shadow = get_theme_mod('fast_food_pizza_image_box_shadow',0);
	$fast_food_pizza_custom_css .='.box-image img, .content_box img{';
		$fast_food_pizza_custom_css .='box-shadow: '.esc_attr($fast_food_pizza_image_box_shadow).'px '.esc_attr($fast_food_pizza_image_box_shadow).'px '.esc_attr($fast_food_pizza_image_box_shadow).'px #b5b5b5;';
	$fast_food_pizza_custom_css .='}';

	// Post Block
	$fast_food_pizza_post_block_option = get_theme_mod( 'fast_food_pizza_post_block_option','By Block');
    if($fast_food_pizza_post_block_option == 'By Without Block'){
		$fast_food_pizza_custom_css .='.inner-service, #blog_sec .sticky{';
			$fast_food_pizza_custom_css .='border:none; margin:30px 0;';
		$fast_food_pizza_custom_css .='}';
	}

	// post image 
	$fast_food_pizza_post_featured_color = get_theme_mod('fast_food_pizza_post_featured_color', '#5c727d');
	$fast_food_pizza_post_featured_image = get_theme_mod('fast_food_pizza_post_featured_image','Image');
	if($fast_food_pizza_post_featured_image == 'Color'){
		$fast_food_pizza_custom_css .='.post-color{';
			$fast_food_pizza_custom_css .='background-color: '.esc_attr($fast_food_pizza_post_featured_color).';';
		$fast_food_pizza_custom_css .='}';
	}

	// featured image dimention
	$fast_food_pizza_post_featured_image_dimention = get_theme_mod('fast_food_pizza_post_featured_image_dimention', 'Default');
	$fast_food_pizza_post_featured_image_custom_width = get_theme_mod('fast_food_pizza_post_featured_image_custom_width');
	$fast_food_pizza_post_featured_image_custom_height = get_theme_mod('fast_food_pizza_post_featured_image_custom_height');
	if($fast_food_pizza_post_featured_image_dimention == 'Custom'){
		$fast_food_pizza_custom_css .='.box-image img{';
			$fast_food_pizza_custom_css .='width: '.esc_attr($fast_food_pizza_post_featured_image_custom_width).'px; height: '.esc_attr($fast_food_pizza_post_featured_image_custom_height).'px;';
		$fast_food_pizza_custom_css .='}';
	}

	// featured image dimention
	$fast_food_pizza_custom_post_color_width = get_theme_mod('fast_food_pizza_custom_post_color_width');
	$fast_food_pizza_custom_post_color_height = get_theme_mod('fast_food_pizza_custom_post_color_height');
	if($fast_food_pizza_post_featured_image == 'Color'){
		$fast_food_pizza_custom_css .='.post-color{';
			$fast_food_pizza_custom_css .='width: '.esc_attr($fast_food_pizza_custom_post_color_width).'px; height: '.esc_attr($fast_food_pizza_custom_post_color_height).'px;';
		$fast_food_pizza_custom_css .='}';
	}

	// site title font size
	$fast_food_pizza_site_title_font_size = get_theme_mod('fast_food_pizza_site_title_font_size', 25);
	$fast_food_pizza_custom_css .='.logo .site-title{';
	$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_site_title_font_size).'px;';
	$fast_food_pizza_custom_css .='}';

	// site tagline font size
	$fast_food_pizza_site_tagline_font_size = get_theme_mod('fast_food_pizza_site_tagline_font_size', 13);
	$fast_food_pizza_custom_css .='p.site-description{';
	$fast_food_pizza_custom_css .='font-size: '.esc_attr($fast_food_pizza_site_tagline_font_size).'px;';
	$fast_food_pizza_custom_css .='}';

	// woocommerce Product Navigation
	$fast_food_pizza_wooproducts_nav = get_theme_mod('fast_food_pizza_wooproducts_nav', 'Yes');
	if($fast_food_pizza_wooproducts_nav == 'No'){
		$fast_food_pizza_custom_css .='.woocommerce nav.woocommerce-pagination{';
			$fast_food_pizza_custom_css .='display: none;';
		$fast_food_pizza_custom_css .='}';
	}

	if ( !has_custom_logo() ) {
		$fast_food_pizza_custom_css .='.logo{';
			$fast_food_pizza_custom_css .='height: 140px; padding: 30px 15px;';
		$fast_food_pizza_custom_css .='}';
		$fast_food_pizza_custom_css .=' @media screen and (max-width:720px){
			.logo{';
			$fast_food_pizza_custom_css .='height: auto; padding: 15px;';
		$fast_food_pizza_custom_css .='} }';
	}
<?php

	/*------------ First highlight color --------------*/

	$vw_fitness_gym_first_color = get_theme_mod('vw_fitness_gym_first_color');

	$vw_fitness_gym_custom_css = '';

	if($vw_fitness_gym_first_color != false){
		$vw_fitness_gym_custom_css .='.logo-box, .search-box i, .more-btn a, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, .scrollup i, #footer input[type="submit"], #footer-2, #footer .tagcloud a:hover, #sidebar h3, #sidebar .wp-block-search .wp-block-search__label, .pagination .current, .pagination a:hover, #sidebar input[type="submit"], #sidebar .tagcloud a:hover, #comments input[type="submit"], #comments a.comment-reply-link, .woocommerce span.onsale, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce a.added_to_cart.wc-forward, nav.woocommerce-MyAccount-navigation ul li, input.bmi_button, .bmi-graph table thead, .toggle-nav i{';
			$vw_fitness_gym_custom_css .='background-color: '.esc_attr($vw_fitness_gym_first_color).';';
		$vw_fitness_gym_custom_css .='}';
	}
	if($vw_fitness_gym_first_color != false){
		$vw_fitness_gym_custom_css .='.logo-box, #sidebar input[type="submit"]{';
			$vw_fitness_gym_custom_css .='background-color: '.esc_attr($vw_fitness_gym_first_color).'!important;';
		$vw_fitness_gym_custom_css .='}';
	}
	if($vw_fitness_gym_first_color != false){
		$vw_fitness_gym_custom_css .='a, .post-main-box:hover h2 a, .post-main-box:hover h2, .post-main-box:hover .entry-date a, .post-main-box:hover .entry-author a, .single-post .post-info:hover .entry-date a, .single-post .post-info:hover .entry-author a, #footer li a:hover, .serv-box h4 a:hover, #topbar .custom-social-icons i:hover, #topbar span i, .main-navigation a:hover, #topbar span a:hover, .main-navigation ul.sub-menu a:hover, .more-btn a:hover, .woocommerce-product-details__short-description p a, .entry-content a, .sidebar .textwidget p a, .textwidget p a, #comments p a, .slider .inner_carousel p a, #slider .inner_carousel h1 a:hover, #sidebar ul li a:hover{';
			$vw_fitness_gym_custom_css .='color: '.esc_attr($vw_fitness_gym_first_color).';';
		$vw_fitness_gym_custom_css .='}';
	}
	if($vw_fitness_gym_first_color != false){
		$vw_fitness_gym_custom_css .='.main-navigation a:hover, .main-navigation ul ul, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, #footer h3:after, #footer .wp-block-search .wp-block-search__label:after, #footer .tagcloud a:hover, #sidebar .tagcloud a:hover{';
			$vw_fitness_gym_custom_css .='border-color: '.esc_attr($vw_fitness_gym_first_color).';';
		$vw_fitness_gym_custom_css .='}';
	}
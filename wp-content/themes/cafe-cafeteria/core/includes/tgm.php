<?php
	
load_template( get_template_directory() . '/core/includes/class-tgm-plugin-activation.php' );

/**
 * Recommended plugins.
 */
function cafe_cafeteria_register_recommended_plugins() {
	$plugins = array(
		array(
			'name'             => __( 'Kirki Customizer Framework', 'cafe-cafeteria' ),
			'slug'             => 'kirki',
			'required'         => false,
			'force_activation' => false,
		),
	);
	$config = array();
	cafe_cafeteria_tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'cafe_cafeteria_register_recommended_plugins' );
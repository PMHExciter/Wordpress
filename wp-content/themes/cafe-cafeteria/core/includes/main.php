<?php

add_action( 'admin_menu', 'cafe_cafeteria_getting_started' );
function cafe_cafeteria_getting_started() {    	    	
	add_theme_page( esc_html__('Get Started', 'cafe-cafeteria'), esc_html__('Get Started', 'cafe-cafeteria'), 'edit_theme_options', 'cafe-cafeteria-guide-page', 'cafe_cafeteria_test_guide');   
}

function cafe_cafeteria_admin_enqueue_scripts() {
	wp_enqueue_style( 'cafe-cafeteria-admin-style', esc_url( get_template_directory_uri() ).'/css/main.css' );
}
add_action( 'admin_enqueue_scripts', 'cafe_cafeteria_admin_enqueue_scripts' );

if ( ! defined( 'CAFE_CAFETERIA_DOCS_FREE' ) ) {
define('CAFE_CAFETERIA_DOCS_FREE',__('https://www.misbahwp.com/docs/cafe-cafeteria-free-docs/','cafe-cafeteria'));
}
if ( ! defined( 'CAFE_CAFETERIA_DOCS_PRO' ) ) {
define('CAFE_CAFETERIA_DOCS_PRO',__('https://www.misbahwp.com/docs/cafe-cafeteria-pro-docs','cafe-cafeteria'));
}
if ( ! defined( 'CAFE_CAFETERIA_BUY_NOW' ) ) {
define('CAFE_CAFETERIA_BUY_NOW',__('https://www.misbahwp.com/themes/cafe-wordpress-theme/','cafe-cafeteria'));
}
if ( ! defined( 'CAFE_CAFETERIA_SUPPORT_FREE' ) ) {
define('CAFE_CAFETERIA_SUPPORT_FREE',__('https://wordpress.org/support/theme/cafe-cafeteria','cafe-cafeteria'));
}
if ( ! defined( 'CAFE_CAFETERIA_REVIEW_FREE' ) ) {
define('CAFE_CAFETERIA_REVIEW_FREE',__('https://wordpress.org/support/theme/cafe-cafeteria/reviews/#new-post','cafe-cafeteria'));
}
if ( ! defined( 'CAFE_CAFETERIA_DEMO_PRO' ) ) {
define('CAFE_CAFETERIA_DEMO_PRO',__('https://www.misbahwp.com/demo/cafe-cafeteria/','cafe-cafeteria'));
}

function cafe_cafeteria_test_guide() { ?>
	<?php $theme = wp_get_theme(); ?>
	
	<div class="wrap" id="main-page">
		<div id="lefty">
			<div id="admin_links">
				<a href="<?php echo esc_url( CAFE_CAFETERIA_DOCS_FREE ); ?>" target="_blank" class="blue-button-1"><?php esc_html_e( 'Documentation', 'cafe-cafeteria' ) ?></a>
				<a href="<?php echo esc_url( admin_url('customize.php') ); ?>" id="customizer" target="_blank"><?php esc_html_e( 'Customize', 'cafe-cafeteria' ); ?> </a>
				<a class="blue-button-1" href="<?php echo esc_url( CAFE_CAFETERIA_SUPPORT_FREE ); ?>" target="_blank" class="btn3"><?php esc_html_e( 'Support', 'cafe-cafeteria' ) ?></a>
				<a class="blue-button-2" href="<?php echo esc_url( CAFE_CAFETERIA_REVIEW_FREE ); ?>" target="_blank" class="btn4"><?php esc_html_e( 'Review', 'cafe-cafeteria' ) ?></a>
			</div>
			<div id="description">
				<h3><?php esc_html_e('Welcome! Thank you for choosing ','cafe-cafeteria'); ?><?php echo esc_html( $theme ); ?>  <span><?php esc_html_e('Version: ', 'cafe-cafeteria'); ?><?php echo esc_html($theme['Version']);?></span></h3>
				<img class="img_responsive" style="width:100%;" src="<?php echo esc_url( get_template_directory_uri() ); ?>/screenshot.png">
				<div id="description-inside">
					<?php
						$theme = wp_get_theme();
						echo wp_kses_post( apply_filters( 'misbah_theme_description', esc_html( $theme->get( 'Description' ) ) ) );
					?>
				</div>
			</div>
		</div>

		<div id="righty">
			<div class="postbox donate">
				<div class="d-table">
			    <ul class="d-column">
			      <li class="feature"><?php esc_html_e('Features','cafe-cafeteria'); ?></li>
			      <li class="free"><?php esc_html_e('Pro','cafe-cafeteria'); ?></li>
			      <li class="plus"><?php esc_html_e('Free','cafe-cafeteria'); ?></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('24hrs Priority Support','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Kirki Framework','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Posttype','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('One Click Demo Import','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Reordering','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Enable / Disable Option','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Multiple Sections','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Color Pallete','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Widgets','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-yes"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Page Templates','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Advance Typography','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>
			    <ul class="d-row">
			      <li class="points"><?php esc_html_e('Section Background Image / Color ','cafe-cafeteria'); ?></li>
			      <li class="right"><span class="dashicons dashicons-yes"></span></li>
			      <li class="wrong"><span class="dashicons dashicons-no"></span></li>
			    </ul>		    
	  		</div>
				<h3 class="hndle"><?php esc_html_e( 'Upgrade to Premium', 'cafe-cafeteria' ); ?></h3>
				<div class="inside">
					<p><?php esc_html_e('Discover upgraded pro features with premium version click to upgrade.','cafe-cafeteria'); ?></p>
					<div id="admin_pro_links">			
						<a class="blue-button-2" href="<?php echo esc_url( CAFE_CAFETERIA_BUY_NOW ); ?>" target="_blank"><?php esc_html_e( 'Go Pro', 'cafe-cafeteria' ); ?></a>
						<a class="blue-button-1" href="<?php echo esc_url( CAFE_CAFETERIA_DEMO_PRO ); ?>" target="_blank"><?php esc_html_e( 'Live Demo', 'cafe-cafeteria' ) ?></a>
						<a class="blue-button-2" href="<?php echo esc_url( CAFE_CAFETERIA_DOCS_PRO ); ?>" target="_blank"><?php esc_html_e( 'Pro Docs', 'cafe-cafeteria' ) ?></a>
					</div>
				</div>
			</div>
		</div>
	</div>

<?php } ?>

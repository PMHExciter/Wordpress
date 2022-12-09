<?php
/**
 * Nexproperty Child Theme Custom Functions
**/

/**
 * Localize
 * Since 1.0
 */
 if( ! function_exists( 'real_estate_golden_localize' ) ) {
	 
	add_action('after_setup_theme', 'real_estate_golden_localize');

	function real_estate_golden_localize(){
		load_child_theme_textdomain( 'real-estate-golden' , get_stylesheet_directory().'/languages');
	}
 }

 /* Enqueue Child Theme Scripts & Styles 
 ** http://codex.wordpress.org/Function_Reference/wp_enqueue_style
 * Since 1.0
 */
 
add_action( 'wp_enqueue_scripts', 'real_estate_golden_styles' );	

if( ! function_exists( 'real_estate_golden_styles' ) ) {	

	function real_estate_golden_styles() {	
					
		wp_enqueue_style(
			'layers-parent-style',
			get_template_directory_uri() . '/style.css',
			array()
		); // Parent Stylsheet for Version info

		
	}
	
}
if( ! function_exists( 'real_estate_golden_scripts' ) ) {
		
	function real_estate_golden_scripts() {
		
		wp_enqueue_script(
			'real-estate-golden' . '-custom',
			get_stylesheet_directory_uri() . '/assets/js/theme.js',
			array(
				'jquery', // make sure this only loads if jQuery has loaded
			)
		); // Custom Child Theme jQuery  
		
	}	
	
}
// Output this in the footer before anything else
// http://codex.wordpress.org/Plugin_API/Action_Reference/wp_footer
add_action('wp_enqueue_scripts', 'real_estate_golden_scripts'); 
 

/**
* Add Sub Menu Page to the Layers Menu Item
*/
if( ! function_exists('real_estate_golden_register_submenu_page') ) {
	function real_estate_golden_register_submenu_page(){
		add_theme_page( __( 'Real Estate Golden Help' , 'real-estate-golden'  ), __( 'Real Estate Golden Help' , 'real-estate-golden'  ), 
							'edit_theme_options', 'real_estate_golden-dashboard', 'get_child_onboarding' );
	}
}
function get_child_onboarding(){
	require_once get_stylesheet_directory() . '/includes/theme-help.php';
}
add_action('admin_menu', 'real_estate_golden_register_submenu_page', 60);

/**
* Welcome Redirect
* http://docs.layerswp.com/how-to-add-help-pages-onboarding-to-layers-themes-or-extensions/
*/
function real_estate_golden_setup(){
	if( isset($_GET["activated"]) && $pagenow = "themes.php" ) { //&& '' == get_option( 'layers_welcome' )
		update_option( 'layers_welcome' , 1);
	}
}
add_action( 'after_setup_theme' , 'real_estate_golden_setup', 20 );



$message = '<p><strong>' . sprintf( '%s <a href="%s" class="button button-primary">%s</a>', esc_html__( 'We recommend import demo content for theme Real Estate Golden: ', 'real-estate-golden' ), admin_url('themes.php?page=one-click-demo-import'), esc_html__( 'import now', 'real-estate-golden' ) ) . '</strong></p>';
real_estate_golden_notify_admin('fail_load', $message, function()
										{
											$admin_page = get_current_screen();
											if( $admin_page->base != "dashboard" ) return true;

											if ( in_array( 'wpdirectorykit/wpdirectorykit.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) )  && function_exists('wdk_get_instance')) {
                                                $WMVC = &wdk_get_instance();
                                                $WMVC->model('field_m');
                                                $wdk_fields = $WMVC->field_m->get();
                                                if(count($wdk_fields) > 0) 
                                                    return true;
											} else {
                                                return true;
                                            }

										}, 'notice notice-warning'
	);
        
/*
* Add admin notify
* @param (string) $key unique key of notify, prefix included related plugin
* @param (string) $text test of message
* @param (function) $callback_filter custom function should be return true if not need show
* @param (string) $class notify alert class, by default 'notice notice-error'
* @return boolen true 
*/
function real_estate_golden_notify_admin ($key = '', $text = 'Custom Text of message', $callback_filter = '', $class = 'notice notice-error') {
    $key = 'real_estate_golden_notify_'.$key;
    $key_diss = $key.'_dissmiss';

    $real_estate_golden_notinstalled_admin_notice__error = function () use ($key_diss, $text, $class, $callback_filter) {
        global $wpdb;
        $user_id = get_current_user_id();
        if (!get_user_meta($user_id, $key_diss)) {
            if(!empty($callback_filter)) if($callback_filter()) return false;

            $message = '';
            $message .= $text;
            printf('<div class="%1$s" style="position:relative;"><p>%2$s</p><a href="?'.$key_diss.'"><button type="button" class="notice-dismiss"></button></a></div>', esc_html($class), ($message));  // WPCS: XSS ok, sanitization ok.
        }
    };

    add_action('admin_notices', function () use ($real_estate_golden_notinstalled_admin_notice__error) {
        $real_estate_golden_notinstalled_admin_notice__error();
    });

    $real_estate_golden_notinstalled_admin_notice__error_dismissed = function () use ($key_diss) {
        $user_id = get_current_user_id();
        if (isset($_GET[$key_diss]))
            add_user_meta($user_id, $key_diss, 'true', true);
    };
    add_action('admin_init', function () use ($real_estate_golden_notinstalled_admin_notice__error_dismissed) {
        $real_estate_golden_notinstalled_admin_notice__error_dismissed();
    });

    return true;
}



/**
 * Admin styles.
 *
 */
function real_estate_golden_custom_admin_styles() {
    echo '<style>
      .appearance_page_real_estate_golden-dashboard #setting-error-tgmpa {
        margin-left: 0;
      }
    </style>';
  }
  add_action('admin_head', 'real_estate_golden_custom_admin_styles');

?>
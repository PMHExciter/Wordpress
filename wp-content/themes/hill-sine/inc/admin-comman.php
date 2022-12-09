<?php
function hill_admin_script_style(){
    $current_page = get_current_screen()->base;
    if ($current_page=='customize') {
        wp_enqueue_style( 'hill-sine-admin-style-css', esc_url(get_template_directory_uri()).'/assets/css/admin-style.css' , array(), _S_VERSION );
    	
    	wp_enqueue_style('wp-color-picker' );
        wp_enqueue_script('hill-sine-wp-color-picker-alpha',  get_template_directory_uri() . '/js/wp-color-picker-alpha.js', array( 'wp-color-picker' ), '1.0.0', true );
        $color_picker_strings = array(
            'clear'            => 'Clear',
            'clearAriaLabel'   => 'Clear color',
            'defaultString'    => 'Default',
            'defaultAriaLabel' => 'Select default color',
            'pick'             => 'Select Color',
            'defaultLabel'     => 'Color value',
        );
        wp_localize_script( 'hill-sine-wp-color-picker-alpha', 'wpColorPickerL10n', $color_picker_strings );
        wp_enqueue_script( 'hill-sine-wp-color-picker-alpha' );
    }
}
add_action('admin_enqueue_scripts', 'hill_admin_script_style');




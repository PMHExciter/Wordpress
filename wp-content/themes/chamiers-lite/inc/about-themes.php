<?php
/**
 * Chamiers Lite About Theme
 *
 * @package Chamiers Lite
 */

//about theme info
add_action( 'admin_menu', 'chamiers_lite_abouttheme' );
function chamiers_lite_abouttheme() {    	
	add_theme_page( __('About Theme Info', 'chamiers-lite'), __('About Theme Info', 'chamiers-lite'), 'edit_theme_options', 'chamiers_lite_guide', 'chamiers_lite_mostrar_guide');   
} 

//Info of the theme
function chamiers_lite_mostrar_guide() { 	
?>

<h1><?php esc_html_e('About Theme Info', 'chamiers-lite'); ?></h1>
<hr />  

<p><?php esc_html_e('Chamiers Lite theme is a perfect and stunning free tea shop WordPress theme for your online coffee and tea shop. It is the most pocket-friendly and suitable choice for any coffee or tea service providers, coffee e-stores, beverage delivery partners, bakeries, restaurants, cafeteria or cafe, etc., to have a robust online presence. With an elegant appearance and unique design, Chamiers Lite Theme is highly responsive and fully compatible with WooCommerce. The easiest way to create an amazing online beverage store and customize it with no coding skills required, Chamiers Lite Theme is the best choice for all time. This theme is a multipurpose one that cooperates with you to develop an ultimate professional-looking and highly functional minimalistic website. This theme is very user-friendly and enables you to create a robust theme quickly and effortlessly.', 'chamiers-lite'); ?></p>

<h2><?php esc_html_e('Theme Features', 'chamiers-lite'); ?></h2>
<hr />  
 
<h3><?php esc_html_e('Theme Customizer', 'chamiers-lite'); ?></h3>
<p><?php esc_html_e('The built-in customizer panel quickly change aspects of the design and display changes live before saving them.', 'chamiers-lite'); ?></p>


<h3><?php esc_html_e('Responsive Ready', 'chamiers-lite'); ?></h3>
<p><?php esc_html_e('The themes layout will automatically adjust and fit on any screen resolution and looks great on any device. Fully optimized for iPhone and iPad.', 'chamiers-lite'); ?></p>


<h3><?php esc_html_e('Cross Browser Compatible', 'chamiers-lite'); ?></h3>
<p><?php esc_html_e('Our themes are tested in all mordern web browsers and compatible with the latest version including Chrome,Firefox, Safari, Opera, IE11 and above.', 'chamiers-lite'); ?></p>


<h3><?php esc_html_e('E-commerce', 'chamiers-lite'); ?></h3>
<p><?php esc_html_e('Fully compatible with WooCommerce plugin. Just install the plugin and turn your site into a full featured online shop and start selling products.', 'chamiers-lite'); ?></p>

<hr />  	
<p><a href="http://www.gracethemesdemo.com/documentation/chamiers/#homepage-lite" target="_blank"><?php esc_html_e('Documentation', 'chamiers-lite'); ?></a></p>

<?php } ?>
<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Hill_Sine
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
global $hill_global;
if ($hill_global['sidebar_position']!='no_sidebar') {
?>
<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php
}
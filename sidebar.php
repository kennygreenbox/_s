<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package hello_world
 */

if ( ! is_activehello_worldidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamichello_worldidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->

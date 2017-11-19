<?php
/**
* Sidebar Pages
*
* @package btalk-testering
*/
if ( ! is_active_sidebar( 'sidebar-pages' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-pages' ); ?>
</aside><!-- #secondary -->

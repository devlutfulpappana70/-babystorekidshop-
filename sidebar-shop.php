<?php
/**
 * The sidebar containing the shop widget area
 *
 * @package Kidify
 */

if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>

<?php dynamic_sidebar( 'sidebar-shop' ); ?>

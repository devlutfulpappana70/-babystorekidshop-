<?php
/**
 *Kidify functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Kidify
 */

$kidify_theme = wp_get_theme();

if ( ! defined( 'KIDIFY_VERSION' ) ) {
	define( 'KIDIFY_VERSION', $kidify_theme->get( 'Version' ) );
}
if ( ! defined( 'KIDIFY_URI' ) ) {
	define( 'KIDIFY_URI', get_template_directory_uri() );
}
if ( ! defined( 'KIDIFY_PATH' ) ) {
	define( 'KIDIFY_PATH', get_template_directory() );
}

// List of required plugins
require get_template_directory() . '/inc/required-plugins/init-plugins.php';

// Sets up theme defaults for this theme.
require get_template_directory() . '/inc/setup.php';

// Register widget for this theme.
require get_template_directory() . '/inc/widgets.php';

// Enqueue scripts and styles for this theme.
require get_template_directory() . '/inc/assets.php';

// Custom template tags for this theme.
require get_template_directory() . '/inc/helpers.php';

// Functions which enhance the theme by hooking into WordPress.
require get_template_directory() . '/inc/template-functions.php';

// WooComemrce functionality enhanced
if(function_exists('WC')){
	require get_template_directory() . '/inc/woocommerce/init.php';
}

<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kidify
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<?php
$header_style = kidify_get_option('header-style');
if (preg_match('/header-(\d+)/', $header_style, $matches)) {
	$header_style = $matches[1];
}else{
	$header_style = 1;
}

$banner_switch     = kidify_get_option('banner-switch', false);
$banner_style      = kidify_get_option('banner-preset', '1');
$breadcrumb_switch = kidify_get_option('breadcrumb-switch', false);
$banner_title      = kidify_get_option('banner-title', 'Our Blog');
$banner_img        = null;

$overflow_color_switch = '0';
$overflow_color        = '#EEF9FF';
$header_setting_type   = 'global';

if(class_exists('WooCommerce') && is_product()){
	$banner_style = 1;
}else if(class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag())){
	$banner_switch     = kidify_get_option('shop-banner-switch', false);
	$banner_style      = kidify_get_option('shop-banner-preset', '1');
	$breadcrumb_switch = kidify_get_option('shop-breadcrumb-switch', false);
	$banner_title      = kidify_get_option('shop-banner-title', 'Our Blog');
	$banner_subtitle   = kidify_get_option('shop-banner-subtitle', 'Our Blog');
	$banner_categories = kidify_get_option('shop-banner-categories', []);
	$banner_products   = kidify_get_option('shop-banner-products', []);
	$banner_img        = null;
}else if(class_exists('WooCommerce') && is_account_page()){
	kidify_get_banner_control(get_the_ID(), $header_setting_type, $banner_switch, $banner_style, $breadcrumb_switch, $banner_title, $banner_img, $overflow_color_switch, $overflow_color);
}else if(is_page()){
	kidify_get_banner_control(get_the_ID(), $header_setting_type, $banner_switch, $banner_style, $breadcrumb_switch, $banner_title, $banner_img, $overflow_color_switch, $overflow_color);
}else if(is_singular('post')){
	$banner_switch = 0;
}

if(isset($_GET['header_style']) && !empty($_GET['header_style'])){
	$header_style = $_GET['header_style'];
}
if(isset($_GET['banner_style']) && !empty($_GET['banner_style'])){
	$banner_style = $_GET['banner_style'];
}

$wishlists_total = (function_exists('WC') && function_exists('KC')) ? count(kidify_get_wc_sessions('kidify-wishlists')) : 0;
?>

<?php
$enable_preloader = kidify_get_option('enable-preloader', true);
if( $enable_preloader ) get_template_part( 'template-parts/preloader');
?>

<?php get_template_part( 'template-parts/headers/header', $header_style, [
	'wishlists_total'   => $wishlists_total,
	'header_fixed'      => (($banner_style == 3) && (is_shop() || is_product_category())) ? 1 : 0
] ); ?>

<?php get_template_part( 'template-parts/mobile-menu'); ?>

<main class="main">

	<?php 
	if(!is_404()){
		if(class_exists('WooCommerce') && is_product()){
			get_template_part( 'template-parts/banners/product/banner', $banner_style, [] );
		}else if(class_exists('WooCommerce') && (is_shop() || is_product_category())){
			get_template_part( 'template-parts/banners/shop/banner', $banner_style, [
				'banner_switch' 	    => $banner_switch,
				'banner_categories'     => $banner_categories,
				'banner_products' 	    => $banner_products,
				'banner_img' 	        => $banner_img,
				'banner_title' 	        => $banner_title,
				'banner_subtitle' 	    => $banner_subtitle,
				'breadcrumb_switch'     => $breadcrumb_switch
			] );
		}else{
			get_template_part( 'template-parts/banners/banner', $banner_style, [
				'banner_switch' 	    => $banner_switch,
				'banner_img' 	        => $banner_img,
				'banner_title' 	        => $banner_title,
				'breadcrumb_switch'     => $breadcrumb_switch,
				'overflow_color_switch' => $overflow_color_switch,
				'overflow_color'        => $overflow_color
			] );
		}
	}
	?>
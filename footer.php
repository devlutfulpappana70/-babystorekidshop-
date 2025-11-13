<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Kidify
 */

if(function_exists('KC')){
	if(class_exists('WooCommerce') && (is_shop() || is_product_category() || is_product_tag())){
		kidify_core_get_recently_viewed_products();
	}
	kidify_core_before_footer_brand();
	kidify_core_before_footer_newsletter();
	kidify_core_before_footer_instagram();
}

$header_style = kidify_get_option('header-style');
if (preg_match('/header-(\d+)/', $header_style, $matches)) {
	$header_style = $matches[1];
}else{
	$header_style = 1;
}

if(isset($_GET['header_style']) && !empty($_GET['header_style'])){
	$header_style = $_GET['header_style'];
}

$footer_style = kidify_get_option('footers-style');
if (preg_match('/footer-(\d+)/', $footer_style, $matches)) {
	$footer_style = $matches[1];
}else{
	$footer_style = 1;
}

if(isset($_GET['footer_style']) && !empty($_GET['footer_style'])){
	$footer_style = $_GET['footer_style'];
}
?>

	</main>

	<?php get_template_part( 'template-parts/footers/footer', $footer_style, ['header_style' => $header_style] ); ?>

	<?php wp_footer(); ?>

</body>
</html>

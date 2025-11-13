<?php
/**
 * Page template file
 * 
 * @package Kidify
 */

get_header();

$full_width = false;

if ( class_exists('WooCommerce') && (is_cart() || is_checkout() || is_page('wishlist') || is_page('compare') || is_account_page() )) {
	$full_width = true;
}
?>
	<section class="section content-products">
		<div class="container">
			<div class="box-blog-column">
				<div class="col-1 <?php echo esc_attr($full_width ? 'w-full' : ''); ?>">
					<div class="box-inner-blog-padding<?php echo esc_attr($full_width ? '-' : ''); ?>">
						<?php while(have_posts()): the_post();?>
							<?php get_template_part( 'template-parts/content', 'page', ['full_width' => $full_width]); ?>
							<?php
								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;
							?>
						<?php endwhile; ?>
					</div>
				</div>
				<?php if(!$full_width): ?>
					<div class="col-2">
						<div class="sidebar-right">
							<div class="row">
								<?php get_sidebar(); ?>
							</div>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
    </section>
<?php
get_footer();

<?php
/**
 * Blog template file
 * 
 * @package Kidify
 */

get_header();

$blog_style = 1;
if(isset($_GET['blog_style']) && !empty($_GET['blog_style'])){
	$blog_style = $_GET['blog_style'];
}
if($blog_style == 2){
	$sticky_posts = get_option('sticky_posts');
	$args = array(
		'post_type'      => 'post',
		'posts_per_page' => 1,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'post__in'       => $sticky_posts
	);
	$query_featured = new WP_Query($args);
	$exclude_posts  = wp_list_pluck($query_featured->posts, 'ID');

	unset($args['post__in']);
	$paged                  = (get_query_var('paged')) ? get_query_var('paged') : 1; 
	$args['posts_per_page'] = 10;
	$args['post__not_in']   = $exclude_posts;
	$args['paged']          = $paged;
	$query_blog             = new WP_Query($args);
}
?>
	<section class="section content-products">
		<div class="container">
			<div class="box-blog-column">
				<div class="col-1">
					<div class="box-inner-blog-padding">
						<?php if($blog_style == 2): ?>
							<?php if($query_featured->have_posts()): ?>
								<?php while($query_featured->have_posts()): $query_featured->the_post();?>
									<?php get_template_part( 'template-parts/content'); ?>
								<?php endwhile; ?>
								<?php wp_reset_postdata(); ?>
							<?php endif;?>

							<div class="row">
								<?php if($query_blog->have_posts()): ?>
									<?php while($query_blog->have_posts()): $query_blog->the_post();?>
										<?php get_template_part( 'template-parts/content', 'two'); ?>
									<?php endwhile; ?>
									<?php wp_reset_postdata(); ?>
								<?php else: ?>
									<?php get_template_part( 'template-parts/content', 'none'); ?>
								<?php endif;?>
							</div>
						<?php else: ?>
							<?php if(have_posts()): ?>
								<?php while(have_posts()): the_post();?>
									<?php get_template_part( 'template-parts/content'); ?>
								<?php endwhile; ?>
							<?php else: ?>
								<?php get_template_part( 'template-parts/content', 'none'); ?>
							<?php endif;?>
						<?php endif;?>
					</div>
					<div class="mb-50">
						<nav class="box-pagination">
							<?php 
							if($blog_style == 2){
								kidify_pagination($query_blog->max_num_pages,"",$paged); 
							}else{
								kidify_pagination(); 
							}
							?>
						</nav>
					</div>
				</div>
				<div class="col-2">
					<div class="sidebar-right">
						<div class="row">
							<?php get_sidebar(); ?>
						</div>
					</div>
				</div>
			</div>
		</div>
    </section>
<?php
get_footer();

<?php
/**
 * Archive template file
 * 
 * @package Kidify
 */

get_header();
?>
	<section class="section content-products">
		<div class="container">
			<div class="box-blog-column">
				<div class="col-1">
					<div class="box-inner-blog-padding">
						<?php if(have_posts()): ?>
							<?php while(have_posts()): the_post();?>
								<?php get_template_part( 'template-parts/content'); ?>
							<?php endwhile; ?>
						<?php else: ?>
							<?php get_template_part( 'template-parts/content', 'none'); ?>
						<?php endif;?>
					</div>
					<div class="mb-50">
						<nav class="box-pagination">
							<?php kidify_pagination(); ?>
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

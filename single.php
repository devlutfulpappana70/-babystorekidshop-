<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Kidify
 */

get_header();
?>
	<?php kidify_set_post_view(); ?>
	<?php while(have_posts()): the_post();?>
		<section class="section block-blog-single">
			<div class="container">
				<div class="top-head-blog">
					<div class="text-center">
						<?php
						$categories = get_the_category();
						if ( ! empty( $categories ) ) {
							foreach ($categories as $key => $category) {
								echo '<a class="label-tag mb-15 mr-10" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
							}
						}
						?>
						<h2 class="font-4xl-bold"><?php the_title();?></h2>
						<div class="box-author">
							<?php kidify_posted_by(); ?>
							<div class="author-info">
								<div class="author-name"><?php the_author(); ?></div>
								<div class="post-meta">
									<?php kidify_posted_on('mr-20'); ?>
									<?php kidify_post_reading_time(); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if(has_post_thumbnail()): ?>
					<div class="feature-image">
						<?php the_post_thumbnail();?>
					</div>
				<?php endif; ?>
				<div class="content-detail">
					<?php the_content(); ?>
					<?php
						wp_link_pages( array(
							'before'      => '<div class="page-links">' . esc_html( 'Pages:', 'kidify' ) . '<nav class="box-pagination"><ul class="pagination">',
							'after'       => '</nav></ul></div>',
							'link_before' => '<span class="page-number">',
							'link_after'  => '</span>',
						) );
					?>
				</div>
				<div class="box-comments">
					<?php if(get_the_author_meta('description')):?>
						<div class="list-comments">
							<div class="item-comment">
								<div class="item-comment-image">
									<?php kidify_posted_by(); ?>
								</div>
								<div class="item-comment-info">
									<p class="font-xl-bold mb-5"><?php the_author(); ?></p>
									<p class="font-lg">
										<?php the_author_meta('description'); ?>
									</p>
								</div>
							</div>
						</div>
					<?php endif; ?>
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>
				</div>
			</div>
		</section>
	<?php endwhile; ?>
<?php
get_footer();

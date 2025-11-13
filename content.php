<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kidify
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('cardBlogStyle1'); ?>>
	<?php if(has_post_thumbnail()): ?>
		<div class="cardImage">
			<div class='cat-list'>
				<?php
				$categories = get_the_category();
				if ( ! empty( $categories ) ) {
					$total = 1;
					foreach ($categories as $key => $category) {
						echo '<a class="tag-up mr-10" href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>';
						if($total >= 2) break;
						$total++;
					}
				}
				?>
			</div>
			<?php kidify_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<div class="cardInfo">
		<a href="<?php the_permalink();?>">
			<h2 class="font-42-bold mb-10"><?php the_title();?></h2>
		</a>
		<div class="box-meta-post mb-20">
			<?php kidify_posted_on(); ?>
			<?php kidify_post_reading_time(); ?>
			<?php kidify_get_post_views(); ?>
		</div>
		<p class="font-lg">
			<?php echo get_the_excerpt();?>
		</p>
		<div class="mt-25 text-end">
			<?php kidify_read_more(); ?>
		</div>
	</div>
</div>

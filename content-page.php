<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Kidify
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class('cardBlogStyle1 page-tmp'); ?>>
	<?php if (!$args['full_width']) {
		?>
		<h2 class="font-42-bold mb-20"><?php the_title();?></h2>
		<?php
	}?>
	
	<?php if(has_post_thumbnail()): ?>
		<div class="cardImage">
			<?php kidify_post_thumbnail(); ?>
		</div>
	<?php endif; ?>
	<div class="cardInfo">
		<?php the_content();?>
	</div>
</div>

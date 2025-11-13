<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kidify
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>

<div id="comments">
	<?php
	// You can start editing here -- including this comment!
	if ( have_comments() ) :
		?>
		<h4 class="font-3xl-bold title-comment">
			<?php
			$kidify_comment_count = get_comments_number();
			if ( '1' === $kidify_comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One thought on &ldquo;%1$s&rdquo;', 'kidify' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf( 
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', $kidify_comment_count, 'comments title', 'kidify' ) ),
					number_format_i18n( $kidify_comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h4>
		<?php the_comments_navigation(); ?>
		<ul class="list-comments">
			<?php
			wp_list_comments(
				array(
					'style'      => 'li',
					'callback'   => 'kidify_comments_list' 
				)
			);
			?>
		</ul>
		<?php
		the_comments_navigation();
		// If comments are closed and there are comments, let's leave a little note, shall we?
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'kidify' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	?>
	<div class="form-comment">
		<?php comment_form(); ?>
	</div>
</div>

<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Kidify
 */

?>

<div class="cardBlogStyle1">
	<h2 class="font-42-bold mb-20"><?php esc_html_e( 'Nothing Found', 'kidify' ); ?></h2>
	<div class="cardInfo">
		<?php
		if ( is_home() && current_user_can( 'publish_posts' ) ) :

			printf(
				'<p class="font-lg">' . wp_kses(
					/* translators: 1: link to WP admin new post page. */
					__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'kidify' ),
					array(
						'a' => array(
							'href' => array(),
						),
					)
				) . '</p>',
				esc_url( admin_url( 'post-new.php' ) )
			);

		elseif ( is_search() ) :
			?>

			<p class="font-lg"><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'kidify' ); ?></p>
			<?php
			get_search_form();

		else :
			?>

			<p class="font-lg"><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'kidify' ); ?></p>
			<?php
			get_search_form();

		endif;
		?>
	</div>
</div>

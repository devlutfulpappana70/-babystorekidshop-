<?php
/**
 * The template for displaying 404 pages (not found)
 * 
 * @package Kidify
 */

get_header();

$title    = kidify_get_option('404-title', 'Page not available' );
$subtitle = kidify_get_option('404-subtitle', 'Sorry, but the page you were looking <br/> for could not be found.' );
$text     = kidify_get_option('404-text', 'You can return to our <a href="%1$s"><u>home page</u></a>, or drop us a line <br/> if you can\'t find what you\'re looking for.' );
$image    = kidify_get_option('404-image', (KIDIFY_URI . '/assets/imgs/template/404.png'));
$infos    = kidify_get_option('404-info-box', []);
?>
	<main class="main">
		<div class="container">
			<div class="box-404 mb-30">
				<div class="row align-items-center">
					<div class="col-lg-6 pr-80">
						<div class="text-5xl text-bold mb-10"><?php echo esc_html( $title ); ?></div>
						<div class="text-xl text-bold mb-20">
							<?php echo wp_kses_post( $subtitle ); ?>							
						</div>
						<div class="text-md mb-30">
							<?php echo wp_kses_post( $text ); ?>
						</div>
					</div>
					<div class="col-lg-6 text-end">
						<img class="d-inline" src="<?php echo esc_url($image); ?>" alt="kidify">
					</div>
				</div>
			</div>
			<?php if(!empty($infos)): ?>
				<div class="box-info-contact">
					<div class="row">
						<?php foreach($infos as $info): ?>
							<div class="col-lg-3 col-md-6 mb-15">
								<div class="cardContact cardChat">
									<div class="cardInfo">
										<strong class="d-block mb-5 font-xl-bold"><?php echo esc_html($info['title']); ?></strong>
										<p class="font-md">
											<?php echo wp_kses_post($info['description']); ?>
										</p>
									</div>
								</div>
							</div>
						<?php endforeach;?>
					</div>
				</div>
			<?php endif;?>
		</div>
	</main>
<?php
get_footer();

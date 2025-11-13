<header class="header sticky-bar header-style-1 <?php echo esc_attr($args['header_fixed'] ? 'position-fixed' : ''); ?>">
    <?php do_action('kc_notifications', 'top-header'); ?>
	<div class="container">
		<div class="main-header">
			<div class="header-logo">
				<a class="d-flex" href="<?php echo esc_url(home_url()); ?>">
					<?php kidify_logo(); ?>
				</a>
			</div>
			<div class="header-menu">
				<div class="header-nav <?php echo esc_attr((!function_exists('WC') && !function_exists('KC')) ? 'mr-0' : ''); ?>">
					<nav class="nav-main-menu d-none d-xl-block">
						<?php
							$menu_args = [
								'theme_location'    => 'mainmenu',
								'depth'             => 3,
								'container'         => false,
								'menu_id'        	=> 'main-menu',
								'menu_class'        => 'main-menu',
								'fallback_cb'       => 'kidify_fallback_menu'
							];
							if(function_exists('KC')){
								$menu_args['walker'] = new Kidify_Walker_Menu();
							}
							wp_nav_menu( $menu_args );
						?>
					</nav>
					<div class="burger-icon burger-icon-white">
						<span class="burger-icon-top"></span>
						<span class="burger-icon-mid"></span>
						<span class="burger-icon-bottom"></span>
					</div>
				</div>
			</div>
			<?php 
				$wishlists_total = $args['wishlists_total'];
				kidify_header_right_icons($wishlists_total); 
			?>
		</div>
	</div>
    <?php do_action('kc_notifications', 'bottom-header'); ?>
</header>
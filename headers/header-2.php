<header class="header sticky-bar header-style-2">
    <?php do_action('kc_notifications', 'top-header'); ?>
	<div class="box-middle-header">
		<div class="container">
		<div class="main-header">
			<div class="header-search">
			<div class="box-formsearch">
				<form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<input type="search" class="form-control" placeholder="<?php esc_attr_e('Search …', 'kidify'); ?>" value="<?php echo get_search_query(); ?>" name="s">
					<input type="submit" class="btn-search" value="">
				</form>
			</div>
			</div>
			<div class="header-logo">
				<a href="<?php echo esc_url(home_url()); ?>">
					<?php kidify_logo(); ?>
				</a>
			</div>
			
			<?php 
				$wishlists_total = $args['wishlists_total'];
				kidify_header_right_icons($wishlists_total); 
			?>
			<div class="burger-icon burger-icon-white">
				<span class="burger-icon-top"></span>
				<span class="burger-icon-mid"></span>
				<span class="burger-icon-bottom"></span>
			</div>
		</div>
		</div>
	</div>
	<div class="box-bottom-header">
		<div class="container">
		<div class="header-menu">
			<div class="header-nav">
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
			</div>
		</div>
		</div>
	</div>
    <?php do_action('kc_notifications', 'bottom-header'); ?>
</header>
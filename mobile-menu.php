<?php
/**
 * The template for mobile menu
 *
 * @package Kidify
 */
?>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
	<div class="mobile-header-wrapper-inner">
		<div class="mobile-header-content-area">
            <div class="mobile-menu-head">
                <div class="box-head-1">
                    <a class="logo-menu" href="<?php echo esc_url(home_url('/')); ?>">
                        <?php kidify_logo(); ?>
                    </a>
                    <a class="close-mobile" href="#!">
                        <img src="<?php echo esc_url(KIDIFY_URI); ?>/assets/imgs/template/icons/close.svg" alt="kidify">
                    </a>
                </div>
                <div class="box-head-2">
                    <a class="back-mobile" href="#!">
                        <img src="<?php echo esc_url(KIDIFY_URI); ?>/assets/imgs/template/icons/back.svg" alt="kidify">
                    </a>
                </div>
            </div>
            <div class="perfect-scroll">
                <div class="mobile-menu-wrap mobile-header-border">
                    <nav>
						<?php
							$mobile_menu_args = [
								'theme_location'    => 'mobilemenu',
								'depth'             => 3,
								'container'         => false,
								'menu_id'        	=> 'mobile-menu',
								'menu_class'        => 'mobile-menu font-heading'
							];
							wp_nav_menu( $mobile_menu_args );
						?>
                    </nav>
                </div>
            </div>
		</div>
	</div>
</div>
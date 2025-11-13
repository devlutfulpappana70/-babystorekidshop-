<footer class="footer footer-style-3">
    <?php if ( is_active_sidebar( 'footer-sidebar-2' ) ): ?>
        <div class="footer-1">
            <div class="container">
                <div class="row">
                    <?php dynamic_sidebar('footer-sidebar-2'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="footer-2">
        <div class="container">
        <div class="footer-bottom">
            <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 text-center text-lg-start mb-20">
				<?php
					$footer_menu_args = [
						'menu'       => kidify_get_option('footer-menu-items'),
						'menu_id'    => 'menu-bottom',
						'menu_class' => 'menu-bottom',
					];
					wp_nav_menu( $footer_menu_args );
				?>
            </div>
            <div class="col-lg-4 col-md-12 text-center -mb-20">
                <span class="body-p1 neutral-900 mr-5">
                    <?php kidify_copyright_text(); ?>
                </span>
            </div>
            <div class="col-lg-4 col-md-12 text-center text-lg-end mb-20">
                <div class="d-flex justify-content-center justify-content-lg-end align-items-center box-all-payments">
                    <?php 
                        if (function_exists('KC')) {
                            kidify_core_payment_gateway();
                        }
                    ?>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
</footer>
<footer class="footer <?php echo esc_attr($args['header_style'] == 2 ? 'footer-style-2' : ''); ?>">
    <?php if ( is_active_sidebar( 'footer-sidebar-1' ) ): ?>
        <div class="footer-1">
            <div class="container">
                <div class="row mb-30">
                    <?php dynamic_sidebar('footer-sidebar-1'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="footer-2">
        <div class="container">
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <?php if($args['header_style'] != 2 ): ?>
                        <div class="col-lg-3 col-md-12 text-center text-lg-start mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                            <a href="<?php echo esc_url(home_url()); ?>">
                                <?php kidify_logo(); ?>
                            </a>
                        </div>
                    <?php endif; ?>
                    <div class="col-lg-6 col-md-12 text-center <?php echo esc_attr($args['header_style'] == 2 ? 'text-lg-start' : ''); ?> -mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
                        <span class="body-p1 neutral-900 mr-5">
                            <?php kidify_copyright_text(); ?>
                        </span>
                    </div>
                    <div class="col-lg-<?php echo esc_attr($args['header_style'] == 2 ? '6' : '3'); ?> col-md-12 text-center text-lg-end mb-20 wow animate__animated animate__fadeIn" data-wow-delay=".0s">
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
<footer class="footer footer-style-4">
    <?php if ( is_active_sidebar( 'footer-sidebar-3' ) ): ?>
        <div class="footer-1">
            <div class="container mb-30">
                <div class="row">
                    <?php dynamic_sidebar('footer-sidebar-3'); ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="footer-2">
        <div class="container">
        <div class="footer-bottom">
            <div class="box-container-footer">
            <div class="row align-items-center">
                <div class="col-lg-4 col-md-12 text-center text-lg-start mb-20">
                    <a href="<?php echo esc_url(home_url()); ?>">
                        <?php kidify_logo(); ?>
                    </a>
                </div>
                <div class="col-lg-4 col-md-12 text-center mb-20">
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
    </div>
</footer>
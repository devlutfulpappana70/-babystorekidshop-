<header class="header sticky-bar header-style-2 header-style-5">
    <?php do_action('kc_notifications', 'top-header'); ?>
    <div class="box-middle-header">
        <div class="container">
            <div class="main-header">
                <div class="header-logo">
                    <a href="<?php echo esc_url(home_url()); ?>">
					    <?php kidify_logo(); ?>
                    </a>
                </div>
                <div class="header-search">
                <div class="box-formsearch">
                    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                        <input value="<?php echo get_search_query(); ?>" name="s" class="form-control" type="text" placeholder="<?php esc_attr_e('Search …', 'kidify'); ?>">
                        <input class="btn-search" type="submit" value="">
                    </form>
                </div>
                </div>
                
                <?php 
                    $wishlists_total = $args['wishlists_total'];
                    kidify_header_right_icons($wishlists_total); 
                ?>
            </div>
        </div>
    </div>
    <?php do_action('kc_notifications', 'bottom-header'); ?>
</header>
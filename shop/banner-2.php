<?php
$banner_switch = $args['banner_switch'];
if(!$banner_switch) return;
?>
<?php if($args['breadcrumb_switch']): ?>
    <div class="section block-shop-head-2">
        <div class="container">
            <div class="breadcrumbs">
                <?php
                    woocommerce_breadcrumb([
                        'wrap_before' => '<ul>',
                        'wrap_after'  => '</ul>',
                        'before'      => '<li>',
                        'after'       => '</li>',
                        'delimiter'   => '',
                    ]);
                ?>
            </div>
        </div>
    </div>
<?php endif; ?>
<section class="section content-products">
    <div class="container">
        <div class="box-top-product-list">
            <div class="row align-items-start">
                <div class="col-lg-5 mb-30">
                    <?php if($args['banner_title']): ?>
                        <h2 class="font-4xl mb-20">
                            <?php echo esc_html($args['banner_title']); ?>
                        </h2>
                    <?php endif; ?>
                    <?php if($args['banner_subtitle']): ?>
                        <p class="font-md">
                            <?php echo wp_kses_post($args['banner_subtitle']); ?>
                        </p>
                    <?php endif; ?>
                </div>
                <div class="col-lg-7 mb-30">
                    <ul class="list-category-5-col">
                        <?php if (is_array($args['banner_categories']) && (count($args['banner_categories']) > 0)): ?>
                            <?php $i=1; foreach ($args['banner_categories'] as $key => $category): ?>
                                <?php 
                                    if($i > 4) break;
                                    $cat_obj      = get_term_by('slug', $category, 'product_cat');
                                    if(!$cat_obj) continue;
                                    $catName      = $cat_obj->name;
                                    $num_prodcuts = $cat_obj->count;
                                    $thumbnail_id = get_term_meta( $cat_obj->term_id, 'thumbnail_id', true ); 
                                    $image_url    = wp_get_attachment_url( $thumbnail_id );
                                    $cat_link     = get_term_link( $cat_obj->term_id );
                                ?>
                                <li>
                                    <div class="cardCategory">
                                        <div class="cardImage">
                                            <a href="<?php echo esc_url($cat_link); ?>">
                                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($catName); ?>">
                                            </a>
                                        </div>
                                        <div class="cardInfo">
                                            <a href="<?php echo esc_url($cat_link); ?>">
                                                <?php echo esc_attr($catName); ?>
                                            </a>
                                        </div>
                                    </div>
                                </li>
                            <?php $i++; endforeach; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="row">
                <?php if (!empty($args['banner_products']) && is_array($args['banner_products']) && (count($args['banner_products']) > 0)): ?>
                    <?php foreach ($args['banner_products'] as $key => $product_id): ?>
                    <?php global $product; $product = wc_get_product($product_id);
                        if(!$product) continue;
                        $sales_price_to   = $product->get_date_on_sale_to();
                        $sales_end        = $sales_price_to ? date_i18n("Y/m/d g:i:s", strtotime($sales_price_to)) : '';
                    ?>
                        <div class="col-lg-6">
                            <div class="cardProductDeal">
                                <div class="cardImage">
                                    <?php
                                        do_action( 'woocommerce_before_shop_loop_item' );
                                        do_action( 'woocommerce_before_shop_loop_item_title', false );
                                    ?>
                                    <?php kidify_quick_button(); ?>
                                </div>
                                <div class="cardInfo">
                                    <a href="<?php the_permalink($product->get_id()); ?>">
                                        <?php do_action( 'woocommerce_shop_loop_item_title' ); ?>
                                    </a>
                                    <div class="box-between">
                                        <?php do_action( 'woocommerce_after_shop_loop_item_title' ); ?>
                                    </div>
                                    <p class="font-lg neutral-500 cardDesc"><?php echo get_the_excerpt(); ?></p>
                                    <?php if($product->is_on_sale()): ?>
                                        <div class="box-count box-count-square box-count-circle">
                                            <div class="deals-countdown" data-countdown="<?php echo esc_attr($sales_end); ?>"></div>
                                        </div>
                                    <?php endif; ?>
                                    <div class="mt-20">
                                        <div class="button-select">
                                            <?php do_action( 'woocommerce_after_shop_loop_item' ); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
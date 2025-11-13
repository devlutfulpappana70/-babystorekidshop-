<?php
$banner_switch = $args['banner_switch'];
if(!$banner_switch) return;
?>
<section class="section block-shop-head">
    <div class="container">
        <?php if($args['banner_title']): ?>
            <h1 class="font-4xl-bold neutral-900">
                <?php echo esc_html($args['banner_title']); ?>
            </h1>
        <?php endif; ?>
        <div class="breadcrumbs">
            <?php if($args['breadcrumb_switch']): ?>
                <?php
                    woocommerce_breadcrumb([
                        'wrap_before' => '<ul>',
                        'wrap_after'  => '</ul>',
                        'before'      => '<li>',
                        'after'       => '</li>',
                        'delimiter'   => '',
                    ]);
                ?>
            <?php endif; ?>
        </div>
        <div class="box-tags-head">
            <?php if (is_array($args['banner_categories']) && (count($args['banner_categories']) > 0)): ?>
                <?php foreach ($args['banner_categories'] as $key => $category): ?>
                    <?php 
                        $cat_obj      = get_term_by('slug', $category, 'product_cat');
                        if(!$cat_obj) continue;
                        $catName      = $cat_obj->name;
                        $num_prodcuts = $cat_obj->count;
                        $thumbnail_id = get_term_meta( $cat_obj->term_id, 'thumbnail_id', true ); 
                        $image_url    = wp_get_attachment_url( $thumbnail_id );
                        $cat_link     = get_term_link( $cat_obj->term_id );
                    ?>
                    <a class="btn btn-tag" href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($catName); ?></a>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
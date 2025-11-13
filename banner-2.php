<?php
$banner_switch = $args['banner_switch'];
if(!$banner_switch) return;

$breadcrumb_switch = $args['breadcrumb_switch'];
$banner_title      = $args['banner_title'];
$banner_img        = $args['banner_img'];
?>
<?php if(null != $banner_img):?>
    <style>
        .block-shop-head.default-banner{
            background-image: url(<?php echo esc_url($banner_img); ?>);
        }
    </style>
<?php endif; ?>
<section class="section block-shop-head block-blog-head-2 default-banner">
    <div class="container text-center">
        <h1 class="font-5xl-bold neutral-900"><?php echo kidify_breadcrumb_title($banner_title); ?></h1>
        <?php if($breadcrumb_switch): ?>
            <div class="breadcrumbs">
                <?php
                    woocommerce_breadcrumb([
                        'wrap_before' => '<ul class="justify-content-center">',
                        'wrap_after'  => '</ul>',
                        'before'      => '<li>',
                        'after'       => '</li>',
                        'delimiter'   => '',
                    ]);
                ?>
            </div>
        <?php endif; ?>
    </div>
</section>
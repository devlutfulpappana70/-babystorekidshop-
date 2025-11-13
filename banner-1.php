<?php
$banner_switch = $args['banner_switch'];
if(!$banner_switch) return;

$breadcrumb_switch = $args['breadcrumb_switch'];
$banner_title      = $args['banner_title'];
?>
<section class="section block-shop-head block-blog-head default-banner">
    <div class="container">
        <h1 class="font-5xl-bold neutral-900"><?php echo kidify_breadcrumb_title($banner_title); ?></h1>
        <?php if($breadcrumb_switch): ?>
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
        <?php endif; ?>
    </div>
</section>
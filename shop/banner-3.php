<?php
$banner_switch = $args['banner_switch'];
if(!$banner_switch) return;
?>
<div class="section block-shop-head-3">
    <div class="container text-center">
        <?php if($args['banner_title']): ?>
            <h2 class="font-4xl mb-20">
                <?php echo esc_html($args['banner_title']); ?>
            </h2>
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
    </div>
</div>
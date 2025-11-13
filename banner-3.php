<?php
$banner_title = $args['banner_title']; 
$overflow_color_switch = $args['overflow_color_switch'];
if($overflow_color_switch){
    ?>
    <style>
        .block-contact h2{
            position:relative;
        }
    </style>
    <?php
}
?>
<div class="top-head-blog style-3 <?php echo esc_attr($overflow_color_switch ? 'block-contact' : ''); ?>">
    <div class="text-center">
        <h2 class="font-4xl-bold"><?php echo kidify_breadcrumb_title($banner_title); ?></h2>
        <div class="breadcrumbs d-inline-block">
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
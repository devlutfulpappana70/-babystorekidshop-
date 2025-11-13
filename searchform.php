<?php
/**
 * The search form
 *
 * @package Kidify
 */
?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="form-group">
        <input type="search" class="form-control" placeholder="<?php esc_attr_e('Search …', 'kidify'); ?>" value="<?php echo get_search_query(); ?>" name="s">
        <input type="submit" class="btn btn-brand-1-medium" value="<?php echo esc_attr_x( 'Search', 'submit button', 'kidify' ); ?>">
    </div>
</form>
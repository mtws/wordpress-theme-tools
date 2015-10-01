<?php
/**
 * Show post thumbnail in admin area
 */
add_filter('manage_posts_columns', 'mtws_posts_columns', 5);
add_action('manage_posts_custom_column', 'mtws_posts_custom_columns', 5, 2);
function mtws_posts_columns($columns){
    //$defaults['riv_post_thumbs'] = __('Image');
    $column_image = array( 'image' => 'Image' );
    $columns = array_slice( $columns, 0, 1, true ) + $column_image + array_slice( $columns, 1, NULL, true );
    return $columns;
}
function mtws_posts_custom_columns($column_name, $id){
    if($column_name === 'image'){
        if ( has_post_thumbnail() ) {
            echo '<a href="' . get_edit_post_link() . '">';
            echo the_post_thumbnail( 'thumbnail' );
            echo '</a>';
        }
    }
}
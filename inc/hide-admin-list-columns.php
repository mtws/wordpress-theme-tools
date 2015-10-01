<?php
/* Hide columns from posts and page listings */
function mtws_columns_filter( $columns ) {
    //unset($columns['author']);
    unset($columns['tags']);
    unset($columns['categories']);
    unset($columns['tags']);
    unset($columns['comments']);
    return $columns;
}

// Hoook into the 'wp_dashboard_setup' action to register our function
if (!current_user_can( 'manage_options' )) {
  add_filter( 'manage_edit-post_columns', 'mtws_columns_filter', 10, 1 );
}

function mtws_page_columns_filter( $columns ) {
    //unset($columns['author']);
    unset($columns['comments']);
    return $columns;
}

// Hoook into the 'wp_dashboard_setup' action to register our function
if (!current_user_can( 'manage_options' )) {
  add_filter( 'manage_edit-page_columns', 'mtws_page_columns_filter', 10, 1 );
}
<?php
/* Remove items from the toolbar (admin bar) 
 * http://codex.wordpress.org/Function_Reference/remove_node
 */
function mtws_admin_bar_items( $wp_admin_bar ) {
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('comments');
    $wp_admin_bar->remove_node( 'new-link' );
}
add_action( 'admin_bar_menu', 'mtws_admin_bar_items', 999 );

/**
 * Another way to do this
 * http://www.paulund.co.uk/how-to-remove-links-from-wordpress-admin-bar
 * http://codex.wordpress.org/Plugin_API/Action_Reference/wp_before_admin_bar_render
 */
function mtws_remove_admin_bar_links() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('wp-logo');             // Remove the WordPress logo
    // $wp_admin_bar->remove_menu('about');            // Remove the about WordPress link
    // $wp_admin_bar->remove_menu('wporg');            // Remove the WordPress.org link
    // $wp_admin_bar->remove_menu('documentation');    // Remove the WordPress documentation link
    // $wp_admin_bar->remove_menu('support-forums');   // Remove the support forums link
    // $wp_admin_bar->remove_menu('feedback');         // Remove the feedback link
    // $wp_admin_bar->remove_menu('site-name');        // Remove the site name menu
    // $wp_admin_bar->remove_menu('view-site');        // Remove the view site link
    // $wp_admin_bar->remove_menu('updates');          // Remove the updates link
    $wp_admin_bar->remove_menu('comments');             // Remove the comments link
    $wp_admin_bar->remove_menu('new-content');      
    // $wp_admin_bar->remove_menu('new-post');         // Remove the comments link
    // $wp_admin_bar->remove_menu('w3tc');             // If you use w3 total cache remove the performance link
    // $wp_admin_bar->remove_menu('my-account');       // Remove the user details tab
}
// add_action( 'wp_before_admin_bar_render', 'mtws_remove_admin_bar_links' );

// Or just remove the admin bar entirely. (not sure if this will mess up the CSS when logged in)
add_filter('show_admin_bar', '__return_false');
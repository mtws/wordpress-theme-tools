<?php
/* Remove items from the toolbar (admin bar) 
 * http://codex.wordpress.org/Function_Reference/remove_node
 */
add_action( 'admin_bar_menu', 'remove_wp_logo', 999 );
function remove_wp_logo( $wp_admin_bar ) {
    $wp_admin_bar->remove_node('wp-logo');
    $wp_admin_bar->remove_node('comments');
}
?>
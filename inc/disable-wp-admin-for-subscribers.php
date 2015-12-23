<?php
/**
 * Redirect back to homepage and do not allow access to 
 * WP admin for Subscribers.
 */
function mtws_redirect_admin(){
    if ( ! current_user_can( 'edit_posts' ) ){
        wp_redirect( site_url() );
        exit;       
    }
}
add_action( 'admin_init', 'mtws_redirect_admin' );
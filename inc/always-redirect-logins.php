<?php
/**
 * Redirect to referer even if username and password fields empty
 * http://cubiq.org/front-end-user-registration-and-login-in-wordpress
 */
function mtws_login_redirect ($redirect_to, $url, $user) {
    if( isset( $_SERVER['HTTP_REFERER'] ) ) {
        $referrer = $_SERVER['HTTP_REFERER'];
    }
    else {
        // there is no referer, so the user probably tries to access
        // wp-login.php directly
        $referrer = site_url();
        wp_redirect( $referrer );
    }

    if ( !isset($user->errors) ) {
        if ( strstr($redirect_to, '?login=failed' )) {
            $redirect_to = str_replace('?login=failed', '', $redirect_to);
        }
        return $redirect_to;
    }
    // check that were not on the default login page
    if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') && $user!=null ) {
        // make sure we don't already have a failed login attempt
        if ( !strstr($referrer, '?login=failed' )) {
        // Redirect to the login page and append a querystring of login failed
            wp_redirect( $referrer . '?login=failed');
        } 
        else {
            wp_redirect( $referrer );
        }
        exit;
    }
    exit;
}
add_filter('login_redirect', 'mtws_login_redirect', 10, 3);
<?php
/* Change the logo link url */
function mtws_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'mtws_login_logo_url' );

/* Change the logo link url title */
function mtws_login_logo_url_title() {
    //return 'Your Site Name and Info';
    return get_bloginfo( 'name' );
}
add_filter( 'login_headertitle', 'mtws_login_logo_url_title' );

/**
 * Custom login page styles
 */
function mtws_login_styles() { ?>
    <style type="text/css">
        .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo_name.png);
            background-size: 200px;
            width: auto;
            height: 200px;
        }
        .wp-core-ui .button-primary {
          background: #910a2b;
          -webkit-box-shadow: -5px 1px 6px #B11C1C inset;
          -moz-box-shadow: -5px 1px 6px #b11c1c inset;
          box-shadow: -5px 1px 6px #B11C1C inset;
          border: #E00000;
          border-bottom: #C00000;
        }
        .wp-core-ui .button-primary:hover {
          background: #E00000;
        }
        a, .login #nav a, .login #backtoblog a {
          color: #910a2b!important;
        }
        a:hover, .login #nav a:hover, .login #backtoblog a:hover {
          color: #f00!important;
        }
        input[type=checkbox]:checked:before {
            color: #910a2b;
        }
        .login .message {
            border-left: 4px solid #910a2b;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'mtws_login_styles' );
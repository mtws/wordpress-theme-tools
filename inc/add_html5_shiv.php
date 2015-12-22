<?php
/**
 * Add conditional html5 shim to header
 * remembert to download the js file to your thmeme
 * https://github.com/aFarkas/html5shiv
 */ 
function add_ie_html5_shim () {
    echo '<!--[if lt IE 9]>';
    echo '<script src="'.get_template_directory_uri().'/js/bower_components/html5shiv/dist/html5shiv.js"></script>';
    echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');
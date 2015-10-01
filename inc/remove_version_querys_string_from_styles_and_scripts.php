<?php
// remove version query string from scripts and stylesheets
function wcs_remove_script_styles_version( $src ){
    return remove_query_arg( 'ver', $src );
}
add_filter( 'script_loader_src', 'wcs_remove_script_styles_version' );
add_filter( 'style_loader_src', 'wcs_remove_script_styles_version' );
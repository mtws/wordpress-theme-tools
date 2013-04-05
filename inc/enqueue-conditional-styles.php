<?php
/**
 * Enqueue conditional styles
 * 
 * NOTE!
 * remember to copy the stylesheet (eg. ie-8-and-below-styles) to your theme folder
 */
function mtws_conditional_styles() {
  // Stylesheet for IE 8 and below
  $theme  = get_theme( get_current_theme() );
  wp_register_style( 'ie-8-and-below-styles', get_bloginfo('stylesheet_directory').'/style-lt-ie-9.css', false, $theme['Version'] );
  $GLOBALS['wp_styles']->add_data( 'ie-8-and-below-styles', 'conditional', 'lt IE 9' );
  wp_enqueue_style( 'ie-8-and-below-styles' );
}
add_action( 'wp_enqueue_scripts', 'mtws_conditional_styles' );
?>
<?php
/* load css for the admin area */
function mtws_load_custom_wp_admin_style() {
  wp_register_style( 'custom_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/style-admin.css', false, '1.0.0' );
  wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'mtws_load_custom_wp_admin_style' );
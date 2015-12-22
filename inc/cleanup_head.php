<?php
// removes category feed and feeds for current post comments, 
// needed even if add_theme_support( 'automatic-feed-links' ); not used
remove_action('wp_head', 'feed_links_extra', 3 );

// removes comments feed and main feed, might not be needed if add_theme_support( 'automatic-feed-links' ); not used
remove_action( 'wp_head', 'feed_links', 2 ); // ei vaikuta mihinkaan?

//only required if you are looking to blog using an external tool
remove_action( 'wp_head', 'rsd_link'); 

//something to do with windows live writer
remove_action( 'wp_head', 'wlwmanifest_link');

//next previous post links
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0); 

//generator tag (the wordpress version)
remove_action( 'wp_head', 'wp_generator'); 

//short links like ?p=124
remove_action( 'wp_head', 'wp_shortlink_wp_head'); 

// Remove the annoying:
// <style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style> added in the header
function remove_recent_comment_style() {
    global $wp_widget_factory;
    remove_action( 
            'wp_head', 
            array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) 
        );
}
add_action( 'widgets_init', 'remove_recent_comment_style' );

/**
 * Disable wp emojicons introduced in WP 4.2
 * http://wordpress.stackexchange.com/questions/185577/disable-emojicons-introduced-with-wp-4-2
 */

function disable_emojicons_tinymce( $plugins ) {
  if ( is_array( $plugins ) ) {
    return array_diff( $plugins, array( 'wpemoji' ) );
  } else {
    return array();
  }
}

function disable_wp_emojicons() {

  // all actions related to emojis
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );

  // filter to remove TinyMCE emojis
  add_filter( 'tiny_mce_plugins', 'disable_emojicons_tinymce' );
}
add_action( 'init', 'disable_wp_emojicons' );
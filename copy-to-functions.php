<?php
/**
 * Copy the below to your functions.php file as needed
 */

/**
 * Remove tags that WordPress generates inside <head> eg.
 * rss-feed links, rsd_link, wlmanifest, wp version, next/prev rels, shortlink,
 * recent comment inline styles, wp emojicons scripts and styles
 */
require( get_template_directory() . '/inc/cleanup_head.php' );


/**
 * Remove version query string from scripts and stylesheets
 */
require( get_template_directory() . '/inc/remove_version_querys_string_from_styles_and_scripts.php' );


/**
 * Enqueue conditional styles, for example: stylesheet for IE 8 and below (lt IE 9)
 */
require( get_template_directory() . '/inc/enqueue-conditional-styles.php' );
 

/**
 * Hide admin-menu items
 */
require( get_template_directory() . '/inc/hide-admin-menu-items.php' );


/**
 * Hide admin list columns
 */
require( get_template_directory() . '/inc/hide-admin-list-columns.php' );


/**
 * Show post thumbnails in admin post columns
 */
require( get_template_directory() . '/inc/show_thumbnails_in_post_columns.php' );


/**
 * Hide dashboard widgets in the admin area
 */
require( get_template_directory() . '/inc/hide-admin-dashboard-widgets.php' );


/**
 * Hide editor metaboxes
 */
require( get_template_directory() . '/inc/hide-editor-metaboxes.php' );


/**
 * Customize login page (css, logo link url, logo title)
 */
require( get_template_directory() . '/inc/custom-login-page.php' );


/**
 * Remove items from the toolbar (previously known as admin bar)
 */
require( get_template_directory() . '/inc/remove-items-from-toolbar.php' );


/**
 * Add Google Analytics to header
 */ 
require( get_template_directory() . '/inc/add_google_analytics_to_header.php' );


/**
 * Change default embed size
 */ 
require( get_template_directory() . '/inc/change_default_embed_size.php' );


/**
 * Add HTML5 shiv to header
 * remembert to download the js file to your thmeme
 * https://github.com/aFarkas/html5shiv
 */ 
require( get_template_directory() . '/inc/add_html5_shiv.php' );


/**
 * Add DNS prefetching
 */ 
require( get_template_directory() . '/inc/add_dns_prefetching.php' );


/**
 * Add conditional inline script to footer
 * eg. depends on jQuery
 */ 
require( get_template_directory() . '/inc/add_conditional_inline_scripts_to_footer.php' );


/**
 * Custom admin css
 */
require( get_template_directory() . '/inc/custom-admin-css.php' );

/**
 * Keep subscribers out of wp-admin
 */
require get_template_directory() . '/inc/disable-wp-admin-for-subscribers.php';

/**
 * Always redirect logins to referer
 * Yseful if you never want tot show the users the wordpress login page
 */
require get_template_directory() . '/inc/always-redirect-logins.php';

/**
 * Give the TinyMCE edtitor a custom stylesheet
 */
function mtws_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'mtws_theme_add_editor_styles' );


/**
 * Change the order of the tinymce buttons
 */
require( get_template_directory() . '/inc/customize-tinymce.php' );


/**
 * Create a custom excerpt metabox with tinymce
 */
require( get_template_directory() . '/inc/custom-excerpt.php' );

/**
 * A lot of examples of them customizer controls, use what you need
 */
require( get_template_directory() . '/inc/theme_customizer.php' );
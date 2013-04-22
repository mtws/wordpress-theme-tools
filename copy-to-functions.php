<?php
/**
 * Copy the below to your functions.php file as needed
 */

/**
 * Increase security by hiding the WP version number
 */
require( get_template_directory() . '/inc/hide-wp-version.php' );

/**
 * Enqueue conditional styles
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
 * Hide dashboard widgets in the admin area
 */
require( get_template_directory() . '/inc/hide-admin-dashboard-widgets.php' );


/**
 * Hide editor metaboxes
 */
require( get_template_directory() . '/inc/hide-editor-metaboxes.php' );


/**
 * Custom login page
 */
require( get_template_directory() . '/inc/custom-login-page.php' );


/**
 * Custom admin css
 */
require( get_template_directory() . '/inc/custom-admin-css.php' );


/**
 * Remove items from the toolbar (previously known as admin bar)
 */
require( get_template_directory() . '/inc/remove-items-from-toolbar.php' );


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
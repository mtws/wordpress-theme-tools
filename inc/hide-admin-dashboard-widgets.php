<?php
/**
 * Hiding dashboard widgets
 */
// Main column:
//$wp_meta_boxes['dashboard']['normal']['high']['dashboard_browser_nag']
//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']
//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']
//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']
//$wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']

// Side Column:
//$wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']
//$wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']
//$wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']
//$wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']

function mtws_remove_dashboard_widgets() {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
  remove_meta_box( 'dashboard_secondary', 'dashboard', 'side' );
	remove_meta_box( 'dashboard_incoming_links', 'dashboard', 'normal' );
  remove_meta_box( 'dashboard_recent_comments', 'dashboard', 'normal' );
} 

// Hoook into the 'wp_dashboard_setup' action to register our function
if (!current_user_can( 'manage_options' )) {
  // Hide widgets for all other users than admins
  add_action('wp_dashboard_setup', 'mtws_remove_dashboard_widgets' );
}
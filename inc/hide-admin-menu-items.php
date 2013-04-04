<?php 
/**
 * Edit wich admin-menu items are shown based on the current users capavilities
 */
if (!current_user_can( 'manage_options' )) {
  add_action( 'admin_menu', 'mtws_remove_menu_pages' );
}

function mtws_remove_menu_pages() {
  //remove_menu_page('edit.php'); /* hides the post menu-item */
  remove_menu_page('link-manager.php');
  remove_menu_page('edit-comments.php');
  remove_menu_page('tools.php');	
  
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=category' );
  remove_submenu_page( 'edit.php', 'edit-tags.php?taxonomy=post_tag' );
   // $page[0] is the menu title
   // $page[1] is the minimum level or capability required
   // $page[2] is the URL to the item's file
}

?>

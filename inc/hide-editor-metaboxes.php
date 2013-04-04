<?php
function mtws_remove_meta_boxes() {
  //remove_meta_box('linktargetdiv', 'link', 'normal');
  //remove_meta_box('linkxfndiv', 'link', 'normal');
  //remove_meta_box('linkadvanceddiv', 'link', 'normal');
  //remove_meta_box('postexcerpt', 'post', 'normal');
  //remove_meta_box('trackbacksdiv', 'post', 'normal');
  //remove_meta_box('postcustom', 'post', 'normal');
  //remove_meta_box('commentstatusdiv', 'post', 'normal');
  //remove_meta_box('commentsdiv', 'post', 'normal');
  //remove_meta_box('revisionsdiv', 'post', 'normal');
  //remove_meta_box('authordiv', 'post', 'normal');
  //remove_meta_box('sqpt-meta-tags', 'post', 'normal');
  
  remove_meta_box('formatdiv', 'post', 'normal');
  remove_meta_box('categorydiv', 'post', 'normal');
  remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
}
if (!current_user_can( 'manage_options' )) {
  add_action( 'admin_menu', 'mtws_remove_meta_boxes' );
}
?>
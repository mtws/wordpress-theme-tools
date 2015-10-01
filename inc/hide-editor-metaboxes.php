<?php
function mtws_remove_meta_boxes() {
    //remove_meta_box('linktargetdiv', 'link', 'normal');
    //remove_meta_box('linkxfndiv', 'link', 'normal');
    //remove_meta_box('linkadvanceddiv', 'link', 'normal');
    //remove_meta_box('postexcerpt', 'post', 'normal');
    //remove_meta_box('trackbacksdiv', 'post', 'normal');
    //remove_meta_box('postcustom', 'post', 'normal');
    //remove_meta_box('commentstatusdiv', 'post', 'normal');
    //remove_meta_box('commentstatusdiv', 'page', 'normal');
    //remove_meta_box('commentsdiv', 'post', 'normal');
    //remove_meta_box( 'postcustom' , 'post' , 'normal' ); //custom fielfds
    //remove_meta_box( 'postcustom' , 'page' , 'normal' ); //custom fielfds
    //remove_meta_box('revisionsdiv', 'post', 'normal');
    //remove_meta_box('authordiv', 'post', 'normal');
    //remove_meta_box('sqpt-meta-tags', 'post', 'normal');

    remove_meta_box('formatdiv', 'post', 'normal');
    remove_meta_box('categorydiv', 'post', 'normal');
    remove_meta_box('tagsdiv-post_tag', 'post', 'normal');
}

/* the featured image box removal function must be attached to do_meta_boxes */
function mtws_remove_thumbnail_box() {
    remove_meta_box( 'postimagediv','post','side' );
}
if (!current_user_can( 'manage_options' )) {
    add_action( 'admin_menu', 'mtws_remove_meta_boxes' );
    add_action('do_meta_boxes', 'mtws_remove_thumbnail_box');
}
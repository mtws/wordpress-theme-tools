<?php
/*
 * Change the buttons that are shown in the tinnyce editor
 * http://codex.wordpress.org/TinyMCE
 * http://www.mkbergman.com/275/extending-tinymce-the-wordpress-rich-text-editor/
*/

if (isset($wp_version)) {
//add_filter('mce_plugins', 'mtws_extended_editor_mce_plugins', 0);
add_filter('mce_buttons', 'mtws_extended_editor_mce_buttons', 0);
add_filter('mce_buttons_2', 'mtws_extended_editor_mce_buttons_2', 0);
//add_filter('mce_buttons_3', 'mtws_extended_editor_mce_buttons_3', 0);
}


function mtws_extended_editor_mce_plugins($plugins) {
array_push($plugins, 'table', 'fullscreen', 'searchreplace', 'advhr', 'advimage');
return $plugins;
}


function mtws_extended_editor_mce_buttons($buttons) {
return array(
//Wordpress defaults: /wp-includes/class-wp-editor.php
'bold', 'italic', 'strikethrough', 'bullist', 'numlist', 'blockquote', 'justifyleft', 'justifycenter', 'justifyright', 'link', 'unlink', 'wp_more', 'spellchecker', 'fullscreen', 'wp_adv'

//Examples from http://www.mkbergman.com/275/extending-tinymce-the-wordpress-rich-text-editor/
/*'undo', 'redo', 'separator', 'cut', 'copy', 'paste', 'separator', 'bold', 'italic', 'underline', 'strikethrough', 'separator',
'bullist', 'numlist', 'separator', 'indent', 'outdent', 'separator',
'justifyleft', 'justifycenter', 'justifyright', 'justifyfull', 'separator',
'sub', 'sup', 'charmap', 'hr', 'advhr','separator', 'link', 'unlink', 'anchor', 'separator',
'code', 'cleanup', 'separator', 'search', 'replace', 'separator', 'wphelp'*/
);
}

function mtws_extended_editor_mce_buttons_2($buttons) {
// the second toolbar line
return array(
//Wordpress defaults: /wp-includes/class-wp-editor.php
'formatselect', 'underline', 'justifyfull', 'forecolor', 'pastetext', 'pasteword', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help'

//Examples from http://www.mkbergman.com/275/extending-tinymce-the-wordpress-rich-text-editor/
//'formatselect', 'fontselect', 'fontsizeselect', 'styleselect', 'separator', 'forecolor', 'backcolor', 'separator','removeformat'
);
}

function mtws_extended_editor_mce_buttons_3($buttons) {
// These are the buttons for third toolbar line
return array(
'image', 'separator', 'tablecontrols', 'separator', 'fullscreen', 'wordpress');
}
?>
<?php
/* A custom metabox containing a tinymce editor
 *
 * NOTE! This script needs the following files to work:
 * custom-excerpt-editor-style.css
 * custom-excerpt-main-content-editor-style.css
 *
 * http://codex.wordpress.org/Function_Reference/add_meta_box#Example
 * http://codex.wordpress.org/Function_Reference/wp_editor
 */
 /* Example use in a template:
 
    <?php if ( get_post_meta(get_the_ID(), '_mtws_custom_excerpt_meta_value_key', true) ) : 
      // wpautop converts linebreaks to paragraphs
      $custom_excerpt_content = wpautop(get_post_meta(get_the_ID(), '_mtws_custom_excerpt_meta_value_key', true));
      // apply_filters 'the_content' converts parses shortcodes (eg. [caption]...)
      echo('<div class="custom-excerpt">');
      echo apply_filters('the_content', $custom_excerpt_content);
       echo('</div><!-- custom-excerpt-->');
    endif; ?>
 */

add_action( 'add_meta_boxes', 'mtws_custom_excerpt_box' );

// backwards compatible (before WP 3.0)
// add_action( 'admin_init', 'mtws_custom_excerpt_box', 1 );

/* Do something with the data entered */
add_action( 'save_post', 'mtws_custom_excerpt_save_postdata' );

/* Adds a box to the main column on the Post and Page edit screens */
function mtws_custom_excerpt_box() {
    $screens = array( 'post'/*, 'page'*/ );
    foreach ($screens as $screen) {
        add_meta_box(
            'mtws_custom_excerpt_sectionid',
            __( 'Ingressi - kirjoita artikkelin johdanto t&auml;h&auml;n', 'mtws_custom_excerpt_textdomain' ),
            'mtws_custom_excerpt_inner_box',
            $screen/*,
            'advanced',
            'high'*/
        );
    }
}

/* Prints the box content */
function mtws_custom_excerpt_inner_box( $post ) {

  // Use nonce for verification
  wp_nonce_field( plugin_basename( __FILE__ ), 'mtws_custom_excerpt_noncename' );

  // The actual fields for data entry
  // Use get_post_meta to retrieve an existing value from the database and use the value for the form
  $value = get_post_meta( $post->ID, '_mtws_custom_excerpt_meta_value_key', true );
  echo '<label for="mtws_custom_excerpt_textarea">';
       //_e("Description for this field", 'mtws_custom_excerpt_textdomain' );
  echo '</label> ';
  // Editor with image upload button
  //wp_editor( $value, 'mtws_custom_excerpt_textarea' );
  
  // Editor without image upload button
  wp_editor( $value, 'mtws_custom_excerpt_textarea', array('media_buttons'=>false, 'textarea_rows'=>3, 'teeny'=>true, 'editor_class'=>'mtws-custom-excerpt-editor') );
  
  //echo '<input type="text" id="mtws_custom_excerpt_textarea" name="mtws_custom_excerpt_textarea" value="'.esc_attr($value).'" size="25" />';
}

/* When the post is saved, saves our custom data */
function mtws_custom_excerpt_save_postdata( $post_id ) {

  // First we need to check if the current user is authorised to do this action. 
  if ( 'page' == $_POST['post_type'] ) {
    if ( ! current_user_can( 'edit_page', $post_id ) )
        return;
  } else {
    if ( ! current_user_can( 'edit_post', $post_id ) )
        return;
  }

  // Secondly we need to check if the user intended to change this value.
  if ( ! isset( $_POST['mtws_custom_excerpt_noncename'] ) || ! wp_verify_nonce( $_POST['mtws_custom_excerpt_noncename'], plugin_basename( __FILE__ ) ) )
      return;

  // Thirdly we can save the value to the database

  //if saving in a custom table, get post_ID
  $post_ID = $_POST['post_ID'];
  //sanitize user input
  //$mydata = sanitize_text_field( $_POST['mtws_custom_excerpt_textarea'] );
  // no need to sanitize since we are using the tinymce editor
  $mydata = $_POST['mtws_custom_excerpt_textarea'];

  // Do something with $mydata 
  // either using 
  //add_post_meta($post_ID, '_mtws_custom_excerpt_meta_value_key', $mydata, true) or
  update_post_meta($post_ID, '_mtws_custom_excerpt_meta_value_key', $mydata);
  // or a custom table (see Further Reading section below)
}


/* Move the excerpt box above the content editor
 *
 */
function mtws_custom_excerpt_theme_add_editor_styles() {
    add_editor_style( 'custom-excerpt-editor-style.css' );
}
add_action( 'init', 'mtws_custom_excerpt_theme_add_editor_styles' );


/* Move the excerpt box above the content editor
 *
 */

function move_posteditor( $hook ) {
    if ( $hook == 'post.php' OR $hook == 'post-new.php' ) {
        wp_enqueue_script( 'jquery' );
        add_action('admin_print_footer_scripts', 'move_posteditor_scripts');

    }
}
add_action( 'admin_enqueue_scripts', 'move_posteditor', 10, 1 );

function move_posteditor_scripts() {
    ?>
    <script type="text/javascript">
        jQuery('#mtws_custom_excerpt_sectionid').insertAfter('#titlediv' );
        jQuery('.postarea').wrap('<div id="mtws_main_content_wrap" class="postbox" />');
        jQuery('#wp-content-wrap').wrap('<div class="inside" />');
        jQuery('.postarea .mceIframeContainer').css('background-color', 'red');
        jQuery('.postarea').prepend('<h3 class="hndle"><span>Artikkelin sis&auml;lt&ouml; - kirjoita artikkelin varsinainen sis&auml;lt&ouml; t&auml;h&auml;n</span></h3>');
</script>
<?php }
/* Load css to style the main editor */
function mtws_load_custom_excerpt_content_editor_style() {
    wp_register_style( 'custom_excerpt_main_content_wp_admin_css', get_bloginfo( 'stylesheet_directory' ) . '/custom-excerpt-main-content-editor-style.css', false, '1.0.0' );
    wp_enqueue_style( 'custom_excerpt_main_content_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'mtws_load_custom_excerpt_content_editor_style' );
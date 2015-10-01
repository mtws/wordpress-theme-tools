<?php
/**
 * Add conditional inline script to footer
 * eg. depends on jQuery
 */ 
function mtws_print_inline_script() {
  if ( wp_script_is( 'jquery', 'done' ) ) {
?>
<script>
// Your scripts here. eg.
jQuery(function() {
    //...
});
</script>
<?php
  }
}
add_action( 'wp_footer', 'mtws_print_inline_script' );
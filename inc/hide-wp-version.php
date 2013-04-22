<?php
/* Increase security by hiding the WP version number
 * http://www.wpbeginner.com/wp-tutorials/the-right-way-to-remove-wordpress-version-number/
 */

function mtws_remove_wp_version() {
  return '';
}
add_filter('the_generator', 'mtws_remove_wp_version');

?>
<?php
/**
 * Google Analytics to header
 */ 
add_action('wp_head', 'mtws_add_googleanalytics');
function mtws_add_googleanalytics() {
echo <<<EOT
<script type="text/javascript">
// INSERT GA-CODE HERE
</script>
EOT;
}
<?php
/**
 * Add DNS prefetching
 */ 
function mtws_dns_prefetch() {
    // Define te urls that you need...
    echo '<meta http-equiv="x-dns-prefetch-control" content="on">
<link rel="dns-prefetch" href="//fonts.googleapis.com">
<link rel="dns-prefetch" href="//www.google-analytics.com">
';
}
add_action('wp_head', 'mtws_dns_prefetch', 0);
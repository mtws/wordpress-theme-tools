<?php
/**
 * Change default embed size
 */ 
function bigger_embed_size()
{ 
    // change to your content width but try to keep the default aspect ratio
    return array( 'width' => 675, 'height' => 380 ); //default = 640 x 360 (height = width x 0.5625)
}
add_filter( 'embed_defaults', 'bigger_embed_size' );
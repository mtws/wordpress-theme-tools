<?php
function mtws_customizer_register( $wp_customize ) {
    $wp_customize->add_section( 'mtws_custom_css_section_id', array(
        // 'priority' => 10,
        // 'capability' => 'edit_pages',
        // 'theme_supports' => '',
        'title' => __( 'Example Custom CSS Section', 'textdomain' ),
        // 'description' => '',
        // 'panel' => 'panel_id',
    ) );

    $wp_customize->add_setting( 'mtws_css_example', array(
        'default'       => '',
        // 'capability' => 'edit_pages',
        'transport' => 'postMessage',
        'sanitize_callback' => 'wp_strip_all_tags',
    ) );
    $wp_customize->add_control( 'mtws_css_example_control', array(
        'label'     => __( 'CSS example', 'textdomain' ),
        'type'      => 'textarea',
        'section'   => 'mtws_custom_css_section_id',
        'settings'  => 'mtws_css_example',
    ) );
}
add_action( 'customize_register', 'mtws_customizer_register' );

/**
 * Remember to enque a js script with the content below, otherwise the preview wont work
 * if you use underscores starter theme (http://underscores.me/), just add the js to js/customizer.js
 */
/*
( function( $ ) {
    wp.customize( 'mtws_css_example', function( value ) {
        value.bind( function( to ) {
            $( '#mtws-custom-theme-css' ).html( to );
        } );
    } );
} )( jQuery );
*/

/**
 * Custom css to header
 */ 
add_action('wp_head', 'mtws_custom_css_to_head');
function mtws_custom_css_to_head() {
    if( is_customize_preview() || get_theme_mod( 'mtws_css_example', '') != '' ) {
        echo '<style type="text/css" id="mtws-custom-theme-css">' . 
        get_theme_mod( 'mtws_css_example', '' ) . '</style>
';
    }
}
<?php
/*
Plugin Name: MTWS User Last Login
Plugin URI: http://www.mtws.fi/
Description: Record user last login time and show it in the admin area
Author: Mats Tuovinen
Version: 1.0
Author URI: http://www.mtws.fi/
*/

function mtws_user_last_login( $user_login, $user ){
    update_user_meta( $user->ID, '_last_login', current_time('mysql') );
}
add_action( 'wp_login', 'mtws_user_last_login', 10, 2 );


add_filter('manage_users_columns' , 'mtws_add_extra_user_column');
function mtws_add_extra_user_column($columns) {
    return array_merge( $columns, 
              array('mtws_usr_last_login' => __('Last Login')) );
}

add_action('manage_users_custom_column', 'mtws_users_custom_columns', 10, 3);
function mtws_users_custom_columns($empty='', $column_name, $id){
    if($column_name === 'mtws_usr_last_login') {
        $login_time = get_user_meta( $id, '_last_login', true );
        return $login_time;
    }
}

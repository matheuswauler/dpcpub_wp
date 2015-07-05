<?php
/*
Plugin Name: Nextend auto Login on Register
Plugin URI: http://nextendweb.com/
Description: This plugin will automatically log in your new visitor after the registration process.
Version: 1.0.0
Author: Roland Soos
License: GPL2
*/

/*  Copyright 2012  Roland Soos - Nextend  (email : roland@nextendweb.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as 
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

function new_auto_log_in($user_id){
  /*
    If user not logged in, the register made on front-end.
  */
  if(!is_user_logged_in()){
    $secure_cookie = is_ssl();
    $secure_cookie = apply_filters('secure_signon_cookie', $secure_cookie, array());
    global $auth_secure_cookie; // XXX ugly hack to pass this to wp_authenticate_cookie
    $auth_secure_cookie = $secure_cookie;
    
    wp_set_auth_cookie($user_id, true, $secure_cookie);
    $user_info = get_userdata($user_id);
    do_action('wp_login', $user_info->user_login, $user_info);
  }
}

add_action('user_register', 'new_auto_log_in');
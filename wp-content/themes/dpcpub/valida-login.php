<?php	

	if(is_user_logged_in()){
		global $current_user;
		get_currentuserinfo();
	} else {
		wp_redirect( home_url() );
		exit;
	}
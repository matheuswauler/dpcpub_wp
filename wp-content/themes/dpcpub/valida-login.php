<?php	

	if(is_user_logged_in()){
		global $current_user;
		get_currentuserinfo();
		$show_logout_link = true;
	} else {
		wp_redirect( home_url() );
		exit;
	}
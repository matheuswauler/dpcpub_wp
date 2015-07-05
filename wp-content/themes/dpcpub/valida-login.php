<?php	

	if(is_user_logged_in()){
		global $current_user;
		get_currentuserinfo();
		?>
			<div class="logout_content">
				<div class="content">
					Olá, <strong><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></strong>!
					Não é você? <a href="<?php echo wp_logout_url( home_url() ); ?>">Sair</a>.
				</div>
			</div>
		<?
	} else {
		wp_redirect( home_url() );
		exit;
	}
<?php if( isset( $show_logout_link ) && $show_logout_link == true ): ?>
	<div class="logout_content">
		Olá, <strong><?php echo $current_user->user_firstname . ' ' . $current_user->user_lastname; ?></strong>!
		Não é você? <a href="<?php echo wp_logout_url( home_url() ); ?>">Sair</a>.
	</div>
<?php endif; ?>
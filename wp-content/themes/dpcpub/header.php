<?php
	if(is_user_logged_in()){
		if( is_home() || is_page('cadastro') ){
			wp_redirect( get_permalink( get_page_by_path( 'tabela-comparativa' ) ) );
		}
	}
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<?php include 'inc/header_meta.php'; ?>
</head>

<body <?php body_class(); ?>>

	<header id="site_header">
		<div class="content">
			<div class="header_inner clearfix">
				<?php include 'login-line.php'; ?>

				<h1 class="logo">
					<a href="<?php echo get_site_url(); ?>">
						<img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="DPCPub" />
					</a>
				</h1>

				<nav class="menu_principal">
					<a href="<?php echo get_site_url(); ?>" title="Página inicial" class="<?php if(is_home() || is_page('tabela-comparativa')) echo 'selected'; ?>">Home</a>
					<?php if(!is_user_logged_in()): ?>
						<a href="<?php echo get_site_url(); ?>/cadastro/" title="Cadastre-se no site" class="<?php if(is_page('cadastro')) echo 'selected'; ?>">Cadastro</a>
					<?php else: ?>
						<a href="<?php echo get_site_url(); ?>/avaliar/" title="Avaliar radiografias" class="<?php if(is_page('avaliar')) echo 'selected'; ?>">Avaliar</a>
						<a href="<?php echo get_site_url(); ?>/pesquisa/" title="Deixe-nos sua opinião" class="<?php if(is_page('pesquisa')) echo 'selected'; ?>">Pesquisa</a>
						<a href="<?php echo get_site_url(); ?>/como-surgiu/" title="Precisa de ajuda?" class="<?php if(is_page('tutorial') || is_page('referencias-bibliograficas') || is_page('contato')) echo 'selected'; ?>">Ajuda</a>
					<?php endif; ?>
				</nav>
			</div>
		</div>
	</header>
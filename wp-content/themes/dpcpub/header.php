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
				<h1 class="logo">
					<a href="<?php echo get_site_url(); ?>">
						<img src="<?php echo get_template_directory_uri() ?>/images/logo.png" alt="DPCPub" />
					</a>
				</h1>

				<nav class="menu_principal">
					<a href="<?php echo get_site_url(); ?>" title="Página inicial" class="<?php if(is_home()) echo 'selected'; ?>">Home</a>
					<a href="<?php echo get_site_url(); ?>/cadastro/" title="Cadastre-se no site" class="<?php if(is_page('cadastro')) echo 'selected'; ?>">Cadastro</a>
					<a href="<?php echo get_site_url(); ?>" title="Avaliar experiência de navegação">Avaliar</a>
					<a href="<?php echo get_site_url(); ?>/pesquisa/" title="Deixe-nos sua opinião">Pesquisa</a>
				</nav>
			</div>
		</div>
	</header>
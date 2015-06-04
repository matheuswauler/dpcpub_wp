<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
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
					<a href="<?php echo get_site_url(); ?>/cadastro/" title="Cadastre-se no site">Cadastro</a>
					<a href="<?php echo get_site_url(); ?>" title="Avaliar experiência de navegação">Avaliar</a>
				</nav>
			</div>
		</div>
	</header>
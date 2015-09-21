<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage Twenty_Fifteen
 * @since Twenty Fifteen 1.0
 */

get_header(); ?>

	<div class="content">
		<div class="erro404">
			<img src="<?php echo get_template_directory_uri() ?>/images/404.png" />
			<h1>Página não encontrada</h1>

			<a href="<?php echo get_site_url(); ?>">Voltar para a página inicial</a>
		</div>
	</div>

<?php get_footer(); ?>

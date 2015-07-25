<?php include 'valida-login.php'; ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<?php include 'inc/header_meta.php'; ?>
</head>

<body class="single_estagio">
	<?php
	while ( have_posts() ) : the_post();
		$crescimento_estagio = get_the_terms(get_the_ID(), 'crescimento');
		$cor = !empty( $crescimento_estagio ) ? $crescimento_estagio[0]->slug : 'branco';
	?>

		<div class="content">
			<header class="clearfix">
				<h1>Comparar Radiografias</h1>

				<a href="<?php echo get_site_url(); ?>/tabela-comparativa" class="voltar">
					<i class="back_icon"></i> <span>Voltar</span>
				</a>
			</header>

			<h2 class="color_<?php echo $cor; ?>">
				<?php echo get('numero'); ?>
				-
				<?php the_title(); ?>
			</h2>

			<div class="radiographs_wrapper clearfix">
				<div class="radiograph_exemple">
					<span class="magnifier_advise">Passe o mouse</span>

					<ul id="radiograph_slider">
						<?php
						$images = get_attached_media('image');
						foreach($images as $img){
						?>
							<li>
								<a class="radiograph_image_big">
									<?php echo wp_get_attachment_image($img->ID, 'full'); ?>
								</a>
							</li>
						<?php } ?>
					</ul>
				</div>

				<div class="radiograph_upload">
					<a onclick="removeImage();" id="remove_uploaded_image" title="Remover imagem">X</a>
					<div id="upload_target">
						<div class="waiting_to_upload">
							Para fazer o upload de uma radiografia e comparar as imagens, clique no botão abaixo.
							<form id="upload_the_image">
								<a href="#">Adicionar Imagem</a>
								<input type='file' id="upload_input" onchange="readURL(this);" />
							</form>
							<p class="explanation">
								*A comparacão de radiografia permite a você fazer o upload de uma imagem para visualizá-la lado a lado a imagem de exemplo. A radiografia carregada não é mantida! É apenas exibida de forma temporária e apagada no momento em que você sair da página.
							</p>
						</div>

						<img id="uploaded_image" src="#" />
					</div>
				</div>
			</div>
		</div>

	<?php
	endwhile;
	?>
</body>

<?php wp_footer(); ?>
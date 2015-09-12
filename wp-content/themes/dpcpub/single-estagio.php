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

		$next_post = get_next_post();
		$cor_proximo = get_the_terms($next_post->ID, 'crescimento');
		$cor_proximo = !empty( $cor_proximo ) ? $cor_proximo[0]->slug : 'branco';

		$previous_post = get_previous_post();
		$cor_anterior = get_the_terms($previous_post->ID, 'crescimento');
		$cor_anterior = !empty( $cor_anterior ) ? $cor_anterior[0]->slug : 'branco';
	?>

		<div class="content">
			<header class="clearfix">
				<h1>Comparar Radiografias</h1>

				<a href="<?php echo get_site_url(); ?>/tabela-comparativa" class="voltar">
					<i class="back_icon"></i> <span>Voltar à tabela</span>
				</a>
			</header>

			<nav class="next_and_previous_link">
				<div class="estagio_anterior <?php echo $cor_anterior; ?>"><?php previous_post('%', '<strong>Estágio Anterior:</strong>'); ?></div>
				<div class="proximo_estagio <?php echo $cor_proximo; ?>"><?php next_post('%', '<strong>Próximo Estágio:</strong>'); ?></div>
			</nav>

			<h2 class="color_<?php echo $cor; ?>">
				<?php echo get('numero'); ?>
				-
				<?php the_title(); ?>

				<span class="open_details close_details_box" title="Ver detalhes deste estágio">+</span>
			</h2>

			<div class="radiographs_wrapper clearfix">
				<div class="radiograph_exemple">
					<span class="magnifier_advise">Passe o mouse</span>

					<ul id="radiograph_slider">
						<?php
						$images = get_attached_media('image');
						$id_ilustracao = get_post_meta(get_the_ID(), 'ilustracao', true);
						$id_aproximada = get_post_meta(get_the_ID(), 'aproximada', true);
						$id_marcada = get_post_meta(get_the_ID(), 'marcada', true);
						foreach($images as $img){
							if(in_array($img->ID, array($id_ilustracao, $id_aproximada, $id_marcada))) continue;
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
								*A comparacão de radiografia permite a você fazer o upload de uma imagem para visualizá-la lado a lado a imagem de exemplo. A radiografia carregada não é enviada ao servidor, ela é mantida apenas localmente e Exibida de forma temporária.
							</p>
						</div>

						<img id="uploaded_image" src="#" />
					</div>
				</div>
			</div>
		</div>


		<div class="details_overlay">
			<div class="details_container">
				<span class="close_details_box">X</span>

				<div class="first_container">
					<h3 class="color_<?php echo $cor; ?>">Ilustração</h3>
					<div class="details_image_wrapper <?php echo $cor; ?>">
						<?php echo get_image('ilustracao'); ?>
					</div>
				</div>

				<div class="second_container">
					<h3 class="color_<?php echo $cor; ?>">Imagem aproximada</h3>
					<div class="details_image_wrapper <?php echo $cor; ?>">
						<?php echo get_image('aproximada'); ?>
					</div>
				</div>

				<div class="third_container">
					<h3 class="color_<?php echo $cor; ?>">Imagem marcada</h3>
					<div class="details_image_wrapper <?php echo $cor; ?>">
						<?php echo get_image('marcada'); ?>
					</div>
				</div>
			</div>
		</div>

	<?php
	endwhile;
	?>
</body>

<?php wp_footer(); ?>
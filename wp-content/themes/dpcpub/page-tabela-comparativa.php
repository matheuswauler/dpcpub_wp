<?php include 'valida-login.php'; ?>

<?php get_header(); ?>

<?php
while ( have_posts() ) : the_post();

	$crescimento = get_terms(array('crescimento'));

	$estagios = new WP_Query(array(
		'post_type' => 'estagio',
		'order' => 'ASC',
		'orderby' => 'meta_value_num',
		'meta_key' => 'numero',
		'posts_per_page' => -1
	));

?>

	<div class="content">
		
		<ul class="crescimento_legenda">
			<?php foreach ($crescimento as $key => $value) { ?>
				<li>
					<div class="cor_box <?php echo $value->slug ?>"></div>
					<span class="cor_label"><?php echo $value->description ?></span>
				</li>
			<?php } ?>
		</ul>

		<table class="tabela_comparativa">
			<thead>
				<tr>
					<th class="seq_column">SEQUÊNCIA</th>
					<th class="desc_column">Descrição do estágio em desenvolvimento</th>
				</tr>
			</thead>

			<tbody>
				<?php
					if ( $estagios->have_posts() ) {
						while ( $estagios->have_posts() ) {
							$estagios->the_post();
							$crescimento_estagio = get_the_terms(get_the_ID(), 'crescimento');
							$cor = !empty( $crescimento_estagio ) ? $crescimento_estagio[0]->slug : 'branco';
				?>
							<tr>
								<td class="seq_column <?php echo $cor; ?>"><?php echo get('numero'); ?></td>
								<td class="desc_column"><?php the_title(); ?></td>
							</tr>
				<?php
						}
					}
				?>

				<tr>
					<td class="seq_column">0</td>
					<td class="desc_column">Não se aplica</td>
				</tr>
			</tbody>
		</table>

		<ul class="crescimento_legenda">
			<?php foreach ($crescimento as $key => $value) { ?>
				<li>
					<div class="cor_box <?php echo $value->slug ?>"></div>
					<span class="cor_label"><?php echo $value->description ?></span>
				</li>
			<?php } ?>
		</ul>

	</div>

<?php
endwhile;
?>

<?php get_footer(); ?>

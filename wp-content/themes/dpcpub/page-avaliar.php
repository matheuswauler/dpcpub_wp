<?php include 'valida-login.php'; ?>
<?php include 'header.php'; ?>

<?php
while ( have_posts() ) : the_post(); ?>

	<header class="gray_header">
		<div class="content">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</div>
	</header>

	<div class="content main_content">

		<div class="avaliar_explanation"><?php the_content(); ?></div>

		<ul id="radiografias_avaliacao" class="clearfix">
			<?php
				$avaliacao = new WP_Query(array(
					'post_type' => 'avaliacao',
					'order' => 'ASC',
					'orderby' => 'meta_value_num',
					'meta_key' => 'numero',
					'posts_per_page' => -1
				));
				if ( $avaliacao->have_posts() ) {
					$flag = 0;
					while ( $avaliacao->have_posts() ) {
						$avaliacao->the_post();
						$full = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'full' );
			?>
						<li class="<?php echo $flag++ % 4 == 0 ? 'fourth_inline' : ''; ?>">
							<a class="fancy_avaliar" href="<?php echo $full ?>" >
								<?php echo the_post_thumbnail('raiox_thumb'); ?>
								<div class="overlay"><?php echo get('numero'); ?></div>
							</a>
							<a onclick="javascript:gravaAvaliar('<?php echo $full; ?>');" class="comparar_link">Comparar</a>
						</li>
			<?php
					}
				}
			?>
		</ul>
	</div>

<?php
endwhile;
?>

<?php get_footer(); ?>

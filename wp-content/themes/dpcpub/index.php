<?php get_header(); ?>

<section class="black_track_description">
	<div class="content content_smaller">
		<h1>SOBRE O DPCPub</h1>

		<p>
			Em tempos de mídias, tecnologias e informações digitais na prática odontológica, a Análise DPCPub é atlas visual comparativo, disponível via web, que integra a descrição da sequência de ossificação dos ossos da região de mão e punho, o posicionamento em relação ao Surto Crescimento Puberal e as características radiográficas presentes no momento da avaliação do exame do paciente.
		</p>

		<p>
			Esta ferramenta tem como objetivo auxiliar a clinica diária, na integralidade da avaliação clínica, proporcionando a avaliação de características de indicam o status maturacional de crianças e adolescentes.
		</p>
	</div>
</section>

<section class="green_track">
	<div class="content content_smaller">
		Para ter acesso à tabela comparativa, faça o <strong>Login</strong> ou <strong>Cadastre-se</strong>
	</div>
</section>

<section class="user_signin_signup">
	<div class="content clearfix">
		<div class="default_box_settings login_content_box">
			<h2>
				<img src="<?= get_template_directory_uri(); ?>/images/check.svg" />
				Já sou cadastrado
			</h2>
			<?php
				wp_login_form(array(
					'redirect' => get_site_url() . '/tabela-comparativa/'
				));
			?>
			<a href="<?php echo wp_lostpassword_url( $redirect ); ?>" class="esqueci_minha_senha">Esqueci minha senha</a>
		</div>

		<div class="default_box_settings cadastro_content_box">
			<h2>
				<img src="<?php echo get_template_directory_uri(); ?>/images/plus.svg" />
				Quero me cadastrar
			</h2>
			<p>Realize o seu cadastro e tenha acesso a área restrita com a tabela comparativa.</p>
			<a href="<?php echo get_site_url(); ?>/cadastro/" class="link_input">CADASTRAR</a>
		</div>
	</div>
</section>

<?php get_footer(); ?>
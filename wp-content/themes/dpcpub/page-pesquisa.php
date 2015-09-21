<?php include 'valida-login.php'; ?>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$ERROR_MSGS = array();
		if( isblank($_POST['tempo_pesquisa']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 1");
		}
		if( isblank($_POST['tempo_pesquisa_todos']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 2");
		}
		if( isblank($_POST['avaliacao_completa']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 3");
		}
		if( isblank($_POST['nivel_dificuldade']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 4");
		}
		if( isblank($_POST['visual_app']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 5");
		}
		if( isblank($_POST['so_usado']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 6");
		}
		if( isblank($_POST['navegador']) ){
			array_push($ERROR_MSGS, "Por favor, responda a questão 7");
		}

		if(empty($ERROR_MSGS)){

			$to = "cadastro@dpcpub.com.br";
			$subject = "Uma nova pesquisa foi realizada no site DPCPub";

			$message = file_get_contents(get_theme_root() . '/dpcpub/emails/pesquisa.html');
			$message = str_replace('{{url_site}}', get_template_directory_uri(), $message);
			foreach ($_POST as $key => $value) {
				$message = str_replace('{{'.$key.'}}', $value, $message);
			}

			$headers = array('Content-Type: text/html; charset=UTF-8');
		
			if(wp_mail( $to, $subject, $message, $headers)){
				$HTML_RESPONSE = '<div class="success">Pesquisa realizada com sucesso!</div>';
			} else {
				$HTML_RESPONSE = '<div class="failure">Erro ao enviar a pesquisa!</div>';
			}
		}
	}
?>

<?php include 'header.php'; ?>

<header class="gray_header">
	<div class="content">
		<h1>Deixe-nos sua opinião</h1>
	</div>
</header>

<div class="content_medium main_content">
	<?php if(!empty($ERROR_MSGS)){ ?>
		<?php foreach ($ERROR_MSGS as $key => $err) { ?>
			<div class="simplr-message error"><?php echo $err; ?></div>
		<?php } ?>
	<?php } ?>
	<?php
		if(isset($HTML_RESPONSE) && !empty($HTML_RESPONSE)){
			echo $HTML_RESPONSE;
		}
	?>

	<form action="" class="survey_form" method="post">
		<ol>
			<li>
				<p><label for="tempo_pesquisa">Quanto tempo, em média, você levou para realizar a avaliação de cada caso, individualmente?</label></p>
				<input type="text" name="tempo_pesquisa" id="tempo_pesquisa" placeholder="Ex: 5 min" />
				<?php /*<fieldset>
					<label for="min_1">
						<input type="radio" name="tempo_pesquisa" value="1 min" id="min_1" <?php echo isset($_POST['tempo_pesquisa']) && $_POST['tempo_pesquisa'] == '1 min' ? 'CHECKED' : ''; ?> />
						1 min
					</label>
					<label for="min_2">
						<input type="radio" name="tempo_pesquisa" value="2 min" id="min_2" <?php echo isset($_POST['tempo_pesquisa']) && $_POST['tempo_pesquisa'] == '2 min' ? 'CHECKED' : ''; ?> />
						2 min
					</label>
					<label for="min_3">
						<input type="radio" name="tempo_pesquisa" value="3 min" id="min_3" <?php echo isset($_POST['tempo_pesquisa']) && $_POST['tempo_pesquisa'] == '3 min' ? 'CHECKED' : ''; ?> />
						3 min
					</label>
					<label for="min_5">
						<input type="radio" name="tempo_pesquisa" value="5 min" id="min_5" <?php echo isset($_POST['tempo_pesquisa']) && $_POST['tempo_pesquisa'] == '5 min' ? 'CHECKED' : ''; ?> />
						5 min
					</label>
					<label for="min_10">
						<input type="radio" name="tempo_pesquisa" value="10 min" id="min_10" <?php echo isset($_POST['tempo_pesquisa']) && $_POST['tempo_pesquisa'] == '10 min' ? 'CHECKED' : ''; ?> />
						10 min
					</label>
				</fieldset> */ ?>
			</li>

			<li>
				<p><label for="tempo_pesquisa_todos">Quanto tempo você levou para realizar a avaliação de todos os casos?</label></p>
				<input type="text" name="tempo_pesquisa_todos" id="tempo_pesquisa_todos" placeholder="Ex: 60 min" />
				<?php /*<fieldset>
					<label for="min_20">
						<input type="radio" name="tempo_pesquisa_todos" value="20 min" id="min_20" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '20 min' ? 'CHECKED' : ''; ?> />
						20 min
					</label>
					<label for="min_30">
						<input type="radio" name="tempo_pesquisa_todos" value="30 min" id="min_30" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '30 min' ? 'CHECKED' : ''; ?> />
						30 min
					</label>
					<label for="min_45">
						<input type="radio" name="tempo_pesquisa_todos" value="45 min" id="min_45" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '45 min' ? 'CHECKED' : ''; ?> />
						45 min
					</label>
					<label for="min_60">
						<input type="radio" name="tempo_pesquisa_todos" value="60 min" id="min_60" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '60 min' ? 'CHECKED' : ''; ?> />
						60 min
					</label>
					<label for="min_90">
						<input type="radio" name="tempo_pesquisa_todos" value="90 min" id="min_90" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '90 min' ? 'CHECKED' : ''; ?> />
						90 min
					</label>
					<label for="min_105">
						<input type="radio" name="tempo_pesquisa_todos" value="105 min" id="min_105" <?php echo isset($_POST['tempo_pesquisa_todos']) && $_POST['tempo_pesquisa_todos'] == '105 min' ? 'CHECKED' : ''; ?> />
						105 min
					</label>
				</fieldset> */ ?>
			</li>

			<li>
				<p>Você avaliou todas as imagens em um único momento?</p>
				<fieldset>
					<label for="completa_sim">
						<input type="radio" name="avaliacao_completa" value="Sim" id="completa_sim" <?php echo isset($_POST['avaliacao_completa']) && $_POST['avaliacao_completa'] == 'Sim' ? 'CHECKED' : ''; ?> />
						Sim
					</label>
					<label for="completa_nao">
						<input type="radio" name="avaliacao_completa" value="Não" id="completa_nao" <?php echo isset($_POST['avaliacao_completa']) && $_POST['avaliacao_completa'] == 'Não' ? 'CHECKED' : ''; ?> />
						Não
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o nível de dificuldade que você encontrou para avaliar os casos?</p>
				<fieldset>
					<label for="dificuldade_muito_facil">
						<input type="radio" name="nivel_dificuldade" value="Muito fácil" id="dificuldade_muito_facil" <?php echo isset($_POST['nivel_dificuldade']) && $_POST['nivel_dificuldade'] == 'Muito fácil' ? 'CHECKED' : ''; ?> />
						Muito fácil
					</label>
					<label for="dificuldade_facil">
						<input type="radio" name="nivel_dificuldade" value="Fácil" id="dificuldade_facil" <?php echo isset($_POST['nivel_dificuldade']) && $_POST['nivel_dificuldade'] == 'Fácil' ? 'CHECKED' : ''; ?> />
						Fácil
					</label>
					<label for="dificuldade_regular">
						<input type="radio" name="nivel_dificuldade" value="Regular" id="dificuldade_regular" <?php echo isset($_POST['nivel_dificuldade']) && $_POST['nivel_dificuldade'] == 'Regular' ? 'CHECKED' : ''; ?> />
						Regular
					</label>
					<label for="dificuldade_dificil">
						<input type="radio" name="nivel_dificuldade" value="Difícil" id="dificuldade_dificil" <?php echo isset($_POST['nivel_dificuldade']) && $_POST['nivel_dificuldade'] == 'Difícil' ? 'CHECKED' : ''; ?> />
						Difícil
					</label>
					<label for="dificuldade_muito_dificil">
						<input type="radio" name="nivel_dificuldade" value="Muito difícil" id="dificuldade_muito_dificil" <?php echo isset($_POST['nivel_dificuldade']) && $_POST['nivel_dificuldade'] == 'Muito difícil' ? 'CHECKED' : ''; ?> />
						Muito difícil
					</label>
				</fieldset>
			</li>

			<li>
				<p><label for="maior_dificuldade">Qual foi a maior dificuldade encontrada ao avaliar as radiografias?</label></p>
				<input type="text" name="maior_dificuldade" id="maior_dificuldade" />
			</li>

			<li>
				<p>O que você acha da aparência visual do aplicativo?</p>
				<fieldset>
					<label for="visual_muito_bom">
						<input type="radio" name="visual_app" value="Muito bom" id="visual_muito_bom" <?php echo isset($_POST['visual_app']) && $_POST['visual_app'] == 'Muito bom' ? 'CHECKED' : ''; ?> />
						Muito bom
					</label>
					<label for="visual_bom">
						<input type="radio" name="visual_app" value="Bom" id="visual_bom" <?php echo isset($_POST['visual_app']) && $_POST['visual_app'] == 'Bom' ? 'CHECKED' : ''; ?> />
						Bom
					</label>
					<label for="visual_regular">
						<input type="radio" name="visual_app" value="Regular" id="visual_regular" <?php echo isset($_POST['visual_app']) && $_POST['visual_app'] == 'Regular' ? 'CHECKED' : ''; ?> />
						Regular
					</label>
					<label for="visual_ruim">
						<input type="radio" name="visual_app" value="Ruim" id="visual_ruim" <?php echo isset($_POST['visual_app']) && $_POST['visual_app'] == 'Ruim' ? 'CHECKED' : ''; ?> />
						Ruim
					</label>
					<label for="visual_muito_ruim">
						<input type="radio" name="visual_app" value="Muito ruim" id="visual_muito_ruim" <?php echo isset($_POST['visual_app']) && $_POST['visual_app'] == 'Muito ruim' ? 'CHECKED' : ''; ?> />
						Muito ruim
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o Sistema Operacional utilizado durante a pesquisa?</p>
				<fieldset>
					<label for="so_windows">
						<input type="radio" name="so_usado" value="Windows" id="so_windows" <?php echo isset($_POST['so_usado']) && $_POST['so_usado'] == 'Windows' ? 'CHECKED' : ''; ?> />
						Windows
					</label>
					<label for="so_linux">
						<input type="radio" name="so_usado" value="Linux" id="so_linux" <?php echo isset($_POST['so_usado']) && $_POST['so_usado'] == 'Linux' ? 'CHECKED' : ''; ?> />
						Linux
					</label>
					<label for="so_osx">
						<input type="radio" name="so_usado" value="Mac OS X" id="so_osx" <?php echo isset($_POST['so_usado']) && $_POST['so_usado'] == 'Mac OS X' ? 'CHECKED' : ''; ?> />
						Mac OS X
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o Navegador utilizado durante a pesquisa?</p>
				<fieldset>
					<label for="navegador_chrome">
						<input type="radio" name="navegador" value="Chrome" id="navegador_chrome" <?php echo isset($_POST['navegador']) && $_POST['navegador'] == 'Chrome' ? 'CHECKED' : ''; ?> />
						Chrome
					</label>
					<label for="navegador_firefox">
						<input type="radio" name="navegador" value="Firefox" id="navegador_firefox" <?php echo isset($_POST['navegador']) && $_POST['navegador'] == 'Firefox' ? 'CHECKED' : ''; ?> />
						Firefox
					</label>
					<label for="navegador_internet_explorer">
						<input type="radio" name="navegador" value="Internet Explorer" id="navegador_internet_explorer" <?php echo isset($_POST['navegador']) && $_POST['navegador'] == 'Internet Explorer' ? 'CHECKED' : ''; ?> />
						Internet Explorer
					</label>
					<label for="navegador_safari">
						<input type="radio" name="navegador" value="Safari" id="navegador_safari" <?php echo isset($_POST['navegador']) && $_POST['navegador'] == 'Safari' ? 'CHECKED' : ''; ?> />
						Safari
					</label>
					<label for="navegador_opera">
						<input type="radio" name="navegador" value="Opera" id="navegador_opera" <?php echo isset($_POST['navegador']) && $_POST['navegador'] == 'Opera' ? 'CHECKED' : ''; ?> />
						Opera
					</label>
				</fieldset>
			</li>
		</ol>

		<textarea name="obs" placeholder="Observações adicionais"><?php if(isset($_POST['obs'])) echo $_POST['obs']; ?></textarea>

		<div class="clearfix">
			<input type="submit" value="FINALIZAR AVALIAÇÃO" />
		</div>
	</form>
</div>

<?php get_footer(); ?>
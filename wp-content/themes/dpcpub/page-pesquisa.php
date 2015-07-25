<?php include 'valida-login.php'; ?>
<?php include 'login-line.php'; ?>

<?php get_header(); ?>

<header class="gray_header">
	<div class="content">
		<h1>Deixe-nos sua opinião</h1>
	</div>
</header>

<div class="content_medium main_content">
	<form action="" class="survey_form" method="post">
		<ol>
			<li>
				<p>Quanto tempo, em média, você levou para realizar a avaliação de cada caso, individualmente?</p>
				<fieldset>
					<label for="min_1">
						<input type="radio" name="tempo_pesquisa" value="1 min" id="min_1" />
						1 min
					</label>
					<label for="min_2">
						<input type="radio" name="tempo_pesquisa" value="2 min" id="min_2" />
						2 min
					</label>
					<label for="min_3">
						<input type="radio" name="tempo_pesquisa" value="3 min" id="min_3" />
						3 min
					</label>
					<label for="min_5">
						<input type="radio" name="tempo_pesquisa" value="5 min" id="min_5" />
						5 min
					</label>
					<label for="min_10">
						<input type="radio" name="tempo_pesquisa" value="10 min" id="min_10" />
						10 min
					</label>
				</fieldset>
			</li>

			<li>
				<p>Quanto tempo você levou para realizar a avaliação de todos os casos?</p>
				<fieldset>
					<label for="min_20">
						<input type="radio" name="tempo_pesquisa_todos" value="20 min" id="min_20" />
						20 min
					</label>
					<label for="min_30">
						<input type="radio" name="tempo_pesquisa_todos" value="30 min" id="min_30" />
						30 min
					</label>
					<label for="min_45">
						<input type="radio" name="tempo_pesquisa_todos" value="45 min" id="min_45" />
						45 min
					</label>
					<label for="min_60">
						<input type="radio" name="tempo_pesquisa_todos" value="60 min" id="min_60" />
						60 min
					</label>
					<label for="min_90">
						<input type="radio" name="tempo_pesquisa_todos" value="90 min" id="min_90" />
						90 min
					</label>
					<label for="min_105">
						<input type="radio" name="tempo_pesquisa_todos" value="105 min" id="min_105" />
						105 min
					</label>
				</fieldset>
			</li>

			<li>
				<p>Você avaliou todas as imagens em um único momento?</p>
				<fieldset>
					<label for="completa_sim">
						<input type="radio" name="avaliacao_completa" value="Sim" id="completa_sim" />
						Sim
					</label>
					<label for="completa_nao">
						<input type="radio" name="avaliacao_completa" value="Não" id="completa_nao" />
						Não
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o nível de dificuldade que você encontrou para avaliar os casos?</p>
				<fieldset>
					<label for="dificuldade_muito_facil">
						<input type="radio" name="nivel_dificuldade" value="Muito fácil" id="dificuldade_muito_facil" />
						Muito fácil
					</label>
					<label for="dificuldade_facil">
						<input type="radio" name="nivel_dificuldade" value="Fácil" id="dificuldade_facil" />
						Fácil
					</label>
					<label for="dificuldade_regular">
						<input type="radio" name="nivel_dificuldade" value="Regular" id="dificuldade_regular" />
						Regular
					</label>
					<label for="dificuldade_dificil">
						<input type="radio" name="nivel_dificuldade" value="Difícil" id="dificuldade_dificil" />
						Difícil
					</label>
					<label for="dificuldade_muito_dificil">
						<input type="radio" name="nivel_dificuldade" value="Muito difícil" id="dificuldade_muito_dificil" />
						Muito difícil
					</label>
				</fieldset>
			</li>

			<li>
				<p>O que você acha da aparência visual do aplicativo?</p>
				<fieldset>
					<label for="visual_muito_bom">
						<input type="radio" name="visual_app" value="Muito bom" id="visual_muito_bom" />
						Muito bom
					</label>
					<label for="visual_bom">
						<input type="radio" name="visual_app" value="Bom" id="visual_bom" />
						Bom
					</label>
					<label for="visual_regular">
						<input type="radio" name="visual_app" value="Regular" id="visual_regular" />
						Regular
					</label>
					<label for="visual_ruim">
						<input type="radio" name="visual_app" value="Ruim" id="visual_ruim" />
						Ruim
					</label>
					<label for="visual_muito_ruim">
						<input type="radio" name="visual_app" value="Muito ruim" id="visual_muito_ruim" />
						Muito ruim
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o Sistema Operacional utilizado durante a pesquisa?</p>
				<fieldset>
					<label for="so_windows">
						<input type="radio" name="so_usado" value="Windows" id="so_windows" />
						Windows
					</label>
					<label for="so_linux">
						<input type="radio" name="so_usado" value="Linux" id="so_linux" />
						Linux
					</label>
					<label for="so_osx">
						<input type="radio" name="so_usado" value="Mac OS X" id="so_osx" />
						Mac OS X
					</label>
				</fieldset>
			</li>

			<li>
				<p>Qual o Navegador utilizado durante a pesquisa?</p>
				<fieldset>
					<label for="navegador_chrome">
						<input type="radio" name="navegador" value="Chrome" id="navegador_chrome" />
						Chrome
					</label>
					<label for="navegador_firefox">
						<input type="radio" name="navegador" value="Firefox" id="navegador_firefox" />
						Firefox
					</label>
					<label for="navegador_internet_explorer">
						<input type="radio" name="navegador" value="Internet Explorer" id="navegador_internet_explorer" />
						Internet Explorer
					</label>
					<label for="navegador_safari">
						<input type="radio" name="navegador" value="Safari" id="navegador_safari" />
						Safari
					</label>
					<label for="navegador_opera">
						<input type="radio" name="navegador" value="Opera" id="navegador_opera" />
						Opera
					</label>
				</fieldset>
			</li>
		</ol>

		<textarea name="obs" placeholder="Observações adicionais"></textarea>

		<div class="clearfix">
			<input type="submit" value="FINALIZAR AVALIAÇÃO" />
		</div>
	</form>
</div>

<?php get_footer(); ?>
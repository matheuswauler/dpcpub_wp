<?php
/*
	Template Name: Ajuda
*/

?>

<?php
	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		$ERROR_MSGS = array();
		if( isblank($_POST['nome']) ){
			array_push($ERROR_MSGS, "Por favor, preencha seu nome");
		}
		if( isblank($_POST['email']) ){
			array_push($ERROR_MSGS, "Por favor, preencha seu e-mail");
		}
		if( isblank($_POST['telefone']) ){
			array_push($ERROR_MSGS, "Por favor, preencha seu telefone");
		}
		if( isblank($_POST['assunto']) ){
			array_push($ERROR_MSGS, "Por favor, preencha o assunto do contato");
		}
		if( isblank($_POST['mensagem']) ){
			array_push($ERROR_MSGS, "Por favor, preencha a mensagem");
		}

		if(empty($ERROR_MSGS)){
			$to = "cadastro@dpcpub.com.br";
			$subject = "Um novo contato foi enviado do site DPCPub";

			$message = file_get_contents(get_theme_root() . '/dpcpub/emails/contato.html');
			$message = str_replace('{{url_site}}', get_template_directory_uri(), $message);
			foreach ($_POST as $key => $value) {
				$message = str_replace('{{'.$key.'}}', $value, $message);
			}

			$headers = array('Content-Type: text/html; charset=UTF-8');

			if(wp_mail( $to, $subject, $message, $headers)){
				$HTML_RESPONSE = '<div class="success">Contato enviado com sucesso!</div>';
			} else {
				$HTML_RESPONSE = '<div class="failure">Erro ao enviar o contato!</div>';
			}
		}
	}
?>


<?php include 'valida-login.php'; ?>
<?php include 'header.php'; ?>

<?php
$use_menu = true;
while ( have_posts() ) : the_post();
?>

<header class="gray_header">
	<div class="content">
		<h1>Precisa de ajuda?</h1>
	</div>
</header>

<div class="content">
	<div class="help_page_wrapper clearfix">
		<?php include 'inc/help_menu.php'; ?>

		<main class="main_help">
			<h2><?php the_title(); ?></h2>

			<div class="text_wrapper"><?php the_content(); ?></div>

			<?php if(is_page('contato')){ ?>
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

				<form action="" class="survey_form contato_form" method="post">
					<ul class="clearfix">
						<li class="left"><input type="text" name="nome" placeholder="Nome" value="<?php if(isset($_POST['nome'])) echo $_POST['nome']; ?>" /></li>
						<li><input type="email" name="email" placeholder="E-mail" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" /></li>
						<li class="left"><input type="tel" name="telefone" placeholder="Telefone" value="<?php if(isset($_POST['telefone'])) echo $_POST['telefone']; ?>" /></li>
						<li><input type="text" name="assunto" placeholder="Assunto" value="<?php if(isset($_POST['assunto'])) echo $_POST['assunto']; ?>" /></li>
					</ul>

					<textarea name="mensagem" placeholder="Mensagem"><?php if(isset($_POST['mensagem'])) echo $_POST['mensagem']; ?></textarea>

					<div class="clearfix">
						<input type="submit" value="ENVIAR CONTATO" />
					</div>
				</form>
			<?php } ?>
		</main>
	</div>
</div>

<?php
endwhile;
?>

<?php get_footer(); ?>
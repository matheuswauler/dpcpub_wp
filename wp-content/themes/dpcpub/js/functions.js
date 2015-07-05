$(document).ready(function(){
	$('#user_login').attr('placeholder', 'Nome de usuário');
	$('#user_pass').attr('placeholder', 'Senha');

	if(document.getElementById('simplr-reg')){
		$('#cep').mask('99999-999');
		$('#ano_graduacao').mask('9999');
		$('#telefone').mask('(99) 9999-9999?9');
	}
});
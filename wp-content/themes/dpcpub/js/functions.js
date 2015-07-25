$(document).ready(function(){
	$('#user_login').attr('placeholder', 'Nome de usuário');
	$('#user_pass').attr('placeholder', 'Senha');

	if(document.getElementById('simplr-reg')){
		$('#cep').mask('99999-999');
		$('#ano_graduacao').mask('9999');
		$('#telefone').mask('(99) 9999-9999?9');
	}

	if(document.getElementById('radiograph_slider')){
		$('#radiograph_slider').bxSlider({
			infiniteLoop: false,
			hideControlOnEnd: true,
			pager: false
		});

		$('.radiograph_image_big').zoom();
	}
});

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			if(e.target.result != null){
				$('#uploaded_image').attr('src', e.target.result).addClass('shown');
				$('#remove_uploaded_image').show();
			}
		};

		reader.readAsDataURL(input.files[0]);
	}
}
function removeImage(){
	document.getElementById('upload_input').value = null;
	$('#uploaded_image').removeClass('shown');
	$('#remove_uploaded_image').hide();
	setTimeout(function(){
		$('#uploaded_image').attr('src', '');
	}, 700);
}
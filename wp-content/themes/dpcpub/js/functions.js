SITE = $('meta[name=host]').attr('content');

$(document).ready(function(){
	$('#user_login').attr('placeholder', 'Nome de usuário');
	$('#user_pass').attr('placeholder', 'Senha');

	if(document.getElementById('simplr-reg')){
		$('#cep').mask('99999-999');
		$('#ano_graduacao').mask('9999');
		$('#telefone').mask('(99) 9999-9999?9');
	}

	if(document.getElementById('radiograph_slider') && $('#radiograph_slider li').length > 0){
		$('#radiograph_slider').bxSlider({
			infiniteLoop: false,
			hideControlOnEnd: true,
			pager: false
		});

		$('.radiograph_image_big').zoom();
	}

	if(document.getElementById('uploaded_image')){
		checkImage();
		$('.close_details_box').click(function(){
			$('.details_overlay').fadeToggle(300);
		});
	}

	if(document.getElementById('radiografias_avaliacao')){
		$('#radiografias_avaliacao li a.fancy_avaliar').fancybox({});
	}

	if(document.getElementById('simplr-reg')){
		$("#simplr-reg").validate({
			rules: {
				username: "required",
				first_name: "required",
				cro: "required",
				"dt_nasc-dy": "required",
				"dt_nasc-mo": "required",
				"dt_nasc-yr": "required",
				sexo: "required",
				cidade: "required",
				endereco: "required",
				cep: "required",
				estado: "required",
				telefone: "required",
				universidade: "required",
				ano_graduacao: "required",
				especializacao: "required",
				email: {"required": true, "email": true},
				email_confirm: {"equalTo": "input[name=email]"},
				password: "required",
				password_confirm: {"equalTo": "input[name=password]"}
			},
			messages: {
				username: {
					required: "O nome de usuário é obrigatório."
				},
				first_name: {
					required: "O nome completo é obrigatório."
				},
				cro: {
					required: "O CRO é obrigatório."
				},
				"dt_nasc-dy": {
					required: ""
				},
				"dt_nasc-mo": {
					required: ""
				},
				"dt_nasc-yr": {
					required: "A data de nascimento é obrigatória."
				},
				sexo: {
					required: "O sexo é obrigatório."
				},
				cidade: {
					required: "A cidade é obrigatória."
				},
				endereco: {
					required: "O endereço é obrigatório."
				},
				cep: {
					required: "O CEP é obrigatório."
				},
				estado: {
					required: "O estado é obrigatório."
				},
				telefone: {
					required: "O telefone é obrigatório."
				},
				universidade: {
					required: "A universidade é obrigatória."
				},
				ano_graduacao: {
					required: "O ano de graduação é obrigatório."
				},
				especializacao: {
					required: "A especialização é obrigatória."
				},
				email: {
					required: "O e-mail é obrigatório.",
					required: "E-mail inválido."
				},
				email_confirm: {
					equalTo: "Os e-mails não coincidem."
				},
				password: {
					required: "A senha é obrigatória."
				},
				password_confirm: {
					equalTo: "As senhas não coincidem."
				}
			}
		});
	}
});

function checkImage(){
	var dataImage = localStorage.getItem('imgData');
	if(dataImage !== null){
		bannerImg = document.getElementById('uploaded_image');
		bannerImg.src = "data:image/png;base64," + dataImage;
		$('#uploaded_image').addClass('shown');
		$('.waiting_to_upload').hide();
		$('#remove_uploaded_image').show();
	}
}

function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function (e) {
			if(e.target.result != null){
				$('#uploaded_image').attr('src', e.target.result).addClass('shown');
				$('.waiting_to_upload').hide();
				$('#remove_uploaded_image').show();

				var image = new Image();
				image.src = e.target.result;
				image.onload = function() {
					bannerImage = document.getElementById('uploaded_image');
					var new_height = Math.round(this.height * 1000 / this.width);
					imgData = getBase64Image(bannerImage, 1000, new_height);
					localStorage.setItem("imgData", imgData);
				};
			}
		};

		reader.readAsDataURL(input.files[0]);
	}
}

function gravaAvaliar(src) {
	var xhr = new XMLHttpRequest();
	xhr.open('GET', src, true);
	xhr.responseType = 'arraybuffer';
	xhr.onload = function(e) {
		if (this.status == 200) {
			var uInt8Array = new Uint8Array(this.response);
			var i = uInt8Array.length;
			var binaryString = new Array(i);
			while (i--) {
				binaryString[i] = String.fromCharCode(uInt8Array[i]);
			}
			var data = binaryString.join('');

			var base64 = window.btoa(data);

			localStorage.setItem("imgData", base64 );

			window.location = SITE + '/estagio/falange-distal-ed/';
		}
	};

	xhr.send();
}

function removeImage(){
	document.getElementById('upload_input').value = null;
	$('#uploaded_image').removeClass('shown');
	$('.waiting_to_upload').show();
	$('#remove_uploaded_image').hide();
	setTimeout(function(){
		$('#uploaded_image').attr('src', '');
	}, 700);
	localStorage.removeItem('imgData');
}

function getBase64Image(img, width, height) {
    var canvas = document.createElement("canvas");
    canvas.width = width;
    canvas.height = height;

    var ctx = canvas.getContext("2d");
    ctx.drawImage(img, 0, 0, width, height);

    var dataURL = canvas.toDataURL("image/png");

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
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

	if(document.getElementById('uploaded_image')){
		checkImage();
		$('.close_details_box').click(function(){
			$('.details_overlay').fadeToggle(300);
		});
	}

	if(document.getElementById('radiografias_avaliacao')){
		$('#radiografias_avaliacao li a').fancybox({});
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
					imgData = getBase64Image(bannerImage, this.width, this.height);
					localStorage.setItem("imgData", imgData);
				};
			}
		};

		reader.readAsDataURL(input.files[0]);
	}
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
    ctx.drawImage(img, 0, 0);

    var dataURL = canvas.toDataURL("image/png");

    return dataURL.replace(/^data:image\/(png|jpg);base64,/, "");
}
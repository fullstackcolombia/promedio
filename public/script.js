//Remover mensaje del servidor
	if($('.alert-remove-fsc').length){
		setInterval(function(){ $('.alert-remove-fsc').remove(); }, 6000);
	}
	//Confirmar eliminar nota
	function trash_item(id,url){
		$('.delete-form-fsc').prop('action',url);
		$('.delete-form-fsc').submit();
	}
	
	$('.btn_crear_nota').on('click', function (e) {
		e.preventDefault();
		$('.form_crear_nota input').removeClass('is-invalid');
		if($('.name_valid_fsc').val() != '' && $('#parcial1').val() != '' && $('#parcial2').val() != '' && $('#parcial3').val() != ''){
			$('.form_crear_nota').submit();
		} else {
			$('.form_crear_nota input[value=""]').addClass('is-invalid');
		}
	});
	
	//validar el nombre
	$('.name_valid_fsc').on('keypress', function (e) {
		//ñ 241, á 225, é 233, ó 243, í 237, ú 250
		//A 65 - Z 90
		//a 97 - z 122
		//Espacio 32
		if ((e.which === 241 || e.which === 225 || e.which === 233 || e.which === 243 || e.which === 237 || e.which === 250) || (e.which >= 65 && e.which <= 90) || (e.which >= 97 && e.which <= 122) || (e.which === 32 && $('.name_valid_fsc').val().length > 0)) {
			return true;
		} else {
			e.preventDefault();
		}
	});
	
	//validar el decimales
	$('.dec_valid_fsc').on('keypress', function (e) {
		var item = $(this);
		if (e.which > 47 && e.which < 58 || e.which == 46) {
			var valor = item.val().length > 0?item.val():0;
			if(e.which > 47 && e.which < 58){
				var newnum = parseFloat(String.fromCharCode(e.keyCode));
				if(item.val().indexOf('.') >= 0){
					var decimal = valor.split('.');
					valor = decimal[0];
					newnum = parseFloat("0."+decimal[1]+String.fromCharCode(e.keyCode));
				}
				valor = parseFloat(valor);
				valor += newnum;
			}
			if(e.which > 47 && e.which < 58 && (valor < 1 || valor > 5)){
				e.preventDefault();
				e.stopPropagation();
				return false;
			} else if(e.which === 46 && (item.val().length == 0 || item.val().indexOf('.') >= 0)){
				e.preventDefault();
				e.stopPropagation();
				return false;
			}
		} else {
			e.preventDefault();
			e.stopPropagation();
			return false;
		}
	});
	
	//calcular el promedio final
	$('.dec_valid_fsc').on('keyup', function (e) {
		calcular_promedio();
	});
	$('.dec_valid_fsc').on('change', function (e) {
		calcular_promedio();
	});
	function calcular_promedio(){
		if($('#parcial1').val() != '' && $('#parcial2').val() != '' && $('#parcial3').val() != ''){
			var valfinal = parseFloat($('#parcial1').val()) + parseFloat($('#parcial2').val()) + parseFloat($('#parcial3').val());
			valfinal = valfinal/3;
			$('.p_final').html('Final: '+valfinal);
		} else {
			$('.p_final').html('');
		}
	}
	calcular_promedio();
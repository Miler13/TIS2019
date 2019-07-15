$(document).ready(pagination(1));
$(function(){
	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-datos').modal({
			show:true,
			backdrop:'static'
		});
	});	
	$('#bs-prod').on('keyup',function(){
		var dato = $('#bs-prod').val();
		var url = 'Semestre/busca_semestre.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'dato='+dato,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});	
});
function agregarRegistro(){
	var url = 'Semestre/agrega_semestre.php';
	$.ajax({
		type:'POST',
		url:url,
        data: $('#formulario').serialize(),
        success: function (registro) {
            if ($('#pro').val() == 'Registro') {
                var num2 = parseInt($('#gestion').val(), 10);
                $('#formulario')[0].reset();
                if (num2 > 1999 && num2 < 2051) {
                    $('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
                } else {
                    $('#mensaje').addClass('bien').html('Gestion no registrada, esta debe estar entre las gestiones de 2000 y 2050').show(200).delay(2500).hide(200);
                }
                //$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
                $('#agrega-registros').html(registro);
                $('#pro').val('Registro');
                return false;
            } else {
                $('#mensaje').addClass('bien').html('Edicion realizada con exito').show(200).delay(2500).hide(200);
                $('#agrega-registros').html(registro);
                $('#pro').val('Edicion');
                return false;
            }
        }       
	});
	return false;
}
function eliminarRegistro(id){
	var url = 'Semestre/elimina_semestre.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Registro?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}
function editarRegistro(id){
	$('#formulario')[0].reset();
	var url = 'Semestre/edita_semestre.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id-registro').val(id);
				$('#nombre').val(datos[0]);
				$('#registra-datos').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function pagination(partida){
	var url = 'Semestre/paginar_semestre.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}
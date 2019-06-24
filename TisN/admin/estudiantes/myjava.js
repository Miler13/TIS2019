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
		var url = 'estudiantes/busca_estudiante.php';
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
	var url = 'estudiantes/agrega_estudiante.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}
function eliminarRegistro(id){
	var url = 'estudiantes/elimina_estudiante.php';
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
	var url = 'estudiantes/edita_estudiante.php';
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
				$('#carnet').val(datos[0]);
				$('#nombre').val(datos[1]);
				$('#apellido').val(datos[2]);
				$('#cedula').val(datos[3]);
				$('#correo').val(datos[4]);
				$('#celular').val(datos[5]);
				$('#telefono').val(datos[6]);
				$('#direccion').val(datos[7]);
				$('#estado').val(datos[8]);
				$('#grupo').val(datos[9]);
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
	var url = 'estudiantes/paginar_estudiante.php';
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
function validar(){
    var CodigoSIS, Nombres, Apellidos, CI, Correo, Celular, Telefono, Direccion, expresion;
    CodigoSIS = document.getElementById("carnet").value;
    Nombres = document.getElementById("nombre").value;
    Apellidos = document.getElementById("apellido").value;
    CI = document.getElementById("cedula").value;
    Correo = document.getElementById("correo").value;
    Celular = document.getElementById("celular").value;
    Telefono = document.getElementById("telefono").value;
    Direccion = document.getElementById("direccion").value;
    expresion = /\w+@\w+\.+[a-z]/;    
    if(CodigoSIS === ""|| Nombres ===""|| Apellidos ===""|| CI === ""|| Correo ===""|| Celular ==="" || Telefono === ""|| Direccion ===""){
        alert("todos los campos son obligatorios");
        return false;
    }
    else if(CodigoSIS.length>9){
        alert("El codigo SIS es muy largo, solo debe tener 9 digitos");
        return false;
    }
    else if(Nombres.length>25){
        alert("Su(s) nombre(s) es muy largo");
        return false;
    }
    else if(Apellidos.length>30){
        alert("Su(s) apellido(s) es muy largo");
        return false;
    }
    else if(CI.length>9){
        alert("su CI es muy largo");
        return false;
    }
    else if(Correo.length>50){
        alert("El correo es muy largo");
        return false;
    }
    else if(!expresion.test(Correo)){
        alert("El correo no es valido: Ejm: texto@texto.texto");
        return false;
    }
    else if(Celular.length>8){
        alert("su numero de celular es muy largo");
        return false;
    }
    else if(isNaN(Celular)){
        alert("su numero de celular no es numero");
        return false;
    }
    else if(Telefono.length>8){
        alert("su numero de telefono es muy largo");
        return false;
    }
    else if(isNaN(Telefono)){
        alert("su numero de telefono no es numero");
        return false;
    }
    else if(Direccion.length>50){
        alert("su direccion es muy largo");
        return false;
    }
    
    
}
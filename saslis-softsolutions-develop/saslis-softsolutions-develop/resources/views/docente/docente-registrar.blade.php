@extends('welcome')
@section('content')

<head>
    <style>
        .texto-rojo {
            color: red;
        }

        .invalid-feedback {
            color: red;
            font-size: 12px;
            font-weight: normal;
        }

        .hidden {
            visibility: hidden;
        }

        .visible {
            visibility: visible;
        }

        .espacio-abajo {
            padding-bottom: 13px
        }

        .info {
            color: #525252;
            font-size: 12px;
            font-weight: normal;
        }

        .titulo-panel {
            padding: 10px 0px 7px 0px;
            margin: 0px 16px -3px 16px;
            border-bottom: solid 2px #5555556b;
            font-size: 18px;
            font-weight: bold;
            text-align: center;
        }

        .input-shadow-rojo {
            box-shadow: 0 0 5px 2px red;
        }
    </style>

</head>
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h3 style="text-align: center">Registro de Docente</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">

            <div class="panel panel-default">
                <p class="titulo-panel">
                    Datos Personales
                </p>
                <div class="panel-body">
                    <form class="" method="post" action="{{route('docente.registrar.submit')}}" id="form-reg-doc">
                        {{ csrf_field() }}
                        <div class="" id="codsis_div">
                            <label class="control-label" for="codsis">Codigo Sis: <span class="texto-rojo">*</span></label>
                            <input type="text" class="form-control" name="codsis" id="codsis" placeholder="Ingrese solo números" autocomplete="off" onkeypress="return validarNumeros(event, 'codsis', 10);" value="{{old('codsis')}}" required>
                            <p class="invalid-feedback {{$errors->first('codsis')? '' : 'hidden'}}" id="codsis_error">{{$errors->first('codsis')}}</p>
                            <p class="info text-right {{$errors->first('codsis')? 'hidden' : ''}}" id="codsis_p">(Solo números, max 10 dig.)</p>
                        </div>

                        <div class="row">
                            <div class="col-xs-6" id="nombre_div">
                                <label class="control-label" for="nombre">Nombre(s): <span class="texto-rojo">*</span> </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" autocomplete="ücomplet" onkeypress="return validarLetras(event,'nombre', 30);" value="{{old('nombre')}}" required>
                                <p class="invalid-feedback {{$errors->first('nombre')? '' : 'hidden'}}" id="nombre_error">{{$errors->first('nombre')}}</p>
                                <p class="info text-right {{$errors->first('nombre')? 'hidden' : ''}}" id="nombre_p">(Max 30 caracteres.)</p>
                            </div>
                            <div class="col-xs-6" id="apellidos_div">
                                <label class="control-label" for="apellidos">Apellido(s): <span class="texto-rojo">*</span></label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellido(s)" autocomplete="ïoff" onkeypress="return validarLetras(event, 'apellidos', 30);" value="{{old('apellidos')}}" required>
                                <p class="invalid-feedback {{$errors->first('apellidos')? '' : 'hidden'}}" id="apellidos_error">{{$errors->first('apellidos')}}</p>
                                <p class="info text-right {{$errors->first('apellidos')? 'hidden' : ''}}" id="apellidos_p">(Max 30 caracteres.)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" id="email_div">
                                <label class="control-label" for="email">E-mail: <span class="texto-rojo">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}" required>
                                <p class="invalid-feedback" id="email_error">{{$errors->first('email')}} </p>
                                <p class="info text-right {{$errors->first('email')? 'hidden' : ''}}" id="email_p">(Max 100 caracteres.)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" id="password_div">
                                <label class="control-label" for="password">Contraseña: <span class="info">se genera automaticamente</span></label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Se genera automáticamente" style="cursor: text;" value="{{old('password')}}" ReadOnly>
                                <p class="invalid-feedback text-right" id="password_error"><b style="font-size: 13px;">Copie la contraseña en un lugar seguro</b></p>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="row espacio-abajo">
                            <div class="col-xs-6">
                                <a href="../admin" type="submit" class="btn btn-danger btn-block btn-flat">
                                    Cancelar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="hacerSubmit();">
                                    <span class="glyphicon glyphicon-ok"></span>Registrar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <small class="texto-rojo">Los campos con (*) son obligatorios</small>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>


<script>
    /* function para generar el password automaticamente */
    $('#codsis').keyup(function() {
        codSis = $('#codsis').val().trim();
        numRandom = getRandomInt(100000, 999999);
        $('#password').val(codSis + '-' + numRandom);
    });

    /* Retorna un entero aleatorio entre min (incluido) y max (excluido)
        ¡Usando Math.round() te dará una distribución no-uniforme! */
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min)) + min;
    }

    function validarNumeros(event, id, tamMax) {
        tecla = (document.all) ? event.keyCode : event.which;

        text_input = $('#' + id).val();
        tam_str = text_input.length;
        if (tam_str + 1 <= tamMax) {
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            if (patron.test(tecla_final)) { //si es numero
                ocultarMensajeError(id);
                return true;
            } else {
                mostrarMensajeError(id, 'Ingrese solo números');
                return false;
            }
        } else {
            mostrarMensajeError(id, tamMax + ' dígitos máximo.')
            return false;
        }
    }

    function validarLetras(event, id, tamMax) {
        tecla = (document.all) ? event.keyCode : event.which;

        text_input = $('#' + id).val();
        tam_str = text_input.length;
        if (tam_str + 1 <= tamMax) {
            patron = /[a-zA-z' áéíóúÁÉÍÓÚü]/;
            tecla_final = String.fromCharCode(tecla);
            if (patron.test(tecla_final)) { //si es numero
                ocultarMensajeError(id);
                return true;
            } else {
                mostrarMensajeError(id, 'Ingrese solo letras');
                return false;
            }
        } else {
            mostrarMensajeError(id, tamMax + ' caracteres máximo.')
            return false;
        }
    }

    $("#email").keyup(function() {
        valor = $('#email').val();
        if (valor.length > 100) {
            mostrarMensajeError('email', 'Maximo 100 caracteres');
            return false;
        } else {
            patron = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{1,63}$/i;
            if (patron.test(valor)) {
                ocultarMensajeError('email')
            } else {
                mostrarMensajeError('email', 'Debe tener formato de email example@mail.com')
            }
        }
    });

    /*===== validaciones al pulsar tab o borrar =====*/
    $('#codsis').keydown(function(event) {
        tecla = (document.all) ? event.keyCode : event.which;
        if (tecla == 9 || tecla == 8 || tecla == 13) { //9: tab, 8:retroceso para borrar, 13: enter
            valor = $('#codsis').val().trim();
            patron = /^[0-9]+$/;
            if (patron.test(valor) || valor == '') {
                ocultarMensajeError('codsis');
            } else {
                mostrarMensajeError('codsis', 'Ingrese solo números')
            }
            return true;
        }
    });

    $('#nombre').keydown(function(event) {
        tecla = (document.all) ? event.keyCode : event.which;
        if (tecla == 9 || tecla == 8 || tecla == 13) { //9: tab, 8:retroceso para borrar, 13: enter
            valor = $('#nombre').val().trim();
            patron = /[a-zA-z' áéíóúÁÉÍÓÚü]/;
            if (patron.test(valor) || valor == '') {
                ocultarMensajeError('nombre');
            } else {
                mostrarMensajeError('nombre', 'Ingrese solo letras')
            }
            return true;
        }
    });

    $('#apellidos').keydown(function(event) {
        tecla = (document.all) ? event.keyCode : event.which;
        if (tecla == 9 || tecla == 8 || tecla == 13) { //9: tab, 8:retroceso para borrar, 13: enter
            valor = $('#apellidos').val().trim();
            patron = /[a-zA-z' áéíóúÁÉÍÓÚü]/;
            if (patron.test(valor) || valor == '') {
                ocultarMensajeError('apellidos');
            } else {
                mostrarMensajeError('apellidos', 'Ingrese solo letras')
            }
            return true;
        }
    });

    function mostrarMensajeError(id, mensaje) {
        $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
        $('#' + id + '_error').text(mensaje); //mostrara el texto
        $('#' + id + '_error').removeClass('hidden'); //se mostrara el mensaje de error
        $('#' + id + '_p').addClass('hidden'); //se oculta info
    }

    function ocultarMensajeError(id) {
        $('#' + id + '_div').removeClass('has-error'); //campo cambia s su color normal
        $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
        $('#' + id + '_p').removeClass('hidden'); //se muestra info
    }

    function esCorreoValido() {
        valor = $('#email').val();
        patron = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{1,63}$/i;
        if (patron.test(valor)) {
            return true;
        }
        return false;
    }

    function esCodigoSisValido() {
        valor = $('#codsis').val();
        if (valor.substr(0, 1) == '0' || valor.includes('-')) {
            return false;
        }
        return true;
    }

    function hacerSubmit() {
        codSis = $('#codsis').val().trim();
        nom = $('#nombre').val().trim();
        ape = $('#apellidos').val().trim();
        email = $('#email').val().trim();
        if (codSis == '') {
            $('#codsis_div').addClass('has-error'); //pintamos el input de rojo
            $('#codsis_error').text('Campo obligatorio');
            $('#codsis_error').removeClass('hidden');
            $('#codsis_p').addClass('hidden'); //se oculta info
        }
        if (nom == '') {
            $('#nombre_div').addClass('has-error'); //pintamos el input de rojo
            $('#nombre_error').text('Campo obligatorio');
            $('#nombre_error').removeClass('hidden');
            $('#nombre_p').addClass('hidden'); //se oculta info
        }
        if (ape == '') {
            $('#apellidos_div').addClass('has-error'); //pintamos el input de rojo
            $('#apellidos_error').text('Campo obligatorio');
            $('#apellidos_error').removeClass('hidden');
            $('#apellidos_p').addClass('hidden'); //se oculta info
        }
        if (email == '') {
            $('#email_div').addClass('has-error'); //pintamos el input de rojo
            $('#email_error').text('Campo obligatorio');
        }

        if (codSis != '' && nom != '' && ape != '' && email != '') {
            if (!this.esCorreoValido()) {
                $('#email_div').addClass('has-error'); //pintamos el input de rojo
                $('#email_error').text('Debe tener formato de email: example@mail.com');
            } else {
                $('#email_div').removeClass('has-error');
                $('#email_error').text('');
                if (!this.esCodigoSisValido()) {
                    $('#codsis_div').addClass('has-error');
                    $('#codsis_error').removeClass('hidden');
                    $('#codsis_error').text('Codigo sis invalido. Ejemplo: 1234');
                    $('#codsis_p').addClass('hidden');
                } else {
                    $('#codsis_div').removeClass('has-error');
                    $('#codsis_error').addClass('hidden');
                    $('#cosis_error').text('');
                    $('#codsis_p').removeClass('hidden');
                    $.ajax({
                        url: "{{route('docente.validate.codsis')}}",
                        method: 'post',
                        data: {
                            _token: '{{csrf_token()}}',
                            codsis: codSis
                        },
                        success: function(response) {
                            if (response['existe_codsis']) {
                                $('#codsis_div').addClass('has-error'); //pintamos el input de rojo
                                $('#codsis_error').text('Ya existe, ingrese otro código sis');
                                $('#codsis_error').removeClass('hidden');
                                $('#codsis_p').addClass('hidden'); //se oculta info
                            } else {
                                $('#codsis_div').removeClass('has-error'); //pintamos el input de rojo
                                $('#codsis_error').text('Ya existe, ingrese otro código sis');
                                $('#codsis_error').addClass('hidden');
                                $('#codsis_p').removeClass('hidden'); //se oculta info
                                $.ajax({
                                    url: "{{route('docente.validate.email')}}",
                                    method: 'post',
                                    data: {
                                        _token: '{{csrf_token()}}',
                                        correo: email
                                    },
                                    success: function(response) {
                                        if (response['existe_correo']) {
                                            $('#email_div').addClass('has-error'); //pintamos el input de rojo
                                            $('#email_error').text('Ya existe, ingrese otro Email');
                                            $('#email_error').removeClass('hidden');
                                            $('#email_p').addClass('hidden'); //se oculta info
                                        } else {
                                            document.getElementById("form-reg-doc").submit();
                                        }
                                    }
                                });
                            }
                        }
                    });
                }
            }
        }
    }
</script>

@endsection
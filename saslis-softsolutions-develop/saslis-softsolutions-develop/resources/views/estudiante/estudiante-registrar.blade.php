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


{{-- aqui irá el header --}}

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h3 style="text-align: center;">Registro de Estudiante</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="panel panel-default">
                <p class="titulo-panel">
                    Datos Personales
                </p>
                <div class="panel-body">
                    <form class="" method="POST" action="{{route('estudiante.registrar.submit')}}" id="form-reg-est">
                        {{ csrf_field() }}
                        <div class="" id="codsis_div">
                            <label class="control-label" for="codsis">Codigo Sis: <span class="texto-rojo">*</span></label>
                            <input type="number" pattern="[0-9]" class="form-control" name="codsis" id="codsis" placeholder="Ingrese solo números" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="{{old('codsis')}}" required>
                            <p class="invalid-feedback hidden" id="codsis_error"></p>
                            <p class="info text-right" id="codsis_p">(Solo números, max 10 dig.)</p>
                        </div>

                        <div class="row">
                            <div class="col-xs-6" id="nombre_div">
                                <label class="control-label" for="nombre">Nombre(s): <span class="texto-rojo">*</span> </label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre(s)" autocomplete="ücomplet" onkeypress="return validarLetras(event,'nombre', 30);" value="{{old('nombre')}}" required>
                                <p class="invalid-feedback hidden" id="nombre_error"></p>
                                <p class="info text-right" id="nombre_p">(Max 30 caracteres.)</p>
                            </div>
                            <div class="col-xs-6" id="apellidos_div">
                                <label class="control-label" for="apellidos">Apellido(s): <span class="texto-rojo">*</span></label>
                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellido(s)" autocomplete="ïoff" onkeypress="return validarLetras(event, 'apellidos', 30);" value="{{old('apellidos')}}" required>
                                <p class="invalid-feedback hidden" id="apellidos_error"></p>
                                <p class="info text-right" id="apellidos_p">(Max 30 caracteres.)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" id="email_div">
                                <label class="control-label" for="email">E-mail: <span class="texto-rojo">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="E-mail" value="{{old('email')}}" required>
                                <p class="invalid-feedback" id="email_error"></p>
                            </div>
                        </div>

                        <div class="row espacio-abajo">
                            <div class="col-xs-12" id="password_div">
                                <label class="control-label" for="password">Contraseña: <span class="texto-rojo">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña" value="{{old('password')}}" required maxlength="16">
                                <p class="invalid-feedback hidden" id="password_error"></p>
                                <p class="info text-right" id="password_p">(Min 6, Max 15 caracteres.)</p>
                            </div>
                        </div>

                        <div class="row espacio-abajo">
                            <div class="col-xs-12" id="repeat_password_div">
                                <label class="control-label" for="repeat_password">Repetir Contraseña: <span class="texto-rojo">*</span></label>
                                <input type="password" class="form-control" id="repeat_password" name="repeat_password" placeholder="Contraseña" value="{{old('password')}}" required>
                                <p class="invalid-feedback" id="repeat_password_error"></p>
                            </div>
                        </div>

                        <div class="row espacio-abajo">
                            <div class="col-xs-6">
                                <a href="/" type="submit" class="btn btn-danger btn-block btn-flat">
                                    Cancelar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="hacerSubmit();">
                                    <span class="glyphicon glyphicon-ok"></span>Registrar</button>
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>
<!-- bootstrap -->
{{-- @section('scripts') --}}
<script>
    function validarLetras(event, id, tamMax) {
        tecla = (document.all) ? event.keyCode : event.which;
        if (tecla == 8 || tecla == 13 || tecla == 0) { //Teclas 8: de retroceso para borrar, 13:enter, 0:tab?
            $('#' + id + '_div').removeClass('has-error');
            $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
            $('#' + id + '_p').removeClass('hidden'); //se muestra info
            return true;
        }

        text_input = $('#' + id).val();
        tam_str = text_input.length;
        if (tam_str + 1 <= tamMax) {
            patron = /[a-zA-z' áéíóúÁÉÍÓÚü]/;
            tecla_final = String.fromCharCode(tecla);
            if (patron.test(tecla_final)) { //si es numero
                $('#' + id + '_div').removeClass('has-error');
                $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
                $('#' + id + '_p').removeClass('hidden'); //se muestra info
                return true;
            } else {
                $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
                $('#' + id + '_error').text('Ingrese solo letras.'); //mostrara el texto
                $('#' + id + '_error').removeClass('hidden'); //se mostrara el mensaje de error
                $('#' + id + '_p').addClass('hidden'); //se oculta info
                return false;
            }
        } else {
            $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
            $('#' + id + '_error').text(tamMax + ' caracteres máximo.');
            $('#' + id + '_error').removeClass('hidden');
            $('#' + id + '_p').addClass('hidden'); //se oculta info
            return false;
        }
    }

    $("#codsis").keyup(function() {
        valor = $('#codsis').val();
        if (valor.substr(0, 1) == '0') {
            $('#codsis_div').addClass('has-error');
            $('#codsis_error').removeClass('hidden');
            $('#codsis_error').text('Codigo sis no puede comenzar con: 0');
            $('#codsis_p').addClass('hidden');
            return;
        } else {
            $('#codsis_div').removeClass('has-error');
            $('#codsis_error').addClass('hidden');
            $('#cosis_error').text('');
            $('#codsis_p').removeClass('hidden');
        }
        patron = /[0-9]/;
        if (valor.length > 10) {
            $('#codsis_div').addClass('has-error');
            $('#codsis_error').removeClass('hidden');
            $('#codsis_error').text('Maximo 10 caracteres, remueva el ultimo caracter');
            $('#codsis_p').addClass('hidden');
            return;
        } else {
            $('#codsis_div').removeClass('has-error');
            $('#codsis_error').addClass('hidden');
            $('#codsis_error').text('');
            $('#codsis_p').removeClass('hidden');
        }
        if (!patron.test(valor)) {
            $('#codsis_div').addClass('has-error');
            $('#codsis_error').removeClass('hidden');
            $('#codsis_error').text('Ingrese solo numeros');
            $('#codsis_p').addClass('hidden');
            return;
        } else {
            $('#codsis_div').removeClass('has-error');
            $('#codsis_error').addClass('hidden');
            $('#codsis_error').text('');
            $('#codsis_p').removeClass('hidden');
        }
    });


    $("#email").keyup(function() {
        valor = $('#email').val();
        patron = /^(?:[^<>()[\].,;:\s@"]+(\.[^<>()[\].,;:\s@"]+)*|"[^\n"]+")@(?:[^<>()[\].,;:\s@"]+\.)+[^<>()[\]\.,;:\s@"]{1,63}$/i;
        if (patron.test(valor)) {
            $('#email_div').removeClass('has-error');
            $('#email_error').text('');
        } else {
            $('#email_div').addClass('has-error'); //pintamos el input de rojo
            $('#email_error').text('Debe tener formato de email: example@mail.com');
        }
    });

    $("#password").keyup(function() {
        valor = $('#password').val();
        if (valor.length > 5) {
            $('#password_div').removeClass('has-error');
            $('#password_error').addClass('hidden'); //no se mostrara el mensaje de error
            $('#password_p').removeClass('hidden'); //se muestra info
        } else {
            $('#password_div').addClass('has-error'); //pintamos el input de rojo
            $('#password_error').removeClass('hidden');
            $('#password_p').addClass('hidden'); //No se muestra info
            $('#password_error').text('Contraseña invalida, ingrese mas caracteres. Min 6');
        }
        if (valor.length > 15) {
            $('#password_div').addClass('has-error'); //pintamos el input de rojo
            $('#password_error').removeClass('hidden');
            $('#password_p').addClass('hidden'); //No se muestra info
            $('#password_error').text('Contraseña invalida, excedio los caracteres permitidos. Max 15');
        }
    });

    $("#repeat_password").keyup(function() {
        password = $('#password').val();
        repeated_password = $('#repeat_password').val();

        if (password != repeated_password) {
            $('#repeat_password_div').addClass('has-error');
            $('#repeat_password_error').removeClass('hidden');
            $('#repeat_password_error').text('Las contraseñas no coinciden');
        } else {
            $('#repeat_password_div').removeClass('has-error');
            $('#repeat_password_error').addClass('hidden');
            $('#repeat_password_error').text('');
        }
    });

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
        pass = $('#password').val().trim();
        repeat_pass = $('#repeat_password').val().trim();

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
        if (pass == '') {
            $('#password_div').addClass('has-error'); //pintamos el input de rojo
            $('#password_error').text('Campo obligatorio');
        }

        if (pass == '') {
            $('#password_div').addClass('has-error'); //pintamos el input de rojo
            $('#password_error').text('Campo obligatorio');
        }

        if (repeat_pass == '') {
            $('#repeat_password_div').addClass('has-error'); //pintamos el input de rojo
            $('#repeat_password_error').text('Campo obligatorio');
        }

        if (codSis != '' && nom != '' && ape != '' && email != '' && pass != '' && repeat_pass != '' && pass == repeat_pass) {
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
                        url: "{{route('estudiante.validate.codsis')}}",
                        method: 'get',
                        data: {
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
                                    url: "{{route('estudiante.validate.email')}}",
                                    method: 'get',
                                    data: {
                                        correo: email
                                    },
                                    success: function(response) {
                                        if (response['existe_correo']) {
                                            $('#email_div').addClass('has-error'); //pintamos el input de rojo
                                            $('#email_error').text('Ya existe, ingrese otro Email');
                                            $('#email_error').removeClass('hidden');
                                            $('#email_p').addClass('hidden'); //se oculta info
                                        } else {
                                            document.getElementById("form-reg-est").submit();
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
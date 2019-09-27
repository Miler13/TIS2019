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
            <h3 style="text-align: center">Registro de Auxiliar</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">

            <div class="panel panel-default">
                <p class="titulo-panel">
                    Datos Personales
                </p>
                <div class="panel-body">
                    <form class="" method="post" action="{{route('auxiliar.registrar.submit')}}" id="form-reg-aux">
                        {{ csrf_field() }}
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

<!-- jquery -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

<script>
    /* function para generar el password automaticamente */
    $('#email').keyup(function() {
        email = $('#email').val().trim();
        if (email.search("@")) {
            email = email.slice(0, email.search('@'));
            numRandom = getRandomInt(100000, 999999);
            $('#password').val(email + '-' + numRandom);
        }
    });

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

    function hacerSubmit() {
        nom = $('#nombre').val().trim();
        ape = $('#apellidos').val().trim();
        email = $('#email').val().trim();
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

        if (nom != '' && ape != '' && email != '') {
            if (!this.esCorreoValido()) {
                $('#email_div').addClass('has-error'); //pintamos el input de rojo
                $('#email_error').text('Debe tener formato de email: auxiliar@gmail.com');
            } else {
                $('#email_div').removeClass('has-error');
                $('#email_error').text('');
                $.ajax({
                    url: "{{route('auxiliar.validate.email')}}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        correo: email
                    },
                    success: function(response) {
                        if (response['existe_correo']) {
                            $('#email_div').addClass('has-error'); //pintamos el input de rojo
                            $('#email_error').text('Ya existe, ingrese otro Email para el auxiliar');
                            $('#email_error').removeClass('hidden');
                        } else {
                            document.getElementById("form-reg-aux").submit();
                        }
                    }
                });
            }
        }
    }
</script>

@endsection
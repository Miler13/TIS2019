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
            <h3 class="">Registrar Materia</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <p class="titulo-panel">
                    Datos de la Materia
                </p>
                <div class="panel-body">
                    <form method="POST" action="{{route('materia.registrar.submit')}}" id="form-reg-mat">
                        {{ csrf_field() }}

                        <div class="" id="codmateria_div">
                            <label class="control-label" for="codmateria">Codigo Materia: <span class="texto-rojo">*</span></label>
                            <input type="text" class="form-control" name="codmateria" id="codmateria" placeholder="Ingrese solo números" autocomplete="ÑÖcompletes" onkeypress="return validaNumericos(event, 'codmateria', 7);" value="{{old('codmateria')}}" required>
                            <p class="invalid-feedback {{$errors->first('codmateria')? '' : 'hidden'}}" id="codmateria_error">{{$errors->first('codmateria')}}</p>
                            <p class="info text-right" id="codmateria_p">(Solo números, max 7 dig.)</p>
                        </div>

                        <div class="" id="nombre_div">
                            <label class="control-label" for="nombre">Nombre Materia: <span class="texto-rojo">*</span> </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre Materia" autocomplete="ücomplet" onkeypress="return validarLetras(event,'nombre', 50);" value="{{old('nombre')}}" required>
                            <p class="invalid-feedback {{$errors->first('nombre')? '' : 'hidden'}}" id="nombre_error">{{$errors->first('nombre')}}</p>
                            <p class="info text-right" id="nombre_p">(Max 50 caracteres.)</p>
                        </div>

                        <!-- Buttons -->
                        <div class="row espacio-abajo">
                            <div class="col-xs-6">
                                <a href="../admin" type="submit" class="btn btn-danger btn-block btn-flat">
                                    Cancelar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="hacerSubmit();">Registrar</button>
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
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

{{-- @section('scripts') --}}
<script>
    /*en chrome la tecla retroceso <-- es reconocido por el navegador y no entra a esta funcion
      en cambio en mozilla cuando se pulsa la tecla retroceso, entar a esta funcion
    */
    function validaNumericos(event, id, tamMax) {
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
            patron = /[0-9]/;
            tecla_final = String.fromCharCode(tecla);
            if (patron.test(tecla_final)) { //si es numero
                $('#' + id + '_div').removeClass('has-error');
                $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
                $('#' + id + '_p').removeClass('hidden'); //se muestra info
                return true;
            } else {
                $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
                $('#' + id + '_error').text('Ingrese solo números'); //mostrara el texto
                $('#' + id + '_error').removeClass('hidden'); //se mostrara el mensaje de error
                $('#' + id + '_p').addClass('hidden'); //se oculta info
                return false;
            }
        } else {
            $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
            $('#' + id + '_error').text(tamMax + ' dígitos máximo.');
            $('#' + id + '_error').removeClass('hidden');
            $('#' + id + '_p').addClass('hidden'); //se oculta info
            return false;
        }
    }

    function validarLetras(event, id, tamMax) {
        tecla = (document.all) ? event.keyCode : event.which;
        if (tecla == 8 || tecla == 13 || tecla == 0) { //Teclas 8: de retroceso para borrar, 13:enter, 0:tab?
            $('#' + id + '_div').removeClass('has-error');
            $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
            $('#' + id + '_p').removeClass('hidden'); //se muestra info
            return true;
        }

        text_input = $('#' + id).val();
        // console.log(text_input);
        tam_str = text_input.length;
        if (tam_str + 1 <= tamMax) {
            patron = /[A-Z ÁÉÍÓÚ]/;
            tecla_final = String.fromCharCode(tecla);
            if (patron.test(tecla_final)) { //si es numero
                $('#' + id + '_div').removeClass('has-error');
                $('#' + id + '_error').addClass('hidden'); //no se mostrara el mensaje de error
                $('#' + id + '_p').removeClass('hidden'); //se muestra info
                return true;
            } else {
                $('#' + id + '_div').addClass('has-error'); //pintamos el input de rojo
                $('#' + id + '_error').text('Ingrese solo letras en MAYUSCULAS.'); //mostrara el texto
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

    function hacerSubmit() {
        codMateria = $('#codmateria').val().trim();
        nom = $('#nombre').val().trim();
        if (codMateria == '') {
            $('#codmateria_div').addClass('has-error'); //pintamos el input de rojo
            $('#codmateria_error').text('Campo obligatorio');
            $('#codmateria_error').removeClass('hidden');
            $('#codmateria_p').addClass('hidden'); //se oculta info
        }

        if (nom == '') {
            $('#nombre_div').addClass('has-error'); //pintamos el input de rojo
            $('#nombre_error').text('Campo obligatorio');
            $('#nombre_error').removeClass('hidden');
            $('#nombre_p').addClass('hidden'); //se oculta info
        }
        if (Number(codMateria) == 0) { //volver a numero php*
            $('#codmateria_div').addClass('has-error'); //pintamos el input de rojo
            $('#codmateria_error').text('el cero no esta permitido');
            $('#codmateria_error').removeClass('hidden');
            $('#codmateria_p').addClass('hidden'); //se oculta info
        } else {
            if (codMateria != '' && nom != '') {
                $.ajax({
                    url: '/materia/codmateria',
                    method: 'get',
                    data: {
                        codmateria: codMateria
                    },
                    success: function(response) {
                        if (response.existe) {
                            $('#codmateria_div').addClass('has-error'); //pintamos el input de rojo
                            $('#codmateria_error').text('Ya existe, ingrese otro código materia');
                            $('#codmateria_error').removeClass('hidden');
                            $('#codmateria_p').addClass('hidden'); //se oculta info
                        } else {
                            $.ajax({
                                url: '/materia/nombre',
                                method: 'get',
                                data: {
                                    nombre: nom
                                },
                                success: function(response) {
                                    if (response.existe) {
                                        $('#nombre_div').addClass('has-error'); //pintamos el input de rojo
                                        $('#nombre_error').text('Ya existe, ingrese otro nombre para la materia');
                                        $('#nombre_error').removeClass('hidden');
                                        $('#nombre_p').addClass('hidden'); //se oculta info
                                    } else {
                                        /* Aqui se hara las validaciones para controlar que no se creen grupos el mismo dia */
                                        document.getElementById("form-reg-mat").submit();
                                    }
                                }
                            });
                        }
                    }
                });
            }
        }
    }
</script>
{{-- @endsection --}}

@endsection
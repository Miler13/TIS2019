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

        .title {
            text-align: center;
        }
    </style>

</head>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h3 class="title">Crear Gestion</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <p class="titulo-panel">
                    Dato de la Gestion
                </p>
                <div class="panel-body">
                    <form method="POST" action="{{route('gestion.registrar.submit')}}" id="form-reg-ges">
                        {{ csrf_field() }}

                        <div class="" id="gestion_div">
                            <label class="control-label" for="gestion">Nombre de la Gestion: <span class="texto-rojo">*</span> </label>
                            <input type="text" class="form-control" id="gestion" name="gestion" placeholder="I-2019" autocomplete="ücomplet" value="{{old('gestion')}}" required>
                            <p class="invalid-feedback {{$errors->first('gestion')? '' : 'hidden'}}" id="gestion_error">{{$errors->first('gestion')}}</p>
                            <p class="info text-right" id="gestion_p">(Max 20 caracteres.)</p>
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
    function hacerSubmit() {
        gestion = $('#gestion').val();
        if (gestion == '') {
            $('#gestion_div').addClass('has-error'); //pintamos el input de rojo
            $('#gestion_error').text('Campo obligatorio');
            $('#gestion_error').removeClass('hidden');
            $('#gestion_p').addClass('hidden'); //se oculta info
        }

        if (gestion.length < 6) {
            $('#gestion_div').addClass('has-error'); //pintamos el input de rojo
            $('#gestion_error').text('Ingrese una gestion valida. Ejemplo: I-2019');
            $('#gestion_error').removeClass('hidden');
            $('#gestion_p').addClass('hidden'); //se oculta info
        } else {
            $('#gestion_div').removeClass('has-error'); //pintamos el input de rojo
            $('#gestion_error').text('Ingrese una gestion valida. Ejemplo: I-2019');
            $('#gestion_error').addClass('hidden');
            $('#gestion_p').removeClass('hidden'); //se oculta info
        }
        if (gestion != '') {
            $.ajax({
                url: '/gestion/nombre',
                method: 'get',
                data: {
                    nombre: gestion
                },
                success: function(response) {
                    console.log(response);
                    if (response.existe) {
                        $('#gestion_div').addClass('has-error'); //pintamos el input de rojo
                        $('#gestion_error').text('Ya existe, ingrese otro nombre para la gestion');
                        $('#gestion_error').removeClass('hidden');
                        $('#gestion_p').addClass('hidden'); //se oculta info
                    } else {
                        document.getElementById("form-reg-ges").submit();
                    }
                }
            });
        }
    }
</script>
{{-- @endsection --}}

@endsection
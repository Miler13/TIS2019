@extends('welcome')
@section('content')

<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">
    <style>
        .control-label {
            font-size: 15px;
        }

        .row {
            padding-bottom: 10px;
        }

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
            <h3 style="text-align: center;">Registro de Grupo de Laboratorio</h3>
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
                    Datos del grupo de laboratorio
                </p>
                <div class="panel-body">
                    <form class="" method="POST" action="" id="form-reg-grup-lab">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-xs-12" id="password_div">
                                <label class="control-label" for="password">Grupo Numero: <span class="info">se genera automaticamente</span></label>
                                <input type="text" class="form-control" id="password" name="password" placeholder="Grupo: {{ $data['grupo'] }}" style="cursor: text;" ReadOnly>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" id="materia_div">
                                <label class="control-label" for="materia">Materia:<span class="texto-rojo">*</span></label>
                                <select class="form-control" id="materia_select" name="materia">
                                    @foreach($data['materias'] as $materia)
                                    <option id="current">{{ $materia->nombre }} - {{ $materia->nombre_docente }} {{ $materia->apellidos }} | {{ $materia->codsis_doc }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-12" id="laboratorio_div">
                                <label class="control-label" for="laboratorio">Laboratorio Numero:<span class="texto-rojo">*</span></label>
                                <select class="form-control" id="laboratorio_select" name="laboratorio">
                                    @foreach($data['laboratorios'] as $laboratorio)
                                    <option>{{ $laboratorio->numero_lab }}</option>
                                    @endforeach
                                </select>
                                <p class="invalid-feedback hidden" id="laboratorio_error"></p>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12" id="laboratorio_div">
                                <label class="control-label" for="laboratorio">Gestion:<span class="texto-rojo">*</span></label>
                                <select class="form-control" id="gestion_select" name="gestion">
                                    @foreach($data['gestiones'] as $gestion)
                                    <option>{{ $gestion->nombre_gestion }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xs-6" id="hora_inicio_div">
                                <label class="control-label" for="hora_inicio">Hora De Inicio:<span class="texto-rojo">*</span></label>
                                <select class="form-control" id="hora_inicio" name="hora_inicio">
                                    <option style="font-size: 14px;">06:45</option>
                                    <option style="font-size: 14px;">08:15</option>
                                    <option style="font-size: 14px;">09:45</option>
                                    <option style="font-size: 14px;">11:15</option>
                                    <option style="font-size: 14px;">12:45</option>
                                    <option style="font-size: 14px;">14:15</option>
                                    <option style="font-size: 14px;">15:45</option>
                                    <option style="font-size: 14px;">17:15</option>
                                    <option style="font-size: 14px;">18:45</option>
                                    <option style="font-size: 14px;">20:15</option>
                                </select>
                                <p class="invalid-feedback hidden" id="hora_inicio_error"></p>
                                <p class="info text-right" id="hora_inicio_p">(Hora de inicio debe ser menor a la hora de fin)</p>
                            </div>
                            <div class="col-xs-6" id="hora_fin_div">
                                <label class="control-label" for="hora_fin">Hora De Inicio:<span class="texto-rojo">*</span></label>
                                <select class="form-control" id="hora_fin" name="hora_fin">
                                    <option style="font-size: 14px;">08:15</option>
                                    <option style="font-size: 14px;">09:45</option>
                                    <option style="font-size: 14px;">11:15</option>
                                    <option style="font-size: 14px;">12:45</option>
                                    <option style="font-size: 14px;">14:15</option>
                                    <option style="font-size: 14px;">15:45</option>
                                    <option style="font-size: 14px;">17:15</option>
                                    <option style="font-size: 14px;">18:45</option>
                                    <option style="font-size: 14px;">20:15</option>
                                    <option style="font-size: 14px;">21:45</option>
                                </select>
                                <p class="invalid-feedback hidden" id="hora_fin_error"></p>
                                <p class="info text-right" id="hora_fin_p">(Hora de fin debe ser mayor a la hora de inicio)</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12" id="dias_div">
                                <label class="control-label" for="dias">Dias de clase:<span class="texto-rojo">*</span></label>
                                <div class="form-group">
                                    <select class="selectpicker form-control" multiple data-max-options="3" id="dias_selected" name="dias[]">
                                        <option style="font-size: 14px;">LUNES</option>
                                        <option style="font-size: 14px;">MARTES</option>
                                        <option style="font-size: 14px;">MIERCOLES</option>
                                        <option style="font-size: 14px;">JUEVES</option>
                                        <option style="font-size: 14px;">VIERNES</option>
                                        <option style="font-size: 14px;">SABADO</option>
                                    </select>
                                    <p class="invalid-feedback {{$errors->first('gestion')? '' : 'hidden'}}" id="dias_error">{{$errors->first('dias')}}</p>
                                    <p class="info text-right {{$errors->first('dias')? 'hidden' : ''}}" id="dias_p">(Seleccione hasta 3 dias de clase.)</p>
                                </div>
                            </div>
                        </div>

                        <div class="row espacio-abajo">
                            <div class="col-xs-12">
                                <a type="submit" style="align-items: center" class="btn btn-success btn-block btn-block">
                                    Ver Disponibilidad de Laboratorios
                                </a>
                            </div>
                        </div>

                        <div class="row espacio-abajo">
                            <div class="col-xs-6">
                                <a href="/admin" type="submit" class="btn btn-danger btn-block btn-flat">
                                    Cancelar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="hacerSubmit();">
                                    <span class="glyphicon glyphicon-ok"></span>Crear</button>
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

<script>
    function hacerSubmit() {
        /* Obtenemos los valores de los campos */
        var materia_seleccionada = $("#materia_select option:selected").text();
        var laboratorio_selecionado = $("#laboratorio_select option:selected").text();
        var gestion_selecionada = $("#gestion_select option:selected").text();
        var hora_inicio = $("#hora_inicio option:selected").val();
        var hora_fin = $("#hora_fin option:selected").text();
        var dias_seleccionadas = [];
        $.each($("#dias_selected option:selected"), function() {
            dias_seleccionadas.push($(this).text())
        });
        /* Validamos el campo de hora de inicio */
        if (hora_inicio == '' || hora_inicio.substr(2, 1) != ":" || hora_inicio.length != 5) {
            $('#hora_inicio_div').addClass('has-error');
            $('#hora_inicio_error').text('Introduzca una hora de inicio válido. Ejemplo: 14:15');
            $('#hora_inicio_error').removeClass('hidden');
            $('#hora_inicio_p').addClass('hidden');
        } else {
            $('#hora_inicio_div').removeClass('has-error');
            $('#hora_inicio_error').text('Introduzca una hora de inicio válido. Ejemplo: 14:15');
            $('#hora_inicio_error').addClass('hidden');
            $('#hora_inicio_p').removeClass('hidden');
        }

        /* Validamos el campo de hora de fin */
        if (hora_fin == '' || hora_fin.substr(2, 1) != ":" || hora_fin.length != 5) {
            $('#hora_fin_div').addClass('has-error');
            $('#hora_fin_error').text('Introduzca una hora de inicio válido. Ejemplo: 15:45');
            $('#hora_fin_error').removeClass('hidden');
            $('#hora_fin_p').addClass('hidden');
        } else {
            $('#hora_fin_div').removeClass('has-error');
            $('#hora_fin_error').text('Introduzca una hora de inicio válido. Ejemplo: 15:45');
            $('#hora_fin_error').addClass('hidden');
            $('#hora_fin_p').removeClass('hidden');
        }

        /* Validamos el campo de dias */
        if (dias_seleccionadas == '') {
            $('#dias_selected').addClass('has-error');
            $('#dias_error').text('Seleccione al menos un dia de clase.');
            $('#dias_error').removeClass('hidden');
            $('#dias_p').addClass('hidden');
        } else {
            $('#dias_selected').removeClass('has-error');
            $('#dias_error').text('Seleccione al menos un dia de clase.');
            $('#dias_error').addClass('hidden');
            $('#dias_p').removeClass('hidden');
        }

        if ($('#hora_inicio_p').css('visibility') != 'hidden' &&
            $('#hora_fin_p').css('visibility') != 'hidden' && $('#dias_p').css('visibility') != 'hidden') {
            var hora_inicio_minutos = (hora_inicio.substr(0, 2) * 60) + parseInt(hora_inicio.substr(3, 2));
            var hora_fin_minutos = (hora_fin.substr(0, 2) * 60) + parseInt(hora_fin.substr(3, 2));
            if (hora_inicio_minutos >= hora_fin_minutos || hora_fin_minutos - hora_inicio_minutos > 90) {
                if (hora_inicio_minutos >= hora_fin_minutos) {
                    $('#hora_inicio_error').text('La hora de incio debe ser menor que la hora de fin');
                    $('#hora_inicio_div').addClass('has-error');
                    $('#hora_inicio_error').removeClass('hidden');
                    $('#hora_inicio_p').addClass('hidden');
                }
                if (hora_fin_minutos - hora_inicio_minutos > 90) {
                    $('#hora_fin_div').addClass('has-error');
                    $('#hora_fin_error').text('Solo puede hacer uso del laboratorio: 90minutos(1h45min).');
                    $('#hora_fin_error').removeClass('hidden');
                    $('#hora_fin_p').addClass('hidden');
                }
            } else {
                $.ajax({
                    url: "{{route('grupolaboatorio.disponibilidad')}}",
                    method: 'post',
                    data: {
                        _token: '{{csrf_token()}}',
                        dias: dias_seleccionadas,
                        horaInicio: hora_inicio,
                        horaFin: hora_fin,
                        laboratorio: laboratorio_selecionado
                    },
                    success: function(response) {
                        if (response['horario_ocupado']) {
                            $('#laboratorio_div').addClass('has-error');
                            $('#laboratorio_error').text('La reserva de este laboratorio en ese dia y esas horas indicadas estan no se encuentran disponibles');
                            $('#laboratorio_error').removeClass('hidden');

                            $('#hora_inicio_error').text('Reservado, intente cambiar de hora');
                            $('#hora_inicio_div').addClass('has-error');
                            $('#hora_inicio_error').removeClass('hidden');
                            $('#hora_inicio_p').addClass('hidden');

                            $('#hora_fin_div').addClass('has-error');
                            $('#hora_fin_error').text('Reservado, intente cambiar de hora');
                            $('#hora_fin_error').removeClass('hidden');
                            $('#hora_fin_p').addClass('hidden');

                            $('#dias_div').addClass('has-error');
                            $('#dias_error').text('Reservado, intente cambiar de dia(s)');
                            $('#dias_error').removeClass('hidden');

                        } else {
                            $('#laboratorio_div').removeClass('has-error');
                            document.getElementById("form-reg-grup-lab").submit();
                        }
                    }
                });
            }
        }
    }
</script>
@endsection
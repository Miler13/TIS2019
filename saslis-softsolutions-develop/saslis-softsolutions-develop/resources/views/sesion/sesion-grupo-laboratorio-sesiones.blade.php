@extends('welcome')
@section('content')

<head>
    <style>
        .titulo-panel {
            padding: 10px 0px 7px 0px;
            margin: 0px 16px -3px 16px;
            border-bottom: solid 2px #5555556b;
            font-size: 18px;
            font-weight: bold;
            text-align: left;
        }

        .title {
            text-align: center;
        }

        .datadetails {
            font-weight: 500;
        }

        .inputdata {
            /* background-color: #eee; */
            border: 0;
            font-weight: 600;
        }

        @media only screen and (max-width: 600px) {
            .title {
                font-size: 25px;
                font-weight: 600;
            }

            .row {
                width: 520px;
            }

            .content {
                overflow-x: scroll;
            }
        }
    </style>
</head>

<h1 class="title">SESIONES DEL GRUPO DE LABTORATORIO # {{ $data['grupo_lab']->numero_gr }}</h1>

@if (session('sesion_reg_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('sesion_reg_successful') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <div class="box-header">
                        <h3 class="box-title">LISTA DE SESIONES DEL GRUPO DE LABORATORIO</h3>

                        <!-- Button trigger modal -->
                        <button type="button" style="align-items: center; float: right" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                            <i class="fa fa-plus pull-right">Crear Sesion</i>
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                        <h5 class="modal-title" id="exampleModalLabel">CREAR NUEVA SESION</h5>
                                        <h4 class="modal-title" id="exampleModalLabel">Crear Una Nueva Sesion para este Grupo de Laboratorio?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <span>Grupo De Laboratorio #:</span>
                                        <input class="inputdata" type="text" id="grupo_lab" value="{{ $data['grupo_lab']->numero_gr }}" readonly>
                                        <br>
                                        <br>
                                        <span>Sesion #:</span>
                                        <input type="text" id="sesion_number" class="inputdata" value="{{ $data['sesion_numero'] }}" readonly>
                                        <br>
                                        <br>
                                        <span>Fecha:</span>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input type="date" id="fecha" class="form-control pull-right" id="datepicker">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary" onclick="crearSesion();" data-dismiss="modal">Crear</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a type="submit" onclick="history.back(-1)" style="align-items: center; float: right" class="btn btn-danger">
                            <i class="fa fa-arrow-left pull-right">Atras</i>
                        </a>
                    </div>
                    @foreach($data['sesiones'] as $sesion)
                    <div class="col-md-3">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h5 class="box-title" style="text-transform: uppercase;">Sesion # {{ $loop->iteration }}</h5>
                            </div>
                            <div class="box-body">
                                <h4 class="box-title">Materia: {{ $data['grupo_lab']->nombre_materia }}</h4>
                                <h4 class="box-title">Docente: {{ $data['grupo_lab']->nombre_docente }}</h4>
                                <h4 class="box-title">Fecha: {{ $sesion->fecha }}</h4>
                                <h4 class="box-title">Horas: {{$data['grupo_lab']->hora_ini }} - {{ $data['grupo_lab']->hora_fin }}</h4>
                            </div>
                            <div class="box-footer">
                                <div class="row espacio-abajo">
                                    <div class="col-xs-12">
                                        <a type="submit" style="align-items: center" class="btn btn-success btn-block btn-block">
                                            Ver Sesion
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function crearSesion() {
        id_grupo_lab = $('#grupo_lab').val();
        num_sesion = $('#sesion_number').val();
        fecha_sesion = $('#fecha').val();
        $.ajax({
            url: "{{route('docente.grupos.laboratorio.sesiones.crear')}}",
            method: 'post',
            data: {
                _token: '{{csrf_token()}}',
                idGrupoLab: id_grupo_lab,
                numSesion: num_sesion,
                fechaSesion: fecha_sesion
            },
            success: function(response) {}
        });
        window.location.reload();
    }
</script>

@endsection
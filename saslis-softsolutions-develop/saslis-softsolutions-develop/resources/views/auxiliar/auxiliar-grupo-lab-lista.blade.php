@extends('welcome')
@section('content')

<head>
    <style>
        .titlehead {
            text-align: center;
            margin: auto;
        }

        .extrabuttons {
            text-align: center;
            margin: auto;
        }

        .glyphicon {}

        @media only screen and (max-width: 600px) {
            .titlehead {
                font-size: 25px;
                font-weight: 600;
            }

            .box {
                width: 520px;
            }

            .content {
                overflow-x: scroll;
            }
        }
    </style>
</head>

<h1 class="titlehead">LISTA DE TUS GRUPOS DE LABORATORIO QUE TOMASTE COMO AUXILIAR</h1>

@if (session('aux_grup_lab_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('aux_grup_lab_successful') }}</h4>
</div>
@endif

@if (session('aux_grup_lab_warning'))
<div style="font-size: 16px;" class="alert alert-warning" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('aux_grup_lab_warning') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Lista de Grupos de Laboratorio en el que el te suscribiste para colaboar como auxiliar</h3>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Dia(s)</th>
                                <th>Numero De Laboratorio</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Finalizacion</th>
                                <th>Auxiliar</th>
                                <th>Estado</th>
                                <th>SESSIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['grupos_laboratorio'] as $grupo_laboratorio)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $grupo_laboratorio->nombre_materia }}</th>
                                <td>{{ $grupo_laboratorio->nombre_docente }}</td>
                                <td>{{ $grupo_laboratorio->dia }}</td>
                                <td>{{ $grupo_laboratorio->numero_lab }}</td>
                                <td>{{ $grupo_laboratorio->hora_ini }}</td>
                                <td>{{ $grupo_laboratorio->hora_fin }}</td>
                                <td>{{ $grupo_laboratorio->auxiliar }} {{ $grupo_laboratorio->auxiliar_ap }}</td>
                                <td>AUXILIATURA</td>
                                <td>
                                    <button type="button" id="extrabuttons" class="btn btn-success btn-xs">
                                        <span class="glyphicon glyphicon-ok-circle"></span>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Dia(s)</th>
                                <th>Numero De Laboratorio</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Finalizacion</th>
                                <th>Auxiliar</th>
                                <th>Estado</th>
                                <th>SESSIONES</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
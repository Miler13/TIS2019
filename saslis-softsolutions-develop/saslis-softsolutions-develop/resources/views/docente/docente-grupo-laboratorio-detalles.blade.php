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

<h1 class="title">DETALLES DEL GRUPO</h1>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">DETALLES DEL GRUPO DE LABORATORIO</h3>
                    <a type="submit" href="{{ route('docente.grupos.laboratorio.sesiones', ['idGrupoLab' => $data['id_grupo_lab']]) }}"
                        style="align-items: center; float: right" class="btn btn-info">
                        <i class="fa fa-arrow-right pull-right">Sesiones</i>
                    </a>
                    <a type="submit" onclick="history.back(-1)" style="align-items: center; float: right" class="btn btn-danger">
                        <i class="fa fa-arrow-left pull-right">Atras</i>
                    </a>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Gestion</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Fin</th>
                                <th>Laboratorio #</th>
                                <th>Dia(s)</th>
                                <th>Auxiliar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['grupo_laboratorio'] as $grupo_laboratorio)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $data['gestion']->nombre_gestion }}</td>
                                <td>{{ $grupo_laboratorio->nombre_materia }}</td>
                                <td>{{ $data['docente']->nombre }} {{ $data['docente']->apellidos }}</td>
                                <td>{{ $grupo_laboratorio->hora_ini }}</td>
                                <td>{{ $grupo_laboratorio->hora_fin }}</td>
                                <td>{{ $grupo_laboratorio->numero_lab }}</td>
                                <td>{{ $grupo_laboratorio->dia }}</td>
                                @if($data['auxiliar'] != 'No')
                                <td>{{ $data['auxiliar']->nombre }} {{ $data['auxiliar']->apellidos }}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Gestion</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Fin</th>
                                <th>Laboratorio #</th>
                                <th>Dia(s)</th>
                                <th>Auxiliar</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

                <!-- Estudiantes de Laboatorio -->
                <div class="box-header">
                    <h3 class="box-title">ESTUDIANTES DEL GRUPO DE LABORATORIO</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo SIS</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['estudiantes'] as $estudiante)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $estudiante->codsis_est }}</td>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $data['docente']->apellidos }}</td>
                                <td>{{ $estudiante->email }}</td>
                                <td>INSCRITO</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo SIS</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Estado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
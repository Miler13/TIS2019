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

        .box-title {
            text-align: center;
        }

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

<h1 class="titlehead">LISTA DE TUS GRUPOS DE LABORATORIO </h1>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de todos tus grupos de laboratorio al cual fuiste asignado</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo del Grupo</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Laboratorio #</th>
                                <th>Grupo #</th>
                                <th class="extrabuttons">Ver Grupo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['grupos_laboratorio'] as $grupos_laboratorio)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $grupos_laboratorio->id_grupo_lab }}</th>
                                <td>{{ $grupos_laboratorio->nombre_materia }}</td>
                                <td>{{ $grupos_laboratorio->nombre_docente }}</td>
                                <td>{{ $grupos_laboratorio->numero_lab }}</td>
                                <td>{{ $grupos_laboratorio->numero_gr }}</td>
                                <td class="extrabuttons">
                                    <a type="submit" class="btn btn-info btn-xs"
                                    href="{{ route('docente.grupos.ver.grupo', ['idGrupoLab' => $grupos_laboratorio->id_grupo_lab]) }}" style="align-items: center">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo del Grupo</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Laboratorio #</th>
                                <th>Grupo #</th>
                                <th class="extrabuttons">Ver Grupo</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
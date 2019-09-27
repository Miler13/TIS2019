@extends('welcome')
@section('content')

<head>
    <style>
        .titlehead {
            text-align: center;
            margin: auto;
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

<h1 class="titlehead">LISTA DE MATERIAS DEL ESTUDIANTE</h1>

@if (session('est_mat_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('est_mat_successful') }}</h4>
</div>
@endif

@if (session('est_mat_warning'))
<div style="font-size: 16px;" class="alert alert-warning" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('est_mat_warning') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Lista de Materias en el que el estudiante esta inscrito</h3>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo de La Materia</th>
                                <th>Nombre de la Materia</th>
                                <th>Nombre del Docente</th>
                                <th>Apellido(s) del Docente</th>
                                <th>Estado del Estudiante</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['materias'] as $materia)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $materia->cod_materia }}</td>
                                <td>{{ $materia->nombre }}</td>
                                <td>{{ $materia->nombre_docente }}</td>
                                <td>{{ $materia->apellido_docente }}</td>
                                <td>INSCRITO</td>
                            <tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo de La Materia</th>
                                <th>Nombre de la Materia</th>
                                <th>Nombre del Docente</th>
                                <th>Apellido(s) del Docente</th>
                                <th>Estado del Estudiante</th>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
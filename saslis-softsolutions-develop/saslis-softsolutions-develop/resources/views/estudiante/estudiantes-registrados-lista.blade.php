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

<h1 class="titlehead">LISTA DE ESTUDIANTES REGISTRADOS EN EL SISTEMA</h1>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de estudiantes que se registraron en el sistema</h3>
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estudiantes as $gestudiante)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $gestudiante->codsis_est }}</th>
                                <td>{{ $gestudiante->nombre }}</td>
                                <td>{{ $gestudiante->apellidos }}</td>
                                <td>{{ $gestudiante->email }}</td>
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
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
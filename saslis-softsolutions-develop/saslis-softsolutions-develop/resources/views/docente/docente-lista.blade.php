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

<h1 class="titlehead">LISTA DE DOCENTES</h1>

@if (session('doc_reg_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('doc_reg_successful') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lista de docentes registrados</h3>
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo SIS</th>
                                <th>Nombre(s)</th>
                                <th>Apellido(s)</th>
                                <th>Correo</th>
                                <th>Activo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($docentes as $docente)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $docente->codsis_doc }}</th>
                                <td>{{ $docente->nombre }}</td>
                                <td>{{ $docente->apellidos }}</td>
                                <td>{{ $docente->email }}</td>
                                @if ($docente->activo)
                                <td>Si</td>
                                @endif
                                @if (!$docente->activo)
                                <td>No</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo SIS</th>
                                <th>Nombre(s)</th>
                                <th>Apellido(s)</th>
                                <th>Correo</th>
                                <th>Activo</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
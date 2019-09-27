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
            text-align: center;
        }

        .title {
            text-align: center;
        }

        .datadetails {
            color: #6c757d;
            font-weight: 500;
        }

        @media only screen and (max-width: 600px) {
            .titlehead {
                font-size: 25px;
                font-weight: 600;
            }

            .row {
                width: 520px;
            }

            .content {
                overflow-x: scroll;
            }
            .btn {
                float: left;
                width: 460px;
            }
        }
    </style>
</head>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h3 class="title">DETALLES DE LA MATERIA</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <p class="titulo-panel">
                    Materia
                </p>
                <div class="panel-body">
                    <label class="control-label" for="codmateria">Codigo de la Materia:</label>
                    <h4 class="datadetails"><i class="fa fa-id-card text-info"></i> {{ $data['cod_materia'] }}</h4>
                    <hr class="style1">

                    <label class="control-label" for="codmateria">Nombre de la Materia:</label>
                    <h4 class="datadetails"><i class="fa fa-id-card-o text-info"></i> {{ $data['nombre_materia'] }}</h4>
                    <hr class="style1">

                    <label class="control-label" for="nombre">Docentes de la materia</label>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo Sis del Docente</th>
                                <th>Nombre(s) del Docente</th>
                                <th>Apellido(s) del Docente</th>
                                <th>Correo del Docente</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['docentes'] as $docente)
                            <tr>
                                <th class="datadetails">{{ $loop->iteration }}</th>
                                <td class="datadetails">{{ $docente->codsis_doc }}</td>
                                <td class="datadetails">{{ $docente->nombre }}</td>
                                <td class="datadetails">{{ $docente->apellidos }}</td>
                                <td class="datadetails">{{ $docente->email }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Buttons -->
                    <div class="row espacio-abajo">
                        <div class="col-xs-12">
                            <a href="../" type="submit" style="align-items: center" class="btn btn-success btn-block btn-block">
                                Regresar
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
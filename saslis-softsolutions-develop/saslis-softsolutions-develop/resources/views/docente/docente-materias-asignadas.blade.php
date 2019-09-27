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

        .style2 {
            border-top: 2px solid #d2d6de;
        }

        @media only screen and (max-width: 600px) {
            .titlehead {
                font-size: 25px;
                font-weight: 600;
            }

            .content {
                overflow-x: scroll;
            }
        }
    </style>
</head>

<h1 class="titlehead">LISTA DE MATERIAS ASIGNADAS</h1>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Lista de Materias al cual fuiste asignado como docente</h3>
                    <hr class="style2">
                    @foreach($data['materias'] as $materia)
                    <div class="col-md-3">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h5 class="box-title" style="text-transform: uppercase;">{{ $loop->iteration }}.- {{ $materia->nombre }}</h5>
                            </div>
                            <div class="box-body">
                                <h4 class="box-title">Codigo De Materia: {{ $materia->cod_materia }}</h4>
                                <h4 class="box-title">Docente: {{ $materia->docente }} {{ $materia->docente_apellidos }}</h4>
                            </div>
                            <div class="box-footer">
                                <div class="row espacio-abajo">
                                    <div class="col-xs-12">
                                        <a type="submit" href="{{ route('docente.materia.grupos.laboratorio', ['codMateria' => $materia->cod_materia]) }}" style="align-items: center" class="btn btn-info btn-block btn-block">
                                            Ver Grupos de Laboratorio
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

@endsection
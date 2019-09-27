@extends('welcome')
@section('content')

<head>
    <style>
        .titlehead {
            text-align: center;
            margin: auto;
            text-transform: uppercase;
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

<h2 class="titlehead">MATERIA: {{ $data['nombre_materia'] }}</h2>
<hr>
<h2 class="titlehead">DOCENTE: {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}</h2>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <h3 class="box-title">Tus grupos de laboratorio de la materia: {{ $data['nombre_materia'] }}
                        <a type="submit" href="../" style="align-items: center; float: right" class="btn btn-danger">
                            <i class="fa fa-arrow-left pull-right">Atras</i>
                        </a>
                    </h3>
                    <hr>
                    @foreach($data['grupos_laboratorio'] as $grupo_laboratorio)
                    <div class="col-md-3">
                        <div class="box box-solid box-primary">
                            <div class="box-header">
                                <h5 style="text-align: center; font-size: 18px;">Grupo # {{ $grupo_laboratorio->numero_gr }}</h5>
                            </div>
                            <div class="box-body">
                                <h5 class="box-body-title">Codigo del grupo: {{ $grupo_laboratorio->id_grupo_lab }}</h5>
                                <h5 class="box-body-title">Laboratorio: {{ $grupo_laboratorio->numero_lab }}</h5>
                                <h5 class="box-body-title">Dias: {{ $grupo_laboratorio->dia }}</h5>
                                <h5 class="box-body-title">Hora de Inicio: {{ $grupo_laboratorio->hora_ini }}</h5>
                                <h5 class="box-body-title">Hora de finalizacion: {{ $grupo_laboratorio->hora_fin }}</h5>
                            </div>
                            <div class="box-footer">
                                <div class="row espacio-abajo">
                                    <div class="col-xs-12">
                                        <a type="submit" href="{{ route('docente.grupos.ver.grupo', ['idGrupoLab' => $grupo_laboratorio->id_grupo_lab]) }}"
                                        style="align-items: center" class="btn btn-info btn-block btn-block">
                                            Ver Grupo
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
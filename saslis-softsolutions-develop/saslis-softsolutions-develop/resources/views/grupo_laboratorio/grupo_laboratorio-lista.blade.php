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

        .glyphicon {
            font-size: 16px;
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

<h1 class="titlehead">LISTA DE GRUPOS DE LABORATORIO</h1>

@if (session('gru_lab_reg_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('gru_lab_reg_successful') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                    <h3 class="box-title">Lista de grupos de laboratorio que el estudiante puede tomar</h3>
                    @endif
                    @if(Auth::check() && Auth::user()->cargo != 'estudiante')
                    <h3 class="box-title">Lista de grupos de laboratorio creados</h3>
                    @endif
                </div>
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo del Grupo</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Dia(s)</th>
                                <th>Laboratorio #</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Finalizacion</th>
                                <th>Grupo #</th>
                                @if(Auth::check() && Auth::user()->cargo != 'auxiliar' && Auth::check() && Auth::user()->cargo != 'estudiante')
                                <th>Auxiliar</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <th class="extrabuttons">Inscribirse</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'auxiliar')
                                <th class="extrabuttons">Tomar Auxiliatura</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['grupo_laboratorio'] as $grupo_laboratorio)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $grupo_laboratorio->id_grupo_lab }}</th>
                                <th>{{ $grupo_laboratorio->nombre_materia }}</th>
                                <td>{{ $grupo_laboratorio->nombre_docente }}</td>
                                <td>{{ $grupo_laboratorio->dia }}</td>
                                <td>{{ $grupo_laboratorio->numero_lab }}</td>
                                <td>{{ $grupo_laboratorio->hora_ini }}</td>
                                <td>{{ $grupo_laboratorio->hora_fin }}</td>
                                <td>Grupo: {{ $grupo_laboratorio->numero_gr }}</td>
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <td class="extrabuttons">
                                    <form method="POST" action="{{ route('estudiante.gruposhabilitados.submit') }}" id="form-reg-est-grup">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id_grupo_lab" name="id_grupo_lab" value="{{ $grupo_laboratorio->id_grupo_lab }}" />
                                        <input type="hidden" id="codsis_est" name="codsis_est" value="{{ Auth::user()->codsis_est }}" />
                                        <button type="button" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-ok-circle" onclick="hacerSubmit({{ $grupo_laboratorio->id_grupo_lab }}, {{ Auth::user()->codsis_est }});"></span>
                                        </button>
                                    </form>
                                </td>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'auxiliar')
                                <td class="extrabuttons">
                                    <form method="POST" action="{{ route('auxiliar.gruposhabilitados.submit') }}" id="form-reg-aux-grup">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id_grupo_lab" name="id_grupo_lab" value="{{ $grupo_laboratorio->id_grupo_lab }}" />
                                        <input type="hidden" id="id_auxiliar" name="id_auxiliar" value="{{ Auth::user()->id_auxiliar }}" />
                                        <button type="button" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-ok" onclick="hacerSubmitAuxiliar({{ $grupo_laboratorio->id_grupo_lab }}, {{ Auth::user()->id_auxiliar }});"></span>
                                        </button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo del Grupo</th>
                                <th>Materia</th>
                                <th>Docente</th>
                                <th>Dia(s)</th>
                                <th>Laboratorio #</th>
                                <th>Hora de Inicio</th>
                                <th>Hora de Finalizacion</th>
                                <th>Grupo #</th>
                                @if(Auth::check() && Auth::user()->cargo != 'auxiliar' && Auth::check() && Auth::user()->cargo != 'estudiante')
                                <th>Auxiliar</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <th class="extrabuttons">Inscribirse</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'auxiliar')
                                <th class="extrabuttons">Tomar Auxiliatura</th>
                                @endif
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function hacerSubmit(idGrupoLab, codsisEst) {
        codGrupLab = document.getElementById('id_grupo_lab').value = idGrupoLab;
        codMateria = document.getElementById('codsis_est').value = codsisEst;
        document.getElementById("form-reg-est-grup").submit();
    }

    function hacerSubmitAuxiliar(idGrupoLab, idAuxiliar) {
        codGrupLab = document.getElementById('id_grupo_lab').value = idGrupoLab;
        codMateria = document.getElementById('id_auxiliar').value = idAuxiliar;
        document.getElementById("form-reg-aux-grup").submit();
    }
</script>

@endsection
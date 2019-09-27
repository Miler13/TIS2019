@extends('welcome')
@section('content')

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />

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

        .modal-title {
            font-weight: 600;
        }

        .docentes {
            text-transform: uppercase;
        }

        #exampleModalLabel {
            text-transform: uppercase;
            font-size: 20px;
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

@if (Auth::check() && Auth::user()->cargo != 'estudiante')
<h1 class="titlehead">LISTA DE MATERIAS</h1>
@endif

@if (Auth::check() && Auth::user()->cargo == 'estudiante')
<h1 class="titlehead">LISTA DE MATERIAS HABILITADAS</h1>
@endif

@if (session('mat_reg_successful'))
<div style="font-size: 16px;" class="alert alert-success" role="alert">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    <h4>{{ session('mat_reg_successful') }}</h4>
</div>
@endif

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">

                    @if (Auth::check() && Auth::user()->cargo != 'estudiante')
                    <h3 class="box-title">Lista de materias registradas</h3>
                    @endif

                    @if (Auth::check() && Auth::user()->cargo == 'estudiante')
                    <h3 class="box-title">Lista de materias habilitadas a la que puede inscribirse</h3>
                    @endif
                </div>
                <div class="box-body">
                    @if (session('doc_mat_reg_successful'))
                    <div style="font-size: 16px;" class="alert alert-success" role="alert">
                        <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
                        <h4>{{ session('doc_mat_reg_successful') }}</h4>
                    </div>
                    @endif
                    <table id="example1" class="table table-bordered table-striped">

                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                @if(Auth::check() && Auth::user()->cargo == 'admin')
                                <th class="extrabuttons">Ver Detalles</th>
                                <th class="extrabuttons">Agregar docente</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <th>Docente de la Materia</th>
                                <th>Correo del Docente</th>
                                <th class="extrabuttons">Inscribirse</th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data['materias'] as $materia)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <td>{{ $materia->cod_materia }}</td>
                                <td>{{ $materia->nombre }}</td>
                                @if(Auth::check() && Auth::user()->cargo == 'admin')
                                <td class="extrabuttons">
                                    <a type="button" class="btn btn-info btn-xs" href="{{ route('materia.detalles', ['codMateria' => $materia->cod_materia]) }}">
                                        <span class="glyphicon glyphicon-eye-open"></span>
                                    </a>
                                </td>
                                <td class="extrabuttons">
                                    <a type="button" class="btn btn-success btn-xs" href="{{ route('docentemateria.registrar', ['codMateria' => $materia->cod_materia]) }}">
                                        <span class="glyphicon glyphicon-plus-sign"></span>
                                    </a>
                                </td>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <td>{{ $materia->nombre_docente }} {{ $materia->apellido_docente }}</td>
                                <td>{{ $materia->email_docente }}</td>
                                @if($materia->nombre_docente != "")
                                <td class="extrabuttons">
                                    <form method="POST" action="{{ route('estudiante.inscribirse.materia.submit') }}" id="form-reg-est-mat">
                                        {{ csrf_field() }}
                                        <input type="hidden" id="id_doc_mat" name="id_doc_mat" value="{{ $materia->id_doc_mat }}" />
                                        <input type="hidden" id="codsis_est" name="codsis_est" value="{{ Auth::user()->codsis_est }}" />
                                        <button type="button" class="btn btn-success btn-xs">
                                            <span class="glyphicon glyphicon-ok-circle" onclick="hacerSubmit({{ $materia->id_doc_mat }}, {{ Auth::user()->codsis_est }});"></span>
                                        </button>
                                    </form>
                                </td>
                                @endif
                                @if($materia->nombre_docente == "")
                                <td class="extrabuttons"><button type="button" class="btn btn-success btn-xs" disabled>
                                        <span class="glyphicon glyphicon-ok-circle"></span>
                                    </button>
                                </td>
                                @endif
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Codigo</th>
                                <th>Nombre</th>
                                @if(Auth::check() && Auth::user()->cargo == 'admin')
                                <th class="extrabuttons">Ver Detalles</th>
                                <th class="extrabuttons">Agregar docente</th>
                                @endif
                                @if(Auth::check() && Auth::user()->cargo == 'estudiante')
                                <th>Docente de la Materia</th>
                                <th>Correo del Docente</th>
                                <th class="extrabuttons">Inscribirse</th>
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
    function hacerSubmit(idDocMat, codsisEst) {
        codMateria = document.getElementById('id_doc_mat').value = idDocMat;
        codMateria = document.getElementById('codsis_est').value = codsisEst;
        document.getElementById("form-reg-est-mat").submit();
    }
</script>
@endsection

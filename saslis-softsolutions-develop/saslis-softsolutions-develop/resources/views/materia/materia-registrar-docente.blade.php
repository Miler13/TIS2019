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
    </style>
</head>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-3">
            <h3 class="title">Añadir Docente(s) a Materia</h3>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-offset-3 col-sm-6">
            <div class="panel panel-default">
                <p class="titulo-panel">
                    Materia
                </p>
                <div class="panel-body">
                    <form method="POST" action="{{route('docentemateria.registrar.submit')}}" id="form-reg-doc-mat">
                        {{ csrf_field() }}

                        <div id="codmateria_div">
                            <label class="control-label" for="codmateria">Codigo Materia:</label>
                            <input type="text" class="form-control" name="codmateria" id="codmateria" value="{{ $data['materia']->cod_materia }}" readonly>
                        </div>

                        <div id="nombre_div">
                            <label class="control-label" for="nombre">Nombre Materia:</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $data['materia']->nombre }}" readonly>
                        </div>
                        <br>
                        <div>
                            <label class="control-label" for="laboratorio">Docentes Disponibles:</label>
                            <select class="selectpicker form-control" multiple id="docentes_selected" name="docentes[]">
                                @foreach($data['docentes'] as $docente)
                                <option class="docentes">{{ $docente->apellidos }} {{ $docente->nombre }} - {{ $docente->codsis_doc }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                        <!-- Buttons -->
                        <div class="row espacio-abajo">
                            <div class="col-xs-6">
                                <a href="../lista-de-materias/" type="submit" class="btn btn-danger btn-block btn-flat">
                                    Cancelar
                                </a>
                            </div>
                            <div class="col-xs-6">
                                <button type="button" class="btn btn-primary btn-block" onclick="hacerSubmit();">Agregar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- jquery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" crossorigin="anonymous"></script>

{{-- @section('scripts') --}}
<script>
    function hacerSubmit() {
        var docentes = [];
        $.each($("#docentes_selected option:selected"), function() {
            docentes.push($(this).text())
        });
        if (docentes.length != 0) {
            document.getElementById("form-reg-doc-mat").submit();
        } else {
            alert("Si desea agregar un docente, debe selecionar al menos uno.")
        }
    }
</script>
{{-- @endsection --}}

@endsection
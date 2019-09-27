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

<h1 class="titlehead">LISTA DE ESTUDIANTES HABILITADOS PARA LA TOMA DE MATERIAS</h1>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Importar estudiantes para la toma de materias</h3>
                </div>
                <div class="panel-body">
                    <form action="{{ route('estudiantes.importar') }}" class="form-horizontal" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        @if (Session::has('success'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                        @endif

                        <input type="file" name="selecionar_archivo" />
                        <br>
                        <button class="btn btn-primary">
                        <i class="fa fa-floppy-o"></i>
                            Guardar Estudiantes
                        </button>
                    </form>

                </div>
                <div class="box-body">
                    <h3 class="box-title">Estudiantes Habilitados Para La Toma De Materias</h3>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Codigo SIS</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Correo</th>
                                <th>Materia Habilitada</th>
                                <th>Docente de la Materia</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($estudiantes as $estudiante)
                            <tr>
                                <th>{{ $loop->iteration }}</th>
                                <th>{{ $estudiante->codsis_est }}</th>
                                <td>{{ $estudiante->nombre }}</td>
                                <td>{{ $estudiante->apellidos }}</td>
                                <td>{{ $estudiante->email }}</td>
                                <td>{{ $estudiante->nombre_materia }}</td>
                                <td>{{ $estudiante->nombre_docente }} {{ $estudiante->apellidos_docente }}</td>
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
                                <th>Materia Habilitada</th>
                                <th>Docente de la Materia</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
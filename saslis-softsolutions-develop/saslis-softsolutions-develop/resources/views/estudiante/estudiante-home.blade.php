@extends('welcome')
@section('content')

<head>
    <style>
        .homepage {
            font-size: 92px;
            text-align: center;
        }

        .description {
            font-size: 20px;
            text-align: center;
        }

        @media only screen and (max-width: 600px) {
            .homepage {
                font-size: 35px;
                text-align: center;
            }
        }
    </style>
</head>
@if (session('est_login_successful'))
<div style="font-size: 16px;" class="alert alert-info">
    <button aria-label="Close" data-dismiss="alert" class="close" type="button"><span aria-hidden="true">×</span></button>
    {{ session('est_login_successful') }}
</div>

@endif
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading" style="font-size: 20px;">PAGINA PRINCIAL DE ESTUDIANTE</div>

                <div>
                    <p class="homepage">BIENVENIDO</p>
                    <br>
                    <p class="homepage">{{ Auth::user()->nombre }}</p>
                    <p class="description"> Hola! {{ Auth::user()->nombre }} {{ Auth::user()->apellidos }}, Bienvenido!!
                        Acabas de iniciar tu sesion como <strong>ESTUDIANTE</strong>.</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
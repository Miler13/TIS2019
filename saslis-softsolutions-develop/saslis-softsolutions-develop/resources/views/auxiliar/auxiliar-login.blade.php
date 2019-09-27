@extends('welcome')

@section('content')
<head>
    <style>
        #boxform {
            width: 50%;
        }

        #titlelogin {
            font-size: 50px;
        }

        @media only screen and (max-width: 600px) {
            #boxform {
                width: 90%;
            }
            #titlelogin {
                font-size: 30px;
            }
        }
    </style>
</head>
<div class="login-box" id="boxform">
    <div class="login-logo" id="titlelogin">
        <a><b>Auxiliar</b></a>
    </div>
    <div class="panel panel-default">
        <div class="panel-heading" style="font-size: 18px; text-align: center;">Iniciar sesion como auxliar</div>

        <div class="login-box-body">


            <form class="form-horizontal" method="POST" action="{{ route('auxiliar.login.submit') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">Correo:</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Contraseña:</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control" name="password" required>

                        @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                        @endif
                    </div>
                </div>

                <div class="row" style="margin-top: 8%; margin-left: 15%;">
                    <div class="col-xs-5">
                        <div>
                            <a href="../admin" type="submit" class="btn btn-danger btn-block btn-flat">
                                Cancelar
                            </a>
                        </div>
                    </div>
                    <div class="col-xs-5">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
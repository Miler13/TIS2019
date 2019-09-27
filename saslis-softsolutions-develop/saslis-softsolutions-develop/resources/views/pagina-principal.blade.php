@extends('welcome')
@section('content')
<div style="width: 90%; margin: auto;">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <center><img src="{{ asset('images/bienvenida_umss.jpg')}}" alt="FCYT" width="100%" height="500" title="Laboratorio de Informatica y Sistemas"></center>
            </div>

            <div class="item">
                <center><img src="{{ asset('/images/titulo_fcyt.png')}}" alt="FCYT" width="100%" height="500" title="Laboratorio de Informatica y Sistemas"></center>
            </div>

            <div class="item">
                <center><img src="{{ asset('/images/labos.jpg')}}" alt="FCYT" width="100%" height="500" title="Laboratorio de Informatica y Sistemas"></center>
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" style="color:white;"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" style="color:white;"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <br>
    <div>
        <h2 align="center" style="font-weight: 600; text-transform: uppercase;">
            El departamento de Informática y Sistemas saluda y da la bienvenida al sistema SASLIS
        </h2>
        <h4 align="center">El propósito del sistema SASLIS es servir de utlidad en la gestión de personal de las sesiones practicas en el laboratorio y a los que visitan por primera vez, nuestra mas calurosa bienvenida.</h4>
    </div>
</div>
@stop
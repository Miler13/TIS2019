<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laboratorios de informatica-sistemas UMSS</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/modern-business.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="imagenes/logoUNI.ico" type="image/x-icon">
      <link rel="stylesheet" href="css/reloj.css">
      <link rel="stylesheet" href="css/index.css">
</head>

<body>

<?php include('includes/menuPublico.php') ?>

    <!-- Header Carousel -->
    

    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                SISTEMA GRLIS 
                </h1>
            </div>
            <div class="col-lg-12">
                <p>
                     Bienvenidos al Sistema de gestion y reserva de Laboratorios de informatica-sistemas
                </p>
                <br>
            </div>
             <div class="row">
             <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                <div class="panel-heading">
                         <div class="wrap">
				          <div class="widget">
                             <div class="fecha"> 
                                <p>Hora Actual</p><br>
					            <p id="diaSemana" class="diaSemana"></p>
					            <p id="dia" class="dia"></p>
					            <p>de </p>
					            <p id="mes" class="mes"></p>
					            <p>del </p>
					            <p id="year" class="year"></p>
				              </div>
                            </div>
                          </div>    
                          <script src="js/reloj.js"></script>             
                    </div>
                    <div class="panel-body">
                    <h4>
                        <div class="wrap">
				          <div class="widget">
				              
				              <div class="reloj">
					            <p id="horas" class="horas"></p>
					            <p>:</p>
					            <p id="minutos" class="minutos"></p>
					            <p>:</p>
					            <div class="caja-segundos">
					               <p id="ampm" class="ampm"></p>
					               <p id="segundos" class="segundos"></p>
					            </div>
				              </div>
			              </div>                          
			             </div>
			           <script src="js/reloj.js"></script>
                     </h4>                  
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/profesores.png">
                    </div>
                    <div class="panel-body">
                        <h4>Docentes</h4>
                        <p>Esta seccion es solo para los docentes registrados</p>
                        <a href="docentes/docentes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/auxi.png">
                    </div>
                    <div class="panel-body">
                        <h4>Auxiliares</h4>
                        <p>Esta seccion es solo para auxiliares registrados </p>
                        <a href="auxiliares/auxiliares.php" class="btn btn-primary"> <i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>

             <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/estudiantes.png">
                    </div>
                    <div class="panel-body">
                        <h4>Estudiantes</h4>
                        <p>Esta seccion es solo para los estudiantes registrados</p>
                        <a href="estudiantes/estudiantes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/admin.png">
                    </div>
                    <div class="panel-body">
                        <h4>Administrador</h4>
                        <p>Esta seccion es solo para el administrador </p>
                        <a href="admin/admin.php" class="btn btn-primary"> <i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
                    </div>
                </div>
            </div>  

                  

                       
        </div>

        </div>
        <!-- /.row -->
        <!-- Features Section -->
        <div class="row">
            <div class="col-lg-12">
                 <h2 class="page-header">Identifique su tipo de usuario y haga click en entrar</h2> 
            </div>
          
          
        </div>
        <!-- para avisos Estimado usuario, le recordamos NO usar acentos, ñ's o caracteres especiales del LENGUAJE ESPAÑOL,
                      en los nombres de sus archivos y/o documentos que suba a la plataforma. -->
   <hr>
    </div>
    <script src="js/jquery.js"></script>
     <script src="js/back-to-top.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>
    
<?php
include('includes/footer.php');
 ?>

</body>

</html>

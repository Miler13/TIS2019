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
                Laboratorios de informatica-sistemas UMSS
                </h1>
            </div>
            <div class="col-lg-12">
                <p>
                     Bienvenidos al Sistema de Laboratorios de informatica-sistemas UMSS
                <p>
                <br>
            </div>
             <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="imagenes/profesores.png">
                    </div>
                    <div class="panel-body">
                        <h4>Docentes</h4>
                        <p>Esta seccion es solo para los docentes</p>
                        <a href="docentes/docentes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Entrar</a>
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
                <h2 class="page-header">Laboratorios de informatica-sistemas UMSS</h2>
            </div>
          
          
        </div>
        <!-- /.row -->
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

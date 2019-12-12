
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
    if ($_SESSION["NivelUsuario"] == 4) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

           //   $consulta=mysqli_query($conexion,"select Foto from especialistas where idEspecialista = $codigo");
            //    while($filas=mysqli_fetch_array($consulta)){
            //            $foto=$filas['Foto'];
             //   }

            //    $consulta2 = mysqli_query($conexion,"select concat (NombresEspecialista, ' ', ApellidosEspecialista) as especilista from Especialistas where idEspecialista = $codigo");
             //    while($filas2=mysqli_fetch_array($consulta2)){
              //          $docente=$filas2['Nombrespecialista'];
              //   }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chasqui</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
      <script src="boletin/myjava.js"></script>

     
</head>

<body>
<?php
include ('menu_inicio_editor.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src=" " width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">

                <img src="" class="img-responsive">

             </div>
               <div class="col-md-3">
              
              <!--<h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>-->
               </div>

            </div>


            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li ><a href="editor.php">Editor</a></li>
                    <li class="active">Editor</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->
            <?php
include ('menu_editor.php');
 ?>
      
      
      <div class="col-md-9 col-sm-4">
                <div class="panel panel-default text-center">
                    
                    <div class="panel-body">
                        <h1>Boletines </h1>
                        <p> <h3>Modelos de  boletines </h3>  </p>
                       
                        
                    </div>
                </div>
            </div>


        <div class="col-md-9 col-sm-4">

            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin01.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin  01</h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo1.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin02.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin 02</h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo2.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin03.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin 03</h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo3.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin04.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin 04</h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo4.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
           
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin05.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin 05 </h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo5.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
           
            <div class="col-md-4 col-sm-4">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <img src="images/Boletin06.png" width="250" height="250">
                    </div>
                    <div class="panel-body">
                        <h4>Boletin 06 </h4>
                        <p> </p>
                        <a href="boletin/pdf/archivos/modelo6.pub" class="btn btn-primary"><i class="glyphicon glyphicon-download-alt"></i> Descargar</a>
                        
                    </div>
                </div>
            </div>
            
</div>

    <!-- MODAL PARA EL REGISTRO-->
   
            </div>
        </div>
    </div>

            </div>
                    
        </div>
        <!-- Fin del Panel -->
      </div>
    </div>
</div>
</div>
        <hr>
    </div>
    <?php
    include('../includes/footer.php');
 ?>
</body>

</html>

<?php
     }
    else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
        echo '<script> window.location="../index.l.php"; </script>';
   }
}else{
 echo '<script> window.location="../index.l.php"; </script>';
}
?>


<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 4) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

           //   $consulta=mysqli_query($conexion,"select Foto from especialistas where idEspecialista = $codigo");
             //   while($filas=mysqli_fetch_array($consulta)){
              //           $foto=$filas['Foto'];
              //   }

                // $consulta2 = mysqli_query($conexion,"select concat (NombresEspecialista, ' ', ApellidosEspecialista) as especilista from Especialistas where idEspecialista = $codigo");
                 //while($filas2=mysqli_fetch_array($consulta2)){
                   //      $docente=$filas2['Nombrespecialista'];
                // }
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
                    <li class="active">Editor</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->
            <?php
include ('menu_editor.php');
 ?>
      

            <!-- Content Column -->
            <div class="col-md-9 col-sm-4">
                <div class="panel panel-default text-center">
                    
                    <div class="panel-body">
                        <h4>Boletines </h4>
                        <p> El trabajo en equipo es la capacidad de trabajar juntos hacia una visión común. La capacidad de dirigir los logros individuales hacia los objetivos de la organización. Es el combustible que permite que la gente normal logre resultados poco comunes</p>
                        
                        <div class="col-md-9 col-sm-4">
                        <img src="images/creacion.jpg" class="img-responsive" width="100%" height="100%">
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

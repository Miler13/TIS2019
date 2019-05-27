
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 4) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from auxiliares where idAuxiliar = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }

                 $consulta2 = mysqli_query($conexion,"select concat (NombresAuxiliar, ' ', ApellidosAuxiliar) as Auxiliar from auxiliares where idAuxiliar = $codigo"); 
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $Auxiliar=$filas2['Auxiliar'];                           
                 }
        ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laboratorios de informatica - sistemas UMSS</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"
</head>

<body>
<?php
include ('menu_inicio_auxiliar.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSIAD.png" width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">         
               
                <img src="../imagenes/banerDoc.png" class="img-responsive">
                     
             </div>
               <div class="col-md-3">
                 <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div> 

            </div>

           
            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li class="active">auxiliares</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <?php
include ('menu_auxiliares.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h3>Auxiliar conectado : <b style="color:green;"><?php echo $user; ?></b></h3>
                <p>En esta seccion del sistema usted podra administrar los alumnos que le fueron asignados, tambien podra enviar tareas a sus alumnos asi como tambien evaluar dichas tareas, ver reportes, entregar material de estudio, entre otras cosas.</p>

                  <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">                 
                              <img src="../imagenes/Auxiliar1.png" class="img-responsive">
                        </span>
                    </div>
                    <div class="panel-body">
                        <h4>Tareas de Estudiantes</h4>
                        <a href="ver_tarea_estudiante.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="panel panel-default text-center">
                    <div class="panel-heading">
                        <span class="fa-stack fa-5x">
                            <img src="../imagenes/Auxiliar2.png" class="img-responsive">
                        </span>
                    </div>

                    <div class="panel-body">
                        <h4>Pantalla de Evaluaciones</h4>
                        <a href="evaluacion_estudiantes.php" class="btn btn-primary"><i class="glyphicon glyphicon-download"></i>   Entrar</a>
                    </div>
                   
                </div>
            </div>

             


                    
            </div>
        </div>
            </div>
        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
      

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <?php
    include('../includes/footer.php');
 ?>
</body>

</html>

<?php
     }
     else{
        echo '<script> alert("No Tienes los permisos para acceder a esta pagina.");</script>';
         echo '<script> window.location="../login.php"; </script>';
     }
}else{
 echo '<script> window.location="../login.php"; </script>';
}
?>

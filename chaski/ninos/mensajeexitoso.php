
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 3) {
            $estudiante = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

                $consulta=mysqli_query($conexion,"select Foto from ninos where idNino = $codigo");
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];
                 }

                 $consulta2 = mysqli_query($conexion,"select concat (NombresNino) as Nino from ninos where idNino = $codigo");
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $estudiante=$filas2['Nino'];
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

    <title>Chasqui</title>
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">
	
</head>

<body background="images/fondo.jpg">
<?php
include ('menu_inicio_nino.php');
 ?>

    <!-- Page Content -->
    <div class="container" style= ""   src="images/fondo.jpg" >

        <!-- Page Heading/Breadcrumbs -->

            <div class="row" style= ""  src="images/fondo.jpg">
            <div class="col-lg-12">
            
                 <div class="col-md-6">
               
             </div>
               <div class="col-md-7x">
               <br>
              
              
               </div>

            </div>

           
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->
            <?php
     include ('menu_nino.php');
 ?>
            <!-- Content Column -->
            
            <!-- Content Column -->
            <div class="col-md-9 col-sm-4">
                <div class="panel panel-default text-center" style="background-color: rgba(255, 155, 10, .4);">
                    
                    <div class="panel-body">
                        <h3>Mensaje enviado con  </h3>
                        <h1>Éxito  </h1>
                        
                        <div class="col-md-9 col-sm-4">
                        <img src="images/exito.png" class="img-responsive" width="100%" height="100%">
                        </div>
                        
                    </div>
                    <a href="nino.php" class="btn btn-success"><i class="fa fa-mail-forward"></i> Volver </a>
                </div>
              
            </div>
            
   
  
    <!-- MODAL PARA EL REGISTRO-->
   
            </div>
        </div>
    </div>

            </div>
                    
        </div>
                         <!-- Fin del Row -->       
               
     




    

        <hr>

        <!-- Footer -->


    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="../js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../js/bootstrap.min.js"></script>
    <?php
   // include('../includes/footer.php'); 
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

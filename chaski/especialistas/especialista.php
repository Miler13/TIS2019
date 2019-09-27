
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from especialistas where idEspacilista = $codigo");
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];
                 }

                 $consulta2 = mysqli_query($conexion,"select concat (NombresEspecialista, ' ', ApellidosEspecialista) as especilista from Especialistas where idDocente = $codigo");
                 while($filas2=mysqli_fetch_array($consulta2)){
                         $docente=$filas2['especialista'];
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
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
      <link rel="shortcut icon" href="../imagenes/logo.jpg" type="image/x-icon">
      <link rel="stylesheet" href="css/reloj.css">
      <link rel="stylesheet" href="css/index.css">
</head>

<body>
<?php
include ('menu_inicio_docente.php');
 ?>
<br>
    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->

            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logo.jpg" width="80" height="80" class="img-responsive"></div>
                 <div class="col-md-6">

                <img src="../imagenes/baner.png" class="img-responsive">

             </div>
               <div class="col-md-3">
              <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $user ?></h5>
               </div>

            </div>


            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li class="active">Docentes</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->
            <?php
include ('menu_docente.php');
 ?>
            <!-- Content Column -->
           
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
         echo '<script> window.location="../index.l.php"; </script>';
     }
}else{
 echo '<script> window.location="../index.l.php"; </script>';
}
?>

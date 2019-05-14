
<?php
    session_start();
    include '../admin/conexion.php';

    if(isset($_SESSION['NombreUsuario'])) {
        if ($_SESSION["NivelUsuario"] == 2) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

            $consulta=mysqli_query($conexion,"select Foto from docentes where idDocente = $codigo");                  
            while($filas=mysqli_fetch_array($consulta)){
                $foto=$filas['Foto'];                           
            }

            $consulta2 = mysqli_query($conexion,"select concat (NombresDocente, ' ', ApellidosDocente) as Docente from docentes where idDocente = $codigo"); 
            while($filas2=mysqli_fetch_array($consulta2)){
                $docente=$filas2['Docente'];                           
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

    <title>Laboratorios de informatica-sistemas UMSS</title>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
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
                    <li class="active">Docentes</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->
    
            <!-- Sidebar Column -->
            <?php

 ?>
            <!-- Content Column -->
            <div class="col-md-9">
                <h3>Docente conectado : <b style="color:green;"><?php echo $user; ?></b></h3>
                <p>En esta seccion del sistema usted podra administrar los alumnos que le fueron asignados en la direccion o por el administrador. Usted podra enviar tareas a sus alumnos asi como talbien evaluar dichas tareas, ver reportes, entregar material de estudio, entre otras cosas.</p>

                  
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


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
               <img class="img-responsive img-circle" src="<?php echo $foto ?>" width="50px" height="50px">
              <h5><i class="fa fa-circle fa-stack-1x fa-inverse" style="color:green; text-align: left; "></i><b> &nbsp; Online:</b> <?php echo $estudiante ?>

              </h5>
               </div>

            </div>

           
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column -->
            <?php
include ('menu_estudiante.php');
 ?>
            <!-- Content Column -->
            <div class="col-md-9" >
                <h3>Bienvenido  : <b style="color:green;"><?php echo $estudiante; ?></b></h3>
                <p>En esta seccion puedes enviar tu carta.</p>


                <br>
         
           
               
      <div class="panel" style="background-color: rgba(255, 155, 10, .4);">
            
                  <form id="formulario" class="form-group" action="entrega_tareas/recibirSubida.php" method="post" enctype="multipart/form-data">
            <div class="modal-body" style="background-color: rgba(255, 155, 10, .3);">

              <div class="form-group"> <label for="carta" class="col-md-3 control-label">tu carta:</label>
              <p></p>                 <br>
                <div class="col-md-9">
                <textarea class="form-control rounded-0" id="carta" name="carta" required maxlength="1000" required="true"  rows="10" ></textarea>
                </div>
         </div> <br>


        
         

               
         
               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Archivo:</label>
        <div class="col-md-9"><input type="file" class="form-control" id="archivo" name="archivo" required="true"></div>
         </div> <br> 

<br>
               
               <center><input type="submit" value="Entregar Carta" name="subir" class="btn btn-success" id="reg"/></center>    
          
             </div> 
             <div id="mensaje"> </div>        


            </form>
                      
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

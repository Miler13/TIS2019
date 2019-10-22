<?php
include '../admin/conexion.php';
session_start();
if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 4) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION['Codigo'];
        ?>
           <?php 
                  $consulta1="select IdArea, NombreArea from areas";
                  $Area=mysqli_query($conexion,$consulta1);                    
                
    
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
     <link rel="shortcut icon" href="../imagenes/favicon.ico" type="image/x-icon">
    <link href="../admin/css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  

  
</head>
<body>
           <?php
        include ('menu_inicio_editor.php');
            ?>
       <br>
          <div class="container">
            <div class="row">
            <div class="col-lg-12">
            
             <div class="col-md-6">         
               
                
                     
             </div>
               <div class="col-md-3">
            
               </div> 

            </div>

             <div class="col-lg-12">              
                <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="editor.php">Editor</a></li>
                     <li><a href="entrega_boletin.php">Entrega Boletin</a></li>
                    <li class="active">Subir boletin</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <div class="row">
            <!-- Content Column -->
              <?php
    include('menu_editor.php');
 ?>

    <div class="col-md-9">
                <div class="containe">
      <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="btn-group pull-right">
                </div>
                <center><h4><b>Nueva Entrega de boletin</b></h4></center>
            </div>
                    <div class="panel-body">
                        <div class="row">
                            <div style="margin: 10px;">
                  <form id="formulario" class="form-group" action="entrega_boletin/recibirSubida.php" method="post" enctype="multipart/form-data">
            <div class="modal-body">

              <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Descripcion:</label>
                <div class="col-md-9">
                <textarea class="form-control" id="descripcion" name="descripcion" required maxlength="200" required="true"></textarea>
                </div>
         </div> <br>

          <div class="form-group"> <label for="carrera" class="col-md-3 control-label">Titulo:</label>
             <div class="col-md-9"><input type="text" class="form-control" id="titulo" name="titulo" required="true" maxlength="50"></div>
                    </div> <br>

               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Area:</label>
                    <div class="col-md-9">
                       <select class="form-control" id="area" name="area">
                     <?php 
                          while($fila=mysqli_fetch_row($Area)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
                       </div>
         </div> <br>  
         
               <div class="form-group"> <label for="carnet" class="col-md-3 control-label">Archivo:</label>
        <div class="col-md-9"><input type="file" class="form-control" id="archivo" name="archivo" required="true"></div>
         </div> <br> 

<br>
               
               <center><input type="submit" value="Entregar Tarea" name="subir" class="btn btn-success" id="reg"/></center>    
          
             </div> 
             <div id="mensaje"> </div>        


            </form>
                       <a href="entrega_boletin.php"> <button class="btn btn-primary"><i class="fa fa-arrow-left"></i> Volver al Listado</button> </a>        

                            </div>
                        </div>
                         <!-- Fin del Row -->       
                    </div>
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

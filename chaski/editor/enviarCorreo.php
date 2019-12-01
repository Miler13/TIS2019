
<?php
session_start();
include '../admin/conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 4) {
            $user = $_SESSION['NombreUsuario'];
            $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from especialistas where idEspecialista = $codigo");
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];
                 }

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
             
               </div>

            </div>


            <div class="col-lg-12">
                    <ol class="breadcrumb">
                    <li><a href="../index.php">Inicio</a></li>
                    <li><a href="editor.php">Editor</a></li>
                    <li class="active">Enviar Correo</li>
                </ol>
            </div>
        <!-- /.row -->

        <!-- Content Row -->

            <!-- Sidebar Column  
            <?php
///include ('menu_especialista.php');
 ?>
            
            -->

      

           <!-- Content Column -->
           
      <div class="row">
            <div class="col-md-8">
                <h3>Envianos un Mensaje</h3>
                <form action="validar_mensaje.php" method="post" >
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Nombre Remitente:</label>
                            <input type="text" class="form-control" name="nombre" required="true" value = "<?php echo $user ?>" readonly="readonly">
                            <p class="help-block"></p>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Area:</label>
                            

                            
                            <select id = "idArea" class = "form-control" name = "idArea" required = "required">
								<option value = "">Selecciona un Area</option>
								<?php
									$sql = $conexion->prepare("SELECT * FROM areas");
									if($sql->execute()){
										$g_result = $sql->get_result();
									}
									while($row = $g_result->fetch_array()){
								?>
									<option value = "<?php echo $row['idArea']?>"><?php echo utf8_encode($row['NombreArea'])?></option>
								<?php
										}
									$conexion->close();	
								?>
							</select>

                       </div>
                    </div>
                    <div class = "form-group">
							<label>correos:</label>
							<select  id = "correos" name = "correos"  class = "form-control" disabled = "disabled" required = "required">
								<option value = "">Selecciona un correo</option>
							</select>
						</div>
                        </div>
                    </div>
                    <div class="control-group form-group">
                        <div class="controls">
                            <label>Mensaje:</label>
                            <textarea rows="8" cols="100" class="form-control" name="mensaje" style="resize:none"></textarea>
                        </div>
                        </div>
                        <div class="control-group form-group"> <label for="carnet" class="col-md-3 control-label">Archivo:</label>
        <div class="col-md-13"><input type="file" class="form-control" id="foto" name="foto" ></div>
         </div> 

         <br>
                    </div>
                    <div id="success"></div>
                    <!-- For success/fail messages -->
                    <button type="submit" class="btn btn-primary">Enviar Mensaje</button>
                </form>
            </div>

        </div>

        

   

  
<script src = "js/jquery-3.1.1.js"></script>
<script type = "text/javascript">
	$(document).ready(function(){
		$('#idArea').on('change', function(){
				if($('#idArea').val() == ""){
					$('#correos').empty();
					$('<option value = "">Selecciona un correo</option>').appendTo('#correos');
					$('#correos').attr('disabled', 'disabled');
				}else{
					$('#correos').removeAttr('disabled', 'disabled');
					$('#correos').load('datos_get.php?idArea=' + $('#idArea').val());
				}
		});
	});
</script>


   
  
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

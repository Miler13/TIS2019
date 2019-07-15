<?php
session_start();
include 'conexion.php';

if(isset($_SESSION['NombreUsuario'])) {
     if ($_SESSION["NivelUsuario"] == 1) {
            $user = $_SESSION['NombreUsuario'];
              $codigo = $_SESSION["Codigo"];

              $consulta=mysqli_query($conexion,"select Foto from usuarios where Codigo = $codigo");                  
                while($filas=mysqli_fetch_array($consulta)){
                         $foto=$filas['Foto'];                           
                 }
        ?>
		<?php 
          $consulta1="select IdCarrera, NombreCarrera from carreras";
          $carrera=mysqli_query($conexion,$consulta1);
           $consulta2="select idGrupo, NumeroGrupo from grupos";
          $grupos=mysqli_query($conexion,$consulta2);
           $consulta3="select idSemestre, NombreSemestre from semestres ";
          $semestre=mysqli_query($conexion,$consulta3);
		  $consulta5="select idAsignatura, NombreAsignatura from asignaturas ";
		  $materia=mysqli_query($conexion,$consulta5);
		  $consulta4="select idGrupo, NombreGrupo from grupos ";
		  $grupo=mysqli_query($conexion,$consulta4);		  
		  $consulta6="select idSemestre, NombreSemestre from semestres ";
		  $semestres2=mysqli_query($conexion,$consulta6);
		  
         ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sistema de Laboratorios de informatica-sistemas UMSS </title>
    <link rel="shortcut icon" href="../imagenes/logoUNI.ico" type="image/x-icon">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../css/estilo.css" rel="stylesheet">
    <link href="../css/modern-business.css" rel="stylesheet">
    <link href="../font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="../js/jquery.js"></script>
    <script src="js/back-to-top.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="horarios/myjava.js"></script>

    <link href="css/sweetalert.css" rel="stylesheet">
    <script src="js/functions.js"></script>
    <script src="js/sweetalert.min.js"></script>
    <script src="validar.js"></script>

	<script type="text/javascript">
        function validarGestion(elemento) {

            var texto = document.getElementById(elemento.id).value;
			var integer = parseInt(text, 10);

			if(integer < 2000 && integer > 2050){
				document.getElementById("resultado").innerHTML = "gestion invalida";
			} else {
                document.getElementById("resultado").innerHTML = "";
            }
        }
	</script>

</head>
<body>
           <?php
        include ('menuAdmin.php');
            ?>
       <br>
        <div class="container">
            <div class="row">
            <div class="col-lg-12">
            <div class="col-md-3"><img src="../imagenes/logoSiad.png" width="80" height="80" class="img-responsive"></div>
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
                    <li><a href="admin.php">Administrador</a></li>
                    <li class="active">Horarios</li>
                </ol>
            </div>
        </div> 
        <!-- /.row -->
        <!-- Content Row -->
<?php //include('otros/menuAdministrador.php') ?>
        <div class="row">
            <!-- Content Column -->
            <div class="col-md-9">
                <div class="container">
      <div class="panel panel-success">
        <div class="panel-heading">
            <div class="btn-group pull-right">
            </div>
            <center><h4><b>Administracion de Horarios</b></h4></center>
        </div>
        <div class="panel-body">
            <div class="row">
		               <div class="col-md-1"><h4>Buscar:</h4></div>
		               <div class="col-md-5">
		               <input type="text" name="s" id="bs-prod" class="form-control" placeholder="Escribir el nombre del horario">
		               </div>
					   <br>
					   <br>
					   <div class="col-md-1"><h4>Gestion:</h4></div>
		               <div class="col-md-5">
		               <select class="form-control" id="semestre" name="semestre" onselect="pagination()">
						<?php 
                          while($fila=mysqli_fetch_row($semestre)){
                          echo "<option value='".$fila['0']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
		               </div>
					   <div class="col-md-6">
		                  <button id="nuevo-producto" class="btn btn-success"> <i class="glyphicon glyphicon-plus"></i> Reservar horario</button> 
		               </div>
	              <br>
 <br>
    <div class="registros" style="width:100%;" id="agrega-registros"></div>
      <div class="col-md-6" style="text-align: left;">
		    <center>
		        <ul class="pagination" id="pagination"></ul>
		    </center>
      </div>
      <div class="col-md-6">
		   <center>
		   <h4 style="font-weight: bold;"> 
        </h4>
          </center>
      </div>
	  <br>
  
    <!-- MODAL PARA EL REGISTRO-->
    <div class="modal fade" id="registra-datos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header" style="background:#337ab7; text-align: center;">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title" style="color:white;" id="myModalLabel"><b>
              <i class='glyphicon glyphicon-th'></i>&nbsp;&nbsp;Semestre</b></h4>
            </div>
            <form id="formulario" class="form-group" onsubmit="return agregarRegistro();">
            <div class="modal-body">

            <input type="text" class="form-control" required readonly id="id-registro" name="id-registro" readonly="readonly" style="visibility:hidden; height:5px;"/>

                 <div class="form-group"> <label for="codigo" class="col-md-2 control-label">Proceso:</label>
				<div class="col-md-10"><input type="text" class="form-control" required readonly id="pro" name="pro" hidden="true" /></div>
			   </div> <br>
			   <div class="form-group"> <label for="estado" class="col-md-2 control-label">Dia:</label>
				 <div class="col-md-10">
                   <select class="form-control" id="dia" name="dia" required="">
					            <option value="1" selected="">lunes</option>
								<option value="2">martes</option>
								<option value="3">miercoles</option>
					            <option value="4">jueves</option>
								<option value="3">viernes</option>
					            <option value="4">sabado</option>
				  </select>
				 </div>
			   </div>
			   <br>
               <div class="form-group"> <label for="semestre2" class="col-md-2 control-label">Semestre:</label>
				<div class="col-md-10">
		               <select class="form-control" id="semestre2" name="semestre2">
						<?php 
                          while($fila=mysqli_fetch_row($semestres2)){
                          echo "<option value='".$fila['1']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
		               </div><br>
					   <br>
			   <div class="form-group"> <label for="hora" class="col-md-2 control-label">Hora:</label>
				<div class="col-md-10">
                   <select class="form-control" id="hora" name="hora" required="">
					            <option value="6:45-8:15" selected="">6:45-8:15</option>
								<option value="8:15-9:45">8:15-9:45</option>
								<option value="9:45-11:15">9:45-11:15</option>
					            <option value="11:15-12:45">11:15-12:45</option>
								<option value="12:45-14:15">12:45-14:15</option>
					            <option value="14:15-15:45">14:15-15:45</option>
								<option value="15:45-17:15">15:45-17:15</option>
								<option value="17:15-18:45">17:15-18:45</option>
					            <option value="18:45-20:15">18:45-20:15</option>
								<option value="20:15-21:45">20:15-21:45</option>
				  </select>
				 </div>
			   </div>
			   <br>
			   <div class="form-group"><label for="materia" class="col-md-2 control-label">Materia:</label>
		               <div class="col-md-10">
		               <select class="form-control" id="materia" name="materia">
						<?php 
                          while($fila=mysqli_fetch_row($materia)){
                          echo "<option value='".$fila['1']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
		               </div><br>
					   <br>
			   <div class="form-group"><label for="grupo" class="col-md-2 control-label">Grupo:</label>
		               <div class="col-md-10">
		               <select class="form-control" id="grupo" name="grupo">
						<?php 
                          while($fila=mysqli_fetch_row($grupo)){
                          echo "<option value='".$fila['1']."'>".$fila['1']."</option>";
                          }
                          ?>
                      </select>
		               </div><br>
					   <br>
					   <div class="form-group"><label for="grupo" class="col-md-2 control-label">Laboratorio:</label>
					   <div class="col-md-10">
						<select class="form-control" id="semestre" name="semestre" required="">
					            <option value="1" selected="">Laboratorio 1</option>
								<option value="2">Laboratorio 2</option>
								<option value="3">Laboratorio 3</option>
					            <option value="4">Laboratorio 4</option>
						</select>
					   </div>
					   <br>
                 <div id="mensaje"></div>           
             </div>         
            <div class="modal-footer">
                <input type="submit" value="Registrar" class="btn btn-success" id="reg"/>
                <input type="submit" value="Editar" class="btn btn-warning"  id="edi"/>
            </div>
            </form>
          </div>
        </div>
      </div>
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

<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];

$nombre = $_POST['nombre'];

$cedula = $_POST['cedula'];

$estado = $_POST['estado'];

$foto = "images/fotos_perfil/perfil.jpg";

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO Ninos (EdadNino, NombresNino, CedulaNino, Estado, Idgrupo, Foto) VALUES('10','$nombre','$cedula','$estado', '1', '$foto')");

          $consulta=mysqli_query($conexion,"SELECT idNino from Ninos where EdadNino = '10' ");              
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_Nino=$filas['idNino'];                           
                 }
     mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES('$nombre','$cedula','3','$codigo_Nino', '$foto')");
	
  break;

	case 'Edicion': mysqli_query($conexion,"UPDATE Ninos SET EdadNino = '10', NombresNino = '$nombre', CedulaNino = '$cedula', Estado = '$estado' , Idgrupo = '1' where idNino = '$id'");

  mysqli_query($conexion,"UPDATE usuarios SET NombreUsuario = '$nombre', PassUsuario = '$cedula' where Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM Ninos ORDER BY idNino ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                        <th width="10%">Edad</th>
                         <th width="10%">Nick</th>
                        
                         <th width="10%">Pass</th>
                                 
                        <th width="10%">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
				         <td>'.$registro2['EdadNino'].'</td>
                  <td>'.$registro2['NombresNino'].'</td>
                
                  <td>'.$registro2['CedulaNino'].'</td>
                  
                  <td> 
                  <a href="javascript:eliminarRegistro('.$registro2['idNino'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>
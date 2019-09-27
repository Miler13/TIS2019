<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM areas WHERE idArea = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion,"SELECT * FROM areas ORDER BY idArea ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                        <th width="80%">Nombre del Area</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                  <td>'.$registro2['NombreArea'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idArea'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idArea'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
			         	</tr>';
	}
echo '</table>';
?>
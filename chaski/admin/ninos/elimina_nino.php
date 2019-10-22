<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM ninos WHERE idNino = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion,"SELECT * FROM Ninos ORDER BY idNino ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
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
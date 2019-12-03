<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM pclave WHERE idpClave = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion,"SELECT  pclave.palabraClave as pa, pclave.idpClave as id, areas.NombreArea as area FROM pclave 
INNER JOIN areas ON  pclave.areas_idArea =  areas.idArea
  ORDER BY pclave.idpClave ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">Palabras</th>  
                        <th width="20%">Area</th> 
                           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
    		        echo '<tr>
		                      <td>'.$registro2['pa'].'</td>
                          <td>'.$registro2['Area'].'</td>
                         
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
  }
  echo '</table>';

?>


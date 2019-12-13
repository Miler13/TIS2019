<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM editor WHERE idEditor = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}


$registro = mysqli_query($conexion,"SELECT * FROM editor ORDER BY idEditor ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">Nombres</th>
                         <th width="20%">Apellidos</th>
                         <th width="25%">Cedula</th>
                         <th width="20%">Correo</th>
                                
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     <td>'.$registro2['NombresEditor'].'</td>
                                <td>'.$registro2['ApellidosEditor'].'</td>
                                <td>'.$registro2['CedulaEditor'].'</td>
                                 <td>'.$registro2['CorreoEditor'].'</td>
                           
                               <td> <a href="javascript:editarRegistro('.$registro2['idEditor'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idEditor'].');">
                              <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                        </td>
			         	</tr>';
	}
echo '</table>';
?>
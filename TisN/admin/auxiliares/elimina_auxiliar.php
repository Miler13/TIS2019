<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM auxiliares WHERE idAuxiliar = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}


$registro = mysqli_query($conexion,"SELECT * FROM auxiliares ORDER BY idAuxiliar ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="15%">Password</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Cedula</th>
                         <th width="20%">Direccion</th>
                         <th width="5%">Estado</th>            
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     <td>'.$registro2['NombresAuxiliar'].'</td>
                                <td>'.$registro2['ApellidosAuxiliar'].'</td>
                                <td>'.$registro2['PasswordAuxiliar'].'</td>
                                 <td>'.$registro2['CorreoAuxiliar'].'</td>
                                <td>'.$registro2['CelularAuxiliar'].'</td>
                                <td>'.$registro2['CedulaAuxiliar'].'</td>
                                <td>'.$registro2['DireccionAuxiliar'].'</td>
                                <td>'.$registro2['Estado'].'</td>
                               <td> <a href="javascript:editarRegistro('.$registro2['idAuxiliar'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['idAuxiliar'].');">
                              <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                        </td>
			         	</tr>';
	}
echo '</table>';
?>
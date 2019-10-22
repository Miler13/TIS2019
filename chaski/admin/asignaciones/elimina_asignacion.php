<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM asignaciones WHERE idAsignacion = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion,"SELECT asignaciones.idAsignacion AS id, asignaciones.Descripcion AS Asignacion,
concat(Especialistas.NombresEspecialista,' ',Especialistas.ApellidosEspecialista) as Especialista, subareas.NombreSubArea AS SubArea,
 grupos.NumeroGrupo AS Grupo, asignaciones.Estado AS Estado, asignaciones.NumeroAsignacion AS NumeroA FROM asignaciones 
INNER JOIN Especialistas ON asignaciones.idEspecialista = Especialistas.idEspecialista 
INNER JOIN subareas ON asignaciones.idSubArea = subareas.idSubArea 
INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo ORDER BY asignaciones.idAsignacion ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                          <th width="10%">Descripcion</th>  
                        <th width="15%">Especialista</th> 
                        <th width="15%">SubArea</th>
                      
                        <th width="10%">Estado</th>
                        
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                       <td>'.$registro2['Asignacion'].'</td>
                          <td>'.$registro2['Especialista'].'</td>
                          <td>'.$registro2['SubArea'].'</td>
                          
                          
                           <td>'.$registro2['Estado'].'</td>
                         
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
	}
echo '</table>';
?>
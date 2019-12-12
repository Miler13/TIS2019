<?php
include('../conexion.php');

$id = $_POST['id'];

if (!mysqli_query($conexion,"DELETE FROM subareas WHERE idsubarea = '$id'")) {
  echo '<script> alert("Este registro no se puede borrar porque esta siendo utilizado por el sistema.");</script>';
}

$registro = mysqli_query($conexion,"SELECT subareas.idsubarea as id, subareas.Nombresubarea as subarea, areas.NombreArea as area, grupos.NumeroGrupo as grupo FROM subareas 
                                 INNER JOIN areas ON  subareas.IdArea =  areas.idArea 

                                
                                 
                                 INNER JOIN grupos ON  subareas.IdGrupo =  grupos.idGrupo
  ORDER BY subareas.idsubarea ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                         <th width="20%">subArea</th>  
                        <th width="20%">Area</th> 
                           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
    		        echo '<tr>
		                      <td>'.$registro2['subarea'].'</td>
                          <td>'.$registro2['area'].'</td>
                         
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
			         	</tr>';
  }
  echo '</table>';

?>


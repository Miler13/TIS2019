<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT subareas.idsubarea as id, subareas.Nombresubarea as subarea, areas.Nombrearea as Area, grupos.NumeroGrupo as grupo FROM subareas 
                                 INNER JOIN Areas ON  subareas.IdArea =  Areas.idArea 

                                 
                                 
                                 INNER JOIN grupos ON  subareas.IdGrupo =  grupos.idGrupo
 
  WHERE subareas.Nombresubarea LIKE '%$dato%' ORDER BY subareas.idsubarea ASC"      );
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="30%">SubArea</th>  
                        <th width="30%">Area</th> 
                            
                        <th width="20%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                               <td>'.$registro2['subarea'].'</td>
                          <td>'.$registro2['Area'].'</td>
                        
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
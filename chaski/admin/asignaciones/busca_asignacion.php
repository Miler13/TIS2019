<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT  asignaciones.idAsignacion AS id, asignaciones.Descripcion AS asignacion,concat(especialistas.NombresEspecialista,' ',especialistas.ApellidosEspecialista) as especialista, 
             subareas.NombreSubArea AS subArea, grupos.NumeroGrupo AS Grupo,  asignaciones.Estado AS Estado, asignaciones.NumeroAsignacion AS NumeroA
FROM       asignaciones INNER JOIN especialistas ON asignaciones.idEspecialista = especialistas.idEspecialista 
                        INNER JOIN subareas ON asignaciones.idSubArea = subareas.idSubArea 
            INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
         
  WHERE asignaciones.Descripcion LIKE '%$dato%' ORDER BY asignaciones.idAsignacion ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                        <th width="10%">Descripcion</th>  
                        <th width="15%">Especialista</th> 
                        <th width="15%">SubArea</th>
                        <th width="7%">Grupo</th>
                                
                        
                        <th width="10%">Estado</th>
                      
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          <td>'.$registro2['asignacion'].'</td>
		                      <td>'.$registro2['especialista'].'</td>
		                      <td>'.$registro2['subArea'].'</td>
		                      <td>'.$registro2['Grupo'].'</td>
		                     
                          
                           <td>'.$registro2['Estado'].'</td>
                        
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

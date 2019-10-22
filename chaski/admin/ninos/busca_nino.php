<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT * FROM Ninos WHERE NombresNino LIKE '%$dato%' ORDER BY idNino ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                       <th width="10%">Edad</th>
                         <th width="10%">Nick</th>
                        
                         <th width="10%">Pass</th>
                                 
                        <th width="10%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
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
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>

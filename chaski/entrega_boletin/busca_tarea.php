<?php
include('../admin/conexion.php');
session_start();

$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT boletin.idBoletin as id, areas.NombreArea as Area, boletin.Descripcion as Descripcion, boletin.Archivo as Archivo FROM boletin JOIN areas                     
WHERE boletin.areas_idArea=areas.idArea LIKE '%$dato%' ORDER BY boletin.areas_idArea ASC");

       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                      
              <th width="15%">Codigo boletin</th> 
              <th width="15%">Area</th>
              <th width="20%">Descripcion</th>
              
                           
              <th width="15%">Opciones</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                          
                  <td>'.$registro2['id'].'</td>
                  <td>'.$registro2['Area'].'</td>
                  <td>'.$registro2['Descripcion'].'</td>
                 
                                 
                                
                  <td> <a href="editor/boletin/pdf/archivos/'.$registro2['Archivo'].'"> <img src="editor/images/verArchivo.png" width="25" height="25" alt="ver" title="Ver Archivo" /></a>
                           
                       </tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="6">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>

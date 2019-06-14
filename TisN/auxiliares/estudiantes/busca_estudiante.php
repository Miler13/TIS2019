<?php
include('../conexion.php');
$dato = $_POST['dato'];

$registro = mysqli_query($conexion,"SELECT * FROM estudiantes WHERE NombresEstudiante LIKE '%$dato%' ORDER BY idEstudiante ASC");
       echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	<tr>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
						 <th width="10%">Asistencia</th>
            </tr>';
      if(mysqli_num_rows($registro)>0){
	     while($registro2 = mysqli_fetch_array($registro)){
		      echo '<tr>
                  <td>'.$registro2['NombresEstudiante'].'</td>
                  <td>'.$registro2['ApellidosEstudiante'].'</td>
				  <td><input type="checkbox" name="valor1"></td>
			        	</tr>';
      	}
      }else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
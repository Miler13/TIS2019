<?php
include('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
$id = $_POST['id'];

mysqli_query($conexion,"DELETE FROM materialaux WHERE idMaterialaux = '$id'");

$registro = mysqli_query($conexion,"SELECT  material_aux.idMaterialaux AS id, material_aux.idAuxiliar as idAuxiliar, material_aux.Descripcion AS Descripcion, material_aux.Archivo as Archivo, material_aux.CodigoMaterial as Codigo, material_aux.Fecha_Subida as Fecha, numeros_asignacionaux.numeroAsignado as Numero
FROM material_aux INNER JOIN numeros_asignacionaux ON material_aux.idNumeroAsignacionaux = numeros_asignacionaux.idNumeroAsignacionaux
where material_aux.idAuxiliar = '$codigo' ORDER BY material_aux.idMaterialaux ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
        	          <tr>
                   
                        <th width="15%">Descripcion</th> 
                        <th width="15%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		        echo '<tr>
		                     
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="material_aux/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>                                        
                             </td>
			         	</tr>';
	}
echo '</table>';
?>
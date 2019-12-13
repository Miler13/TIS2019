<?php
include '../admin/conexion.php'; 

	$idArea=intval($_REQUEST['idArea']);
	$municipios = "
    SELECT CorreoEspecialista FROM asignaciones, especialistas,subareas, areas 
    WHERE asignaciones.idEspecialista =especialistas.idEspecialista and subareas.idSubArea=asignaciones.idSubArea and subareas.IdArea='$idArea' GROUP By especialistas.CorreoEspecialista
    ";
		echo '<option value = "">Selecciona un correo  </option>';
		$a_result =mysqli_query($conexion,$municipios);
	
		while($row = mysqli_fetch_row($a_result))
		{
			echo '<option value = "'.$row['0'].'">'.utf8_encode( $row['0']).'</option>';
		}






?>
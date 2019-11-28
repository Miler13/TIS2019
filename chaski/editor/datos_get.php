
<?php
include '../admin/conexion.php'; 

	$idArea=intval($_REQUEST['idArea']);
	$municipios = $conexion->prepare("
    SELECT * FROM asignaciones, especialistas,subareas, areas 
    WHERE asignaciones.idEspecialista =especialistas.idEspecialista and subareas.idSubArea=asignaciones.idSubArea and subareas.IdArea='$idArea' GROUP By especialistas.CorreoEspecialista
    ") or die(mysqli_error());
		echo '<option value = "">Selecciona un municipio  </option>';
	if($municipios->execute()){
		$a_result = $municipios->get_result();
	}
		while($row = $a_result->fetch_array()){
			echo '<option value = "'.$row['CorreoEspecialista'].'">'.utf8_encode( $row['CorreoEspecialista']).'</option>';
		}
?>
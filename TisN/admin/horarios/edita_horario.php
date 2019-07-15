<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM horarios3 WHERE idHorario = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['idHorario'],
				1 => $valores2['dia'], 
			    2 => $valores2['hora'],
				3 => $valores2['grupo'],
				4 => $valores2['grupo'], 
				5 => $valores2['semestre'],
				6 => $valores2['grupo'],
				); 
echo json_encode($datos);
?>
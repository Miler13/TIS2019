<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM asignaciones WHERE idAsignacion = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['Descripcion'], 
				1 => $valores2['idEspecialista'], 
		        2 => $valores2['idSubArea'], 
		        3 => $valores2['idGrupo'], 
		        
		        4 => $valores2['Estado'],
		        5 => $valores2['NumeroAsignacion'],
				); 

echo json_encode($datos);
?>
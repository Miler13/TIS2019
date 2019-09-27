<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM Especialistas WHERE idEspecialista = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				 
				0 => $valores2['NombresEspecialista'], 
			    1 => $valores2['ApellidosEspecialista'], 
				2 => $valores2['CedulaEspecialista'], 
				3 => $valores2['CorreoEspecialista'], 
				4 => $valores2['CelularEspecialista'], 
			    5 => $valores2['TelefonoEspecialista'], 
				6 => $valores2['DireccionEspecialista'],
				7 => $valores2['Estado'],
				); 
echo json_encode($datos);
?>
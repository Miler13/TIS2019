<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM editor WHERE idEditor = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				 
				0 => $valores2['NombresEditor'], 
			    1 => $valores2['ApellidosEditor'], 
				2 => $valores2['CedulaEditor'], 
				3 => $valores2['CorreoEditor'], 
				4 => $valores2['CelularEditor'], 
			    5 => $valores2['TelefonoEditor'], 
				6 => $valores2['DireccionEditor'],
				
				); 
echo json_encode($datos);
?>
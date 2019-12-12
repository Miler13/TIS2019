<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM ninos WHERE idNino = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				0 => $valores2['EdadNino'], 
				1 => $valores2['NombresNino'], 
			   	2 => $valores2['CedulaNino'], 
				3 => $valores2['Estado'],
				
				); 
echo json_encode($datos);
?>
<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM auxilares WHERE idAuxiliar = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				 
				0 => $valores2['NombresAuxiliar'], 
			    1 => $valores2['ApellidosAuxiliar'], 
				2 => $valores2['PasswordAuxiliar'], 
				3 => $valores2['CorreoAuxiliar'], 
				4 => $valores2['CelularAuxiliar'], 
			    5 => $valores2['CedulaAuxiliar'], 
				6 => $valores2['DireccionAuxiliar'],
				7 => $valores2['Estado'],
				); 
echo json_encode($datos);
?>
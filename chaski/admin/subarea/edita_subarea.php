<?php
include('../conexion.php');
$id = $_POST['id'];
$valores = mysqli_query($conexion,"SELECT * FROM subareas WHERE idsubarea = '$id'");
$valores2 = mysqli_fetch_array($valores);
$datos = array(
				 0 => $valores2['Nombresubarea'], 
				 1 => $valores2['IdArea'], 
				 2 => $valores2['IdGrupo'], 
                
				); 
				
echo json_encode($datos);
?>
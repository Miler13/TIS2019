<?php
	
	$mysqli=new mysqli('localhost', 'stadust', 'N3^B<gv9(=~WLv;', 'stadust_db'); //servidor, usuario de base de datos, contraseña del usuario, nombre de base de datos
	
	if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>
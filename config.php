<?php
   define('DB_SERVER', 'localhost');
   define('DB_USERNAME', 'stadust');
   define('DB_PASSWORD', 'N3^B<gv9(=~WLv;');
   define('DB_DATABASE', 'stadust_db');
   $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);

   if(mysqli_connect_errno()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
	
?>
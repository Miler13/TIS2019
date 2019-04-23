<?php

 $host_db = "localhost";
 $user_db = "stadust";
 $pass_db = 'N3^B<gv9(=~WLv;';
 $db_name = 'stadust_db';
 $tbl_name = "materia";
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


 $buscarMateria = "SELECT * FROM $tbl_name  WHERE IdMateria = '$_POST[codigo]' ";
 
 $result = $conexion->query($buscarMateria);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". "lamateria ya a sido ya  fue registrado." . "<br />";

 echo "<a href='registroMateria.html'>Por favor escoga otro Nombre</a>";
 }
 else{

 

 $query = "INSERT INTO materia (IdMateria, nombre)
           VALUES ('$_POST[codigo]', '$_POST[nombre]')";

 if ($conexion->query($query) === TRUE) {
 
 echo "<br />" . "<h2>" . "Materia Creado Exitosamente!" . "</h2>";

 echo "<h5>" . "Hacer Login: " . "<a href='registroMateria.html'>volver</a>" . "</h5>"; 
 }

 else {
 echo "Error al crear la Materia." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
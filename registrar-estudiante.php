<?php

 $host_db = "localhost";
 $user_db = "root";
 $pass_db = '';
 $db_name = 'mydb';
 $tbl_name = "user";
 $tbl_name1 = "estudiante";
 
 
 $conexion = new mysqli($host_db, $user_db, $pass_db, $db_name);

 if ($conexion->connect_error) {
 die("La conexion falló: " . $conexion->connect_error);
}


 $buscarestudiante = "SELECT * FROM $tbl_name1  WHERE user_CodSIS = '$_POST[sis]' ";
 
 $result = $conexion->query($buscarestudiante);

 $count = mysqli_num_rows($result);

 if ($count == 1) {
 echo "<br />". " ya  fue registrado." . "<br />";

 echo "<a href='registroEstudiante.html'>Por favor escoga otro Estudiante</a>";
 }
 else{

 

 $query2 = "INSERT INTO estudiante (user_CodSIS, passwordES)
           VALUES ('$_POST[sis]', '$_POST[clave2]')";
 $query = "INSERT INTO user (CodSIS,Nombre,	email,	Apellido,	Telefono)
           VALUES ('$_POST[sis]', '$_POST[nombre]','$_POST[correo]','$_POST[apellido]',NULL)";

 if ($conexion->query($query) === TRUE) {
 if ($conexion->query($query2) === TRUE) {
 echo "<br />" . "<h2>" . "El usuario Creado Exitosamente!" . "</h2>";

 echo "<h5>" . "Hacer Login: " . "<a href='registroEstudiante.html'>volver</a>" . "</h5>"; 
 }
 }
 else {
 echo "Error al crear la Materia." . $query . "<br>" . $conexion->error; 
   }
 }
 mysqli_close($conexion);
?>
<?php
// llamar a los campos
$nombre = $_POST["nombre"];
$apellido = $_POST["apellido"];
$sis = $_POST["sis"];
$correo = $_POST["correo"];
$password = $_POST["password"];
$mensaje = $_POST["mensaje"];
// datos para el correo
$destinatario=$correo;
$asunto ="Usted acaba de registrarse en el sistema de laboratorio";
$contenido="Usted acaba de registrarse como: \n";
$contenido .="Nombre: $nombre \n";
$contenido .="Apellido: $apellido \n";
$contenido .="CodigoSIS: $sis \n";
$contenido .="Correo: $correo \n";
$contenido .="Contraseña: $password \n";

// enviando mensaje
mail($destinatario,$asunto,$contenido);
header("location:mensaje_de_envio.html")


?>

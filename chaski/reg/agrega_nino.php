
<?php
include '../admin/conexion.php';

$id = '1' ;
$proceso = 'Registro';

$nombre = $_POST['strImagen'];

$edad = $_POST['edad'];

$estado = '1' ;

$foto = "images/fotos_perfil/perfil.jpg";

$_REQUEST=$nombre;
   
if(in_array('0',$_REQUEST)){
   $nick="leon".$edad;
   $foto="images/leon.png";
 }
 if(in_array('1',$_REQUEST)){
   $nick="mono".$edad;
   $foto="images/mono.png";
 }
 if(in_array('2',$_REQUEST)){
   $nick="leona".$edad;
   $foto="images/leona.png";
 }
 if(in_array('3',$_REQUEST)){
   $nick="elefante".$edad;
   $foto="images/elefante.png";
 }
 if(in_array('4',$_REQUEST)){
   $nick="perico".$edad;
   $foto="images/perico.png";
 }
 if(in_array('5',$_REQUEST)){
   $nick="oso".$edad;
   $foto="images/oso.png";
 }
 

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO Ninos (EdadNino, NombresNino, CedulaNino, Estado, Foto)  VALUES('$edad','$nick','$edad', '1', '$foto')");

          $consulta=mysqli_query($conexion,"SELECT idNino from Ninos where NombresNino= '$nick'and EdadNino='$edad'");              
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_Nino=$filas['idNino'];                           
                 }
     mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario,Codigo,Foto) VALUES('$nick','$edad','3', '$codigo_Nino', '$foto')");
     $alert ="Exito ya tienes una cuenta  User: ".$nick." Contraseña : ".$edad;
     echo '<script type="text/javascript">alert("'.$alert.'");</script>';
    echo '<script> window.location="../loginNinos.php"; </script>'; 
  break;

	
   }
   
?>
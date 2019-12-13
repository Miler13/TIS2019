
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$estado = $_POST['estado'];
$foto = "images/fotos_perfil/perfil.jpg";

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO especialistas (NombresEspecialista, ApellidosEspecialista, CedulaEspecialista, CorreoEspecialista, CelularEspecialista, TelefonoEspecialista, DireccionEspecialista, Estado, Foto) 
   VALUES('$nombre','$apellido','$cedula','$correo','$celular','$telefono','$direccion','$estado','$foto')");

  $consulta=mysqli_query($conexion,"SELECT idEspecialista from especialistas where CedulaEspecialista = '$cedula' and CorreoEspecialista = '$correo'");
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_Especialista=$filas['idEspecialista'];
                 }
     mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES('$correo','$cedula','2','$codigo_Especialista', '$foto')");

	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE especialistas SET NombresEspecialista = '$nombre', ApellidosEspecialista = '$apellido', CedulaEspecialista = '$cedula', CorreoEspecialista = '$correo', CelularEspecialista = '$celular', TelefonoEspecialista = '$telefono', DireccionEspecialista = '$direccion', Estado = '$estado' where idEspecialista = '$id'");

    mysqli_query($conexion,"UPDATE usuarios SET NombreUsuario = '$correo', PassUsuario = '$cedula' where Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM especialistas ORDER BY idEspecialista ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="15%">Cedula</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Telefono</th>
                         <th width="20%">Direccion</th>
                         <th width="5%">Estado</th>
                        <th width="10%">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                          <td>'.$registro2['NombresEspecialista'].'</td>
                          <td>'.$registro2['ApellidosEspecialista'].'</td>
                          <td>'.$registro2['CedulaEspecialista'].'</td>
                           <td>'.$registro2['CorreoEspecialista'].'</td>
                          <td>'.$registro2['CelularEspecialista'].'</td>
                          <td>'.$registro2['TelefonoEspecialista'].'</td>
                          <td>'.$registro2['DireccionEspecialista'].'</td>
                          <td>'.$registro2['Estado'].'</td>
                   <td> <a href="javascript:editarRegistro('.$registro2['idEspecialista'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idEspecialista'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>

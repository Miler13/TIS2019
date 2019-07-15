
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$celular = $_POST['celular'];
$estado = $_POST['estado'];
$foto = "images/fotos_perfil/perfil.jpg";



switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO auxiliares (NombresAuxiliar, ApellidosAuxiliar, PasswordAuxiliar, CorreoAuxiliar, CelularAuxiliar, CedulaAuxiliar, DireccionAuxiliar, Estado, Foto) VALUES('$nombre','$apellido','$cedula','$correo','$celular','$cedula','none','$estado','$foto')");

  $consulta=mysqli_query($conexion," SELECT idAuxiliar from auxiliares where CedulaAuxiliar = '$cedula' and CorreoAuxiliar = '$correo'");
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigo_auxiliar=$filas['idAuxiliar'];
                 }
                 mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES('$correo','$cedula','4','$codigo_auxiliar', '$foto')");

	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE auxiliares SET NombresAuxiliar = '$nombre', ApellidosAuxiliar = '$apellido', PasswordAuxiliar = '$cedula', CorreoAuxiliar = '$correo', CelularDocente = '$celular', CedulaAuxiliar = '$cedula', DireccionAuxiliar = '$direccion', Estado = '$estado' where idAuxiliar = '$id'");

    mysqli_query($conexion,"UPDATE usuarios SET NombreUsuario = '$correo', PassUsuario = '$cedula' where Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM auxiliares ORDER BY idAuxiliar ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="15%">Password</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Cedula</th>
                         <th width="20%">Direccion</th>
                         <th width="5%">Estado</th>
                        <th width="10%">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                          <td>'.$registro2['NombresAuxiliar'].'</td>
                          <td>'.$registro2['ApellidosAuxiliar'].'</td>
                          <td>'.$registro2['PasswordAuxiliar'].'</td>
                           <td>'.$registro2['CorreoAuxiliar'].'</td>
                          <td>'.$registro2['CelularAuxiliar'].'</td>
                          <td>'.$registro2['CedulaAuxiliar'].'</td>
                          <td>'.$registro2['DireccionAuxiliar'].'</td>
                          <td>'.$registro2['Estado'].'</td>
                   <td> <a href="javascript:editarRegistro('.$registro2['idAuxiliar'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idAuxiliar'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>

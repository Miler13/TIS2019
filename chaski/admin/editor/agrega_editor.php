
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

$foto = "images/fotos_perfil/perfil.jpg";

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO editor (NombresEditor, ApellidosEditor, CedulaEditor, CorreoEditor, CelularEditor, TelefonoEditor, DireccionEditor,  Foto) 
                                                            VALUES('$nombre','$apellido','$cedula','$correo','$celular','$telefono','$direccion','$foto')");

  $consulta=mysqli_query($conexion,"SELECT idEditor from editor where CedulaEditor = '$cedula' and CorreoEditor = '$correo'");
                           while($filas=mysqli_fetch_array($consulta)){
                                 $codigoeditor=$filas['idEditor'];
                               
                 }
     mysqli_query($conexion,"INSERT INTO usuarios (NombreUsuario, PassUsuario, NivelUsuario, Codigo, Foto) VALUES ('$correo','$cedula','4','$codigoeditor', '$foto')");

	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE editor SET NombresEditor = '$nombre', ApellidosEditor = '$apellido', CedulaEditor = '$cedula', CorreoEditor = '$correo', CelularEditor = '$celular', TelefonoEditor = '$telefono', DireccionEditor = '$direccion' where idEditor = '$id'");

    mysqli_query($conexion,"UPDATE usuarios SET NombreUsuario = '$correo', PassUsuario = '$cedula' where Codigo = '$id'");

	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM editor ORDER BY idEditor ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	<tr>
                         <th width="10%">Nombres</th>
                         <th width="10%">Apellidos</th>
                         <th width="15%">Cedula</th>
                         <th width="10%">Correo</th>
                         <th width="10%">Celular</th>
                         <th width="10%">Telefono</th>
                         <th width="20%">Direccion</th>
                         
                        <th width="10%">Opciones</th>
            </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                          <td>'.$registro2['NombresEditor'].'</td>
                          <td>'.$registro2['ApellidosEditor'].'</td>
                          <td>'.$registro2['CedulaEditor'].'</td>
                           <td>'.$registro2['CorreoEditor'].'</td>
                          <td>'.$registro2['CelularEditor'].'</td>
                          <td>'.$registro2['TelefonoEditor'].'</td>
                          <td>'.$registro2['DireccionEditor'].'</td>
                          
                   <td> <a href="javascript:editarRegistro('.$registro2['idEditor'].');">
                  <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                  <a href="javascript:eliminarRegistro('.$registro2['idEditor'].');">
                  <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                  </td>
				</tr>';
	}
   echo '</table>';
?>

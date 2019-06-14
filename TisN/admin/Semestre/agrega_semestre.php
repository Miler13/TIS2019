
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO Semestres (NombreSemestre) VALUES('$nombre')");
	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE Semestres SET NombreSemestre = '$nombre' where idSemestre = '$id'");
	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM Semestres ORDER BY idSemestre ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                        <th width="80%">Nombre de Semestre</th>           
                        <th width="20%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                      <td>'.$registro2['NombreSemestre'].'</td>
                       <td> <a href="javascript:editarRegistro('.$registro2['idSemestre'].');">
                          <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                          <a href="javascript:eliminarRegistro('.$registro2['idSemestre'].');">
                          <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                          </td>
                </tr>';
  }
	
   echo '</table>';
?>
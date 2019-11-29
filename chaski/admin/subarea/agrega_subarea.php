
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['subarea'];
$Area = $_POST['Area'];


switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO subareas (Nombresubarea, IdArea, IdGrupo) VALUES('$nombre','$Area','1')");
	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE subareas SET Nombresubarea = '$nombre', IdArea = '$Area', IdGrupo = '1' where idsubarea = '$id'");
	break;
   }
   $registro = mysqli_query($conexion,"SELECT subareas.idsubarea as id, subareas.Nombresubarea as subarea, areas.NombreArea as Area, grupos.NumeroGrupo as grupo FROM subareas 
   INNER JOIN areas ON  subareas.IdArea =  areas.idArea 

  
   
   INNER JOIN grupos ON  subareas.IdGrupo =  grupos.idGrupo
ORDER BY subareas.idsubarea ASC");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
<tr>
<th width="20%">subArea</th>  
<th width="20%">Area</th> 

<th width="20%">Opciones</th>
</tr>';
while($registro2 = mysqli_fetch_array($registro)){
echo '<tr>
<td>'.$registro2['subarea'].'</td>
<td>'.$registro2['Area'].'</td>

<td> <a href="javascript:editarRegistro('.$registro2['id'].');">
<img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
<a href="javascript:eliminarRegistro('.$registro2['id'].');">
<img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
</td>
</tr>';
}
echo '</table>';

?>


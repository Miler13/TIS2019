
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['subarea'];
$Area = $_POST['Area'];


switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO pclave( palabraClave, areas_idArea) VALUES('$nombre','$Area')");
	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE pclave SET Nombresubarea = '$nombre', IdArea = '$Area',  where idsubarea = '$id'");
	break;
   }
   $registro = mysqli_query($conexion,"SELECT  pclave.palabraClave as pa, pclave.idpClave as id, areas.NombreArea as Area FROM pclave 
   INNER JOIN areas ON  pclave.areas_idArea =  areas.idArea
     ORDER BY pclave.idpClave ASC
     ");

echo '<table class="table table-striped table-condensed table-hover table-responsive">
<tr>
<th width="20%">palabra</th>  
<th width="20%">Area</th> 

<th width="20%">Opciones</th>
</tr>';
while($registro2 = mysqli_fetch_array($registro)){
echo '<tr>
<td>'.$registro2['pa'].'</td>
<td>'.$registro2['Area'].'</td>

<td> 
<a href="javascript:eliminarRegistro('.$registro2['id'].');">
<img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
</td>
</tr>';
}
echo '</table>';

?>


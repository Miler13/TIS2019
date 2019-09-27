
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$nombre = $_POST['nombre'];
$Especialista = $_POST['Especialista'];
$SubArea = $_POST['SubArea'];
$grupo = $_POST['grupo'];
$turno = $_POST['turno'];
$horario = $_POST['horario'];
$estado = $_POST['estado'];
$numero = $_POST['numero'];

switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO asignaciones (Descripcion, idEspecialista, idSubArea, idGrupo,  Estado, NumeroAsignacion) VALUES('$nombre','$Especialista','$SubArea','$grupo','$estado','$numero')");
	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE asignaciones SET Descripcion = '$nombre', idSubArea = '$SubArea',idGrupo = '$grupo',idTurno = '$turno',idHorario = '$horario' ,Estado = '$estado',NumeroAsignacion = '$numero' where idAsignacion = '$id'");
	break;
   }
    $registro = mysqli_query($conexion,"SELECT  asignaciones.idAsignacion AS id, asignaciones.Descripcion AS Asignacion,concat(Especialistas.NombresEspecialista,' ',Especialistas.ApellidosEspecialista) as Especialista, 
             subareas.NombreSubArea AS SubArea, grupos.NumeroGrupo AS Grupo,  asignaciones.Estado AS Estado, asignaciones.NumeroAsignacion AS NumeroA
FROM       asignaciones INNER JOIN Especialistas ON asignaciones.idEspecialista = Especialistas.idEspecialista 
                        INNER JOIN subareas ON asignaciones.idSubArea = subareas.idSubArea 
             ORDER BY asignaciones.idAsignacion ASC");

    echo '<table class="table table-striped table-condensed table-hover">
        	 <tr>
                          <th width="10%">Descripcion</th>  
                        <th width="15%">Especialista</th> 
                        <th width="15%">SubArea</th>
                        <th width="7%">Grupo</th>
                        <th width="8%">Turno</th>        
                        <th width="15%">Horario</th>
                        <th width="10%">Estado</th>
                        <th width="10%">Numero</th>
                        <th width="10%">Opciones</th>
                   </tr>';
	while($registro2 = mysqli_fetch_array($registro)){
		echo '<tr>
                        <td>'.$registro2['Asignacion'].'</td>
                          <td>'.$registro2['Especialista'].'</td>
                          <td>'.$registro2['SubArea'].'</td>
                          <td>'.$registro2['Grupo'].'</td>
                          <td>'.$registro2['Turno'].'</td>
                          <td>'.$registro2['Horario'].'</td>
                           <td>'.$registro2['Estado'].'</td>
                          <td>'.$registro2['NumeroA'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                </tr>';
  }
	
   echo '</table>';
?>
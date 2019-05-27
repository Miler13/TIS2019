<?php
include('../../admin/conexion.php');

  session_start();
  $codigo = $_SESSION["Codigo"];
  
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM asignacion_aux"));
    $nroLotes = 10;
    $nroPaginas = ceil($numeroRegistros/$nroLotes);
    $lista = '';
    $tabla = '';

    if($paginaActual > 1){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual-1).');">Anterior</a></li>';
    }
    for($i=1; $i<=$nroPaginas; $i++){
        if($i == $paginaActual){
            $lista = $lista.'<li class="active"><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }else{
            $lista = $lista.'<li><a href="javascript:pagination('.$i.');">'.$i.'</a></li>';
        }
    }
    if($paginaActual < $nroPaginas){
        $lista = $lista.'<li><a href="javascript:pagination('.($paginaActual+1).');">Siguiente</a></li>';

    }
  
  	if($paginaActual <= 1){
  		$limit = 0;
  	}else{
  		$limit = $nroLotes*($paginaActual-1);
  	}
  	$registro = mysqli_query($conexion,"SELECT planificacion_aux.idPlanificacionaux as id, numeros_asignacionaux.numeroAsignado as Numero, asignaturas.NombreAsignatura as Asignatura, planificacion_aux.Unidad as Unidad, planificacion_aux.DescripcionUnidad as UnidadD,  planificacion_aux.Tarea as Tarea, planificacion_aux.DescripcionTarea as TareaD, planificacion_aux.FechaPublicacion as FechaPu, planificacion_aux.FechaPresentacion as FechaPre,planificacion_aux.CodigoTarea as Codigo 
from planificacion_aux inner join numeros_asignacionaux on planificacion_aux.idNumeroAsignacionaux=numeros_asignacionaux.idNumeroAsignacionaux 
                          inner join asignaturas on planificacion_aux.idAsignatura = asignaturas.idAsignatura
where planificacion_aux.idAuxiliar = '$codigo' LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        <th width="10%">Numero Asignado</th>  
                        <th width="15%">Asignatura</th> 
                        <th width="15%">Unidad</th>
                        <th width="7%">Desc. Unidad</th>
                        <th width="8%">Tarea</th>        
                        <th width="15%">Desc. Tarea</th>
                        <th width="10%">Fecha Publicacion</th>
                        <th width="10%">Fecha Presentacion</th>
                        <th width="10%">Codigo</th>
                         <th width="10%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                            <td>'.$registro2['Numero'].'</td>
                          <td>'.$registro2['Asignatura'].'</td>
                          <td>'.$registro2['Unidad'].'</td>
                          <td>'.$registro2['UnidadD'].'</td>
                          <td>'.$registro2['Tarea'].'</td>
                          <td>'.$registro2['TareaD'].'</td>
                          <td>'.$registro2['FechaPu'].'</td>
                           <td>'.$registro2['FechaPre'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                           <td> <a href="javascript:editarRegistro('.$registro2['id'].');">
                              <img src="images/lapiz.png" width="25" height="25" alt="delete" title="Editar" /></a>
                              <a href="javascript:eliminarRegistro('.$registro2['id'].');">
                             <img src="images/borrar.png" width="25" height="25" alt="delete" title="Eliminar" /></a>
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>
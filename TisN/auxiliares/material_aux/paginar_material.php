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
  	$registro = mysqli_query($conexion,"SELECT  material_aux.idMaterialaux AS id, material_aux.idAuxiliar as idAuxiliar, material_aux.Descripcion AS Descripcion, material_aux.Archivo as Archivo, material_aux.CodigoMaterial as Codigo, material_aux.Fecha_Subida as Fecha, numeros_asignacionaux.numeroAsignado as Numero
FROM material_aux INNER JOIN numeros_asignacionaux ON material_aux.idNumeroAsignacionaux = numeros_asignacionaux.idNumeroAsignacionaux
where material_aux.idAuxiliar = '$codigo' LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        
                        <th width="15%">Descripcion</th> 
                        <th width="15%">Archivo</th>
                        <th width="15%">Codigo M.</th>
                        <th width="15%">Fecha</th> 
                        <th width="15%">Asignacion</th>                  
                        <th width="20%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                          <td>'.$registro2['Descripcion'].'</td>
                          <td>'.$registro2['Archivo'].'</td>
                          <td>'.$registro2['Codigo'].'</td>
                          <td>'.$registro2['Fecha'].'</td>
                          <td>'.$registro2['Numero'].'</td>                 
                           <td> <a href="material_aux/pdf/archivo.php?id='.$registro2['id'].'"> <img src="images/verArchivo.png" width="25" height="25" alt="delete" title="Ver Archivo" /></a>
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
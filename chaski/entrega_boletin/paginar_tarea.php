<?php
include('../admin/conexion.php');
session_start();

	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM boletin"));
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
  	$registro = mysqli_query($conexion,"SELECT boletin.idBoletin as id, areas.NombreArea as Area, boletin.Descripcion as Descripcion, boletin.Archivo as Archivo FROM boletin JOIN areas                     
        WHERE boletin.areas_idArea=areas.idArea
 LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        
                       <th width="15%">Codigo boletin</th> 
                        <th width="15%">Area</th>
                        <th width="20%">Descripcion</th>
                        
                                       
                        <th width="15%">Opciones</th>
                   </tr>';		
          	while($registro2 = mysqli_fetch_array($registro)){
      $tabla = $tabla.'<tr>
                         
                           <td>'.$registro2['id'].'</td>
                          <td>'.$registro2['Area'].'</td>
                          <td>'.$registro2['Descripcion'].'</td>
                         
                                   
                             
                          <td> <a href="editor/boletin/pdf/archivos/'.$registro2['Archivo'].'"> <img src="editor/images/verArchivo.png" width="25" height="25" alt="ver" title="Ver Archivo" /></a>
                           
                             </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
?>
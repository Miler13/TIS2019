<?php
include('../conexion.php');
	$paginaActual = $_POST['partida'];

    $numeroRegistros = mysqli_num_rows(mysqli_query($conexion,"SELECT * FROM horarios"));
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
  	$registro = mysqli_query($conexion,"SELECT * FROM horarios LIMIT $limit, $nroLotes ");
  	$tabla = $tabla.'<table class="table table-striped table-condensed table-hover table-responsive">
			                <tr>
                        <th width="10%">Horario</th>           
                        <th width="15%">Lunes</th>
						<th width="15%">Martes</th>           
                        <th width="15%">Miercoles</th>
						<th width="15%">Jueves</th>           
                        <th width="15%">Viernes</th>
						<th width="15%">Sabado</th>
                   </tr>';	
				   if(mysqli_num_rows($registro)>0){
          	while($registro2 = mysqli_fetch_array($registro)){
			$mensaje1 = '';
			$mensaje2 = '';
			$mensaje3 = '';
			$mensaje4 = '';
			$mensaje5 = '';
			$mensaje6 = '';
			$edita = '?????????????????????????????????????????';
			$edita1 = '';
			$edita2 = '';
			$edita3 = '';
			$edita4 = '';
			$edita5 = '';
			$edita6 = '';
			if(is_null($registro2['lunes'])){
			$mensaje1 = 'images/disponible.png';
			$edita1 = 'javascript:agregarRegistro2('.$registro2['idHorario'].');';
			}else{
			$mensaje1 = 'images/reservado.png';
			}
			if(is_null($registro2['martes'])){
			$mensaje2 = 'images/disponible.png';
			}else{
			$mensaje2 = 'images/reservado.png';
			}
			if(is_null($registro2['miercoles'])){
			$mensaje3 = 'images/disponible.png';
			}else{
			$mensaje3 = 'images/reservado.png';
			}
			if(is_null($registro2['jueves'])){
			$mensaje4 = 'images/disponible.png';
			}else{
			$mensaje4 = 'images/reservado.png';
			}
			if(is_null($registro2['viernes'])){
			$mensaje5 = 'images/disponible.png';
			}else{
			$mensaje5 = 'images/reservado.png';
			}
			if(is_null($registro2['sabado'])){
			$mensaje6 = 'images/disponible.png';
			}else{
			$mensaje6 = 'images/reservado.png';
			}
      $tabla = $tabla.'<tr>
                      <td>'.$registro2['hora'].'</td>
					<td> <a href='.$edita1.'>
					<img src='.$mensaje1.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
					<td> <a href="javascript:agregarRegistro2('.$registro2['idHorario'].');">
					<img src='.$mensaje2.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
					<td> <a href="javascript:agregarRegistro('.$mensaje3.');">
					<img src='.$mensaje3.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
					<td> <a href="javascript:agregarRegistro('.$mensaje4.');">
					<img src='.$mensaje4.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
					<td> <a href="javascript:agregarRegistro('.$mensaje5.');">
					<img src='.$mensaje5.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
                    <td> <a href="javascript:agregarRegistro('.$mensaje6.');">
					<img src='.$mensaje6.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
                </tr>';	
	}
        
    $tabla = $tabla.'</table>';
    $array = array(0 => $tabla,
    			   1 => $lista);

    echo json_encode($array);
	}else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
      echo '</table>';
?>
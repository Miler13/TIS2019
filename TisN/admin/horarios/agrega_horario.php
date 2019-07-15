
<?php
include('../conexion.php');

$id = $_POST['id-registro'];
$proceso = $_POST['pro'];
$dia = $_POST['dia'];
$hora = $_POST['hora'];
$materia = $_POST['materia'];
$grupo = $_POST['grupo'];
$semestre = $_POST['semestre2'];

$d1 = "lunes";
$d2 = "martes";
$d3 = "miercoles";
$d4 = "jueves";
$d5 = "viernes";
$d6 = "sabado";
switch($proceso){
	case 'Registro': mysqli_query($conexion,"INSERT INTO horarios3 (dia, hora, materia, grupo, semestre) VALUES('$dia', '$hora', '$materia', '$grupo', '$semestre')");
					if($dia = 'lunes' ){
						mysqli_query($conexion,"UPDATE horarios2 SET lunes = '1' where hora = '$hora'");
						break;
					}else{
						if($dia2 = 'martes' ){
						mysqli_query($conexion,"UPDATE horarios2 SET martes = '2' where hora = '$hora'");
						break;
						}else{
							if($dia2 = 'miercoles' ){
							mysqli_query($conexion,"UPDATE horarios2 SET miercoles = '3' where hora = '$hora'");
							break;
							}else{
								if($dia2 = 'jueves' ){
								mysqli_query($conexion,"UPDATE horarios2 SET jueves = '4' where hora = '$hora'");
								break;
								}else{
									if($dia2 = 'viernes' ){
									mysqli_query($conexion,"UPDATE horarios2 SET viernes = '5' hora = '$hora'");
									break;
									}else{
										if($dia2 = 'sabado' ){
										mysqli_query($conexion,"UPDATE horarios2 SET sabado = '6' hora = '$hora'");
										break;
										}	
									}
								}
							}
						}
					}
		
	break;
	case 'Edicion': mysqli_query($conexion,"UPDATE horarios SET NombreHorario = '$nombre' where idHorario = '$id'");
	break;
   }
    $registro = mysqli_query($conexion,"SELECT * FROM horarios2 ORDER BY idHorario ASC");

    echo '<table class="table table-striped table-condensed table-hover">
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
		echo '<tr>
                      <td>'.$registro2['hora'].'</td>
					<td> <a href='.$edita1.'>
					<img src='.$mensaje1.' width="95" height="32" alt="delete" title="Editar" /></a>
                    </td>
					<td> <a href="javascript:agregarRegistro2();">
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
	}else{
      	echo '<tr>
      				<td colspan="10">No se encontraron resultados</td>
      			</tr>';
      }
   echo '</table>';
?>
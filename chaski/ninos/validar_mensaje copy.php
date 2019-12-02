<?php include ('../admin/conexion.php');
$nombre="osos12";
$mensaje=" hola como  estas   amor   REzar";

//INICIO
$contenido=strtoupper($mensaje);//MI CASA VUELA
$palabras=explode(" ", $contenido);//["MI","CASA","VUELA"]
$consulta1="select IdArea, NombreArea from areas";
$Area=mysqli_query($conexion,$consulta1);


while( $filaArea=mysqli_fetch_row($Area)) {
	 $co=$filaArea['0'];
	 $contt=0;
	 echo  $co . " // " ; 
	 $consultaarea ="SELECT palabraClave FROM pclave where areas_idArea='$co'";
     $resultadomedicina = mysqli_query($conexion,$consultaarea);

	while ($filapPcla = mysqli_fetch_row($resultadomedicina)) {
 
			for($i=0;$i<count($palabras);$i++){
				$aux=$palabras[$i];
		
				for($j=0;$j<count($filapPcla);$j++){
	
					if($aux==$filapPcla[$j]){
						echo  $filapPcla[$j] . "  " ; 
						$j=count($filapPcla);
						$i=count($palabras);      
						}
					}

			if(0<$j)	{ 				$contt=1;			}
			
				}
	

		}
	if(0<$contt){
		$espe= "SELECT especialistas.CorreoEspecialista  FROM asignaciones, especialistas,subareas, areas 
		WHERE asignaciones.idEspecialista =especialistas.idEspecialista and subareas.idSubArea=asignaciones.idSubArea and subareas.IdArea='$co'
		GROUP By especialistas.CorreoEspecialista " ;
		$resultEsp= mysqli_query($conexion,$espe);

		while ($filaEsp = mysqli_fetch_row($resultEsp)) 
			{ //
			$Ep =$filaEsp['0'];
		
			$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('','$nombre','$rutadestino','$mensaje','$fechaMensaje')";
			$res=mysqli_query($conexion,$sql);
	   if($res){ 
			echo '<script> alert("Se mando  su carta con  exito.");</script>';
			echo '<script> window.location="nino.php"; </script>';			
	   }
	   else {
			echo '<script> alert("Error al mandar la carta.");</script>';
			echo '<script> window.location="nino.php"; </script>';
			}
				}
			} 
		}

////finnn


?>
<?php include ('../admin/conexion.php');
$nombre=$_POST['nino'];
$mensaje=$_POST['mensaje'];
$fechaMensaje=date("Y-m-d");

session_start();
		$codigo = $_SESSION["Codigo"];
		
		$rutaservidor='images';
		$rutatemporal=$_FILES['foto']['tmp_name'];
		$nombrefoto=$_FILES['foto']['name'];
		$tipo = $_FILES['foto']['type'];
		$rutadestino=$rutaservidor.'/'.$nombrefoto;
		move_uploaded_file($rutatemporal, $rutadestino);
		
if( !(($tipo == "image/jpeg") || ($tipo == "image/png") || ($tipo == "image/jpg")) ){

	

///////////////////////////////////////////////////////////////////////////para  llenar los  datos del  correo  
  


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
				



					$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('$Ep','$nombre',' ','$mensaje','$fechaMensaje')";
					$res=mysqli_query($conexion,$sql);
					if($res){ 
					//	echo '<script> alert("Hemos enviado tu Mensaje de forma Correcta. Gracias por tu Mensaje");</script>';
						echo '<script> window.location="mensajeexitoso.php"; </script>';
					}else {
						echo '<script> alert("Lo sentimos no pudimos mandar el mensaje SF");</script>';
						echo '<script> window.location="nino.php"; </script>';
						}
				}
			}else{

				$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('admin','$nombre',' ','$mensaje','$fechaMensaje')";
					$res=mysqli_query($conexion,$sql);
					if($res){ 
					//	echo '<script> alert("Hemos enviado tu Mensaje de forma Correcta. Gracias por tu Mensaje");</script>';
						echo '<script> window.location="mensajeexitoso.php"; </script>';
					}else {
						echo '<script> alert("Lo sentimos no pudimos mandar el mensaje");</script>';
						echo '<script> window.location="nino.php"; </script>';
						}

			}

		}

////finnn




	}else {
		//se aumento esta linea para que llegue a su correo
		
		
		
		if (($tipo == "image/jpeg") || ($tipo == "image/png") || ($tipo == "image/jpg")) 	{  



		///////////////////////////////////////////////////////////////////////////para  llenar los  datos del  correo 
		
		
		//INICIO
$contenido=strtoupper($mensaje);//MI CASA VUELA
$palabras=explode(" ", $contenido);//["MI","CASA","VUELA"]
$consulta1="select IdArea, NombreArea from areas";
$Area=mysqli_query($conexion,$consulta1);

$contt=0;
while( $filaArea=mysqli_fetch_row($Area)) {
	 $co=$filaArea['0'];
	
	 echo  $co . " // " ; 
	 $consultaarea ="SELECT palabraClave FROM pclave where areas_idArea='$co'";
     $resultadomedicina = mysqli_query($conexion,$consultaarea);
	 $cont2=0;
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

			if(0<$j)	{ 				$cont2=1;			}
			
				}
	

		}
	if(0<$cont2){
		$espe= "SELECT especialistas.CorreoEspecialista  FROM asignaciones, especialistas,subareas, areas 
		WHERE asignaciones.idEspecialista =especialistas.idEspecialista and subareas.idSubArea=asignaciones.idSubArea and subareas.IdArea='$co'
		GROUP By especialistas.CorreoEspecialista " ;
		$resultEsp= mysqli_query($conexion,$espe);

		while ($filaEsp = mysqli_fetch_row($resultEsp)) 
			{ //
			$Ep =$filaEsp['0'];
			
			$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('$Ep','$nombre','$rutadestino','$mensaje','$fechaMensaje')";
			$res=mysqli_query($conexion,$sql);
	   if($res){ 
			//echo '<script> alert("Se mando  su carta con  exito.");</script>';
			echo '<script> window.location="mensajeexitoso.php"; </script>';		
	 		  }
	 		  else {
					echo '<script> alert("Error al mandar la carta.");</script>';
					echo '<script> window.location="nino.php"; </script>';
				}
			}
		} else{
			$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('admin','$nombre','$rutadestino','$mensaje','$fechaMensaje')";
			$res=mysqli_query($conexion,$sql);
		   if($res){ 
				//echo '<script> alert("Se mando  su carta con  exito.");</script>';
				echo '<script> window.location="mensajeexitoso.php"; </script>';			
				   }
			   else {
					echo '<script> alert("Error al mandar la carta. CF");</script>';
					echo '<script> window.location="nino.php"; </script>';
				}




			}

		}

////finnn

   
	   }
	   
	   else{
			echo '<script> alert("Solo se permiten imagenes de Tipo PNG y JPG.");</script>';
			echo '<script> window.location="nino.php"; </script>';
			}
   
   
		}


?>
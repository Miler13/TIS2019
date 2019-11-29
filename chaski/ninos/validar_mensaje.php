<?php include ('../admin/conexion.php');
$nombre=$_POST['nino'];
$mensaje=$_POST['mensaje'];

//INICIO
$contenido=strtoupper($mensaje);//MI CASA VUELA
$palabras=explode(" ", $contenido);//["MI","CASA","VUELA"]
$array_peligrosas = array("MATAR", "MUERTE", "MORIRME", "SANGRE","MATANZA","ASESINAR","APUÃ‘ALAR");
$array_correctas = array("ESTUDIO","LEER","CANTAR","REZAR","AGRADECER","DIOS","AMOR");

$resultado="";

for($i=0;$i<count($palabras);$i++){
	$aux=$palabras[$i];
	
	for($j=0;$j<count($array_peligrosas);$j++){

		if($aux==$array_peligrosas[$j]){

			$resultado="P";
			
			$j=count($array_peligrosas);
			$i=count($palabras);      
		}
	}
	
	if($resultado==""){
		for($j=0;$j<count($array_correctas);$j++){
			if($aux==$array_correctas[$j]){
				$resultado="E";
				$j=count($array_peligrosas);
				$i=count($palabras);
			}
		}
	}
}

if($resultado==""){
	$resultado="N";
}
//FIN
$mensaje=$mensaje . "" .$resultado;

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



$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('','$nombre',' ','$mensaje','$fechaMensaje')";

$res=mysqli_query($conexion,$sql);
if($res){ 
	echo '<script> alert("Hemos enviado tu Mensaje de forma Correcta. Gracias por tu Mensaje");</script>';
		echo '<script> window.location="nino.php"; </script>';
	}else {
	echo '<script> alert("Lo sentimos no pudimos mandar el mensaje");</script>';
		echo '<script> window.location="nino.php"; </script>';
		}
	}else {
		//se aumento esta linea para que llegue a su correo
		$para="Especialista@gmail.com";
		
		
		if (($tipo == "image/jpeg") || ($tipo == "image/png") || ($tipo == "image/jpg")) 
		{  
			$sql="INSERT into mensajes(para,Remitente,foto,Mensaje,FechaEnvio) values ('$para','$nombre','$rutadestino','$mensaje','$fechaMensaje')";
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
	   
	   else{
			echo '<script> alert("Solo se permiten imagenes de Tipo PNG y JPG.");</script>';
			echo '<script> window.location="nino.php"; </script>';
			}
   
   
		}


?>
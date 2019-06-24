<?php 
session_start();
$codigo = $_SESSION["Codigo"];

include ('../../admin/conexion.php');

$carrera=$_POST['carrera'];
$grupo=$_POST['grupo'];
$asignatura=$_POST['asignatura'];
$observaciones=$_POST['observaciones'];
$estudiante=$_POST['estudiante'];
$fecha = date("Y-m-d");
 
$guardar = mysqli_query($conexion,"INSERT INTO inscripciones_asignaturas (idAsignatura, idEstudiante, fechaInscripcion, observaciones,idCarrera ) VALUES( '$grupo','$asignatura','$estudiante','$fecha','$observaciones','$carrera')");
					if ($guardar) {
							  echo '<script> alert("Inscripcion Realizada Correctamente.");</script>';
					       echo '<script> window.location="../inscripcion_asignatura.php"; </script>';
					}
					else
					{
							  echo '<script> alert("Error al Inscribir la asignatura. Intente de Nuevo.");</script>';
					         
					}
?>

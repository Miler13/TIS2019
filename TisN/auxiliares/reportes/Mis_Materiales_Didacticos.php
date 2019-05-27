<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();
//$Asignatura = $_POST['asignatura'];
$codigo = $_SESSION["Codigo"];

class PDF extends FPDF
{
		function Header()
		{
			include ('../../admin/conexion.php');
			$this->Image('../../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(60,20,'Reporte de Materiales ',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(20, 10, 'Fecha: '.date('d-m-Y').'', 0, 'C');
			$this->Ln(5);
			$this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Material  del Auxiliar:',0,0,'L');
		    $codigo = $_SESSION["Codigo"];
		        $auxiliar = mysqli_query($conexion,"SELECT concat(NombresAuxiliar, ' ',ApellidosAuxiliar) as Auxiliar from auxiliares where idAuxiliar = '$codigo'");
		            while($row = mysqli_fetch_row($auxiliares)){
		            $NombreAuxiliar = $row[0];

            }

		 $this->Cell(100,20, $codigo, 0,0,'R');
			$this->Ln(15);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(40, 8, 'Descripcion' ,1,0,'C');
			$this->Cell(60, 8, 'Archivo' ,1,0,'C');
			$this->Cell(30, 8, 'Codigo Material' ,1,0,'C');
			$this->Cell(25, 8, 'Fecha' ,1,0,'C');
			$this->Cell(25, 8, '# Asignacion' ,1,0,'C');
			$this->Ln(5);
		}
		function Footer()
		{
			// Posición: a 1,5 cm del final
			$this->SetY(-15);
			$this->SetFont('Arial','I',8);
			$this->Cell(0,10,'Pagina '.$this->PageNo().' / {nb}',0,0,'C');
		}
}
		// Creación del objeto de la clase heredada
		$pdf = new PDF();
		//$pdf = new FPDF('L','mm','legal'); //Tamaño en forma Horizontal
		$pdf->AliasNbPages();
		$pdf->AddPage();
		$pdf->SetFont('Arial', 'B', 11);
		$pdf->Cell(70, 8, '', 0);
		$pdf->Ln(8);
		$pdf->SetFont('Arial', '', 8);

			//Consulta a la base de Datos
		$asignacion_aux = mysqli_query($conexion,"SELECT  material_aux.idMaterialaux AS id, material_aux.idAuxiliar as idAuxiliar, material_aux.Descripcion AS Descripcion, material_aux.Archivo as Archivo, material_aux.CodigoMaterial as Codigo, material_aux.Fecha_Subida as Fecha, numeros_asignacionaux.numeroAsignado as Numero
FROM material_aux INNER JOIN numeros_asignacionaux ON material_aux.idNumeroAsignacionaux = numeros_asignacionaux.idNumeroAsignacionaux
where material_aux.idAuxiliar = '$codigo'");
        
        if(mysqli_num_rows($asignacion_aux) > 0){
        $item = 0;
			while($asignacion_aux2 = mysqli_fetch_array($asignacion_aux)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0,'C');
				$pdf->Cell(40, 8, utf8_decode($asignacion_aux2['Descripcion']), 0,'C');
				$pdf->Cell(60, 8, utf8_decode($asignacion_aux2['Archivo']), 0,'C');
				$pdf->Cell(30, 8, $asignacion_aux2['Codigo'], 0,'C');
			    $pdf->Cell(25, 8, $asignacio_aux2['Fecha'], 0,'C');
			     $pdf->Cell(25, 8, $asignacion_aux2['Numero'], 0,'C');
				$pdf->Ln(5);
			}

		}
	     else{
		
			 echo '<script> alert("No se han encontrado datos para esa asignatura.");</script>';
            echo '<script> window.location="../pantalla_reportes.php"; </script>';
		}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>
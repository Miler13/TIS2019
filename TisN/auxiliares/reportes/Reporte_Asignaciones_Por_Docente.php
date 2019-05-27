<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');

$Auxiliar = $_POST['Auxiliar'];

class PDF extends FPDF
{
		function Header()
		{
			include ('../../admin/conexion.php');
			$this->Image('../../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(50,20,'Reporte de Asignaciones por Auxiliar',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(5);
			$this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Asignaciones del Auxiliar:',0,0,'L');
		    $Auxiliar = $_POST['Auxiliar'];
            $asignaciones = mysqli_query($conexion,"SELECT concat(NombresAuxiliar, ' ' ,ApellidosAuxiliar) as Auxiliar FROM auxiliares where idAuxiliar = '$Auxiliar'");
            while($row = mysqli_fetch_row($asignaciones)){
            $NombreAuxiliar = $row[0];

            }
		     $this->Cell(90,20, $Auxiliar, 0,0,'R');
			$this->Ln(15);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
		     $this->SetFont('Arial','B',10);
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(30, 8, 'Asignacion' ,1,0,'C');
			$this->Cell(20, 8, 'Numero' ,1,0,'C');
			$this->Cell(40, 8, 'Asignatura' ,1,0,'C');
			$this->Cell(20, 8, 'Grupo' ,1,0,'C');
			$this->Cell(20, 8, 'Turno' ,1,0,'C');
			$this->Cell(30, 8, 'Horario' ,1,0,'C');
			$this->Cell(20, 8, 'Estado' ,1,0,'C');
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

		if ($Auxiliar < 0) {
			 echo '<script> alert("Por Favor selecciona un Auxiliar para brindarte el Reporte correspondiente.");</script>';
            echo '<script> window.location="../ReportesAsignaciones.php"; </script>';
		}
	     else{
		//Consulta a la base de Datos
		$asignaciones = mysqli_query($conexion,"SELECT asignaciones.Descripcion AS Asignacion, concat(auxiliares.NombresAuxiliar,' ',auxiliares.ApellidosAuxiliar) as Auxiliar, asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignaciones.NumeroAsignacion AS NumeroA, asignaciones.Estado AS Estado FROM asignaciones INNER JOIN auxiliares ON asignaciones.idAuxiliar = auxiliares.idAuxiliar 
		INNER JOIN asignaturas ON asignaciones.idAsignatura = asignaturas.idAsignatura 
		INNER JOIN grupos ON asignaciones.idGrupo = grupos.idGrupo 
		INNER JOIN turnos ON asignaciones.idTurno = turnos.idTurno  
		INNER JOIN horarios ON asignaciones.idHorario = horarios.idHorario
       where auxiliares.idAuxiliar = '$Auxiliar' ");
        
        $item = 0;
			while($asignaciones2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0,'C');
				$pdf->Cell(30, 8, utf8_decode($asignaciones2['Asignacion']), 0,'C');
				$pdf->Cell(20, 8, $asignaciones2['NumeroA'], 0, 'C');
				$pdf->Cell(40, 8, utf8_decode($asignaciones2['Asignatura']), 0,'C');
				$pdf->Cell(20, 8, $asignaciones2['Grupo'], 0,'C');
			    $pdf->Cell(20, 8, $asignaciones2['Turno'], 0,'C');
			   	$pdf->Cell(30, 8, $asignaciones2['Horario'], 0,'C');
			   	$pdf->Cell(20, 8, $asignaciones2['Estado'], 0,'C');
				$pdf->Ln(5);
			}

		}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>
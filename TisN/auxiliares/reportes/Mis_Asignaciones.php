<?php

require('../fpdf/fpdf.php');
require('../../admin/conexion.php');
session_start();
$codigo = $_SESSION["Codigo"];
class PDF extends FPDF
{
		function Header()
		{
			include ('../../admin/conexion.php');
			$this->Image('../../imagenes/logoSIAD.png' , 10 ,10, 40 , 20,'PNG');
			$this->SetFont('Arial','B',20);
			$this->Cell(80);
			$this->Cell(50,20,'Reporte de mis Asignaciones',0,0,'C');
			$this->Ln(15);
			$this->SetFont('Arial','B',10);
			$this->Cell(160);
			$this->Cell(50, 10, 'Hoy: '.date('d-m-Y').'', 0, 'R');
			$this->Ln(5);
            $this->SetFont('Arial','B',12);
		    $this->Cell(20,20,'Mis Asignaciones:',0,0,'L');
		    $codigo = $_SESSION["Codigo"];
		        $auxiliar = mysqli_query($conexion,"SELECT concat(NombresAuxiliar, ' ',ApellidosAuxiliar) as Auxiliar from auxiliares where idAuxiliar = '$codigo'");
		            while($row = mysqli_fetch_row($auxiliar)){
		            $NombreAuxiliar = $row[0];

            }

		 $this->Cell(75,20, $codigo, 0,0,'R');
			$this->Ln(15);
		    // Colores de los bordes, fondo y texto
		    $this->SetDrawColor(222,227,221);
		     $this->SetFillColor(200,220,255);
		    //Cabecera de Titulos
			$this->Cell(10, 8, '#' ,1,0,'C');
			$this->Cell(35, 8, 'Asignacion' ,1,0,'C');
			$this->Cell(20, 8, 'Numero' ,1,0,'C');
			$this->Cell(40, 8, 'Asignatura' ,1,0,'C');
			$this->Cell(15, 8, 'Grupo' ,1,0,'C');
			$this->Cell(15, 8, 'Turno' ,1,0,'C');
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
		//Consulta a la base de Datos
		$asignacion_aux = mysqli_query($conexion,"SELECT asignacion_aux.Descripcion AS Asignacion, concat(auxiliares.NombresAuxiliar,' ',auxiliares.ApellidosAuxiliar) as Auxiliar, asignaturas.NombreAsignatura AS Asignatura, grupos.NumeroGrupo AS Grupo, turnos.NombreTurno AS Turno, horarios.NombreHorario AS Horario, asignacion_aux.NumeroAsignacion AS NumeroA, asignacion_aux.Estado AS Estado FROM asignacion_aux INNER JOIN docentes ON asignacion_aux.idDocente = auxiliares.idAuxiliar  ----aqui hay que cambiar o crear una tabla nueva--- 
		INNER JOIN asignaturas ON asignacion_aux.idAsignatura = asignaturas.idAsignatura 
		INNER JOIN grupos ON asignacion_aux.idGrupo = grupos.idGrupo 
		INNER JOIN turnos ON asignacion_aux.idTurno = turnos.idTurno  
		INNER JOIN horarios ON asignacion_aux.idHorario = horarios.idHorario
        where auxiliares.idAuxiliar = '$codigo' and asignacion_aux.Estado = '1'");
        
        $item = 0;
			while($asignacion_aux2 = mysqli_fetch_array($asignaciones)){
				$item = $item+1;
				$pdf->Cell(10, 8, $item, 0,'C');
				$pdf->Cell(35, 8, utf8_decode($asignacion_aux2['Asignacion']), 0,'C');
				$pdf->Cell(20, 8, $asignacion_aux2['NumeroA'], 0, 'C');
				$pdf->Cell(40, 8, utf8_decode($asignacion_aux2['Asignatura']), 0,'C');
				$pdf->Cell(15, 8, $asignacion_aux2['Grupo'], 0,'C');
			    $pdf->Cell(15, 8, $asignacion_aux2['Turno'], 0,'C');
			   	$pdf->Cell(30, 8, $asignacion_aux2['Horario'], 0,'C');
			   	$pdf->Cell(20, 8, $asignacion_aux2['Estado'], 0,'C');
				$pdf->Ln(5);
			}
			$pdf->Ln(8);
			$pdf->Output(); //Esta opcion es para ver en linea el documento //$pdf->Output('reporteProductos.pdf','D'); Esta opcion es para descargar el archivo
?>
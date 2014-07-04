<?php

function GenerarPDF($sql1, $consulta, $columnas, $valor){
		
		$contador=0;
		$letra=0;
		$inicio=0;
		$monto=0;//almacena el monto en caso de que haya que mostrar un total
		
		ob_start();
		//ob_end_clean();
		require('fpdf.php');
		//ini_set("session.auto_start", 0);
		
		include './constantes.php';	
		$pdf=new FPDF('L','mm','A4');
		
		$pdf->AddPage();
		$pdf->SetFont('Arial','B',16);
		$pdf->Image('./images/logoEIBI.png' , 20 ,10, 20 ,18,'PNG');

		$pdf->Cell(0,10, utf8_decode('ADMINISTRACION TERMINAL DE BUSES'), 0, 0, 'C');
		$pdf->Ln(10);
		switch ($valor){
		
			case 2:
				$pdf->Cell(0,20,'EMPRESAS ASOCIADAS', 0, 1, 'C');
				break;
			case 3:
				$pdf->Cell(0,20,'PAGOS REALIZADOS POR EMPRESAS', 0, 1, 'C');
				break;
			case 4:
				$pdf->Cell(0,20,'COBROS REALIZADOS POR EMPRESAS', 0, 1, 'C');
				break;
			case 5:
				$pdf->Cell(0,20,'CONTRATOS DE EMPRESAS ASOCIADAS', 0, 1, 'C');
				break;
			case 6:
				$pdf->Cell(0,20,'FLUJOS ASOCIADOS A LOS ANDENES', 0, 1, 'C');
				break;
			case 7:
				$pdf->Cell(0,20,'REPRESENTANTES DE LAS EMPRESAS', 0, 1, 'C');
				break;
			case 22:
				$pdf->Cell(0,20,'LOCALES NO ARRENDADOS', 0, 1, 'C');
				break;
			case 33:
				$pdf->Cell(0,20,'LOCALES ARRENDADOS', 0, 1, 'C');
				break;
			case 44:
				$pdf->Cell(0,20,'BUSES POR EMPRESA', 0, 1, 'C');
				break;
			case 55:
				$pdf->Cell(0,20,'PAGOS POR EMPRESAS', 0, 1, 'C');
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
					echo 'No pudo conectarse a mysql';
					exit;
				}

				if (!mysql_select_db($base_de_datos, $enlace)) {
					echo 'No pudo seleccionar la base de datos';
					exit;
				}
				
				//la consulta...
				$sql3 = 'SELECT SUM(MONTO_PAGO) AS TOTAL_PAGOS  FROM PAGO';
				
				break;
			case 66:
				$pdf->Cell(0,20,'EMPRESAS SIN REGISTRO DE PAGO', 0, 1, 'C');
				break;
			case 77:
				$pdf->Cell(0,20,'COBROS POR EMPRESA', 0, 1, 'C');
				break;
			case 99:
				$pdf->Cell(0,20,'EMPRESAS SIN REGISTRO DE COBROS', 0, 1, 'C');
				break;
			case 20:
				$pdf->Cell(0,20,'EMPRESAS MOROSAS', 0, 1, 'C');
				break;
			case 10:
				$pdf->Cell(0,20,'HISTORIAL DE PAGOS POR EMPRESA', 0, 1, 'C');
				break;
			case 11:
				$pdf->Cell(0,20,'HISTORIAL DE COBROS POR EMPRESA', 0, 1, 'C');
				break;
			case 12:
				$pdf->Cell(0,20,'USO DE ANDENES POR EMPRESA', 0, 1, 'C');
				break;
			
			default:
				break;
		}
		
		if (!$enlace = mysql_connect('localhost', 'root', $password)) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db($base_de_datos, $enlace)) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}

		$respuesta = mysql_query($consulta, $enlace);

		if ($columnas == 9){
			
			$letra = 5;
			$inicio = 30;
		}
		
		if ($columnas == 8){
			
			$letra = 6;
			$inicio = 35;
		}
		
		if ($columnas == 7){
			
			$letra = 7;
			$inicio = 40;
		}
		if ($columnas == 6){
			
			$letra = 8;
			$inicio = 45;
		}
		
		if ($columnas == 4){
			
			$letra = 12;
			$inicio = 70;
		}
		
		if ($columnas == 5){
			
			$letra = 10;
			$inicio = 55;
		}
		
		if ($columnas == 3 or $columnas == 2 or $columnas == 1){
			
			$letra = 16;
			$inicio = 90;
		}
		
		$pdf->SetFont('Arial','B',$letra);
		
		
		for ($i=0; $i<$columnas; $i++){ 
			$pdf->Cell($inicio,5, $sql1[$i], 1, 0, 'C');
		}
		$pdf->Ln();
		while ($fila2 = mysql_fetch_assoc($respuesta)) {

			/*if ($contador%15==0){
				
				//$pdf->endPage();//finalizamos la pagina...
				//agregamos una nueva...
				$pdf->AddPage();
				$pdf->SetFont('Arial','B',16);
				$pdf->Image('logoEIBI.png' , 20 ,10, 20 ,18,'PNG');

				$pdf->Ln();//damos un enter
				$pdf->SetFont('Arial','B',$letra);//cambiamos el fondo...


			}*/
			
			for ($i=0; $i<$columnas; $i++){
				
				//echo $fila2[$sql1[$i]];
				//$cadena = $pdf->textstring($fila2[$sql1[$i]]);
				$pdf->Cell($inicio,5, utf8_encode($fila2[$sql1[$i]]), 1, 0, 'C');
				//$pdf->Ln();
			}
			$pdf->Ln();
			$contador++;
			
		}
		
		//ob_end_clean();
		$pdf->Output();
		ob_end_flush();
	}

?>

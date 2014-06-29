<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
	
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/mio.css" rel="stylesheet" type="text/css" />
<title>Administracion Terminal</title>
</head>

<body>
<div style="height:auto;width:100%;">
  <div style="background-color:black;width:100%;">
    <h3 style="color:#fff;text-align:center;"><br>Filtrando Datos</h3>
  </div>
  <table>
	<tr>
		<td style="width:20%" VALIGN=TOP>
		<b style="color:#fff;">Tabla de Contenidos</b>
		<br>&nbsp;
		<br><div class="dos"><a href="index.php?menu=1">Inicio</a></div><br>
		<br><div class="dos"><a href="estadisticas.php?menu=2">Volver a Consultas Estadísticas</a></div><br>
		<br><div class="dos"><a href="pruebaPDF1.php?menu=9">Hacer PDF </a></div></div>

		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
			include './constantes.php';
			$valor = 0;
	
			foreach ($_GET as $R => $V){

				if ($R=="local"){
					$valor=3;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="buses"){
					$valor=4;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="pagos"){
					$valor=5;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="sin_pagos"){
					$valor=6;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="cobros"){
					$valor=7;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="sin_cobros"){
					$valor=9;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="historial"){
					$valor=10;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="fechas"){
					$valor=100;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="montos"){
					$valor=1000;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="historial_cobro"){
					$valor=11;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="fechas_cobro"){
					$valor=111;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="montos_cobro"){
					$valor=1111;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="empresa"){
					$valor=12;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="anden_fecha"){
					$valor=122;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="morosa"){
					$valor=20;
					//echo $_GET['idempresa_show'];
					break;
				}
				
			}
			
			if ($valor==3){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'LOCALES_ARRENDADOS');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) AS LOCALES_ARRENDADOS from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR inner join CONTRATO ON CONTRATO.idCONTRATO = LOCAL.CONTRATO_idCONTRATO INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE inner join EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= ' group by EMPRESA.idEMPRESA ORDER BY LOCALES_ARRENDADOS DESC ';
					$medio =  $_GET['local'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 3);
					
					echo ('</table>');
			}
			if ($valor==4){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'CANTIDAD_BUSES');
					
					$inicial = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) as CANTIDAD_BUSES FROM BUS left outer JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= ' group by EMPRESA.idEMPRESA';
					$medio =  $_GET['buses'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					//echo $sql2;
					tablas($sql1, $sql2, $enlace, 3);
					
					echo ('</table>');
			}
			if ($valor==5){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'PAGOS_A_LA_FECHA');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, SUM(MONTO_PAGO) as PAGOS_A_LA_FECHA from PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= ' group by EMPRESA.idEMPRESA';
					$medio =  $_GET['pagos'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					//echo $sql2;
					tablas($sql1, $sql2, $enlace, 3);
					
					echo ('</table>');
			}
			if ($valor==6){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA FROM PAGO RIGHT OUTER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA= EMPRESA.idEMPRESA WHERE (EMPRESA.GIRO_idGIRO=3 or EMPRESA.GIRO_idGIRO=4 or EMPRESA.GIRO_idGIRO=5) AND PAGO.idPAGO IS NULL AND EMPRESA.idEMPRESA = ';
					//$final= ' group by EMPRESA.idEMPRESA';
					$medio =  $_GET['sin_pagos'];
					//$junta = $inicial.$medio;
					$sql2= $inicial.$medio;					
					
					tablas($sql1, $sql2, $enlace, 2);
					//echo $sql2;
					echo ('</table>');
			}
			if ($valor==7){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'SERVICIOS_A_LA_FECHA');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, SUM(COBRO_SERVICIO.PAGO_SERVICIO) as SERVICIOS_A_LA_FECHA from COBRO_SERVICIO LEFT OUTER JOIN EMPRESA ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= ' group by EMPRESA.idEMPRESA';
					$medio =  $_GET['cobros'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 2);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==9){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'SERVICIOS_A_LA_FECHA');
					
					$inicial = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA FROM EMPRESA LEFT OUTER JOIN COBRO_SERVICIO ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA WHERE EMPRESA.GIRO_idGIRO IN (1,2) AND COBRO_SERVICIO.idCOBRO_SERVICIO is NULL AND EMPRESA.idEMPRESA = ';
					//$final= ' group by EMPRESA.idEMPRESA';
					$medio =  $_GET['sin_cobros'];
					//$junta = $inicial.$medio;
					$sql2= $inicial.$medio;					
					
					tablas($sql1, $sql2, $enlace, 2);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==10){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'MONTO_PAGO', 'FECHA_PAGO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, PAGO.MONTO_PAGO, PAGO.FECHA_PAGO from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= 'order by ';
					$medio =  $_GET['historial'];
					//$junta = $inicial.$medio;
					$sql2= $inicial.$medio;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			if ($valor==100){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'FECHA_PAGO', 'MONTO_PAGO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, PAGO.FECHA_PAGO, PAGO.MONTO_PAGO from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA WHERE FECHA_PAGO = \'';
					$final= '\'';
					$medio =  $_GET['fechas'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==1000){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'ULTIMO_PAGO', 'MONTO_PAGO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, MAX(PAGO.FECHA_PAGO) as ULTIMO_PAGO, PAGO.MONTO_PAGO from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA WHERE EMPRESA.idEMPRESA= ';
					$final= ' GROUP BY EMPRESA.idEMPRESA';
					$medio =  $_GET['montos'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==11){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'PAGO_SERVICIO', 'FECHA_SERVICIO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COBRO_SERVICIO.PAGO_SERVICIO, COBRO_SERVICIO.FECHA_SERVICIO from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA where EMPRESA.idEMPRESA = ';
					$final= 'order by ';
					$medio =  $_GET['historial_cobro'];
					//$junta = $inicial.$medio;
					$sql2= $inicial.$medio;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			if ($valor==111){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'FECHA_SERVICIO', 'PAGO_SERVICIO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COBRO_SERVICIO.FECHA_SERVICIO, COBRO_SERVICIO.PAGO_SERVICIO from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA WHERE FECHA_SERVICIO = \'';
					$final= '\'';
					$medio =  $_GET['fechas_cobro'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==1111){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'ULTIMO_PAGO', 'PAGO_SERVICIO');
					
					$inicial = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, MAX(COBRO_SERVICIO.FECHA_SERVICIO) AS ULTIMO_PAGO, COBRO_SERVICIO.PAGO_SERVICIO from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA WHERE EMPRESA.idEMPRESA= ';
					$final= ' GROUP BY EMPRESA.idEMPRESA';
					$medio =  $_GET['montos_cobro'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 4);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==12){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'idBUS', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA', 'ANDEN', 'NOMBRE_SECTOR');
					
					$inicial = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, BUS.idBUS, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA, LOCAL.idLOCAL as ANDEN, SECTOR.NOMBRE_SECTOR FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA inner join FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON HORARIO.LOCAL_idLOCAL = LOCAL.idLOCAL INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR where EMPRESA.idEMPRESA = ';
					//$inicial = 'select EMPRESA.NOMBRE_EMPRESA, BUS.idBUS, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA, LOCAL.idLOCAL AS ANDEN FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA INNER JOIN FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON LOCAL.idLOCAL = HORARIO.LOCAL_idLOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO  where EMPRESA.idEMPRESA = ';
					$final= ' order by FLUJO_BUSES.FECHA_ARRIVO DESC';
					$medio =  $_GET['empresa'];
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 8);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==122){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'idBUS', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA', 'ANDEN', 'NOMBRE_SECTOR');
					
					$inicial = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, BUS.idBUS, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA, LOCAL.idLOCAL as ANDEN, SECTOR.NOMBRE_SECTOR FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA inner join FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON HORARIO.LOCAL_idLOCAL = LOCAL.idLOCAL INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR where FLUJO_BUSES.FECHA_ARRIVO = \'';
					$medio =  $_GET['anden_fecha'];
					$final = '\' order by EMPRESA.NOMBRE_EMPRESA';
					$junta = $inicial.$medio;
					$sql2= $junta.$final;					
					
					tablas($sql1, $sql2, $enlace, 8);
					//echo $sql2;
					echo ('</table>');
			}
			
			if ($valor==20){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'RUT_EMPRESA', 'ULTIMO_PAGO', 'DIAS_ATRASADOS');
					
					$inicial = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, MAX(PAGO.FECHA_PAGO) AS ULTIMO_PAGO, DATEDIFF(NOW(), PAGO.FECHA_PAGO) AS DIAS_ATRASADOS  FROM PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA WHERE ( DATEDIFF(NOW(), PAGO.FECHA_PAGO) >0)  AND EMPRESA.idEMPRESA= ';
					$medio =  $_GET['morosa'];
					$agrupar = ' GROUP BY EMPRESA.idEMPRESA';
					$junta = $inicial.$medio;
					$sql2= $junta.$agrupar;					
					
					tablas($sql1, $sql2, $enlace, 5);
					//echo $sql2;
					echo ('</table>');
			}
		?>
				
	</table>
	

  <div style="background-color:black; height:auto;width:100%;clear:both;">
	<table style="width:100%; color:#fff;">
	<tr>
		<td style="width:30%; text-align:center;">&nbsp;</td>
		<td style="width:40%; text-align:center;"><img src="./imagenes/logoescuela.png" width="115" height="23"></img>
		<img src="./imagenes/logo_universidad.png"></img></td>
	</tr>
	</table>    
  </div>
</div>
</body>
</html>


<?php

	function tablas($sql1, $sql2, $enlace, $tamano){
		
		echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
		$nom_col = $sql1;
		
		echo ('<thead>');
		echo ('<tr>');
		for ($i=0; $i<$tamano; $i++){
		
			echo ('<th>'); 
			echo $nom_col[$i];
			echo ('</th>');
		}
		
		echo ('</tr>');
		echo('</thead>');
		
		$fields = mysql_query($sql2, $enlace);
		echo ('<tr>');
		
		while ($fila2 = mysql_fetch_assoc($fields)) {
			
			for ($i=0; $i<$tamano; $i++){
				echo ('<td>'); 
				//echo $fila2[$fila['Field']];
				if ($fila2[$nom_col[$i]]== NULL){
						
					echo '-------------';
				}
				else{
					echo utf8_encode($fila2[$nom_col[$i]]); 
				}
				echo ('</td>'); 
			}
			//echo('<td><div class="dos"><a href="#">Eliminar</a><a href="#">Modificar</a></div></td>');
			echo ('</tr>');
		}
		
	}
?>

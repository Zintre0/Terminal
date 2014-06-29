<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/mio.css" rel="stylesheet" type="text/css" />
<title>Administracion Terminal</title>
</head>



<body>
<div style="height:auto;width:100%;">
  <div style="background-color:black;width:100%;">
    <h3 style="color:#fff;text-align:center;"><br>Administracion Terminal</h3>
  </div>
  <table>
	<tr>
		<td style="width:20%" VALIGN=TOP>
		<b style="color:#fff;">Tabla de Contenidos</b>
		<br>&nbsp;
		<br><div class="dos"><a href="index.php?menu=1">Inicio</a></div><br>
		<br><div class="dos"><a href="estadisticas.php?menu=8">Volver a Consultas Estadísticas</a></div>
		
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
			include './constantes.php';
			if (!$enlace = mysql_connect('localhost', 'root', $password)) {
				echo 'No pudo conectarse a mysql';
				exit;
			}

			if (!mysql_select_db($base_de_datos, $enlace)) {
				echo 'No pudo seleccionar la base de datos';
				exit;
			}
			switch ($_GET["valores"]) {
			
				case 3:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="local">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					
					case 4:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="buses">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA WHERE EMPRESA.GIRO_idGIRO = 3 OR EMPRESA.GIRO_idGIRO = 4 OR EMPRESA.GIRO_idGIRO = 5';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					
					case 5:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="pagos">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA WHERE EMPRESA.GIRO_idGIRO = 3 OR EMPRESA.GIRO_idGIRO = 4 OR EMPRESA.GIRO_idGIRO = 5';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				
				case 6:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="sin_pagos">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA WHERE EMPRESA.GIRO_idGIRO = 3 OR EMPRESA.GIRO_idGIRO = 4 OR EMPRESA.GIRO_idGIRO = 5';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				
				case 7:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="cobros">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA WHERE EMPRESA.GIRO_idGIRO = 1 OR EMPRESA.GIRO_idGIRO = 2';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					
				case 9:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="sin_cobros">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA WHERE EMPRESA.GIRO_idGIRO = 1 OR EMPRESA.GIRO_idGIRO = 2';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					
				case 10:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="historial">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select DISTINCT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								
								echo ("<option value='$emm'>$emm -> $em2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 100:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="fechas">
							<optgroup label="Selecciona una fecha de pago">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select PAGO.FECHA_PAGO from PAGO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								
								$em4 = utf8_encode($fil['FECHA_PAGO']);
								echo ("<option value='$em4'>$em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 1000:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="montos">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, MAX(PAGO.FECHA_PAGO) AS ULTIMO_PAGO from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA GROUP BY EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								$em3 = utf8_encode($fil['ULTIMO_PAGO']);
								echo ("<option value='$emm'>$emm -> $em2 -> $em3</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				
				case 11:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="historial_cobro">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select DISTINCT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								
								echo ("<option value='$emm'>$emm -> $em2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 111:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="fechas_cobro">
							<optgroup label="Selecciona una fecha de pago">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select COBRO_SERVICIO.FECHA_SERVICIO from COBRO_SERVICIO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								
								$em4 = utf8_encode($fil['FECHA_SERVICIO']);
								echo ("<option value='$em4'>$em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 1111:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="montos_cobro">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, MAX(COBRO_SERVICIO.FECHA_SERVICIO) AS ULTIMO_PAGO from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA GROUP BY EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								$em3 = utf8_encode($fil['ULTIMO_PAGO']);
								echo ("<option value='$emm'>$emm -> $em2 -> $em3</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					
				case 12:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="empresa">
							<optgroup label="Selecciona un id empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select DISTINCT EMPRESA.idEMPRESA,  EMPRESA.NOMBRE_EMPRESA FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA INNER JOIN FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON LOCAL.idLOCAL = HORARIO.LOCAL_idLOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO ORDER BY EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm -> $em2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				
				case 122:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="anden_fecha">
							<optgroup label="Selecciona una fecha de uso">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'select FECHA_ARRIVO FROM FLUJO_BUSES order by FECHA_ARRIVO DESC';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['FECHA_ARRIVO']);
									
								echo ("<option value='$emm'>$emm</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				
				case 20:
					
						echo ('<form name="formulario" method="get" action="proceso_filtros_estadisticas.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione la Empresa
							<select name="morosa">
							<optgroup label="Selecciona una empresa">');
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, MAX(PAGO.FECHA_PAGO) AS ULTIMO_PAGO, DATEDIFF(NOW(), PAGO.FECHA_PAGO) AS DIAS_ATRASADOS  FROM PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA WHERE ( DATEDIFF(NOW(), PAGO.FECHA_PAGO) >0) GROUP BY EMPRESA.idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$emm2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm ->$emm2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				default:
					break;
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

	function hiper_tablas(){
		if (!$enlace = mysql_connect('localhost', 'root', $password)) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db($base_de_datos, $enlace)) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}
		$show_tables = mysql_query('show tables', $enlace);
		if (!$show_tables) {
			echo "Error de BD, no se pudo consultar la base de datos\n";
			#echo "Error MySQL: ' . mysql_error();
			exit;
		}
		$i=1;
		while ($fila = mysql_fetch_assoc($show_tables)) {
			$i++;
			echo ('<div class="dos"><a href=index.php?num='."$i".'>'); 
			echo $fila['Tables_in_TERMINAL_DE_BUSES'];
			echo ("</a></div>");
			//echo $fila['cod_ong'] .'---';
		}
	}
?>

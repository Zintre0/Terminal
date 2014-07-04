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
			
				case 1222:
					
					echo('<form name="formulario" method="get" action="procesar_consultas_anidadas.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Id Empresa
							<select name="empresa_id">');
							
							$sql1 = 'select DISTINCT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA from EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								
								echo ("<option value='$em1'> $em1 -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
					echo('<td>Fecha
							<select name="fecha_anden">');
							
							$sql1 = 'SELECT DISTINCT FECHA_ARRIVO FROM FLUJO_BUSES order by FECHA_ARRIVO DESC';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['FECHA_ARRIVO']);
								
								echo ("<option value='$em1'> $em1</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
						
					echo('<td>Andén
							<select name="numero_anden">');
							
							$sql1 = 'SELECT LOCAL.idLOCAL as N_ANDEN FROM LOCAL INNER JOIN TIPO ON LOCAL.TIPO_idTIPO = TIPO.idTIPO where TIPO.idTIPO=2 ORDER BY LOCAL.idLOCAL DESC';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['N_ANDEN']);
								
								echo ("<option value='$em1'> $em1</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
					
					echo('<td>Sector
							<select name="sector">');
							
							$sql1 = 'SELECT NOMBRE_SECTOR FROM SECTOR';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['NOMBRE_SECTOR']);
								
								echo ("<option value='$em1'> $em1</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
						
					break;
				
				case 12222:
					
					echo('<form name="formulario" method="get" action="procesar_consultas_anidadas.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Id Empresa
							<select name="empresa_ID">');
							
							$sql1 = 'select DISTINCT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA from EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								
								echo ("<option value='$em1'> $em1 -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
					echo('<td>Fecha
							<select name="fecha_Anden">');
							
							$sql1 = 'SELECT DISTINCT FECHA_ARRIVO FROM FLUJO_BUSES order by FECHA_ARRIVO DESC';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['FECHA_ARRIVO']);
								
								echo ("<option value='$em1'> $em1</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
						
					echo('<td><input type="submit" value="send"></td></tr>
								</table>
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

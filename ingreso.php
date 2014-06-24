<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/mio.css" rel="stylesheet" type="text/css" />
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
		<?php 	
			include './funciones.php'; 
			hiper_tablas();?>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
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
				case 2:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>
							<td>Selecciona a la empresa que pertenece
							<select name="id_empresa">
							<optgroup label="Seleccione un id empresa">');
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA where GIRO_idGIRO=3 order by idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								#echo "Error MySQL: ' . mysql_error();
								exit;
							}
							//$fila = mysql_fetch_assoc($sucu);
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm ---> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td>Ingresa la patente: <input name="patente" type="text" id="consulta" required/></td>
							<td>Ingresa la capacidad del bus: <input name="capacidad" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 3:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td>Ingresa el monto del cobro: <input name="cobro_servicio" type="text" id="consulta" required/></td>
							<td>Ingresa la fecha del cobro: <input name="fecha" type="text" id="consulta" required/></td>');
					echo('<td>Selecciona a la empresa que pertenece
							<select name="id_empresa">
							<optgroup label="Seleccione un id empresa">');
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA where GIRO_idGIRO=1 or GIRO_idGIRO=2 order by idEMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								#echo "Error MySQL: ' . mysql_error();
								exit;
							}
							//$fila = mysql_fetch_assoc($sucu);
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$emm'>$emm ---> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 4:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Selecciona al representante con este contacto
							<select name="contacto">
							<optgroup label="Seleccione un id representante">');
							
							$sql1 = 'SELECT idREPRESENTANTE,NOMBRE_REPRESENTANTE,APELLIDOS_REPRESENTANTE FROM REPRESENTANTE order by idREPRESENTANTE';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								#echo "Error MySQL: ' . mysql_error();
								exit;
							}
							//$fila = mysql_fetch_assoc($sucu);
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idREPRESENTANTE']);
								$em2 = utf8_encode($fil['NOMBRE_REPRESENTANTE']);
								$em3 = utf8_encode($fil['APELLIDOS_REPRESENTANTE']);
								echo ("<option value='$emm'> $emm || $em2 || $em3 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td>Ingresa el telefono: <input name="telefono" type="text" id="consulta" required/></td>
							<td>Ingresa el e-mail: <input name="e_mail" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 5:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Selecciona al representante asociado al contrato
							<select name="contrato">
							<optgroup label="Seleccione un id representante">');
							
							$sql1 = 'SELECT idREPRESENTANTE,NOMBRE_REPRESENTANTE,APELLIDOS_REPRESENTANTE FROM REPRESENTANTE order by idREPRESENTANTE';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								#echo "Error MySQL: ' . mysql_error();
								exit;
							}
							//$fila = mysql_fetch_assoc($sucu);
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idREPRESENTANTE']);
								$em2 = utf8_encode($fil['NOMBRE_REPRESENTANTE']);
								$em3 = utf8_encode($fil['APELLIDOS_REPRESENTANTE']);
								echo ("<option value='$emm'> $emm || $em2 || $em3 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td>Ingresa la fecha de inicio: <input name="fecha_ini" type="text" id="consulta" required/></td>
							<td>Ingresa la fecha de termino: <input name="fecha_ter" type="text" id="consulta" required/></td>');
							//<td>Ingrese el dia de pago: <input name="fecha_pago" type="text" id="consulta" required/></td>
							echo('<td>Selecciona un dia de pago
							<select name="fecha_pago">
							<optgroup label="Seleccione un dia">');
							$i=1;
							while ($i<=31) {
								echo ("<option value='$i'>-->$i<--</option>");
								$i++;
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							
							echo('<td>Ingresa el monto del contrato: <input name="monto" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 6:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Selecciona un giro para la empresa
							<select name="id_giro_empresa">
							<optgroup label="Selecciona un giro">');
							
							$sql1 = 'SELECT * FROM GIRO order by idGIRO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idGIRO']);
								$em2 = utf8_encode($fil['NOMBRE_GIRO']);
								echo ("<option value='$em1'> $em1 --> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td>Ingrese el nombre de la empresa: <input name="nom_empre" type="text" id="consulta" required/></td>
							<td>Ingrese rut de la empresa: <input name="rut_emp" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 7:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td>Selecciona un horario de llegada
							<select name="id_horario_buses">
							<optgroup label="__ID --> ENTRADA || SALIDA">');
							
							$sql1 = 'SELECT * FROM HORARIO order by idHORARIO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idHORARIO']);
								$em2 = utf8_encode($fil['ENTRADA']);
								$em3 = utf8_encode($fil['SALIDA']);
								echo ("<option value='$em1'> $em1 --> $em2 || $em3</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
					echo('<td>Selecciona un el bus
							<select name="id_bus">
							<optgroup label="__ID --> PATENTE">');
							
							$sql1 = 'SELECT * FROM BUS order by idBUS';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idBUS']);
								$em2 = utf8_encode($fil['PATENTE']);
								echo ("<option value='$em1'> $em1 --> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td>Ingrese el fecha arrivo(AAAA-MM-DD): <input name="fecha_arrivo" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 8:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
							echo ('<td>Ingresa un nombre de giro: <input name="nom_giro" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 9:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona el local que se relaciona con horario
							<select name="id_local_horario">
							<optgroup label="Selecciona un local">');
							
							$sql1 = 'SELECT * FROM LOCAL WHERE TIPO_idTIPO=2 and CONTRATO_idCONTRATO is not null order by idLOCAL';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idLOCAL']);
								echo ("<option value='$em1'>-->$em1<--</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo ('<td style="color:#fff;">Ingrese la hora de llegada(HH:MM:SS): <input name="hora_llega" type="text" id="consulta" required/></td>');
							echo ('<td style="color:#fff;">Ingrese la hora de salida(HH:MM:SS): <input name="hora_salida" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 10:
					echo('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona si el local tiene contrato
							<select name="id_local">
							<optgroup label="Selecciona un contrato">');
							
							$sql1 = 'SELECT * FROM CONTRATO order by idCONTRATO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idCONTRATO']);
								echo ("<option value='$em1'>-->$em1<--</option>");
							}
							echo ("<option value='NULL'>-->NULL<--</option>");
							echo ('</optgroup>');
							echo ('</select></td>');
					echo('<td style="color:#fff;">Selecciona el tipo de local
							<select name="tipo_local">
							<optgroup label="Selecciona un tipo">');
							
							$sql1 = 'SELECT * FROM TIPO order by idTIPO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idTIPO']);
								$em2 = utf8_encode($fil['TIPO_LOCAL']);
								echo ("<option value='$em1'> $em1 --> $em2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							
					echo('<td style="color:#fff;">Selecciona un sector
							<select name="sector_local">
							<optgroup label="Selecciona un sector">');
							
							$sql1 = 'SELECT * FROM SECTOR order by idSECTOR';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idSECTOR']);
								$em2 = utf8_encode($fil['NOMBRE_SECTOR']);
								echo ("<option value='$em1'> $em1 --> $em2</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 11:
					break;
				case 12:
					break;
				case 13:
					break;
				case 14:
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

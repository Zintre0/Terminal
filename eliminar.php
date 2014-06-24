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
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione el bus que desea eliminar
							<select name="idbus_elim">
							<optgroup label="Selecciona un id bus">');							
							$sql1 = 'SELECT idBUS,PATENTE FROM BUS';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idBUS']);
								$em2 = utf8_encode($fil['PATENTE']);
								echo ("<option value='$emm'>$emm -> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 3:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Seleccione el cobro que desea eliminar
							<select name="id_cobro_serv_elim">
							<optgroup label="___ID || MONTO || FECHA || EMPRESA">');
							
							$sql1 = 'SELECT * FROM COBRO_SERVICIO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['idCOBRO_SERVICIO']);
								$em2 = utf8_encode($fil['PAGO_SERVICIO']);
								$em3 = utf8_encode($fil['FECHA_SERVICIO']);
								$em4 = utf8_encode($fil['EMPRESA_idEMPRESA']);
								echo ("<option value='$emm'>$emm || $em2 || $em3 || $em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 4:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el contacto que quiere eliminar
							<select name="id_contacto_elim">
							<optgroup label="_ID || ID_REPRESENTANTE || TELEFONO || MAIL">');
							
							$sql1 = 'SELECT * FROM CONTACTO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idCONTACTO']);
								$em2 = utf8_encode($fil['REPRESENTANTE_idREPRESENTANTE']);
								$em3 = utf8_encode($fil['NUMERO_TELEFONO']);
								$em4 = utf8_encode($fil['MAIL']);
								echo ("<option value='$em1'>$em1 || $em2 || $em3 || $em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 5:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el contacto que quiere eliminar
							<select name="id_contrato_elim">
							<optgroup label="_ID || ID_REPRESENTANTE || FECHA_INICIO || FECHA_TERMINO">');
							
							$sql1 = 'SELECT * FROM CONTRATO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idCONTRATO']);
								$em2 = utf8_encode($fil['REPRESENTANTE_idREPRESENTANTE']);
								$em3 = utf8_encode($fil['FECHA_INICIO']);
								$em4 = utf8_encode($fil['FECHA_TERMINO']);
								echo ("<option value='$em1'>$em1 || $em2 || $em3 || $em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 6:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione la empresa que quiere eliminar
							<select name="id_empresa_elim">
							<optgroup label="_ID || ID_REPRESENTANTE">');
							
							$sql1 = 'SELECT * FROM EMPRESA';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idEMPRESA']);
								$em2 = utf8_encode($fil['NOMBRE_EMPRESA']);
								echo ("<option value='$em1'>$em1 --> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 7://ARREGLAR
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<td style="color:#fff;">Seleccione el que quiera eliminar
							<select name="id_flujo_elim">
							<optgroup label="_IDHORARIO || IDBUS || FECHA_ARRIVO">');
							$sql1 = 'SELECT * FROM FLUJO_BUSES';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['HORARIO_idHORARIO']);
								$em2 = utf8_encode($fil['BUS_idBUS']);
								$em3 = utf8_encode($fil['FECHA_ARRIVO']);
								echo ("<option value='$em1'> $em1 || $em2 || $em3 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo('<td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 8:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el giro que quiere eliminar
							<select name="id_giro_elim">
							<optgroup label="_ID || NOMBRE_GIRO">');
							
							$sql1 = 'SELECT * FROM GIRO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idGIRO']);
								$em2 = utf8_encode($fil['NOMBRE_GIRO']);
								echo ("<option value='$em1'>$em1 --> $em2 </option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 9:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width=600 border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el horario que desea eliminar
							<select name="id_horario_elim">
							<optgroup label="_IDHORARIO || IDLOCAL || ENTRADA || SALIDA">');
							
							$sql1 = 'SELECT * FROM HORARIO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idHORARIO']);
								$em2 = utf8_encode($fil['LOCAL_idLOCAL']);
								$em3 = utf8_encode($fil['ENTRADA']);
								$em4 = utf8_encode($fil['SALIDA']);
								echo ("<option value='$em1'>$em1 || $em2 || $em3 || $em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 10:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width=600 border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el local que desea eliminar
							<select name="id_local_elim">
							<optgroup label="_idLOCAL || idCONTRATO || idTIPO || idSECTOR">');
							
							$sql1 = 'SELECT * FROM LOCAL';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idLOCAL']);
								$em2 = utf8_encode($fil['CONTRATO_idCONTRATO']);
								$em3 = utf8_encode($fil['TIPO_idTIPO']);
								$em4 = utf8_encode($fil['SECTOR_idSECTOR']);
								echo ("<option value='$em1'>$em1 || $em2 || $em3 || $em4</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
					break;
				case 11:
					break;
				case 12:
					break;
				case 13:
					break;
				case 14:
					break;
				case 15:
					break;
				case 16:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td style="color:#fff;">Seleccione el tipo
							<select name="id_tipo_elim">
							<optgroup label="_ID --> TIPO_LOCAL">');
							
							$sql1 = 'SELECT * FROM TIPO';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$em1 = utf8_encode($fil['idTIPO']);
								$em2 = utf8_encode($fil['TIPO_LOCAL']);
								echo ("<option value='$em1'>$em1 --> $em2 </option>");
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

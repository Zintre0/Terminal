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
			include 'funciones.php'; 
			hiper_tablas();?>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
			include 'constantes.php';
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
							<td>Ingresa el e-mail: <input name="e-mail" type="text" id="consulta" required/></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
					break;
				case 5:
					echo ('<form name="formulario" method="get" action="procesar.php">
						<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
						<tr class="odd">
							<td>Ingresa el nombre de la actividad: <input name="nom_act" type="text" value="Tu texto va aqui" id="consulta" /></td>
							<td><input type="submit" value="send"></td>
							</tr>
						</table>
						</form>');
					break;
				case 6:
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

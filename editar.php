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
			
			//echo ($_GET['nombre_tabla'].' ID= '.$_GET['id']);
			$nombre = $_GET['nombre_tabla'];
			$id = $_GET['id'];
			switch ($nombre) {
				case 'BUS'://2
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>
							<td style="color:#fff;">Selecciona a la empresa que pertenece
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
							echo ('<td style="color:#fff;">Ingresa la nueva patente: <input name="patente" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa la nueva capacidad del bus: <input name="capacidad" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr></table></form>');
					break;
				case 'COBRO_SERVICIO': //3
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingrese un nuevo monto de cobro: <input name="cobro_servicio" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingrese una nueva fecha de cobro: <input name="fecha" type="text" id="consulta" required/></td>');
					echo('<td style="color:#fff;">Selecciona a la empresa que pertenece
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
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'CONTACTO'://4
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona al nuevo representante con este contacto
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
							echo ('<td style="color:#fff;">Ingresa el nuevo telefono: <input name="telefono" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa el nuevo e-mail: <input name="e_mail" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr></table></form>');
					break;
					
				case 'CONTRATO'://5
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona al nuevo representante asociado al contrato
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
							echo ('<td style="color:#fff;">Ingresa la nueva fecha de inicio: <input name="fecha_ini" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa la nueva fecha de termino: <input name="fecha_ter" type="text" id="consulta" required/></td>');
							echo('<td style="color:#fff;">Selecciona un el nuevo dia de pago
							<select name="fecha_pago">
							<optgroup label="Seleccione un dia">');
							$i=1;
							while ($i<=31) {
								echo ("<option value='$i'>-->$i<--</option>");
								$i++;
							}
							echo ('</optgroup>');
							echo ('</select></td>');
							echo('<td style="color:#fff;">Ingresa el nuevo monto del contrato: <input name="monto" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
					
				case 'EMPRESA'://6
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona el nuevo giro de la empresa
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
							echo ('<td style="color:#fff;">Ingrese el nuevo nombre de la empresa: <input name="nom_empre" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa el nuevo rut de la empresa: <input name="rut_emp" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'FLUJO_BUSES'://7
					$id2 = $_GET['id2'];
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
							echo ('<td style="color:#fff;">Ingrese la nueva fecha arrivo(AAAA-MM-DD): <input name="fecha_arrivo" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="ID2" value='.$id2.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'GIRO'://8
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingresa el nuevo nombre del giro: <input name="nom_giro" type="text" id="consulta" required/></td>');
					echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
					echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
					echo('<td><input type="submit" value="send"></td></tr></table></form>');
					break;
				
				case 'HORARIO'://9
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona el nuevo local que se relaciona con horario
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
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'LOCAL'://10
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
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
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'PAGO'://11
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingresa el nuevo monto del pago: <input name="monto_pago" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa la nueva fecha del pago: <input name="fecha_pago" type="text" id="consulta" required/></td>');
					echo('<td style="color:#fff;">Selecciona a la empresa que pertenece
							<select name="id_empresa">
							<optgroup label="Seleccione un id empresa">');
							
							$sql1 = 'SELECT idEMPRESA,NOMBRE_EMPRESA FROM EMPRESA where GIRO_idGIRO!=1 and GIRO_idGIRO!=2 order by idEMPRESA';
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
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'PROFESION'://12
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingresa el nuevo nombre de la profesion: <input name="nom_profesion" type="text" id="consulta" required/></td>');
					echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
					echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
					echo('<td><input type="submit" value="send"></td></tr></table></form>');
					break;
				case 'REPRESENTANTE'://13
					echo ('* Si no aparecen empresas es por que todas ya tienen su respectivo representante');
					echo ('<br>* Para ingresar uno nuevo debe ingresar una nueva empresa');
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo('<td style="color:#fff;">Selecciona a la nueva empresa que pertenece
							<select name="id_empresa_representante">
							<optgroup label="Seleccione un id empresa">');
							
							$sql1 ='select * from EMPRESA where idEMPRESA not in (select EMPRESA_idEMPRESA from REPRESENTANTE)';
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
							echo ('<td style="color:#fff;">Ingresa el nombre: <input name="nombre" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa los apellidos: <input name="apellidos" type="text" id="consulta" required/></td>
							<td style="color:#fff;">Ingresa lel rut: <input name="rut_repre" type="text" id="consulta" required/></td>');
							echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
							echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 'SECTOR'://15
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingresa el nuevo nombre del sector: <input name="nom_sector" type="text" id="consulta" required/></td>');
					echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
					echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
					echo('<td><input type="submit" value="send"></td></tr></table></form>');
					break;	
				case 'TIPO'://16
					echo('<form name="formulario" method="get" action="ingresarEdicion.php">
							<table summary="Submitted table designs" width="50" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<tr>');
					echo ('<td style="color:#fff;">Ingresa el nuevo nombre del '.$nombre.': <input name="nom_tipo" type="text" id="consulta" required/></td>');
					echo ('<td ><input type="hidden" name="ID" value='.$id.' /></td>');
					echo ('<td ><input type="hidden" name="nombre_tabla" value='.$nombre.' /></td>');
					echo('<td><input type="submit" value="send"></td></tr></table></form>');
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

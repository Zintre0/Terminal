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
			
			//echo ($_GET['nombre_tabla'].' ID= '.$_GET['ID'].'  COSA:  '.$_GET['nom_giro']);
			//echo ('<br>');
			
			switch ($_GET['nombre_tabla']) {
				case 'BUS':
					$nombre_tabla= $_GET['nombre_tabla'];
					$patente = "'".$_GET['patente']."'";
					$capacidad = $_GET['capacidad'];
					$id_empresa = $_GET['id_empresa'];
					$ID = $_GET['ID'];
					$ingreso = "UPDATE $nombre_tabla SET EMPRESA_idEMPRESA=$id_empresa, PATENTE=$patente, CAPACIDAD=$capacidad WHERE idBUS=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=2"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=2"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'COBRO_SERVICIO'://3
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$cobro_servicio = "'".$_GET['cobro_servicio']."'";
					$fecha = $_GET['fecha'];
					$id_empresa = $_GET['id_empresa'];
					$ingreso = "UPDATE $nombre_tabla SET PAGO_SERVICIO=$cobro_servicio, FECHA_SERVICIO=$fecha, EMPRESA_idEMPRESA=$id_empresa WHERE idCOBRO_SERVICIO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=3"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=3"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'CONTACTO'://4
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$contacto = $_GET['contacto'];
					$telefono = "'".$_GET['telefono']."'";
					$e_mail = "'".$_GET['e_mail']."'";
					$ingreso = "UPDATE $nombre_tabla SET REPRESENTANTE_idREPRESENTANTE=$contacto, NUMERO_TELEFONO=$telefono, MAIL=$e_mail WHERE idCONTACTO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=4"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=4"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'CONTRATO'://5
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$contrato = $_GET['contrato'];
					$fecha_ini = "'".$_GET['fecha_ini']."'";
					$fecha_ter = "'".$_GET['fecha_ter']."'";
					$fecha_pago = "'".$_GET['fecha_pago']."'";
					$monto = "'".$_GET['monto']."'";
					$ingreso = "UPDATE $nombre_tabla SET REPRESENTANTE_idREPRESENTANTE=$contrato, FECHA_INICIO=$fecha_ini, FECHA_TERMINO=$fecha_ter, FECHA_PAGOS=$fecha_pago ,MONTO_CONTRATO=$monto WHERE idCONTRATO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'EMPRESA'://6
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$id_giro_empresa = $_GET['id_giro_empresa'];
					$nom_empre = "'".$_GET['nom_empre']."'";
					$rut_emp = "'".$_GET['rut_emp']."'";

					$ingreso = "UPDATE $nombre_tabla SET GIRO_idGIRO=$id_giro_empresa, NOMBRE_EMPRESA=$nom_empre, RUT_EMPRESA=$rut_emp WHERE idEMPRESA=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=6"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=6"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'FLUJO_BUSES'://7
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$ID2 = $_GET['ID2'];
					$fecha_arrivo = "'".$_GET['fecha_arrivo']."'";

					$ingreso = "UPDATE $nombre_tabla SET FECHA_ARRIVO=$fecha_arrivo WHERE HORARIO_idHORARIO=$ID AND BUS_idBUS=$ID2";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=7"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'GIRO': //8
					$nombre_tabla= $_GET['nombre_tabla'];
					$nom_giro = "'".$_GET['nom_giro']."'";
					$ID = $_GET['ID'];
					$ingreso = "UPDATE $nombre_tabla SET NOMBRE_GIRO=$nom_giro WHERE idGIRO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=8"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=8"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'HORARIO'://9
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					
					$id_local_horario = $_GET['id_local_horario'];
					$hora_llega = "'".$_GET['hora_llega']."'";
					$hora_salida = "'".$_GET['hora_salida']."'";
					$ingreso = "UPDATE $nombre_tabla SET LOCAL_idLOCAL=$id_local_horario, ENTRADA=$hora_llega, SALIDA=$hora_salida WHERE idHORARIO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=9"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=9"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
					break;
				case 'LOCAL'://10
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$id_local = $_GET['id_local'];
					$ingreso = "UPDATE $nombre_tabla SET CONTRATO_idCONTRATO=$id_local WHERE idLOCAL=$ID";
					//echo ('<br>'.$ingreso);
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=10"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=10"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
					break;
				case 'PAGO'://11
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$monto_pago = $_GET['monto_pago'];
					$fecha_pago = "'".$_GET['fecha_pago']."'";
					$id_empresa = $_GET['id_empresa'];
					$ingreso = "UPDATE $nombre_tabla SET MONTO_PAGO=$monto_pago,FECHA_PAGO=$fecha_pago,EMPRESA_idEMPRESA=$id_empresa WHERE idPAGO=$ID";
					//echo ('<br>'.$ingreso);
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=11"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=11"><input type="submit" value="Nuevo" /></a>');
					echo ('<a href="index.php?num=11"><h1>EDITADO CORRECTAMENTE</h1></a>');
					break;
				case 'PROFESION'://12
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$nom_profesion = "'".$_GET['nom_profesion']."'";
					$ingreso = "UPDATE $nombre_tabla SET NOMBRE_PROFESION=$nom_profesion WHERE idPROFESION=$ID";
					//echo ('<br>'.$ingreso);
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=12"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=12"><input type="submit" value="Nuevo" /></a>');
					echo ('<a href="index.php?num=12"><h1>EDITADO CORRECTAMENTE</h1></a>');
					break;
				
				case 'REPRESENTANTE'://13
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$id_empresa_representante = $_GET['id_empresa_representante'];
					$nombre = "'".$_GET['nombre']."'";
					$apellidos = "'".$_GET['apellidos']."'";
					$rut_repre = "'".$_GET['rut_repre']."'";
					$ingreso = "UPDATE $nombre_tabla SET EMPRESA_idEMPRESA=$id_empresa_representante,NOMBRE_REPRESENTANTE=$nombre,APELLIDOS_REPRESENTANTE=$apellidos,RUT_REPRESENTANTE=$rut_repre WHERE idREPRESENTANTE=$ID";
					//echo ('<br>'.$ingreso);
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=13"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=13"><input type="submit" value="Nuevo" /></a>');
					echo ('<a href="index.php?num=13"><h1>EDITADO CORRECTAMENTE</h1></a>');
					break;	
				case 'SECTOR'://15
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$nom_sector = "'".$_GET['nom_sector']."'";
					$ingreso = "UPDATE $nombre_tabla SET NOMBRE_SECTOR=$nom_sector WHERE idSECTOR=$ID";
					//echo ('<br>'.$ingreso);
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=15"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=15"><input type="submit" value="Nuevo" /></a>');
					echo ('<a href="index.php?num=15"><h1>EDITADO CORRECTAMENTE</h1></a>');
					break;
					
				case 'TIPO'://16
					$nombre_tabla= $_GET['nombre_tabla'];
					$ID = $_GET['ID'];
					$nom_tipo = "'".$_GET['nom_tipo']."'";
					$ingreso = "UPDATE $nombre_tabla SET TIPO_LOCAL=$nom_tipo WHERE idTIPO=$ID";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "<br> Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<a href="eliminar.php?valores=16"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=16"><input type="submit" value="Nuevo" /></a>');
					echo ('<h1>EDITADO CORRECTAMENTE</h1>');
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
		<td style="width:40%; text-align:center;"><img src="./images/logoescuela.png" width="115" height="23"></img>
		<img src="./imagenes/logo_universidad.png"></img></td>
	</tr>
	</table>    
  </div>
</div>
</body>
</html>

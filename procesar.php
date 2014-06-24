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
			$valor = 0;
			foreach ($_GET as $R => $V){
					if ($R=="id_empresa"){
						$valor=2;
						break;
					}
					else if ($R=="cobro_servicio"){
						$valor=3;
						break;
					}
					else if ($R=="contacto"){
						$valor=4;
						break;
					}
					else if ($R=="contrato"){
						$valor=5;
						break;
					}
					else if ($R=="id_giro_empresa"){
						$valor=6;
						break;
					}
					else if ($R=="id_horario_buses"){
						$valor=7;
						break;
					}
					else if ($R=="nom_giro"){
						$valor=8;
						break;
					}
					else if ($R=="id_local_horario"){
						$valor=9;
						break;
					}
					else if ($R=="id_local"){
						$valor=10;
						break;
					}
					else if ($R=="idbus_elim"){
						$valor=102;
						break;
					}
					else if ($R=="id_cobro_serv_elim"){
						$valor=103;
						break;
					}
					else if ($R=="id_contacto_elim"){
						$valor=104;
						break;
					}
					else if ($R=="id_contrato_elim"){
						$valor=105;
						break;
					}
					else if ($R=="id_empresa_elim"){
						$valor=106;
						break;
					}
					else if ($R=="id_flujo_elim"){
						$valor=107;
						break;
					}
					else if ($R=="id_giro_elim"){
						$valor=108;
						break;
					}
					else if ($R=="id_horario_elim"){
						$valor=109;
						break;
					}
					
			}
			if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
				}

			if (!mysql_select_db($base_de_datos, $enlace)) {
				echo 'No pudo seleccionar la base de datos';
				exit;
			}
			
			if ($valor==2){
				$sql1 = 'SELECT MAX(idBUS) FROM BUS';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idBUS)'] + 1;
				$id_empresa= "'".$_GET['id_empresa']."'";
				$patente= "'".$_GET['patente']."'";
				$capacidad= "'".$_GET['capacidad']."'";
				
				$ingreso = "INSERT INTO BUS values($num,$id_empresa,$patente,$capacidad)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=2"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=2"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==3){
				$sql1 = 'SELECT MAX(idCOBRO_SERVICIO) FROM COBRO_SERVICIO';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idCOBRO_SERVICIO)'] + 1;
				$cobro_servicio= "'".$_GET['cobro_servicio']."'";
				$fecha= "'".$_GET['fecha']."'";
				$id_empresa= "'".$_GET['id_empresa']."'";
				
				$ingreso = "INSERT INTO COBRO_SERVICIO values($num,$cobro_servicio,$fecha,$id_empresa)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=3"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=3"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==4){
				$sql1 = 'SELECT MAX(idCONTACTO) FROM CONTACTO';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idCONTACTO)'] + 1;
				$contacto= "'".$_GET['contacto']."'";
				$telefono= "'".$_GET['telefono']."'";
				$e_mail= "'".$_GET['e_mail']."'";
				
				$ingreso = "INSERT INTO CONTACTO values($num,$contacto,$telefono,$e_mail)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=4"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=4"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==5){
				$sql1 = 'SELECT MAX(idCONTRATO) FROM CONTRATO';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idCONTRATO)'] + 1;
				$contrato= "'".$_GET['contrato']."'";
				$fecha_ini= "'".$_GET['fecha_ini']."'";
				$fecha_ter= "'".$_GET['fecha_ter']."'";
				$fecha_pago= "'".$_GET['fecha_pago']."'";
				$monto= "'".$_GET['monto']."'";
				
				$ingreso = "INSERT INTO CONTRATO values($num,$contrato,$fecha_ini,$fecha_ter,$fecha_pago,$monto)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==6){
				$sql1 = 'SELECT MAX(idEMPRESA) FROM EMPRESA';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idEMPRESA)'] + 1;
				$id_giro_empresa= "'".$_GET['id_giro_empresa']."'";
				$nom_empre= "'".$_GET['nom_empre']."'";
				$rut_emp= "'".$_GET['rut_emp']."'";
				
				$ingreso = "INSERT INTO EMPRESA values($num,$id_giro_empresa,$nom_empre,$rut_emp)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=6"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=6"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==7){
				$id_horario_buses= "'".$_GET['id_horario_buses']."'";
				$id_bus= "'".$_GET['id_bus']."'";
				$fecha_arrivo= "'".$_GET['fecha_arrivo']."'";
				
				$ingreso = "INSERT INTO FLUJO_BUSES values($id_horario_buses,$id_bus,$fecha_arrivo)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=7"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==8){
				$sql1 = 'SELECT MAX(idGIRO) FROM GIRO';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					#echo "Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idGIRO)'] + 1;
				$nom_giro= "'".$_GET['nom_giro']."'";
				
				$ingreso = "INSERT INTO GIRO values($num,$nom_giro)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=8"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=8"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==9){
				$sql1 = 'SELECT MAX(idHORARIO) FROM HORARIO';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idHORARIO)'] + 1;
				$id_local_horario= "'".$_GET['id_local_horario']."'";
				$hora_llega= "'".$_GET['hora_llega']."'";
				$hora_salida= "'".$_GET['hora_salida']."'";
				
				$ingreso = "INSERT INTO HORARIO values($num,$id_local_horario,$hora_llega,$hora_salida)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=9"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=9"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==10){
				$sql1 = 'SELECT MAX(idLOCAL) FROM LOCAL';
				$cantidad = mysql_query($sql1, $enlace);
				if (!$cantidad) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				$fila = mysql_fetch_assoc($cantidad);
				$num = $fila['MAX(idLOCAL)'] + 1;
				//$id_local= "'".$_GET['id_local']."'";
				if ($_GET['id_local']=='NULL'){
					$id_local= $_GET['id_local'];
				}
				else{
					$id_local= "'".$_GET['id_local']."'";
				}
				$tipo_local= "'".$_GET['tipo_local']."'";
				$sector_local= "'".$_GET['sector_local']."'";
				$ingreso = "INSERT INTO LOCAL values($num,$id_local,$tipo_local,$sector_local)";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<a href="eliminar.php?valores=10"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=10"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			
			if ($valor==102){
				$elim= "'".$_GET['idbus_elim']."'";
				$ingreso = "DELETE FROM BUS WHERE idBUS=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=2"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=2"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==103){
				$elim= "'".$_GET['id_cobro_serv_elim']."'";
				$ingreso = "DELETE FROM COBRO_SERVICIO WHERE idCOBRO_SERVICIO=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=3"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=3"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==104){
				$elim= "'".$_GET['id_contacto_elim']."'";
				$ingreso = "DELETE FROM CONTACTO WHERE idCONTACTO=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=4"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=4"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==105){
				$elim= "'".$_GET['id_contrato_elim']."'";
				$ingreso = "DELETE FROM CONTRATO WHERE idCONTRATO=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==106){
				$elim= "'".$_GET['id_empresa_elim']."'";
				$ingreso = "DELETE FROM EMPRESA WHERE idEMPRESA=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=6"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=6"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==107){
				$elim= "'".$_GET['id_flujo_elim']."'";
				$elim2= "'".$_GET['id_flujo_elim']."'";
				$ingreso = "DELETE FROM EMPRESA WHERE idEMPRESA=$elim AND idEMPRESA=$elim2";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=7"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==108){
				$elim= "'".$_GET['id_giro_elim']."'";
				$ingreso = "DELETE FROM GIRO WHERE idGIRO=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=8"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=8"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
			}
			if ($valor==109){
				$elim= "'".$_GET['id_horario_elim']."'";
				$ingreso = "DELETE FROM HORARIO WHERE idHORARIO=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					//echo "Error de BD, no se pudo consultar la base de datos\n";
					echo 'Error MySQL: ' . mysql_error();
					exit;
				}
				echo ('<a href="eliminar.php?valores=9"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=9"><input type="submit" value="Nuevo" /></a>');
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
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

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
		
		<?php
			include 'constantes.php';
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
					else if ($R=="idbus_elim"){
						$valor=102;
						break;
					}
					else if ($R=="id_cobro_serv_elim"){
						$valor=103;
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

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
		<?hiper_tablas();?>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
			$password = 'h3forever';
			if (!$enlace = mysql_connect('localhost', 'root', $password)) {
				echo 'No pudo conectarse a mysql';
				exit;
			}

			if (!mysql_select_db('casaveraneo', $enlace)) {
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
							if (!$enlace = mysql_connect('localhost', 'root', $password)) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
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
							echo ('<td>Ingresa la patente: <input name="patente" type="text" value="Tu texto va aqui" id="consulta" /></td>
							<td>Ingresa la capacidad del bus: <input name="capacidad" type="text" value="Tu texto va aqui" id="consulta" /></td>');
							echo('<td><input type="submit" value="send"></td></tr>
								</table>
								</form>');
					break;
				case 3:
					break;
				case 4:
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


<?
	function hiper_tablas(){
		if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
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

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="css/mio.css" rel="stylesheet" type="text/css" />
<title>Taller de Aplicaciones</title>
</head>

<body>
<div style="height:auto;width:100%;">
  <div style="background-color:black;width:100%;">
    <h3 style="color:#fff;text-align:center;"><br>TERMINAL</h3>
  </div>
  <table>
	<tr>
		<td style="width:20%" VALIGN=TOP>
		<b>Tabla de Contenidos</b>
		<br>&nbsp;
		<br><div class="dos"><a href="index.php?menu=1">Inicio</a></div>
		<br><div class="dos"><a href="index.php?menu=5">Actividad</a></div>
		<div class="dos"><a href="index.php?menu=6">Actividad Casa</a></div>
		<div class="dos"><a href="index.php?menu=2">Casa Veraneo</a></div>
		<div class="dos"><a href="index.php?menu=3">Ciudad</a></div>
		<div class="dos"><a href="index.php?menu=4">Ninio</a></div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
			if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
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
							<tr class="odd">
							<td>Ingresa el nombre de la casa: <input name="nom_cas" type="text" value="Tu texto va aqui" id="consulta" /></td>
							<td>Ingresa la capacidad de la casa: <input name="cap_cas" type="text" value="Tu texto va aqui" id="consulta" /></td>
							<td>Selecciona la ciudad donde se encuentra
							<select name="cod_ciu">
							<optgroup label="Seleccione un ciudad">');
							if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('casaveraneo', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT nom_ciu FROM ciudad';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								#echo "Error MySQL: ' . mysql_error();
								exit;
							}
							//$fila = mysql_fetch_assoc($sucu);
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['nom_ciu']);
								echo ("<option value='$emm'>$emm</option>");
							}
							echo ('</optgroup>');
							echo ('</select>');
							echo('</td>
								<td><input type="submit" value="send"></td></tr>
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

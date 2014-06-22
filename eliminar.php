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
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Selecciona la casa que quiere eliminar
							<select name="nom_cas_elim">
							<optgroup label="Selecciona una casa">');
							if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('casaveraneo', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT nom_cas FROM casa_veraneo';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['nom_cas']);
								echo ("<option value='$emm'>$emm</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
						</form>');
					break;
				case 3:
					break;
				case 4:
					break;
				case 5:
					echo ('<form name="formulario" method="get" action="procesar.php">
							<table summary="Submitted table designs" width="450" border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">
							<td>Selecciona una actividad a eliminar
							<select name="nom_act_elim">
							<optgroup label="Selecciona acctividad">');
							if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
								echo 'No pudo conectarse a mysql';
								exit;
							}

							if (!mysql_select_db('casaveraneo', $enlace)) {
								echo 'No pudo seleccionar la base de datos';
								exit;
							}
							
							$sql1 = 'SELECT nom_act FROM actividad';
							$sucu = mysql_query($sql1, $enlace);
							if (!$sucu) {
								echo "Error de BD, no se pudo consultar la base de datos\n";
								exit;
							}
							while ($fil = mysql_fetch_assoc($sucu)) {
								$emm = utf8_encode($fil['nom_act']);
								echo ("<option value='$emm'>$emm</option>");
							}
							echo ('</optgroup>');
							echo ('</select></td><td><input type="submit" value="send"></td></table>
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

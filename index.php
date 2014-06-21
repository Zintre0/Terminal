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
			$menu = array (1,2,3,4);
			$valores = array (1,2,3,4);
			if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
				echo 'No pudo conectarse a mysql';
				exit;
			}

			if (!mysql_select_db('casaveraneo', $enlace)) {
				echo 'No pudo seleccionar la base de datos';
				exit;
			}
			
			switch ($_GET["menu"]) {
				case 1:
					inicio();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CASA VERANEO</caption>');
					echo ('<a href="eliminar.php?mer=1"><input type="submit" value="Eliminar" /></a><a href="eliminar.php?mer=1"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc casa_veraneo';
					$sql2 = 'SELECT * FROM casa_veraneo';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CIUDAD</caption>');
					$sql1 = 'desc ciudad';
					$sql2 = 'SELECT * FROM ciudad';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">NINIO</caption>');
					$sql1 = 'desc nino';
					$sql2 = 'SELECT * FROM nino';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">ACTIVIDAD</caption>');
					echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc actividad';
					$sql2 = 'SELECT * FROM actividad';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 6:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">ACTIVIDAD CASA</caption>');
					$sql1 = 'desc actividad_casa';
					$sql2 = 'SELECT * FROM actividad_casa';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				default:
					inicio();
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
	function inicio(){
		echo ('<h1>Formularios en HTML</h1>');
		echo ('<p>Los formularios y botones son una herramienta estándar HTML que recolectan información. Estos pueden resultar útiles para reunir cualquier tipo de información que pueda ser almacenada en formato de texto.
		En este tutorial exploraremos todas las herramientas disponibles para construir correctamente formularios y botones en HTML.</p>

		<p>Un formulario puede insertarse en un documento HTML a través del elemento HTML "form" que actuará como contenedor para todos los elementos de entrada. Usualmente el script que procesa estos datos va especificado en el atributos "action". Lo que "action" haga con la información y cómo la maneje es un tema que no será tratado en este laboratorio ya que no pertenece al estándar HTML.</p>

		<p>También se debe especificar cómo la información será enviada en el valor del atributo "method": "post" (los datos del formulario son adjuntados al cuerpo del mismo) ó "get" (los datos del formulario son adjuntados a la URL).</p>

		<p>De este modo, un formulario simple puede tener la siguiente declaración:</p>
		<br>
		<br>
		</td>');
		}
		
	function tablas($sql1,$sql2,$enlace){
		$nom_col = mysql_query($sql1, $enlace);
		$fields = mysql_query($sql2, $enlace);
		echo ('<thead>');
		echo ('<tr>');
		while ($fila = mysql_fetch_assoc($nom_col)) {
			echo ('<th>'); 
			echo $fila['Field'];
			echo ('</th>');
		}
		//echo('<th>ACCION</th>');
		//echo ('<th><a href="eliminar.php?mer=1"><input type="submit" value="Eliminar" /></a><a href="eliminar.php?mer=1"><input type="submit" value="Nuevo" /></a></th>');
		echo ('</tr>');
		echo('</thead>');
		$fields = mysql_query($sql2, $enlace);
		echo ('<tr>');
		while ($fila2 = mysql_fetch_assoc($fields)) {
			$nom_col = mysql_query($sql1, $enlace);
			while ($fila = mysql_fetch_assoc($nom_col)) {
				echo ('<td>'); 
				//echo $fila2[$fila['Field']];
				echo utf8_encode($fila2[$fila['Field']]); 
				echo ('</td>'); 
			}
			//echo('<td><div class="dos"><a href="#">Eliminar</a><a href="#">Modificar</a></div></td>');
			echo ('</tr>');
		}
		
	}
?>

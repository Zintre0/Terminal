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
		<br><div class="dos"><a href="index.php?num=1">Inicio</a></div>
		<br>
		<?php
			include './funciones.php';
			hiper_tablas();?>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
			include './constantes.php';

			$valores = array (2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
			$num = array(2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
			$nombre_tabla = array ('BUS','COBRO_SERVICIO');
			if (!$enlace = mysql_connect('localhost', 'root', $password)) {
				echo 'No pudo conectarse a mysql';
				exit;
			}

			if (!mysql_select_db($base_de_datos, $enlace)) {
				echo 'No pudo seleccionar la base de datos';
				exit;
			}
			
			switch ($_GET["num"]) {
				case 1:
					inicio();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">BUS</caption>');
					echo ('<a href="eliminar.php?valores=2"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=2"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc BUS';
					$sql2 = 'SELECT * FROM BUS';
					tablas($sql1,$sql2,$enlace,'BUS');
					echo ('</table>');
					break;
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">COBRO SERVICIO</caption>');
					echo ('<a href="eliminar.php?valores=3"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=3"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc COBRO_SERVICIO';
					$sql2 = 'SELECT * FROM COBRO_SERVICIO';
					tablas($sql1,$sql2,$enlace,'COBRO_SERVICIO');
					echo ('</table>');
					break;
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CONTACTO</caption>');
					echo ('<a href="eliminar.php?valores=4"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=4"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc CONTACTO';
					$sql2 = 'SELECT * FROM CONTACTO';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CONTRATO</caption>');
					echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc CONTRATO';
					$sql2 = 'SELECT * FROM CONTRATO';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 6:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESA</caption>');
					echo ('<a href="eliminar.php?valores=6"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=6"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc EMPRESA';
					$sql2 = 'SELECT * FROM EMPRESA';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 7:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">FLUJO BUSES</caption>');
					echo ('<a href="eliminar.php?valores=7"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc FLUJO_BUSES';
					$sql2 = 'SELECT * FROM FLUJO_BUSES';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 8:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">GIRO</caption>');
					echo ('<a href="eliminar.php?valores=8"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=8"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc GIRO';
					$sql2 = 'SELECT * FROM GIRO';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 9:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">HORARIO</caption>');
					echo ('<a href="eliminar.php?valores=9"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=9"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc HORARIO';
					$sql2 = 'SELECT * FROM HORARIO';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 10:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCAL</caption>');
					echo ('<a href="eliminar.php?valores=10"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=10"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc LOCAL';
					$sql2 = 'SELECT * FROM LOCAL';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 11:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PAGO</caption>');
					echo ('<a href="eliminar.php?valores=11"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=11"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc PAGO';
					$sql2 = 'SELECT * FROM PAGO';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 12:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PROFESION</caption>');
					echo ('<a href="eliminar.php?valores=12"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=12"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc PROFESION';
					$sql2 = 'SELECT * FROM PROFESION';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 13:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">REPRESENTANTE</caption>');
					echo ('<a href="eliminar.php?valores=13"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=13"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc REPRESENTANTE';
					$sql2 = 'SELECT * FROM REPRESENTANTE';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 14:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">REPRESENTANTE_PROFESIONAL</caption>');
					echo ('<a href="eliminar.php?valores=14"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=14"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc REPRESENTANTE_PROFESIONAL';
					$sql2 = 'SELECT * FROM REPRESENTANTE_PROFESIONAL';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 15:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">SECTOR</caption>');
					echo ('<a href="eliminar.php?valores=15"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=15"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc SECTOR';
					$sql2 = 'SELECT * FROM SECTOR';
					tablas($sql1,$sql2,$enlace);
					echo ('</table>');
					break;
				case 16:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">TIPO</caption>');
					echo ('<a href="eliminar.php?valores=16"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=16"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc TIPO';
					$sql2 = 'SELECT * FROM TIPO';
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
	</tr>
	</table>    
  </div>
</div>
</body>
</html>

<?
	function inicio(){
		echo ('<h1>Pagina web del terminal</h1>');
		echo ('<p>Los formularios y botones son una herramienta estándar HTML que recolectan información. Estos pueden resultar útiles para reunir cualquier tipo de información que pueda ser almacenada en formato de texto.
		En este tutorial exploraremos todas las herramientas disponibles para construir correctamente formularios y botones en HTML.</p>

		<p>Un formulario puede insertarse en un documento HTML a través del elemento HTML "form" que actuará como contenedor para todos los elementos de entrada. Usualmente el script que procesa estos datos va especificado en el atributos "action". Lo que "action" haga con la información y cómo la maneje es un tema que no será tratado en este laboratorio ya que no pertenece al estándar HTML.</p>

		<p>También se debe especificar cómo la información será enviada en el valor del atributo "method": "post" (los datos del formulario son adjuntados al cuerpo del mismo) ó "get" (los datos del formulario son adjuntados a la URL).</p>

		<p>De este modo, un formulario simple puede tener la siguiente declaración:</p>
		<br>
		<br>
		</td>');
		}
		
	function tablas($sql1,$sql2,$enlace,$nombre){
		$nom_col = mysql_query($sql1, $enlace);
		$fields = mysql_query($sql2, $enlace);
		echo ('<thead>');
		echo ('<tr>');
		while ($fila = mysql_fetch_assoc($nom_col)) {
			echo ('<th>'); 
			echo $fila['Field'];
			echo ('</th>');
		}
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
			echo('<td><div class="dos"><a href="editar.php?nombre_tabla='."$nombre".'">Editar</a></div></td>');
			echo ('</tr>');
		}
		
	}

?>

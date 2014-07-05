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
		<br><div class="dos"><a href="consultas.php">Consultas</a></div>
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
			include './constantes.php';

			$valores = array (2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
			$num = array(2,3,4,5,6,7,8,9,10,11,12,13,14,15,16);
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
					EscrituraIndex();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">BUS</caption>');
					echo ('<a href="eliminar.php?valores=2"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=2"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc BUS';
					$sql2 = 'SELECT * FROM BUS';
					tablas($sql1,$sql2,$enlace,'BUS','idBUS');
					echo ('</table>');
					break;
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">COBRO SERVICIO</caption>');
					echo ('<a href="eliminar.php?valores=3"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=3"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc COBRO_SERVICIO';
					$sql2 = 'SELECT * FROM COBRO_SERVICIO';
					tablas($sql1,$sql2,$enlace,'COBRO_SERVICIO','idCOBRO_SERVICIO');
					echo ('</table>');
					break;
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CONTACTO</caption>');
					echo ('<a href="eliminar.php?valores=4"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=4"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc CONTACTO';
					$sql2 = 'SELECT * FROM CONTACTO';
					tablas($sql1,$sql2,$enlace,'CONTACTO','idCONTACTO');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">CONTRATO</caption>');
					echo ('<a href="eliminar.php?valores=5"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=5"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc CONTRATO';
					$sql2 = 'SELECT * FROM CONTRATO';
					tablas($sql1,$sql2,$enlace,'CONTRATO','idCONTRATO');
					echo ('</table>');
					break;
				case 6:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESA</caption>');
					echo ('<a href="eliminar.php?valores=6"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=6"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc EMPRESA';
					$sql2 = 'SELECT * FROM EMPRESA';
					tablas($sql1,$sql2,$enlace,'EMPRESA','idEMPRESA');
					echo ('</table>');
					break;
				case 7:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">FLUJO BUSES</caption>');
					//echo ('<a href="eliminar.php?valores=7"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
					//echo ('<a href="ingreso.php?valores=7"><input type="submit" value="Nuevo" /></a>');
					echo ('<div class="btn_new"><a href="ingreso.php?valores=7"></a></div>');
					$sql1 = 'desc FLUJO_BUSES';
					$sql2 = 'SELECT * FROM FLUJO_BUSES';
					tablas($sql1,$sql2,$enlace,'FLUJO_BUSES','HORARIO_idHORARIO','BUS_idBUS');
					echo ('</table>');
					break;
				case 8:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">GIRO</caption>');
					echo ('<a href="eliminar.php?valores=8"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=8"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc GIRO';
					$sql2 = 'SELECT * FROM GIRO';
					tablas($sql1,$sql2,$enlace,'GIRO','idGIRO');
					echo ('</table>');
					break;
				case 9:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">HORARIO</caption>');
					echo ('<a href="eliminar.php?valores=9"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=9"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc HORARIO';
					$sql2 = 'SELECT * FROM HORARIO';
					tablas($sql1,$sql2,$enlace,'HORARIO','idHORARIO');
					echo ('</table>');
					break;
				case 10:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCAL</caption>');
					echo ('<a href="eliminar.php?valores=10"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=10"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc LOCAL';
					$sql2 = 'SELECT * FROM LOCAL';
					tablas($sql1,$sql2,$enlace,'LOCAL','idLOCAL');
					echo ('</table>');
					break;
				case 11:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PAGO</caption>');
					echo ('<a href="eliminar.php?valores=11"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=11"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc PAGO';
					$sql2 = 'SELECT * FROM PAGO';
					tablas($sql1,$sql2,$enlace,'PAGO','idPAGO');
					echo ('</table>');
					break;
				case 12:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PROFESION</caption>');
					echo ('<a href="eliminar.php?valores=12"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=12"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc PROFESION';
					$sql2 = 'SELECT * FROM PROFESION';
					tablas($sql1,$sql2,$enlace,'PROFESION','idPROFESION');
					echo ('</table>');
					break;
				case 13:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">REPRESENTANTE</caption>');
					echo ('<a href="eliminar.php?valores=13"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=13"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc REPRESENTANTE';
					$sql2 = 'SELECT * FROM REPRESENTANTE';
					tablas($sql1,$sql2,$enlace,'REPRESENTANTE','idREPRESENTANTE');
					echo ('</table>');
					break;
				case 14:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">REPRESENTANTE_PROFESIONAL</caption>');
					//echo ('<a href="eliminar.php?valores=14"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=14"><input type="submit" value="Nuevo" /></a>');
					//echo ('<a href="ingreso.php?valores=14"><input type="submit" value="Nuevo" /></a>');
					echo ('<div class="btn_new"><a href="ingreso.php?valores=14"></a></div>');
					$sql1 = 'desc REPRESENTANTE_PROFESIONAL';
					$sql2 = 'SELECT * FROM REPRESENTANTE_PROFESIONAL';
					tablas($sql1,$sql2,$enlace,'REPRESENTANTE_PROFESIONAL','PROFESION_idPROFESION','REPRESENTANTE_idREPRESENTANTE');
					echo ('</table>');
					break;
				case 15:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">SECTOR</caption>');
					echo ('<a href="eliminar.php?valores=15"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=15"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc SECTOR';
					$sql2 = 'SELECT * FROM SECTOR';
					tablas($sql1,$sql2,$enlace,'SECTOR','idSECTOR');
					echo ('</table>');
					break;
				case 16:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">TIPO</caption>');
					echo ('<a href="eliminar.php?valores=16"><input type="submit" value="Eliminar" /></a><a href="ingreso.php?valores=16"><input type="submit" value="Nuevo" /></a>');
					$sql1 = 'desc TIPO';
					$sql2 = 'SELECT * FROM TIPO';
					tablas($sql1,$sql2,$enlace,'TIPO','idTIPO');
					echo ('</table>');
					break;
				default:
					EscrituraIndex();
					break;
			}
		
		?>
				
	</table>
	

  <div style="background-color:black; height:auto;width:100%;clear:both;">
	<table style="width:100%; color:#fff;">
	<tr>
		<td style="width:30%; text-align:center;">&nbsp;</td>
		<td style="width:40%; text-align:center;"><img src="./images/logoescuela.png" width="115" height="23"></img>
	</tr>
	</table>    
  </div>
</div>
</body>
</html>

<?php
		
	function tablas($sql1,$sql2,$enlace,$nombre,$su_id,$id_2){
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
		
		echo ('<tbody><tr>');
		while ($fila2 = mysql_fetch_assoc($fields)) {
			$nom_col = mysql_query($sql1, $enlace);
			while ($fila = mysql_fetch_assoc($nom_col)) {
				echo ('<td>'); 
				$id = $fila2[$su_id];
				$id2 = $fila2[$id_2];
				$fecha_arrivo=$fila2['FECHA_ARRIVO'];
				echo utf8_encode($fila2[$fila['Field']]); 
				echo ('</td>'); 
			}
			if ($nombre != 'FLUJO_BUSES' and $nombre != 'REPRESENTANTE_PROFESIONAL')
				echo('<td><div class="dos"><a href="editar.php?nombre_tabla='."$nombre".'&id='."$id".'">Editar</a></div></td>');
			else if($nombre == 'REPRESENTANTE_PROFESIONAL')
				echo('<td><div class="dos"><a href="eliminar.php?valores=14&id='."$id".'&id2='."$id2".'">Eliminar</a></div></td>');
			else
				echo('<td><div class="dos"><a href="editar.php?nombre_tabla='."$nombre".'&id='."$id".'&id2='."$id2".'">
				Editar</a></div><div class="dos"><a href="eliminar.php?valores=7&id='."$id".'&id2='."$id2".'&fecha_arrivo='."$fecha_arrivo".'">Eliminar</a></div></td>');
			echo ('</tr></tbody>');
		}
		
	}

?>

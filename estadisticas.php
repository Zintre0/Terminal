<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/mio.css" rel="stylesheet" type="text/css" />
<title>Administracion Terminal</title>
</head>


<body>
<div style="height:auto;width:100%;">
  <div style="background-color:black;width:100%;">
    <h3 style="color:#fff;text-align:center;"><br>Consultas</h3>
  </div>
  <table>
	<tr>
		
		
		
		<td style="width:20%" VALIGN=TOP>
		<b style="color:#fff;">Tabla de Contenidos</b>
		<br>&nbsp;
		<br><div class="dos"><a href="index.php?num=1">Inicio</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=2">Locales No Arrendados</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=3">Locales Arrendados (Cantidad por Empresa)</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=4">Cantidad de Buses por Empresa</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=5">Total por Concepto Pagos</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=6">Total por Concepto de Cobros</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=7">Empresas Morosas (A la Fecha)</a></div>
		<br><div class="dos"><a href="consultas.php?num=9">Regresar a Consultas</a></div>

		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php			
			include './constantes.php';
			$num = array(2,3,4,5,6,7,8);
			$valores = array (2,3,4,5,6,7,8);

			if (!$enlace = mysql_connect('localhost', 'root', $password)) {
				echo 'No pudo conectarse a mysql';
				exit;
			}

			if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
				echo 'No pudo seleccionar la base de datos';
				exit;
			}
			
			switch ($_GET["num"]) {
				case 1:
					inicio();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCALES NO ARRENDADOS</caption>');
					//echo ('<a href="filtros.php?valores=2"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array ('idLOCAL', 'TIPO_LOCAL', 'NOMBRE_SECTOR');
					$sql2 = 'select LOCAL.idLOCAL, TIPO.TIPO_LOCAL, SECTOR.NOMBRE_SECTOR from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR WHERE LOCAL.CONTRATO_idCONTRATO IS NULL';
					
					tablas($sql1, $sql2, $enlace, 3);
					echo ('</table>');
					break;
					
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCALES ARRENDADOS</caption>');
					//echo ('<a href="filtros.php?valores=3"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array ('NOMBRE_EMPRESA', 'LOCALES_ARRENDADOS');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) AS LOCALES_ARRENDADOS from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR inner join CONTRATO ON CONTRATO.idCONTRATO = LOCAL.CONTRATO_idCONTRATO INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE inner join EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA WHERE LOCAL.CONTRATO_idCONTRATO group by EMPRESA.idEMPRESA ORDER BY LOCALES_ARRENDADOS DESC';
					
					tablas($sql1, $sql2, $enlace, 2);
					
					echo ('</table>');
					break;
					
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">BUSES POR EMPRESA</caption>');
					//echo ('<a href="filtros.php?valores=4"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array ('NOMBRE_EMPRESA', 'CANTIDAD_BUSES');
					$sql2 = ' SELECT EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) as CANTIDAD_BUSES FROM BUS INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					tablas($sql1,$sql2,$enlace, 2);
					echo ('</table>');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PAGOS POR EMPRESAS</caption>');
					//echo ('<a href="filtros.php?valores=5"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('NOMBRE_EMPRESA', 'PAGOS_A_LA_FECHA');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, SUM(MONTO_PAGO) as PAGOS_A_LA_FECHA from PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					tablas($sql1, $sql2, $enlace, 2);
					echo ('</table>');
					echo ('<br>');
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS SIN REGISTRO DE PAGO</caption>');
					
					//echo ('<a href="filtros.php?valores=5"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('NOMBRE_EMPRESA');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA FROM PAGO RIGHT OUTER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA= EMPRESA.idEMPRESA WHERE EMPRESA.GIRO_idGIRO=3 AND PAGO.idPAGO IS NULL';
					tablas($sql1, $sql2, $enlace, 1);
					echo ('</table>');
					break;
				case 6:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">COBROS POR EMPRESA</caption>');
					//echo ('<a href="filtros.php?valores=6"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array('NOMBRE_EMPRESA', 'SERVICIOS_A_LA_FECHA');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, SUM(COBRO_SERVICIO.PAGO_SERVICIO) as SERVICIOS_A_LA_FECHA from COBRO_SERVICIO LEFT OUTER JOIN EMPRESA ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					tablas($sql1, $sql2, $enlace, 2);
					echo ('</table>');
					echo ('<br>');
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS SIN REGISTRO DE PAGO</caption>');
					
					//echo ('<a href="filtros.php?valores=5"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('NOMBRE_EMPRESA');
					$sql2 = 'SELECT EMPRESA.NOMBRE_EMPRESA FROM EMPRESA LEFT OUTER JOIN COBRO_SERVICIO ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA WHERE EMPRESA.GIRO_idGIRO IN (1,2) AND COBRO_SERVICIO.idCOBRO_SERVICIO is NULL;';
					tablas($sql1, $sql2, $enlace, 10);
					
					echo ('</table>');
					break;
				
				case 7:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS MOROSAS</caption>');
					//echo ('<a href="filtros.php?valores=7"><input type="submit" value="Filtrar por Empresa" /></a>');

					//$sql1 = array('NOMBRE_REPRESENTANTE', 'APELLIDOS_REPRESENTANTE', 'RUT_REPRESENTANTE', 'NOMBRE_EMPRESA', 'NOMBRE_PROFESION', 'NUMERO_TELEFONO', 'MAIL');
					//$sql2 = 'SELECT REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, REPRESENTANTE.RUT_REPRESENTANTE, EMPRESA.NOMBRE_EMPRESA, PROFESION.NOMBRE_PROFESION, CONTACTO.NUMERO_TELEFONO, CONTACTO.MAIL FROM REPRESENTANTE INNER JOIN EMPRESA ON REPRESENTANTE.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA INNER JOIN REPRESENTANTE_PROFESIONAL ON REPRESENTANTE.idREPRESENTANTE =REPRESENTANTE_PROFESIONAL.REPRESENTANTE_idREPRESENTANTE INNER JOIN PROFESION ON REPRESENTANTE_PROFESIONAL.PROFESION_idPROFESION = PROFESION.idPROFESION INNER JOIN CONTACTO ON REPRESENTANTE.idREPRESENTANTE = CONTACTO.REPRESENTANTE_idREPRESENTANTE';
					//tablas($sql1,$sql2,$enlace, 7);
					echo ('Sección no Disponible =(');
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

<?php
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
		
	function tablas($sql1, $sql2, $enlace, $tamano){
		
		$nom_col = $sql1;
		
		echo ('<thead>');
		echo ('<tr>');
		for ($i=0; $i<$tamano; $i++){
		
			echo ('<th>'); 
			echo $nom_col[$i];
			echo ('</th>');
		}
		
		echo ('</tr>');
		echo('</thead>');
		
		$fields = mysql_query($sql2, $enlace);
		echo ('<tr>');
		
		while ($fila2 = mysql_fetch_assoc($fields)) {
			
			for ($i=0; $i<$tamano; $i++){
				echo ('<td>'); 
				//echo $fila2[$fila['Field']];
				echo utf8_encode($fila2[$nom_col[$i]]); 
				echo ('</td>'); 
			}
			//echo('<td><div class="dos"><a href="#">Eliminar</a><a href="#">Modificar</a></div></td>');
			echo ('</tr>');
		}
		
	}
	
?>

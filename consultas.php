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
		<br><div class="dos"><a href="consultas.php?num=2">Empresas Asociadas</a></div>
		<br><div class="dos"><a href="consultas.php?num=3">Pagos realizados por Empresas</a></div>
		<br><div class="dos"><a href="consultas.php?num=4">Cobros realizados por Empresas</a></div>
		<br><div class="dos"><a href="consultas.php?num=5">Contratos de Empresas Asociadas</a></div>
		<br><div class="dos"><a href="consultas.php?num=6">Flujos Asociados a los Andénes</a></div>
		<br><div class="dos"><a href="consultas.php?num=7">Representates de Empresas</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=8">Consultas Estadísticas</a></div>

		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php

			include './constantes.php';
			include './funciones.php';
			
			$sql1 = array();//contendra los atributos...
			$sql2 = '';//la consulta...
			$columnas = 0;//las columnas a mostrar...
			$valor=0;
			$fields= '';
			
			$num = array(2,3,4,5,6);
			$valores = array (2,3,4,5,6);

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
					EscrituraConsulta();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS ASOCIADAS Y SUS REPRESENTANTES</caption>');
					echo ('<a href="filtros.php?valores=2"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA','NOMBRE_REPRESENTANTE', 'APELLIDOS_REPRESENTANTE', 'NUMERO_TELEFONO', 'MAIL');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, CONTACTO.NUMERO_TELEFONO, CONTACTO.MAIL from EMPRESA INNER JOIN  REPRESENTANTE ON REPRESENTANTE.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA INNER JOIN CONTACTO ON CONTACTO.REPRESENTANTE_idREPRESENTANTE = REPRESENTANTE.idREPRESENTANTE';
					$columnas = 6;
					$valor=2;
					tablas($sql1, $sql2, $enlace, 6);
					echo ('</table>');
					break;
					
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PAGOS HECHOS POR EMPRESA</caption>');
					echo ('<a href="filtros.php?valores=3"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA', 'MONTO_PAGO', 'FECHA_PAGO');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, PAGO.MONTO_PAGO, PAGO.FECHA_PAGO from EMPRESA INNER JOIN PAGO ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA' ;
					tablas($sql1,$sql2,$enlace, 4);
					$columnas = 4;
					$valor=3;
					echo ('</table>');
					break;
					
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">COBROS REALIZADOS POR EMPRESAS</caption>');
					echo ('<a href="filtros.php?valores=4"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA','PAGO_SERVICIO', 'FECHA_SERVICIO');
					$sql2 = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, COBRO_SERVICIO.PAGO_SERVICIO, COBRO_SERVICIO.FECHA_SERVICIO from EMPRESA INNER JOIN COBRO_SERVICIO ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA';
					$columnas = 4;
					$valor=4;
					tablas($sql1,$sql2,$enlace, 4);
					echo ('</table>');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCALES ARRENDADOS</caption>');
					echo ('<a href="filtros.php?valores=5"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('idCONTRATO', 'FECHA_INICIO', 'FECHA_TERMINO', 'MONTO_CONTRATO', 'TIPO_LOCAL', 'NOMBRE_SECTOR', 'NOMBRE_REPRESENTANTE','APELLIDOS_REPRESENTANTE', 'NOMBRE_EMPRESA');
					$sql2 = 'select CONTRATO.idCONTRATO, CONTRATO.FECHA_INICIO, CONTRATO.FECHA_TERMINO, CONTRATO.MONTO_CONTRATO, TIPO.TIPO_LOCAL, SECTOR.NOMBRE_SECTOR, REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, EMPRESA.NOMBRE_EMPRESA from CONTRATO INNER JOIN LOCAL ON LOCAL.CONTRATO_idCONTRATO = CONTRATO.idCONTRATO inner join TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON SECTOR.idSECTOR = LOCAL.SECTOR_idSECTOR INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA';
					$columnas = 9;
					$valor=5;
					tablas($sql1, $sql2, $enlace, 9);
					echo ('</table>');
					break;
				case 6:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">HISTORIAL DE FLUJO DE BUSES EN ANDENES</caption>');
					echo ('<a href="filtros.php?valores=6"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array('PATENTE', 'NOMBRE_EMPRESA', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA');
					$sql2 = 'select BUS.PATENTE, EMPRESA.NOMBRE_EMPRESA, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA from BUS INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA INNER JOIN FLUJO_BUSES ON FLUJO_BUSES.BUS_idBUS = BUS.idBUS inner join HORARIO ON HORARIO.idHORARIO = FLUJO_BUSES.HORARIO_idHORARIO';
					$columnas = 5;
					$valor=6;
					tablas($sql1,$sql2,$enlace, 5);
					echo ('</table>');
					break;
				
				case 7:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">REPRESENTANTES DE EMPRESAS</caption>');
					echo ('<a href="filtros.php?valores=7"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array('NOMBRE_REPRESENTANTE', 'APELLIDOS_REPRESENTANTE', 'RUT_REPRESENTANTE', 'NOMBRE_EMPRESA', 'NOMBRE_PROFESION', 'NUMERO_TELEFONO', 'MAIL');
					$sql2 = 'SELECT REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, REPRESENTANTE.RUT_REPRESENTANTE, EMPRESA.NOMBRE_EMPRESA, PROFESION.NOMBRE_PROFESION, CONTACTO.NUMERO_TELEFONO, CONTACTO.MAIL FROM REPRESENTANTE INNER JOIN EMPRESA ON REPRESENTANTE.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA INNER JOIN REPRESENTANTE_PROFESIONAL ON REPRESENTANTE.idREPRESENTANTE =REPRESENTANTE_PROFESIONAL.REPRESENTANTE_idREPRESENTANTE INNER JOIN PROFESION ON REPRESENTANTE_PROFESIONAL.PROFESION_idPROFESION = PROFESION.idPROFESION INNER JOIN CONTACTO ON REPRESENTANTE.idREPRESENTANTE = CONTACTO.REPRESENTANTE_idREPRESENTANTE';
					$columnas = 7;
					$valor=7;
					tablas($sql1,$sql2,$enlace, 7);
					echo ('</table>');
					break;

				
				default:
					EscrituraConsulta();
					break;
			}
		
		?>
	
		<?php
		//vemos si le ingresamos el boton de pdf...
		if ($valor != 0 and $valor!= 6 and $valor!= 4 and $valor!=3){
			echo '<form method="post">';
			echo '<input name="Button1" type="submit" value="Generar PDF"  />&nbsp';
		}
	?>
	
		</form>

</table>
<?php

	if(isset($_POST["Button1"])){
	   
	     include 'pruebaPDF1.php';
	     
	     GenerarPDF($sql1, $sql2, $columnas, $valor);
	   	     
	}
	
?>
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

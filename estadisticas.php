<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/mio.css" rel="stylesheet" type="text/css" />
<title>Administracion Terminal</title>


<script languaje = "javascript">
//abre la ventana para el grafico de locales arrendados por empresa...
function abrirVentana(url){
	
	//abre una ventana
	window.open(url, "Locales Arrendados por Empresas", "width=800, height=500, top=200, left=200");
}
</script>

<script languaje = "javascript">
//abre la ventana para el grafico de buses por empresa...
function abrirVentana2(url){
	
	//abre una ventana
	window.open(url, "Buses Asociados por Empresas", "width=800, height=500, top=200, left=200");
}
</script>

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
		<br><div class="dos"><a href="estadisticas.php?num=6">Empresas sin Registro de Pagos</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=7">Total por Concepto de Cobros</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=9">Empresas sin Registro de Cobros</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=20">Empresas Morosas (A la Fecha)</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=10">Historial de Pagos por Empresa</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=11">Historial de Cobros realizados por Empresas</a></div>
		<br><div class="dos"><a href="estadisticas.php?num=12">Uso de Andenes por Empresa</a></div>
		<br><div class="dos"><a href="consultas.php?num=13">Regresar a Consultas</a></div>

		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
			include './constantes.php';
			include './funciones.php';
			//variables a ocupar para generar el PDF...
			$sql1 = array();//contendra los atributos...
			$sql2 = '';//la consulta...
			$columnas = 0;//las columnas a mostrar...
			$valor=0;
		
			$num = array(2,3,4,5,6,7, 9, 20, 10, 11, 12, 13, 100, 1000);
			$valores = array (2,3,4,5,6,7,9, 20, 10, 11, 12, 13, 100, 1000);

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
					EscrituraConsultaEstadisticas();
					break;
				case 2:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCALES NO ARRENDADOS</caption>');
					//echo ('<a href="filtros.php?valores=2"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array ('idLOCAL', 'TIPO_LOCAL', 'NOMBRE_SECTOR');
					$sql2 = 'select LOCAL.idLOCAL, TIPO.TIPO_LOCAL, SECTOR.NOMBRE_SECTOR from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR WHERE LOCAL.CONTRATO_idCONTRATO IS NULL';
					$columnas = 3;
					$valor=22;
					tablas($sql1, $sql2, $enlace, 6);
					echo ('</table>');
					break;
					
				case 3:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">LOCALES ARRENDADOS</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=3"><input type="submit" value="Filtrar por Empresa" />');
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'LOCALES_ARRENDADOS');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) AS LOCALES_ARRENDADOS from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR inner join CONTRATO ON CONTRATO.idCONTRATO = LOCAL.CONTRATO_idCONTRATO INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE inner join EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA WHERE LOCAL.CONTRATO_idCONTRATO group by EMPRESA.idEMPRESA ORDER BY LOCALES_ARRENDADOS DESC';
					$columnas = 3;
					$valor=33;
					
					tablas($sql1, $sql2, $enlace, 3);
					
					echo ('</table>');
					break;
					
				case 4:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">BUSES POR EMPRESA</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=4"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'CANTIDAD_BUSES');
					$sql2 = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) as CANTIDAD_BUSES FROM BUS INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					$columnas = 3;
					$valor=44;
					tablas($sql1,$sql2,$enlace, 3);
					echo ('</table>');
					break;
				case 5:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">PAGOS POR EMPRESAS</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=5"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'PAGOS_A_LA_FECHA');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, SUM(MONTO_PAGO) as PAGOS_A_LA_FECHA from PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					$columnas = 3;
					$valor=55;
					tablas($sql1, $sql2, $enlace, 6);
					echo ('</table>');
					echo ('<br>');
					echo ('<br>');
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">TOTAL POR CONCEPTO DE PAGOS</caption>');
					$sql4 = array ('TOTAL_PAGOS');
					$sql3 = 'SELECT SUM(MONTO_PAGO) AS TOTAL_PAGOS  FROM PAGO';
					tablas($sql4, $sql3, $enlace, 20);
					
					echo ('</table>');
					
					break;
				case 6:
					
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS SIN REGISTRO DE PAGO</caption>');
					
					echo ('<a href="filtros_estadisticas.php?valores=6"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA FROM PAGO RIGHT OUTER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA= EMPRESA.idEMPRESA WHERE (EMPRESA.GIRO_idGIRO=3 or EMPRESA.GIRO_idGIRO=4 or EMPRESA.GIRO_idGIRO=5)AND PAGO.idPAGO IS NULL';
					$columnas = 2;
					$valor=66;
					tablas($sql1, $sql2, $enlace, 14);
					echo ('</table>');
					break;
				case 7:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">COBROS POR EMPRESA</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=7"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'SERVICIOS_A_LA_FECHA');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, SUM(COBRO_SERVICIO.PAGO_SERVICIO) as SERVICIOS_A_LA_FECHA from COBRO_SERVICIO LEFT OUTER JOIN EMPRESA ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';
					$columnas = 3;
					$valor=77;
					tablas($sql1, $sql2, $enlace, 6);
					echo ('</table>');
					//echo ('</table>');
					echo ('<br>');
					echo ('<br>');
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">TOTAL POR CONCEPTO DE COBROS</caption>');
					$sql4 = array ('TOTAL_PAGOS_SERVICIOS');
					$sql3 = 'SELECT SUM(COBRO_SERVICIO.PAGO_SERVICIO) AS TOTAL_PAGOS_SERVICIOS  FROM COBRO_SERVICIO';
					tablas($sql4, $sql3, $enlace, 20);
					
					echo ('</table>');
					break;
				case 9:
				
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS SIN REGISTRO DE COBROS</caption>');
					
					echo ('<a href="filtros_estadisticas.php?valores=9"><input type="submit" value="Filtrar por Empresa" /></a>');
					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA');
					$sql2 = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA FROM EMPRESA LEFT OUTER JOIN COBRO_SERVICIO ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA WHERE EMPRESA.GIRO_idGIRO IN (1,2) AND COBRO_SERVICIO.idCOBRO_SERVICIO is NULL';
					$columnas = 2;
					$valor=99;
					tablas($sql1, $sql2, $enlace, 19);
					
					echo ('</table>');
					break;
				
				case 20:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">EMPRESAS MOROSAS</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=20"><input type="submit" value="Filtrar por Empresa" /></a>');

					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'RUT_EMPRESA', 'ULTIMO_PAGO', 'DIAS_ATRASADOS');
					$sql2 = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, MAX(PAGO.FECHA_PAGO) AS ULTIMO_PAGO, DATEDIFF(NOW(), PAGO.FECHA_PAGO) AS DIAS_ATRASADOS  FROM PAGO INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA WHERE ( DATEDIFF(NOW(), PAGO.FECHA_PAGO) >0) GROUP BY EMPRESA.idEMPRESA';
					$columnas = 5;
					$valor=20;
					tablas($sql1,$sql2,$enlace, 5);
					//echo ('Sección no Disponible =(');
					echo ('</table>');
					break;
			
				case 10:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">HISTORIAL DE PAGOS POR EMPRESA</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=10"><input type="submit" value="Filtrar por Empresa" /></a> </a><a href="filtros_estadisticas.php?valores=100"><input type="submit" value="Filtrar por Fecha"/></a> </a><a href="filtros_estadisticas.php?valores=1000"><input type="submit" value="Filtrar por Ultimo Pago"/></a>');

					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'MONTO_PAGO', 'FECHA_PAGO');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, PAGO.MONTO_PAGO, PAGO.FECHA_PAGO from PAGO INNER JOIN EMPRESA ON PAGO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA';
					$columnas = 4;
					$valor=10;
					tablas($sql1,$sql2,$enlace, 4);
					//echo ('Sección no Disponible =(');
					echo ('</table>');
					break;
				case 11:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">HISTORIAL DE COBROS POR EMPRESA</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=11"><input type="submit" value="Filtrar por Empresa" /></a> </a><a href="filtros_estadisticas.php?valores=111"><input type="submit" value="Filtrar por Fecha"/></a> </a><a href="filtros_estadisticas.php?valores=1111"><input type="submit" value="Filtrar por Ultimo Pago"/></a>');

					$sql1 = array('idEMPRESA', 'NOMBRE_EMPRESA', 'PAGO_SERVICIO', 'FECHA_SERVICIO');
					$sql2 = 'select EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, COBRO_SERVICIO.PAGO_SERVICIO, COBRO_SERVICIO.FECHA_SERVICIO from COBRO_SERVICIO INNER JOIN EMPRESA ON COBRO_SERVICIO.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA';
					$columnas = 4;
					$valor=11;
					tablas($sql1,$sql2,$enlace, 4);
					//echo ('Sección no Disponible =(');
					echo ('</table>');
					break;

				case 12:
					echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
					echo ('<caption align="center">USO DE ANDENES POR EMPRESA</caption>');
					echo ('<a href="filtros_estadisticas.php?valores=12"><input type="submit" value="Filtrar por Empresa" />
					<a href="filtros_estadisticas.php?valores=122"><input type="submit" value="Filtrar por Fecha" /></a> 
					<a href="Consultas_Anidadas.php?valores=1222"><input type="submit" value="Filtrar por Anden" /></a> 
					<a href="Consultas_Anidadas.php?valores=12222"><input type="submit" value="Filtrar por Cantidad de Buses por Empresa" /></a>');

					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'idBUS', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA', 'ANDEN', 'NOMBRE_SECTOR');
					
					$sql2 = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, BUS.idBUS, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA, LOCAL.idLOCAL as ANDEN, SECTOR.NOMBRE_SECTOR FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA inner join FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON HORARIO.LOCAL_idLOCAL = LOCAL.idLOCAL INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR';
					$columnas = 8;
					$valor=12;
					tablas($sql1,$sql2,$enlace, 8);
					
					echo ('</table>');
					break;
				
				default:
					EscrituraConsultaEstadisticas();
					break;
			}
		
		?>
	
	<?php
		//vemos si le ingresamos el boton de pdf...
		if ($valor != 0 and $valor!= 12 and $valor != 10 and $valor != 11){
			echo '<form method="post">';
			echo '<input name="Button1" type="submit" value="Generar PDF"  />&nbsp';
		}
	?>
	
	<?php
	
		if ($valor == 33){
			
			//para abrir una ventana emergente con javascript....
			echo ('<input type="submit" onclick= "abrirVentana(\'Mostrar.php\')" value="Ver Grafico"/>');

			//echo '<br><div class="dos"><a href="#" onclick= "abrirVentana(\'Mostrar.php\')">Ver Grafico</a></div>';

		}
		if ($valor == 44){
			
			//para abrir una ventana emergente con javascript....
			echo ('<input type="submit" onclick= "abrirVentana2(\'MostrarBuses.php\')" value="Ver Grafico"/>');

			//echo '<br><div class="dos"><a href="#" onclick= "abrirVentana(\'Mostrar.php\')">Ver Grafico</a></div>';

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
	
	function tablas($sql1, $sql2, $enlace, $tamano, $valor){
		
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
				if ($valor==33){
					
					array_push($locales, $fila2[$nom_col[$i]]);
				}
				//echo $fila2[$fila['Field']];
				echo utf8_encode($fila2[$nom_col[$i]]); 
				echo ('</td>'); 
			}
			//echo('<td><div class="dos"><a href="#">Eliminar</a><a href="#">Modificar</a></div></td>');
			echo ('</tr>');
		}
		
	}
	
?>

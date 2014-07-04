<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	
	
	
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link href="./css/mio.css" rel="stylesheet" type="text/css" />
<title>Administracion Terminal</title>
</head>

<body>
<div style="height:auto;width:100%;">
  <div style="background-color:black;width:100%;">
    <h3 style="color:#fff;text-align:center;"><br>Filtrando Datos</h3>
  </div>
  <table>
	<tr>
		<td style="width:20%" VALIGN=TOP>
		<b style="color:#fff;">Tabla de Contenidos</b>
		<br>&nbsp;
		<br><div class="dos"><a href="index.php?menu=1">Inicio</a></div><br>
		<br><div class="dos"><a href="consultas.php?menu=2">Volver a Consultas</a></div><br>
		
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
		
			include './constantes.php';
			//variables a ocupar para generar el PDF...
			$sql1 = array();//contendra los atributos...
			$sql3 = '';//la consulta...
			$columnas = 0;//las columnas a mostrar...
			$valor = 0;
			$fields= '';
			foreach ($_GET as $R => $V){

				if ($R=="idempresa_show"){
					$valor=2;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="pagos_show"){
					$valor=3;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="cobros"){
					$valor=4;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="contratos"){
					$valor=5;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="flujos"){
					$valor=6;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="representantes"){
					$valor=7;
					//echo $_GET['idempresa_show'];
					break;
				}		
									
			}
			
			if ($valor==2){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					
					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA','NOMBRE_REPRESENTANTE', 'APELLIDOS_REPRESENTANTE', 'NUMERO_TELEFONO', 'MAIL');
					$global = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, CONTACTO.NUMERO_TELEFONO, CONTACTO.MAIL from EMPRESA INNER JOIN  REPRESENTANTE ON REPRESENTANTE.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA INNER JOIN CONTACTO ON CONTACTO.REPRESENTANTE_idREPRESENTANTE = REPRESENTANTE.idREPRESENTANTE where EMPRESA.idEMPRESA = ';
					$parte2 =  $_GET['idempresa_show'];
					$sql3 = $global.$parte2;
					$columnas = 6;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 6);
					echo ('</table>');
			}else if ($valor==3){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA', 'MONTO_PAGO', 'FECHA_PAGO');
					$global = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, PAGO.MONTO_PAGO, PAGO.FECHA_PAGO from EMPRESA LEFT OUTER JOIN PAGO ON EMPRESA.idEMPRESA = PAGO.EMPRESA_idEMPRESA where EMPRESA.idEMPRESA =';
					$parte2 =  $_GET['pagos_show'];
					$sql3 = $global.$parte2;
					$columnas = 4;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 4);
					echo ('</table>');
			}else if ($valor==4){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array ('NOMBRE_EMPRESA', 'RUT_EMPRESA','PAGO_SERVICIO', 'FECHA_SERVICIO');

					$global = 'select EMPRESA.NOMBRE_EMPRESA, EMPRESA.RUT_EMPRESA, COBRO_SERVICIO.PAGO_SERVICIO, COBRO_SERVICIO.FECHA_SERVICIO from EMPRESA LEFT OUTER JOIN COBRO_SERVICIO ON EMPRESA.idEMPRESA = COBRO_SERVICIO.EMPRESA_idEMPRESA WHERE EMPRESA.idEMPRESA =';
					$parte2 =  $_GET['cobros'];
					$sql3 = $global.$parte2;
					$columnas = 4;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 4);
					echo ('</table>');
					
			}else if ($valor==5){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('idCONTRATO', 'FECHA_INICIO', 'FECHA_TERMINO', 'MONTO_CONTRATO', 'TIPO_LOCAL', 'NOMBRE_SECTOR', 'NOMBRE_REPRESENTANTE','APELLIDOS_REPRESENTANTE', 'NOMBRE_EMPRESA');

					$global = 'select CONTRATO.idCONTRATO, CONTRATO.FECHA_INICIO, CONTRATO.FECHA_TERMINO, CONTRATO.MONTO_CONTRATO, TIPO.TIPO_LOCAL, SECTOR.NOMBRE_SECTOR, REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, EMPRESA.NOMBRE_EMPRESA from CONTRATO INNER JOIN LOCAL ON LOCAL.CONTRATO_idCONTRATO = CONTRATO.idCONTRATO inner join TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON SECTOR.idSECTOR = LOCAL.SECTOR_idSECTOR INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA WHERE EMPRESA.idEMPRESA = ';
					$parte2 =  $_GET['contratos'];
					$sql3 = $global.$parte2;
					$columnas = 9;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 9);
					echo ('</table>');
			}
			else if ($valor==6){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('PATENTE', 'NOMBRE_EMPRESA', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA');


					$global = 'select BUS.PATENTE, EMPRESA.NOMBRE_EMPRESA, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA from BUS INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA INNER JOIN FLUJO_BUSES ON FLUJO_BUSES.BUS_idBUS = BUS.idBUS inner join HORARIO ON HORARIO.idHORARIO = FLUJO_BUSES.HORARIO_idHORARIO WHERE EMPRESA.idEMPRESA =';
					$ordenar = ' ORDER BY FLUJO_BUSES.FECHA_ARRIVO DESC';
					$parte2 =  $_GET['flujos'];
					$sql3 = $global.$parte2.$ordenar;
					//echo $sql3;
					$columnas = 5;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 5);
					echo ('</table>');
			}
			else if ($valor==7){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					$sql1 = array('NOMBRE_REPRESENTANTE', 'APELLIDOS_REPRESENTANTE', 'RUT_REPRESENTANTE', 'NOMBRE_EMPRESA', 'NOMBRE_PROFESION', 'NUMERO_TELEFONO', 'MAIL');

					$global = 'SELECT REPRESENTANTE.NOMBRE_REPRESENTANTE, REPRESENTANTE.APELLIDOS_REPRESENTANTE, REPRESENTANTE.RUT_REPRESENTANTE, EMPRESA.NOMBRE_EMPRESA, PROFESION.NOMBRE_PROFESION, CONTACTO.NUMERO_TELEFONO, CONTACTO.MAIL FROM REPRESENTANTE INNER JOIN EMPRESA ON REPRESENTANTE.EMPRESA_idEMPRESA = EMPRESA.idEMPRESA INNER JOIN REPRESENTANTE_PROFESIONAL ON REPRESENTANTE.idREPRESENTANTE =REPRESENTANTE_PROFESIONAL.REPRESENTANTE_idREPRESENTANTE INNER JOIN PROFESION ON REPRESENTANTE_PROFESIONAL.PROFESION_idPROFESION = PROFESION.idPROFESION INNER JOIN CONTACTO ON REPRESENTANTE.idREPRESENTANTE = CONTACTO.REPRESENTANTE_idREPRESENTANTE where EMPRESA.idEMPRESA =';
					
					$parte2 =  $_GET['representantes'];
					$sql3 = $global.$parte2;
					//echo $sql3;
					$columnas = 7;//las columnas a mostrar...
					tablas($sql1, $sql3, $enlace, 7);
					echo ('</table>');
			}
		?>
			
	<form method="post">
	<input name="Button1" type="submit" value="Generar PDF"  />&nbsp;
	
	</form>

</table>
<?php

	if(isset($_POST["Button1"])){
	     
	     include 'pruebaPDF1.php';
	     
	     GenerarPDF($sql1, $sql3, $columnas, $valor);
	     
	}
?>

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


<?php

	function tablas($sql1, $sql2, $enlace, $tamano, $fields){
		
		echo('<table border="0" align="center" cellpadding="7" cellspacing="0" style="border:1px dashed #000000;">');
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
				if ($fila2[$nom_col[$i]]== NULL){
						
					echo '-------------';
				}
				else{
					echo utf8_encode($fila2[$nom_col[$i]]); 
				}
				echo ('</td>'); 
			}
			//echo('<td><div class="dos"><a href="#">Eliminar</a><a href="#">Modificar</a></div></td>');
			echo ('</tr>');
		}
		
	}
	
?>

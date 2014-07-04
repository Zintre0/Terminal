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
		<br><div class="dos"><a href="estadisticas.php?menu=2">Volver a Consultas Estadísticas</a></div><br>
		<br><div class="dos"><a href="pruebaPDF1.php?menu=9">Hacer PDF </a></div></div>

		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?php
			include './constantes.php';
			$valor = 0;
	
			foreach ($_GET as $R => $V){

				if ($R=="empresa_id"){
					$valor=1222;
					//echo $_GET['idempresa_show'];
					break;
				}else if ($R=="empresa_ID"){
					$valor=12222;
					//echo $_GET['idempresa_show'];
					break;
				}
			}
			
			if ($valor==1222){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					//atributos...
					$empresa = "'".$_GET['empresa_id']."'";
					$fecha = "'".$_GET['fecha_anden']."'";
					$anden = "'".$_GET['numero_anden']."'";
					$sector = "'".$_GET['sector']."'";
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'idBUS', 'FECHA_ARRIVO', 'ENTRADA', 'SALIDA', 'ANDEN', 'NOMBRE_SECTOR');
					
					$generica = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, BUS.idBUS, FLUJO_BUSES.FECHA_ARRIVO, HORARIO.ENTRADA, HORARIO.SALIDA, LOCAL.idLOCAL as ANDEN, SECTOR.NOMBRE_SECTOR FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA inner join FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON HORARIO.LOCAL_idLOCAL = LOCAL.idLOCAL INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR ';
					
					$condicion = ' WHERE EMPRESA.idEMPRESA = '.$empresa. ' and FLUJO_BUSES.FECHA_ARRIVO = '.$fecha.' AND LOCAL.idLOCAL = '.$anden.' and SECTOR.NOMBRE_SECTOR = '.$sector;
					
					$consulta = $generica.$condicion;
					tablas($sql1, $consulta, $enlace, 8);
					
					echo ('</table>');
			}
			
			if ($valor==12222){
			
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db($base_de_datos, $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					
					//atributos...
					$empresa = "'".$_GET['empresa_ID']."'";
					$fecha = "'".$_GET['fecha_Anden']."'";
					
					$sql1 = array ('idEMPRESA', 'NOMBRE_EMPRESA', 'FECHA_ARRIVO', 'ANDEN', 'BUSES_ARRIVADOS');
					
					$generica = 'SELECT EMPRESA.idEMPRESA, EMPRESA.NOMBRE_EMPRESA, FLUJO_BUSES.FECHA_ARRIVO, LOCAL.idLOCAL as ANDEN, COUNT(EMPRESA.idEMPRESA) as BUSES_ARRIVADOS FROM EMPRESA INNER JOIN BUS ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA inner join FLUJO_BUSES ON BUS.idBUS = FLUJO_BUSES.BUS_idBUS INNER JOIN HORARIO ON FLUJO_BUSES.HORARIO_idHORARIO = HORARIO.idHORARIO INNER JOIN LOCAL ON HORARIO.LOCAL_idLOCAL = LOCAL.idLOCAL INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR ';
					$generica2 = ' GROUP BY EMPRESA.idEMPRESA';
					
					$condicion = ' WHERE EMPRESA.idEMPRESA = '.$empresa. ' and FLUJO_BUSES.FECHA_ARRIVO = '.$fecha;
					
					$consulta = $generica.$condicion.$generica2;
					tablas($sql1, $consulta, $enlace, 5);
					//echo $consulta;
					echo ('</table>');
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


<?php

	function tablas($sql1, $sql2, $enlace, $tamano){
		
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

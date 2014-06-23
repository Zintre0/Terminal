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
		<br><div class="dos"><a href="index.php?menu=1">Inicio</a></div><br>
		<?hiper_tablas();?>
		<!--<br><div class="dos"><a href="index.php?menu=5">Actividad</a></div>
		<div class="dos"><a href="index.php?menu=6">Actividad Casa</a></div>
		<div class="dos"><a href="index.php?menu=2">Casa Veraneo</a></div>
		<div class="dos"><a href="index.php?menu=3">Ciudad</a></div>
		<div class="dos"><a href="index.php?menu=4">Ninio</a></div>-->
		</td>
		<td>&nbsp;&nbsp;&nbsp;</td>
		<td style="background-color:#fff;width:80%;" VALIGN=TOP>
		<br>
		
		<?
			$password = 'h3forever';
			$valor = 0;
			foreach ($_GET as $R => $V){
					if ($R=="id_empresa"){
						$valor=2;
						break;
					}
					else if ($R=="nom_cas22"){
						$valor=3;
						break;
					}
					else if ($R=="idbus_elim"){
						$valor=102;
						break;
					}
					else if ($R=="nom_cas_elim"){
						$valor=11;
						break;
					}
			}
			
			if ($valor==2){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
						echo 'No pudo conectarse a mysql';
						exit;
					}

					if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
						echo 'No pudo seleccionar la base de datos';
						exit;
					}
					$sql1 = 'SELECT COUNT(*) FROM BUS';
					$cantidad = mysql_query($sql1, $enlace);
					if (!$cantidad) {
						echo "Error de BD, no se pudo consultar la base de datos\n";
						#echo "Error MySQL: ' . mysql_error();
						exit;
					}
					$fila = mysql_fetch_assoc($cantidad);
					$num = $fila['COUNT(*)'] + 1;
					$id_empresa= "'".$_GET['id_empresa']."'";
					$patente= "'".$_GET['patente']."'";
					$capacidad= "'".$_GET['capacidad']."'";
					
					$ingreso = "INSERT INTO BUS values($num,$id_empresa,$patente,$capacidad)";
					$ingresar = mysql_query($ingreso, $enlace);
					if (!$ingresar) {
						echo "Error de BD, no se pudo consultar la base de datos\n";
						exit;
					}
					echo ('<h1>INGRESADO CORRECTAMENTE</h1>');
			}
			if ($valor==102){
				if (!$enlace = mysql_connect('localhost', 'root', $password)) {
					echo 'No pudo conectarse a mysql';
					exit;
				}

				if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
					echo 'No pudo seleccionar la base de datos';
					exit;
				}
				$elim= "'".$_GET['idbus_elim']."'";
				$ingreso = "DELETE FROM BUS WHERE idBUS=$elim";
				$ingresar = mysql_query($ingreso, $enlace);
				if (!$ingresar) {
					echo "Error de BD, no se pudo consultar la base de datos\n";
					exit;
				}
				echo ('<h1>ELIMINADO CORRECTAMENTE</h1>');
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
	function hiper_tablas(){
		if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}
		$show_tables = mysql_query('show tables', $enlace);
		if (!$show_tables) {
			echo "Error de BD, no se pudo consultar la base de datos\n";
			#echo "Error MySQL: ' . mysql_error();
			exit;
		}
		$i=1;
		while ($fila = mysql_fetch_assoc($show_tables)) {
			$i++;
			echo ('<div class="dos"><a href=index.php?num='."$i".'>'); 
			echo $fila['Tables_in_TERMINAL_DE_BUSES'];
			echo ("</a></div>");
			//echo $fila['cod_ong'] .'---';
		}
	}
?>

<html>
	<head><title>conectar</title></head>
	<body>
		<h1>Conectarse</h1>
		<br>
		<table border="1">
		<?			
		if (!$enlace = mysql_connect('localhost', 'root', 'h3forever')) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db('TERMINAL_DE_BUSES', $enlace)) {
			echo 'No pudo seleccionar la base de datos';
			exit;
		}
		
		$num = array(1,2,3,4,5,6,7,8,9,10,11,12,13,14,15);
		$show_tables = mysql_query('show tables', $enlace);
		if (!$show_tables) {
			echo "Error de BD, no se pudo consultar la base de datos\n";
			#echo "Error MySQL: ' . mysql_error();
			exit;
		}
		$i=0;
		echo ("<tr>");
		while ($fila = mysql_fetch_assoc($show_tables)) {
			$i++;
			echo ('<th><a href=connect.php?num='."$i".'>'); 
			echo $fila['Tables_in_TERMINAL_DE_BUSES'];
			echo ("</a></th>");
			//echo $fila['cod_ong'] .'---';
		}
		echo ("</tr>");
		
		?>
		</table><br><br>
		<table border="1">
		<b>Atributos</b>
		<?
			switch($_GET["num"]){
				case 1:
					$sql1 = 'desc BUS';
					$sql2 = 'SELECT * FROM BUS';
					tablas($sql1,$sql2,$enlace);
					//echo ('</table>');
					break;
				case 2:
					$sql1 = 'desc COBRO_SERVICIO';
					$sql2 = 'SELECT * FROM COBRO_SERVICIO';
					tablas($sql1,$sql2,$enlace);
					break;
				case 3:					
					$sql1 = 'desc CONTACTO';
					$sql2 = 'SELECT * FROM CONTACTO';
					tablas($sql1,$sql2,$enlace);
					break;
				case 4:
					$sql1 = 'desc CONTRATO';
					$sql2 = 'SELECT * FROM CONTRATO';
					tablas($sql1,$sql2,$enlace);
					break;
				case 5:
					$desc = mysql_query('desc EMPRESA', $enlace);
					describir($desc);
					break;
				case 6:
					$desc = mysql_query('desc FLUJO_BUSES', $enlace);
					describir($desc);
					break;
				case 7:
					$desc = mysql_query('desc GIRO', $enlace);
					describir($desc);
					break;
				case 8:
					$desc = mysql_query('desc HORARIO', $enlace);
					describir($desc);
					break;
				case 9:
					$desc = mysql_query('desc LOCAL', $enlace); 
					describir($desc);
					break;
			}
		?>	
		</table>
	</body>
	
</html>

<?
	function describir($R){
		echo ("<tr>");
		while ($fila = mysql_fetch_assoc($R)) {
			$i++;
			echo ('<th>'); 
			echo $fila['Field'];
			echo ("</th>");
		}
	}
	
	function tablas($sql1,$sql2,$enlace){
		echo('<table border="1">');
		$nom_col = mysql_query($sql1, $enlace);
		$fields = mysql_query($sql2, $enlace);
		echo ('<tr>');
		while ($fila = mysql_fetch_assoc($nom_col)) {
			echo ('<th>'); 
			echo $fila['Field'];
			echo ('</th>');
		}
		//echo('<th>ACCION</th>');
		//echo ('<th><a href="eliminar.php?mer=1"><input type="submit" value="Eliminar" /></a><a href="eliminar.php?mer=1"><input type="submit" value="Nuevo" /></a></th>');
		echo ('</tr>');
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
		echo ('</table>');
		
	}
?>

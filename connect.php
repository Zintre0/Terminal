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
					$desc = mysql_query('desc BUS', $enlace);
					describir($desc);
					break;
				case 2:
					$desc = mysql_query('desc COBRO_SERVICIO', $enlace);
					describir($desc);
					break;
				case 3:
					$desc = mysql_query('desc CONTACTO', $enlace);
					describir($desc);
					break;
				case 4:
					$desc = mysql_query('desc CONTRATO', $enlace);
					describir($desc);
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
?>

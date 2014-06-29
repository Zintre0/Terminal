<?php

	function hiper_tablas(){
		include './constantes.php';
		if (!$enlace = mysql_connect('localhost', 'root', $password)) {
			echo 'No pudo conectarse a mysql';
			exit;
		}

		if (!mysql_select_db($base_de_datos, $enlace)) {
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
	
	function EscrituraIndex (){
		
		echo ('<h1>Web Service Terminal</h1>');
		echo ('<p>Aplicación basada en base de datos y apoyada por servicios web que permite administrar la información relacionada a un 
		Terminal de Buses, en especial a su área administrativa.
		Es importante mencionar que no se considera la venta de boletos y otras secciones del terminal, ya que escapa del objetivo de administración</p>

		<p>La inforamción asociada es referente a los Locales Comerciales, las Compañías asociadas, los Buses y su respectiva llegada a una Andén en particular
		la hora y fecha de la misma, así como también información referente a los Contratos y sus Representantes</p>

		<p>Es posible realizar diversas operaciones sobre este sistema, ya sea ingresar, eliminar y/o modificar algún dato, por otro lado en las 
		secciones de consultas se puede obtener información detallada (SIN FILTRO) y aplicando diversos filtros para obtener detalles específicos</p>

		<p>Por otro lado consta con una generación de reportes en formato PDF y una sección de Gráficas en donde se pueden hacer diversas consultas
		las cuales se representan mediante un gráfico matemático</p>
		<p>Le recomendamos que ante cualquier consulta revise el Manual de Usuario y README</p>
		<p>Para mayor información enviar mail a:</p>
		<p>faramirez12@alumnos.utalca.cl</p>
		<p>dmedina11@alumnos.utalca.cl</p>
		<p>earancibia12@alumnos.utalca.cl</p>
		<br>
		<br>
		</td>');
	}

?>

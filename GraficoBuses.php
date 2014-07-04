<?php

require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_pie.php');
require_once ('jpgraph/src/jpgraph_pie3d.php');

include './constantes.php';

if (!$enlace = mysql_connect('localhost', 'root', $password)) {
	echo 'No pudo conectarse a mysql';
	exit;
}
			
if (!mysql_select_db($base_de_datos, $enlace)) {
	echo 'No pudo seleccionar la base de datos';
	exit;
}

$query = 'SELECT EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) as CANTIDAD_BUSES FROM BUS INNER JOIN EMPRESA ON EMPRESA.idEMPRESA = BUS.EMPRESA_idEMPRESA GROUP BY EMPRESA.idEMPRESA';

$fields = mysql_query($query, $enlace);
 
while($row = mysql_fetch_array($fields)){
     
     $data[] = $row[1];
     $can2[] = $row[0];
}

mysql_close($enlace);       
$graph = new PieGraph(700,450);
$graph->img->SetAntiAliasing();

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Setup margin and titles
	$graph->title->Set("                        Buses por Empresas                  ");

// Create
	$p1 = new PiePlot3D($data);
	$graph->Add($p1);

	$p1->ShowBorder();
	$p1->SetColor('black');
	
    
    $p1->SetSize(0.45);
    $p1->SetCenter(0.55);
 
// Setup slice labels and move them into the plot
    $p1->value->SetFont(FF_FONT1,FS_BOLD);
    $p1->value->SetColor("black");
    $p1->SetLabelPos(0.5);
 
    $p1->SetLegends($can2);
    $p1->ExplodeAll();
 
    $graph->Add($p1);
    $graph->Stroke(); 
?>

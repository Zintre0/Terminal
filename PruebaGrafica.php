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

$query = 'select EMPRESA.NOMBRE_EMPRESA, COUNT(EMPRESA.idEMPRESA) AS LOCALES_ARRENDADOS from LOCAL INNER JOIN TIPO ON TIPO.idTIPO = LOCAL.TIPO_idTIPO INNER JOIN SECTOR ON LOCAL.SECTOR_idSECTOR = SECTOR.idSECTOR inner join CONTRATO ON CONTRATO.idCONTRATO = LOCAL.CONTRATO_idCONTRATO INNER JOIN REPRESENTANTE ON REPRESENTANTE.idREPRESENTANTE = CONTRATO.REPRESENTANTE_idREPRESENTANTE inner join EMPRESA ON EMPRESA.idEMPRESA = REPRESENTANTE.EMPRESA_idEMPRESA WHERE LOCAL.CONTRATO_idCONTRATO group by EMPRESA.idEMPRESA ORDER BY LOCALES_ARRENDADOS DESC';

$fields = mysql_query($query, $enlace);
 
while($row = mysql_fetch_array($fields)){
     
     $data[] = $row[1];
     $can[] = $row[0];
}

mysql_close($enlace);       
$graph = new PieGraph(700,450);
$graph->img->SetAntiAliasing();

$theme_class= new VividTheme;
$graph->SetTheme($theme_class);

// Setup margin and titles
	$graph->title->Set("                                 Locales Arrendados por Empresas             ");

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
 
    $p1->SetLegends($can);
    $p1->ExplodeAll();
 
    $graph->Add($p1);
    $graph->Stroke(); 
?>

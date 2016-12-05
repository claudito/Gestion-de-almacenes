<?php 

include('../config.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');

$db = new Conexion();

$codigo         = $_POST['codigo'];
$serie          = $_POST['serie'];
$descripcion    = $_POST['descripcion'];
$unidad         = $_POST['unidad'];
$familia        = $_POST['familia'];
$cantidad       = $_POST['cantidad'];
$precio         = $_POST['precio'];
$centro_costo   = $_POST['centro_costo'];
$serie_doc      = $_POST['serie_doc'];
$procedencia    = $_POST['prodencia'];


foreach ($codigo as $key => $value_codigo) 
{
	$value_serie        = $serie[$key];
	$value_desc         = $descripcion[$key];
	$value_und          = $unidad[$key];
	$value_fam          = $familia[$key];
	$value_cant         = $cantidad[$key];
	$value_prec         = $precio[$key];
	$value_procedencia  = $prodencia[$key];

	if (count_maeart($value_codigo,$value_serie,$centro_costo,$serie_doc)>0)
	{
	 echo actualizar_stkart($centro_costo,$value_codigo,$value_serie,$value_cant,$value_prec,$serie_doc);
	 echo "</br>";
	}
	else
	{
	  echo registrar_maeart($value_codigo,$value_serie,$value_desc,$value_und,$value_fam);
	  echo "</br>";
	  echo registrar_stkart($centro_costo,$value_codigo,$value_serie,$value_cant,$value_prec,$serie_doc);
	}
	
	//header('Location: '.PATH.'pages/consulta-stock?serie_doc='.$serie_doc.'&cc='.$centro_costo);
	header('Location: '.PATH.'pages/consulta-stock');


}



 ?>
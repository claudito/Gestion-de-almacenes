<?php 


function maeart($codigo,$serie,$descripcion,$unidad,$familia)
{

$db    = new Conexion();
$query1  = "INSERT INTO maeart(codigo,serie,descripcion,unidad,familia)
VALUES('".$codigo."','".$serie."','".$descripcion."','".$unidad."','".$familia."');";
$result1 = $db->query($query1);
if($result1)
echo "ok";
else
echo "error";

}



function stkart($serie_doc,$centro_costo,$codigo,$serie,$costo)
{

$db    = new Conexion();
$query1  = "INSERT INTO stkart(serie_doc,centro_costo,maeart_codigo,maeart_serie,cantidad,costo,fecha_update)
VALUES('".$serie_doc."','".$centro_costo."','".$codigo."','".$serie."',0.00,'".$costo."',now());";
$result1 = $db->query($query1);
if($result1)
echo "ok";
else
echo "error";

}





 ?>
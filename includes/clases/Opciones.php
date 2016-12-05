<?php 


function filas_permitidas_excel()
{

$db     = new Conexion();
$query  = "SELECT * FROM opciones WHERE idopciones=1"; 
$result = $db->query($query);
$dato   = mysqli_fetch_array($result);
return  $dato['valor'];

}









 ?>
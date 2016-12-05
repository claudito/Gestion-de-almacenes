<?php 
include('../config.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');

$db = new Conexion();

$documento = $_POST['documento'];

$tipo      = $_POST['tipo'];

$query  = "SELECT codigo,serie,centro_costo,cantidad,left(movalmcab_documento,3)as serie_doc FROM movalmdet	
 WHERE movalmcab_documento='".$documento."' AND  movalmcab_tipo='".$tipo."'";
$result = $db->query($query); 
while ($fila = mysqli_fetch_array($result)) 
{
	$query1  = "UPDATE stkart  SET cantidad=cantidad+'".$fila['cantidad']."' WHERE serie_doc='".$fila['serie_doc']."' AND centro_costo='".$fila['centro_costo']."' AND maeart_codigo='".$fila['codigo']."' AND maeart_serie='".$fila['serie']."'";
	$result1 = $db->query($query1);
	if ($result1)
	{
	 echo "ok".$fila['codigo']."</br>";
	}
	else
	{
	 echo "error".$fila['codigo']."</br>";
	}
	

}

movimientos_det($documento,$tipo);
movimientos_cab($documento,$tipo);

echo "<script>alert('Nota de Salida $documento eliminada');</script>";
echo "<script>window.location='../pages/salidas';</script>";

 ?>
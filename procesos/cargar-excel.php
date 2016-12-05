<?php
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Opciones.php');
include('../librerias/PHPEXCEL/PHPExcel.php');
include('../librerias/PHPEXCEL/PHPExcel/Reader/Excel2007.php');
$db          = new Conexion();
$num_filas   = filas_permitidas_excel();
$transaccion = $_POST['transaccion']; 
$tipo_transaccion        = $_POST['tipo'];
$contrato    = $_POST['contrato'];
$fecha       = $_POST['fecha'];

extract($_POST);
if ($action == "upload") {
//cargamos el archivo al servidor con el mismo nombre
//solo le agregue el sufijo bak_ 
$archivo   = $_FILES['excel']['name'];
$tipo      = $_FILES['excel']['type'];
$destino   = "bak_" . $archivo;
if (copy($_FILES['excel']['tmp_name'], $destino))
{
#echo "Archivo Cargado Con Éxito";
}
else
{
echo "Error Al Cargar el Archivo";
}

if (file_exists("bak_" . $archivo)) 
{

// Cargando la hoja de cálculo
$objReader = new PHPExcel_Reader_Excel2007();
$objPHPExcel = $objReader->load("bak_" . $archivo);
$objFecha = new PHPExcel_Shared_Date();
// Asignar hoja de excel activa
$objPHPExcel->setActiveSheetIndex(0);


// Llenamos el arreglo con los datos  del archivo xlsx
for ($i = 2; $i <= $num_filas; $i++)
{
$_DATOS_EXCEL[$i]['codigo']    = $objPHPExcel->getActiveSheet()->getCell('A' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['serie'] = $objPHPExcel->getActiveSheet()->getCell('B' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['descripcion'] = $objPHPExcel->getActiveSheet()->getCell('C' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['unidad'] = $objPHPExcel->getActiveSheet()->getCell('D' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['cantidad'] = $objPHPExcel->getActiveSheet()->getCell('E' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['maquina'] = $objPHPExcel->getActiveSheet()->getCell('F' . $i)->getCalculatedValue();
$_DATOS_EXCEL[$i]['doc_referencia'] = $objPHPExcel->getActiveSheet()->getCell('G' . $i)->getCalculatedValue();
}

}

//si por algo no cargo el archivo bak_ 
else 
{
echo "Necesitas primero importar el archivo";
}

$errores = 0;
//recorremos el arreglo multidimensional 
//para ir recuperando los datos obtenidos
//del excel e ir insertandolos en la BD


foreach ($_DATOS_EXCEL as $key => $value)
 {


if (empty($value['codigo']))
{
echo "vacio";
} 
else
{
   $query  =  "
   INSERT INTO carga_excel(codigo,usuarios_idusuarios,serie,descripcion,unidad,cantidad,maquina,doc_referencia)values('".$value['codigo']."','".$_SESSION[KEY.USUARIO]."','".$value['serie']."','".$value['descripcion']."','".$value['unidad']."','".$value['cantidad']."','".$value['maquina']."','".$value['doc_referencia']."');";
  $result = $db->query($query);
  if ($result) 
	{
	 #echo "ok";
	unlink($destino);//Una vez terminado el proceso borramos el archivo que esta en el servidor el bak_
	header('Location:  '.PATH.'mensaje/carga?serie='.$transaccion.'&tipo='.$tipo_transaccion.'&contrato='.$contrato.'&fecha='.$fecha);

	} 
	else
	{
	 echo "error";
	}
}







}





}
?>
<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');
session_start();
$db =  new Conexion();

$documento    = $_POST['documento'];
$serie_doc    = $_POST['serie_doc'];
$tipo         = $_POST['tipo'];
$ruc          = $_POST['ruc'];
$razon_social = $_POST['razon_social'];
$centro_costo = $_POST['centro_costo'];
$comentario   = $_POST['comentario'];
$fecha        = $_POST['fecha'];
$item         = $_POST['item'];
$codigo		  = $_POST['codigo'];
$serie        = $_POST['serie'];
$descripcion  = $_POST['descripcion'];
$unidad       = $_POST['unidad'];
$familia      = $_POST['familia'];
$cantidad     = $_POST['cantidad'];
$costo        = $_POST['costo'];



if ($_POST['disponible']<=0) 
{
	echo "
	<script>
	alert('No hay suficiente Stock para generar el documento');
	window.location='".PATH."pages/nota-de-ingreso?contrato=$centro_costo';
	</script>";
}
else
{

registrar_nota_salida_cab($documento,$tipo,$ruc,$razon_social,'',$centro_costo,$comentario,$_SESSION[KEY.USUARIO],$fecha);
actualizar_correlativo($serie_doc,$tipo);




foreach ($cantidad as $key => $value_cantidad) 
{

		if ($value_cantidad <= 0 ) 
		{
		   echo "cero";
		}
		else
		{
         
         $value_item    = $item[$key];
	     $value_codigo  = $codigo[$key];
	     $value_serie   = $serie[$key];
	     $value_desc    = $descripcion[$key];
	     $value_und     = $unidad[$key];
	     $value_fam     = $familia[$key];
	     $value_costo   = $costo[$key];
	     

         
registrar_nota_salida_det($documento,$tipo,$value_item,$value_codigo,
	$value_serie,$value_desc,$value_und,$value_cantidad,$value_costo,'','',$centro_costo,$value_fam,$fecha);

	     
	     actualizar_stkart_nota_ingreso_det($serie_doc,$centro_costo,$value_codigo,$value_serie,$value_cantidad);

        



		}
     
}


echo "<script>
    alert('Nota de Ingreso Creada');
     window.location='".PATH."pages/ingresos';
     </script>";


}

 ?>
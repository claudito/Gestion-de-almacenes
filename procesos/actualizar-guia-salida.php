<?php

  include('../config.php');
  include('../session.php');
  include('../includes/bd/conexionSQLserver.php');
  include('../librerias/PHPEXCEL/PHPExcel.php');
  include('funciones.php');
  include('../includes/clases/Funciones.php');

  $fechainicio = $_REQUEST['fechainicio'];
  $fechafin    = $_REQUEST['fechafin'];
  $documento   = $_REQUEST['documento'];
  
  $valor       =  registro_guias_salida($documento,$fechainicio,$fechafin);

   
if ($valor=='existe')
{
 echo"Ya fue descargado el archivo";
}
else if ($valor=='ok')
{

  header('Location: '.PATH.'pages/guias-salida?fechainicio='.$fechainicio.'&fechafin='.$fechafin.'&documento='.$documento);
}
else if ($valor =='error')
{
 echo "erro al registrar el documento";
}
else
{
 echo "error inesperado";
}


  

?>
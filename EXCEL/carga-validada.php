<?php

  include('../config.php');
  include('../session.php');
  include('../includes/bd/conexionSQLserver.php');
  include('../librerias/PHPEXCEL/PHPExcel.php');
  include('funciones.php');
  include('../includes/clases/Funciones.php');

  if ($_GET['valor']=='ci') 
  {
  	carga_inicial();
  } 
  else if ($_GET['valor']=='ni') 
  {
  	nota_ingreso();
  } 
  else if ($_GET['valor']=='ns') 
  {
  	nota_salida();
  } 
  else
  {
  	echo "no existe";
  }

  


?>
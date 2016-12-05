<?php

  include('../config.php');
  include('../session.php');
  include('../includes/bd/conexionSQLserver.php');
  include('../librerias/PHPEXCEL/PHPExcel.php');
  include('funciones.php');
  include('../includes/clases/Funciones.php');

  excel_guia_salida($_GET['documento']);


?>
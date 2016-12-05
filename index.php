<?php 

session_start();
include('config.php');
include('includes/bd/conexion.php');
include('includes/clases/Funciones.php');

if (!isset($_SESSION[KEY.USUARIO])) 
{
 include('templates/acceso.php');
}
else
{
 include('templates/home.php');
}





 ?>
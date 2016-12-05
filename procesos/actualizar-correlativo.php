<?php 

include('../config.php');
include('../includes/bd/conexion.php');

$db     = new Conexion();

$id     = $_POST['id'];
$numero = $_POST['numero'];

$query  = "UPDATE correlativos SET numero='".$numero."'
           WHERE idcorrelativos='".$id."'";
$result = $db->query($query);
if ($result)
{
 echo "<script>
       alert('Registro Actualizado');
       window.location='../pages/correlativos';
       </script>"; 
} 
else
{
 echo "<script>
       alert('Error');
       window.location='../pages/correlativos';
       </script>";
}





 ?>
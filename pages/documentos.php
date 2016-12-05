<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/bd/conexionSQLserver.php');
$db   = new Conexion();
$link = Conectarse();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Documentos</title>
<?php include('../templates/enlaces/principal.php'); ?>
<?php include('../templates/enlaces/selectize.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php include('../templates/nav.php'); ?>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Lista de Documentos Excel</h3>
	</div>
	<div class="panel-body">
	 <ul>
	  <?php 
       
       $query  =  " SELECT * FROM documentos;";
       $result = $db->query($query);
       while ($fila  = mysqli_fetch_object($result)) 
       {
       	echo "<li><a href='".PATH."uploads/$fila->ruta'>$fila->descripcion</a></li>";
       }

	   ?>
	 </ul>
	</div>
</div>
</div>
</div>


</div>
</div>
</body>
</html>
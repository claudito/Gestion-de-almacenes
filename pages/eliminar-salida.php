<?php 
include('../config.php');
include('../includes/bd/conexion.php');
$db = new Conexion();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Eliminar Salida</title>
<?php include('../templates/enlaces/principal.php'); ?>
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
<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Consulta</h3>
	</div>
	<div class="panel-body">
		Panel content
	</div>
</div>
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="panel panel-danger">
	<div class="panel-heading">
		<h3 class="panel-title">Detalle</h3>
	</div>
	<div class="panel-body">
		Detalle
	</div>
</div>
</div>
</div>
</div>
</body>
</html>
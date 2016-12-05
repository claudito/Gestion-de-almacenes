<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
$db = new Conexion();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Usuarios</title>
<?php include('../templates/enlaces/principal.php'); ?>
<?php include('../templates/enlaces/datatables.php'); ?>
<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>
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
		<h3 class="panel-title">Usuarios</h3>
	</div>
	<div class="panel-body">
	<?php include('../templates/grid/usuarios.php'); ?>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>
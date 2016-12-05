<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexionSQLserver.php');
$link = Conectarse();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Descargar Carga Validada</title>
<?php include('../templates/enlaces/principal.php'); ?>
<?php include('../templates/enlaces/datatables.php'); ?>
<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>
<style>
table{font-size: 12px;}
</style>
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
<div class="alert alert-danger">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>ATENCIÓN: </strong>SOLO SE PERMITE LA DESCARGA DE ARTICULOS EXISTENTES Y ACTIVOS,PORFAVOR VERIFICAR ANTES DE DESCARGAR. 
</div>


<div class="panel panel-default">
	<div class="panel-heading">
	Carga Validada
	<div class="pull-right">
	<a href="../EXCEL/carga-validada?valor=ni" class="btn btn-info btn-xs">Nota de Ingreso</a>
	<a href="../EXCEL/carga-validada?valor=ns" class="btn btn-success btn-xs">Nota de Salida</a>
	<a href="../EXCEL/carga-validada?valor=ci" class="btn btn-warning btn-xs">Carga Inicial</a>
	</div>
	</div>
	<div class="panel-body">
		<?php include('../templates/grid/carga-validada.php'); ?>
	</div>
</div>

</div>
</div>
</div>
</body>
</html>
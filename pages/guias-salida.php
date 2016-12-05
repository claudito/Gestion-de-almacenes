<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexionSQLserver.php');
include('../librerias/PHPEXCEL/PHPExcel.php');
include('../EXCEL/funciones.php');

//excel_guia_salida($_REQUEST['documento']);

$link = Conectarse();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Guías de Salida</title>
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
<div class="col-md-6">
<div class="panel panel-default">
	<div class="panel-body">
	<form action="<?php echo $PHP_SELF ?>" method="GET" class="form-inline">
	 <input type="date" name="fechainicio" value="<?php echo $_REQUEST['fechainicio']; ?>" class="form-control">
	 <input type="date" name="fechafin" value="<?php echo $_REQUEST['fechafin']; ?>" class="form-control"> 
	 <button class="btn btn-success">Consultar</button>
	</form>
	</div>
</div>
</div>
<div class="col-md-6">
<div class="panel panel-default">
	<div class="panel-body">
<?php 
if (!isset($_REQUEST['documento']))
{
 echo "<button type='button' class='btn btn-default'>Descarga no disponible</button>";
}
else
{
 echo "<a href='".PATH."EXCEL/guia-salida?documento=".$_REQUEST['documento']."' class='btn btn-success'>Descargar Documento ".$_REQUEST['documento']."</a>";
}
?>	 	

	</div>
</div>
</div>
</div>		

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Guías de Salida Starsoft</h3>
	</div>
	<div class="panel-body">
	<?php include('../templates/grid/guias-salida.php'); ?>
	</div>
</div>
</div>
</div>

</div>	
</body>
</html>
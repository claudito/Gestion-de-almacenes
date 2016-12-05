<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');
$db  =  new Conexion();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Consulta Carga Inicial</title>
<?php include('../templates/enlaces/principal.php'); ?>

<style>
table{font-size: 13px;}
</style>
<script>
function validar(f){
f.enviar.value="Por favor, espere....";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;
return true}
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
<form action="../procesos/subir-carga-inicial"  method="POST" onsubmit="return validar(this)">



<div class="panel panel-default">
	<div class="panel-heading">
	Carga Inicial
	<div class="pull-right">
	<input type='submit' name='enviar'  value="Subir Carga Inicial" class="btn btn-success btn-xs" />
	</div>
	</div>
	<div class="panel-body">
	<?php include('../templates/grid/carga-inicial.php'); ?>
	</div>
</div>



</form>
</div>
</div>
</div>
</body>
</html>
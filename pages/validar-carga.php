<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexionSQLserver.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');
$link = Conectarse();
$db = new Conexion();
LiberarCarga($_SESSION[KEY.USUARIO]);
LiberarCargaValidar($_SESSION[KEY.USUARIO]);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validar Carga</title>
<?php include('../templates/enlaces/principal.php'); ?>
<script>
function validar(f){
f.enviar.value="Por favor, espere";
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
<div class="col-md-3"></div>
<div class="col-md-6">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Validar Carga</h3>
	</div>
	<div class="panel-body">
	<form name="importa" method="post" action="../procesos/validar-carga" enctype="multipart/form-data" onsubmit="return validar(this)">
	<div class="form-group">
	<input type="file" name="excel" class="form-control" required="" />
	</div>
	<input type='submit' name='enviar'  value="Importar" class="btn btn-success" />
	<input type="hidden" value="upload" name="action" 
	/>
	</form>
	</div>
</div>
</div>
</div>
</div>
</body>
</html>
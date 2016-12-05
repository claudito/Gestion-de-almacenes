<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');
$db  = new Conexion();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nota de Ingreso</title>
<?php include('../templates/enlaces/principal.php'); ?>
<script>
function validar(f){
f.enviar.value="Por favor, espere....";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;
return true}
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

<form action="../procesos/nota-ingreso"  method="POST" autocomplete="Off">


<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
	Nota de Ingreso: <?php echo $_GET['serie'].' - '.correlativo(7,$_GET['serie'],$_GET['tipo']); ?>
    <div class="pull-right">
    <input type='submit' name='enviar'  value="Crear Nota de Ingreso" class="btn btn-primary btn-xs" />
    </div>
	</div>
	<div class="panel-body">

    <div class="row">

    <div class="col-md-2">
    <div class="form-group">
    <input type="text" name="centro_costo" value="<?php echo $_GET['contrato'] ?>" class="form-control" readonly>
    </div>
    </div>
     <div class="col-md-3">
    <div class="form-group">
    <input type="text" name="" value="<?php echo obtener_centro_costo($_GET['contrato']); ?>" class="form-control" readonly>
    </div>
    </div>

    </div>

    <div class="row">
    <div class="col-md-2">
    <div class="form-group">
    <input type="text" name="ruc" value="20469962246" class="form-control" readonly="">
    </div>
    </div>
     <div class="col-md-3">
    <div class="form-group">
    <input type="text" name="razon_social" value="ROCK DRILL CONT. CIV. Y MIN. SAC" class="form-control" readonly="">
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-2">
    <div class="form-group">
    <input type="date" name="" class="form-control" value="<?php echo $_GET['fecha']; ?>" readonly>
    </div>
    </div>
    </div>

    <div class="row">
    <div class="col-md-5">
    <input type="text" name="comentario" id="" class="form-control" required="" placeholder="Comentario" onchange="Mayusculas(this)">
    </div>
    </div>

    <input type="hidden" name="tipo" value="<?php echo $_GET['tipo']; ?>">
    <input type="hidden" name="documento" value="<?php echo $_GET['serie'].correlativo(7,$_GET['serie'],$_GET['tipo']); ?>">
    <input type="hidden" name="fecha" value="<?php echo $_GET['fecha'] ?>">
     <input type="hidden" name="serie_doc" value="<?php echo $_GET['serie'] ?>">

	</div>
</div>
</div>
</div>

<div class="row">
<div class="col-md-12">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Detalle Nota de Ingreso</h3>
	</div>
	<div class="panel-body">
		<?php include('../templates/grid/nota-de-ingreso.php'); ?>
	</div>
</div>
</div>
</div>

</form>

</div>
</body>
</html>
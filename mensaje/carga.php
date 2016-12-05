<?php
 include('../config.php');
 include('../session.php');
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Carga Salidas</title>
<?php include('../templates/enlaces/principal.php'); ?>

</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="jumbotron">
<h1 class="text-center">
<i class="fa fa-smile-o fa-5x"></i></h1>
<h1 class="text-center">Carga Exitosa</h1>
<center>
<?php 
if ($_GET['tipo']=='NS')
{
?>
<a href="<?php echo PATH; ?>pages/nota-de-salida?contrato=<?php echo $_GET['contrato']; ?>&fecha=<?php echo $_GET['fecha']; ?>&serie=<?php echo $_GET['serie']; ?>&tipo=<?php echo $_GET['tipo']; ?>" class="btn btn-primary">Consultar Carga</a>
<?php
} 
else
{
?>
<a href="<?php echo PATH; ?>pages/nota-de-ingreso?contrato=<?php echo $_GET['contrato']; ?>&fecha=<?php echo $_GET['fecha']; ?>&serie=<?php echo $_GET['serie']; ?>&tipo=<?php echo $_GET['tipo']; ?>" class="btn btn-primary">Consultar Carga</a>
<?php
}



 ?>



<a href="<?php echo PATH; ?>pages/transacciones" class="btn btn-default">Volver a Cargar</a>
</center>
</div>
</div>
</div>
</div>
</body>
</html>
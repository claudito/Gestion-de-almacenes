<?php
 include('../config.php');
 include('../session.php');
  ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Validar Carga</title>
<?php include('../templates/enlaces/principal.php'); ?>

</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<div class="jumbotron">
<h1 class="text-center">
<i class="fa fa-smile-o fa-5x"></i></h1>
<h1 class="text-center">Carga Validada</h1>
<center>
<a href="<?php echo PATH; ?>pages/descargar-validar-carga" class="btn btn-primary">Consultar Carga</a>
<a href="<?php echo PATH; ?>pages/validar-carga" class="btn btn-default">Volver a Cargar</a>
</center>
</div>
</div>
</div>
</div>
</body>
</html>
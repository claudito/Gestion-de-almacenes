<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Bievenidos</title>
<?php include('templates/enlaces/principal.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-12">
<?php include('templates/nav.php'); ?>
</div>
</div>
<div class="row">
<div class="col-md-12">
<h1 class="text-center text-primary"><i class="fa fa-cube fa-5x"></i></h1>
<h1 class="text-center text-primary"><?php echo  obtener_centro_costo($_SESSION[KEY.CONTRATO]) ?></h1>
<h1 class="text-center text-primary"><i>Gestión de Almacenes Rockdrill</i></h1>

</div>
</div>
</div>
</div>
</body>
</html>


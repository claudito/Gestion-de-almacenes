<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Acceso</title>
<?php include('templates/enlaces/principal.php'); ?>
<?php include('templates/enlaces/selectize.php'); ?>
</head>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4">
<h1 class="text-center">Inventarios</h1>
<center>
<img src="<?php echo PATH; ?>assets/img/logo_192.png" alt="" class="img-responsive">
</center>
<p></p>
<form action="procesos/Login" method="POST" autocomplete="Off">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title text-center">Iniciar Sesión</h3>
	</div>
	<div class="panel-body">
	 <div class="form-group">
	 <input type="text" name="user" id="" class="form-control" placeholder="Ingrese su Usuario" required="" autofocus="">
	 </div>
	 <div class="form-group">
	 <input type="password" name="pass" id="" class="form-control" placeholder="Ingrese su Contraseña" required="">
	 </div>
	 <div class="form-group">
	 <select name="contrato" id="idcontrato" class="demo-default" required="">
	 <?php 
	 $db     = new Conexion();
	 $query  = "SELECT * FROM centro_costos WHERE  codigo='000037'";
	 $result = $db->query($query); 
     while ($fila = mysqli_fetch_object($result)) 
     {
     	echo "<option value='$fila->codigo'>$fila->descripcion</option>";
     }

	  ?>
	 
	 </select>
	<script >
	$('#idcontrato').selectize({
	maxItems: 1
	});
	</script>
	 </div>
	 <button class="btn btn-primary">Ingresar</button>
	</div>
</div>
</form>
</div>
</div>
</div>	
</body>
</html>
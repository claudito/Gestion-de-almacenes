<?php include('../config.php'); ?>
<?php include('../session.php'); ?>
<?php 
include('../includes/bd/conexion.php');
include('../includes/bd/conexionSQLserver.php');
include('funciones.php');
$link = Conectarse();
$db = new Conexion();
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Actualización de Articulos</title>
<?php include('../templates/enlaces/principal.php'); ?>

<script>
function validar(f){
f.enviar.value="Por favor, espere... aproximadamente entre 3 a 20 minutos para procesar toda la información.";
f.enviar.disabled=true;
f.usuario.value=(f.usuario.value=="")?"Anónimo":f. usuario.value;
return true}
</script>
<script>
function actualiza_contenido_starsoft()
{
$('#contenido_starsoft').load('ficheros/cantidad-starsoft.php');
}
function actualiza_contenido_app()
{
$('#contenido_app').load('ficheros/cantidad-app.php');
}
setInterval('actualiza_contenido_starsoft()', 1000 );
setInterval('actualiza_contenido_app()', 1000 );
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
<div class="col-md-2">
<div class="panel panel-default">
<div class="list-group">
  <a href="#" class="list-group-item disabled">
    Cantidad de Articulos
  </a>
  <a href="#" class="list-group-item"><div id="contenido_starsoft">Cargando ...</div></a>
  <a href="#" class="list-group-item"><div id="contenido_app">Cargando ...</div></a>
</div>
</div>
</div>
<div class="col-md-10">
<div class="jumbotron">
<h1>Actualizar Articulos y Stock</h1>
<hr>
<form action="procesar" method="POST" onsubmit="return validar(this)">
<input type="submit"  name='enviar' class="btn btn-lg btn-primary" value="Comenzar a Procesar">
</form>
</div>
</div>
</div>
</div>
</body>
</html>
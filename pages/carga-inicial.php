<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/clases/Funciones.php');

$db    = new Conexion();
LiberarCarga($_SESSION[KEY.USUARIO]);
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Carga Inicial / Registro de Articulos</title>
	<?php include('../templates/enlaces/principal.php'); ?>
	<?php include('../templates/enlaces/selectize.php'); ?>

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
<div class="col-md-3">
</div>
<form action="../procesos/carga-inicial" method="POST" enctype="multipart/form-data" onsubmit="return validar(this)">
<div class="col-md-6">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Carga Inicial / Registro de Articulos</h3>
	</div>
	<div class="panel-body">


		<div class="form-group">
		<label for="">Serie Documento</label>
		<select name="serie_doc" id="idserie_doc" class="demo-default" required>
		<option value="">[Seleccionar]</option>
		<?php 
         $query   = "SELECT codigo,descripcion FROM correlativos
                     GROUP BY codigo ORDER BY descripcion DESC;";
         $result  = $db->query($query);
         while ($fila = mysqli_fetch_object($result))
          {
         	echo "<option value='$fila->codigo'>$fila->codigo $fila->descripcion</option>";
          }


		 ?>
		</select>
		<script >
		$('#idserie_doc').selectize({
		maxItems: 1
		});
		</script>
		</div>

        <div class="form-group">
		<label for="">Contrato / Centro de Costo</label>
		<select name="contrato" id="idcontrato" class="demo-default" required readonly>
		
		<?php 
         $query   = "SELECT codigo,descripcion FROM centro_costos WHERE
                     codigo='".$_SESSION[KEY.CONTRATO]."';";
         $result  = $db->query($query);
         while ($fila = mysqli_fetch_object($result))
          {
         	echo "<option value='$fila->codigo'>$fila->codigo  - $fila->descripcion</option>";
          }


		 ?>
		</select>
		<script >
		$('#idcontrato').selectize({
		maxItems: 1
		});
		</script>
		</div>

		<div class="form-group">
		<label for="">Archivo Excel</label>
		<input type="file" name="excel" class="form-control" required="">
		</div>

		<div class="form-group">
		<input type='submit' name='enviar'  value="Cargar Excel" class="btn btn-success" />
			<input type="hidden" value="upload" name="action" 
		</div>

		
		</div>
	</div>
</div>
</form>
</div>
</div>


</div>
</body>
</html>
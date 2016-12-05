<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/bd/conexionSQLserver.php');
include('../includes/clases/Funciones.php');

$db    = new Conexion();
$link  = Conectarse();
LiberarCarga($_SESSION[KEY.USUARIO]);
LiberarCargaValidar($_SESSION[KEY.USUARIO]);
 ?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Salidas / Ingresos</title>
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
<form action="../procesos/cargar-excel" method="POST" enctype="multipart/form-data" onsubmit="return validar(this)">
<div class="col-md-6">
<div class="panel panel-default">
	<div class="panel-heading">
		<h3 class="panel-title">Salidas / Ingresos</h3>
	</div>
	<div class="panel-body">

		<div class="form-group">
		<label for="">Transaccion</label>
		<select name="transaccion" id="idtransaccion" class="demo-default" required>
		<option value="">[Seleccionar]</option>
		<?php 
         $query   = "
			SELECT * FROM correlativos
			GROUP BY codigo ORDER BY descripcion desc";
         $result  = $db->query($query);
         while ($fila = mysqli_fetch_object($result)) 
         {
         	echo "<option value='$fila->codigo'>$fila->codigo $fila->descripcion</option>";
         }

		 ?>
		</select>
		<script >
		$('#idtransaccion').selectize({
		maxItems: 1
		});
		</script>
		</div>

		<div class="form-group">
		<label for="">Tipo</label>
		<select name="tipo" id="idtipo" class="demo-default" required>
		<option value="">[Seleccionar]</option>
		<?php 
         $query   = "
		SELECT * FROM correlativos
		GROUP BY tipo ORDER BY tipo desc";
         $result  = $db->query($query);
         while ($fila = mysqli_fetch_object($result)) 
         {
         	echo "<option value='$fila->tipo'>$fila->desc_tipo</option>";
         }

		 ?>
		</select>
		<script >
		$('#idtipo').selectize({
		maxItems: 1
		});
		</script>
		</div>


		<div class="form-group">
		<label for="">Contrato / Centro de Costo</label>
		<select name="contrato" id="idcontrato" class="demo-default" required readonly>
		<?php 
         $query   = "SELECT * FROM centro_costos WHERE codigo='".$_SESSION[KEY.CONTRATO]."'" ;
         $result  = $db->query($query);
         while ($fila = mysqli_fetch_object($result))
          {
         	echo "<option value='$fila->codigo'>".utf8_encode($fila->descripcion)."</option>";
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
		<label for="">Fecha</label>
		<input type="date" name="fecha" value="<?php echo date('Y-m-d'); ?>"  class="form-control">
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
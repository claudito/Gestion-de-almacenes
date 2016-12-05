<?php
 include('../config.php'); 
 include('../session.php');
 include('../includes/bd/conexion.php');
 $db = new Conexion();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Notas de Salida</title>
<?php include('../templates/enlaces/principal.php'); ?>
<?php include('../templates/enlaces/datatables.php'); ?>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
// Parametros para el combo
$("#idserie_doc").change(function () {
$("#idserie_doc option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/consulta-centro-costo.php", { elegido: elegido }, function(data){
$("#idcentro_costo").html(data);
});     
});
});

// Parametros para el combo
$("#idcentro_costo").change(function () {
$("#idcentro_costo option:selected").each(function () {
elegido=$(this).val();
$.post("../ajax/consulta-salidas.php", { elegido: elegido }, function(data){
$("#id_salidas").html(data);
});     
});
}); 



});
</script>



<?php include('../templates/enlaces/selectize.php'); ?>
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
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h3 class="panel-title">Consulta</h3>
 	</div>
 	<div class="panel-body">
 	
 	<div class="row">
 	<div class="col-md-3">
 	<div class="form-group">
 	  <label for="">Serie Documento</label>
 	  <select name="idserie_doc" id="idserie_doc" class="demo-default">
 	  <option value="">[Seleccionar]</option>
 	  <?php 
 	  $query  = "SELECT  * FROM  correlativos  
 	             GROUP BY codigo ORDER BY descripcion DESC;";
 	  $result = $db->query($query);
      while ($fila = mysqli_fetch_object($result)) 
      {
      	echo "<option value='$fila->codigo'>$fila->codigo  -  $fila->descripcion</option>";
      }
 	   ?>
 	  </select>
	<script >
	$('#idserie_doc').selectize({
	maxItems: 1
	});
	</script>
 	</div>
 	</div>
 	<div class="col-md-3">
 	<div class="form-group">

	<div id="idcentro_costo"></div>
	</div>
 	 
 	</div>
 	</div>
 	</div> 
 	

 	

 </div>
 </div>
</div>

 
<div class="row">
 <div class="col-md-12">
 <div class="panel panel-default">
 	<div class="panel-heading">
 		<h3 class="panel-title">Notas de Salida</h3>
 	</div>
 	<div class="panel-body">
	
     <div id="id_salidas"></div>

     </div>

 	</div>
 </div>
 </div>

</div>
</body>
</html>
<?php 
session_start();
$serie_doc             = $_POST['elegido'];
$_SESSION['serie_doc'] = $_POST['elegido'];

include('../config.php');
include('../includes/bd/conexion.php');
$db    = new Conexion();
 $query = "SELECT  centro_costo FROM stkart  WHERE  
serie_doc='".$serie_doc."'
GROUP BY centro_costo";
$result = $db->query($query);
$numfila = $result->num_rows;
 ?>

 <?php if ($numfila==0): ?>
 	<br>
 <div class="alert alert-warning">
 	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
 	<strong>Aún no hay centros de costos registrados con la serie 
 	<?php echo $serie_doc; ?></strong>
 <?php else: ?>
 
 <label for="">Cenntro de Costo</label>
 <select name="centro_costo" id="idcentrocosto" class="demo_default">
 <option value="">[Seleccionar]</option>
 <?php 
while ($fila  = mysqli_fetch_object($result)) 
{
	echo "<option value='$fila->centro_costo'>$fila->centro_costo</option>";
}
  ?>
 </select>
<script >
$('#idcentrocosto').selectize({
maxItems: 1
});
</script>
 <?php endif ?>






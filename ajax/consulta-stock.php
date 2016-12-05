<?php 

include('../config.php');
include('../includes/bd/conexion.php');
$db  = new Conexion();

session_start();
$centro_costo =  $_POST['elegido'];
$serie_doc    =  $_SESSION['serie_doc'];

$query  = "SELECT m.codigo,m.serie,m.descripcion,m.unidad,m.familia,s.cantidad,s.costo,s.serie_doc,s.centro_costo,m.procedencia,m.estado FROM maeart as m  INNER JOIN stkart as s 
ON m.codigo=s.maeart_codigo  AND m.serie=s.maeart_serie
WHERE s.serie_doc='".$serie_doc."'  AND s.centro_costo='".$centro_costo."'";
$result = $db->query($query);

 ?>
 <div class="table-responsive">
 	<table  id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="success">
 				<th>Código</th>
 				<th>Serie</th>
 				<th>Descripción</th>
 				<th>Und</th>
 				<th>Fam</th>
 				<th>Cantidad</th>
 				<th>Costo(Soles)</th>
 				<th>Proc.</th>
 				<th>Estado</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila = mysqli_fetch_object($result))
         {
         ?>
		<tr>
		<td><?php echo $fila->codigo; ?></td>
		<td><?php echo $fila->serie; ?></td>
		<td><?php echo $fila->descripcion; ?></td>
		<td><?php echo $fila->unidad; ?></td>
		<td><?php echo $fila->familia; ?></td>
		<td><?php echo $fila->cantidad; ?></td>
		<td><?php echo $fila->costo; ?></td>
		<td>
		<?php 
		 if($fila->procedencia=='nuevo')
		 echo "NUEVO";
		 else
		 echo "USADO";
		 ?>
		</td>
		<td>
		<?php 
		 if($fila->estado=='on')
		 echo "ACTIVO";
		 else
		 echo "INACTIVO";
		 ?>
		 </td>
		</tr>

         <?php
         }


 		 ?>
 		</tbody>
 	</table>
 </div>

<script>
$(document).ready(function(){
    $('#consulta').DataTable();
});
</script>
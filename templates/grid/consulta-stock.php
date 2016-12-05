<?php 

$db  = new Conexion();

$query  = "SELECT m.codigo,m.serie,m.descripcion,m.unidad,s.cantidad,s.costo,s.serie_doc,s.centro_costo FROM maeart as m  INNER JOIN stkart as s 
ON m.codigo=s.maeart_codigo  AND m.serie=s.maeart_serie
WHERE s.serie_doc='".$_GET['serie_doc']."'  AND s.centro_costo='".$_GET['cc']."'";
$result = $db->query($query);

 ?>
 <div class="table-responsive">
 	<table  id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr>
 				<th>Código</th>
 				<th>Serie</th>
 				<th>Descripción</th>
 				<th>Unidad</th>
 				<th>Cantidad</th>
 				<th>Costo(Soles)</th>
 				<th>Serie Doc.</th>
 				<th>Centro de Costo</th>
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
		<td><?php echo $fila->cantidad; ?></td>
		<td><?php echo $fila->costo; ?></td>
		<td><?php echo $fila->serie_doc; ?></td>
		<td><?php echo $fila->centro_costo; ?></td>
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
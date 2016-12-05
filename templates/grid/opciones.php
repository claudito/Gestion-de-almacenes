<?php 
$query  = "SELECT * FROM opciones";
$result = $db->query($query);

 ?>

 <div class="table-responsive">
 	<table id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 				<th >ID</th>
 				<th>Descripción</th>
 				<th>Valor</th>
 				<th>Ruta</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila = mysqli_fetch_object($result))
         {
        ?>
		<tr>
		<td><?php echo $fila->idopciones; ?></td>
		<td><?php echo $fila->descripcion; ?></td>
		<td><?php echo $fila->valor; ?></td>
		<td><?php echo $fila->ruta; ?></td>
		</tr>
        <?php
         }
 		 ?>
 		</tbody>
 	</table>
 </div>
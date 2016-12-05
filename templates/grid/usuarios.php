<?php 

$query  = "SELECT idusuarios,nombres,apellidos,user,pass,tipo,DATE_FORMAT(fecha_creacion,'%d/%m/%Y')as fecha_creacion FROM usuarios";
$result = $db->query($query);

 ?>
 <div class="table-responsive">
 	<table id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 				<th>ID</th>
 				<th>Nombres</th>
 			    <th>Apellidos</th>
 			    <th>Usuario</th>
 			    <th>Contraseña</th>
 			    <th>Tipo</th>
 			    <th>Fecha Creación</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila  = mysqli_fetch_object($result))
         {
        ?>
		<tr>
		<td><?php echo $fila->idusuarios; ?></td>
		<td><?php echo $fila->nombres; ?></td>
		<td><?php echo $fila->apellidos; ?></td>
		<td><?php echo $fila->user; ?></td>
		<td><?php echo md5($fila->pass); ?></td>
		<td><?php echo $fila->tipo; ?></td>
		<td><?php echo $fila->fecha_creacion; ?></td>
		</tr>
        <?php
         }
 		 ?>
 		</tbody>
 	</table>
 </div>


<?php 

$query   = "SELECT @rownum:=@rownum+1 AS rownum,codigo,serie,descripcion,unidad,cantidad,precio,doc_referencia,familia,procedencia FROM carga_excel,(SELECT @rownum:=0) r WHERE usuarios_idusuarios='".$_SESSION[KEY.USUARIO]."';";
$result  = $db->query($query);

 ?>

 <div class="table-responsive">
 	<table class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 			    <th>IT</th>
 				<th>Código</th>
 				<th>Serie</th>
 				<th>Descripción</th>
 				<th>Unidad</th>
            <th>Familia</th>
 				<th>Cantidad</th>
 				<th>Precio</th>
            <th>Centro de Costo</th>
            <th>Serie Doc</th>
            <th>Procedencia</th>

 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila  = mysqli_fetch_object($result))
         {
         ?>
         <tr>
   <input type="hidden" name="codigo[]" value="<?php echo trim($fila->codigo); ?>">
   <input type="hidden" name="serie[]" value="<?php echo trim($fila->serie); ?>">
   <input type="hidden" name="descripcion[]" value="<?php echo trim($fila->descripcion); ?>">
   <input type="hidden" name="unidad[]" value="<?php echo trim($fila->unidad); ?>">
   <input type="hidden" name="cantidad[]" value="<?php echo trim($fila->cantidad); ?>">
   <input type="hidden" name="precio[]" value="<?php echo trim(abs($fila->precio)); ?>">
   <input type="hidden" name="centro_costo" value="<?php echo trim($_GET['contrato']); ?>">
   <input type="hidden" name="serie_doc" value="<?php echo trim($_GET['serie_doc']); ?>">
   <input type="hidden" name="familia[]" value="<?php echo trim($fila->familia); ?>">
   <input type="hidden" name="procedencia[]" value="<?php echo trim($fila->procedencia); ?>">
  
         <td><?php echo trim($fila->rownum); ?></td>
         <td><?php echo trim($fila->codigo); ?></td>
         <td><?php echo trim($fila->serie); ?></td>
         <td><?php echo trim($fila->descripcion); ?></td>
         <td><?php echo trim($fila->unidad); ?></td>
         <td><?php echo trim($fila->familia); ?></td>
         <td><?php echo trim($fila->cantidad); ?></td>
         <td><?php echo trim(abs($fila->precio)); ?></td>
         <td><?php echo $_GET['contrato'].' - '.obtener_centro_costo($_GET['contrato']); ?></td>
         <td><?php echo $_GET['serie_doc']; ?></td>
         <td><?php echo $fila->procedencia; ?></td>
         </tr>
         <?php
         }
 		 ?>
 		</tbody>
 	</table>
 </div>
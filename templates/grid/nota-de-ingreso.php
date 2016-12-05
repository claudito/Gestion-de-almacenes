<?php 

$query   = "SELECT @rownum:=@rownum+1 AS rownum,s.maeart_codigo,s.maeart_serie,
m.descripcion,m.unidad,m.familia,c.cantidad,s.costo,s.cantidad as stock,c.maquina,c.doc_referencia FROM (SELECT @rownum:=0) r, 
carga_excel as c INNER JOIN   stkart as s ON c.codigo=s.maeart_codigo 
 AND '".$_GET['contrato']."'=s.centro_costo AND '".$_GET['serie']."'=s.serie_doc  AND c.serie=s.maeart_serie
INNER JOIN maeart as m ON s.maeart_codigo=m.codigo AND s.maeart_serie=m.serie
WHERE c.usuarios_idusuarios=".$_SESSION[KEY.USUARIO]."
";
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
            <th>Stock</th>
            <th>Costo(Soles) </th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
       
        $a = 0;

        while ($fila  = mysqli_fetch_object($result))
         {
         ?>
         <tr>
         <input type="hidden" name="item[]" value="<?php echo $fila->rownum; ?>">
         <input type="hidden" name="codigo[]" value="<?php echo $fila->maeart_codigo; ?>">
         <input type="hidden" name="serie[]" value="<?php echo $fila->maeart_serie; ?>">
         <input type="hidden" name="descripcion[]" value="<?php echo $fila->descripcion; ?>">
         <input type="hidden" name="unidad[]" value="<?php echo $fila->unidad; ?>">
          <input type="hidden" name="familia[]" value="<?php echo $fila->familia; ?>">
         <input type="hidden" name="cantidad[]" value="<?php echo $fila->cantidad; ?>">
         <input type="hidden" name="costo[]" value="<?php echo $fila->costo; ?>">
         
         <td><?php echo $fila->rownum; ?></td>
         <td><?php echo $fila->maeart_codigo; ?></td>
         <td><?php echo $fila->maeart_serie; ?></td>
         <td><?php echo $fila->descripcion; ?></td>
         <td><?php echo $fila->unidad; ?></td>
         <td><?php echo $fila->familia; ?></td>
         <td><?php echo $fila->cantidad; ?></td>
          <td><?php echo $fila->stock; ?></td>
         <td><?php echo $fila->costo; ?></td>
         </tr>
         <?php
         $a=$a+$fila->cantidad;
         }
 		 ?>
       <input type="hidden" name="disponible" 
         value="<?php echo $a; ?>">
      </tbody>
 		</tbody>
 	</table>
 </div>
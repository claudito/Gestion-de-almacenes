<?php 

$query   = "SELECT @rownum:=@rownum+1 AS rownum,c.codigo,m.serie,m.descripcion,m.unidad,c.cantidad,s.cantidad as stock,s.costo,c.doc_referencia,c.maquina,m.familia 
from (SELECT @rownum:=0) r, carga_excel as  c  LEFT JOIN stkart  as s 
ON c.codigo=s.maeart_codigo  AND c.serie=s.maeart_serie  
LEFT JOIN  maeart as m  ON s.maeart_codigo=m.codigo AND s.maeart_serie=m.serie
  WHERE s.serie_doc='".$_GET['serie']."'  AND s.centro_costo='".$_GET['contrato']."'";
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
 				<th>Und</th>
                <th>Fam</th>
 				<th>Cant</th>
                <th>Stock</th>
                <th>Cant. Permitida</th>
 				<th>Costo (Soles)</th>
                <th>Máquina</th>
 				<th>Doc. Referencia</th>
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
         <input type="hidden" name="codigo[]" value="<?php echo $fila->codigo; ?>">
         <input type="hidden" name="serie[]" value="<?php echo $fila->serie; ?>">
         <input type="hidden" name="descripcion[]" value="<?php echo $fila->descripcion; ?>">
         <input type="hidden" name="unidad[]" value="<?php echo $fila->unidad; ?>">
         <input type="hidden" name="familia[]" value="<?php echo $fila->familia; ?>">
         <input type="hidden" name="costo[]" value="<?php echo $fila->costo; ?>">
         <input type="hidden" name="doc_ref[]" value="<?php echo $fila->doc_referencia; ?>">
         <input type="hidden" name="maquina[]" value="<?php echo $fila->maquina; ?>">

         <?php 

        if ($fila->cantidad>$fila->stock AND $fila->stock<>0) 
        {
         echo "<input type='hidden' name='cantidad[]' value='".$fila->stock."'>";
        }
        else if ($fila->cantidad<=$fila->stock)
        {
          echo "<input type='hidden' name='cantidad[]' value='".$fila->cantidad."'>";
        }
        else
         {
          echo "<input type='hidden' name='cantidad[]' value='0'>";
         }
         


          ?>
         
         <td><?php echo $fila->rownum; ?></td>
         <td><?php echo $fila->codigo; ?></td>
         <td><?php echo $fila->serie; ?></td>
         <td><?php echo $fila->descripcion; ?></td>
         <td><?php echo $fila->unidad; ?></td>
         <td><?php echo $fila->familia; ?></td>
         <td><?php echo $fila->cantidad; ?></td>
         <td><?php echo $fila->stock; ?></td>
        <td>
        <?php 
        if ($fila->cantidad>$fila->stock AND $fila->stock<>0) 
        {
        echo $disponible  = $fila->stock;
        }
        else if ($fila->cantidad<=$fila->stock)
        {
        echo $disponible  = $fila->cantidad;
        }
        else
        {
        echo $disponible  = 0;
        }
        ?>
        </td>
        <td><?php echo $fila->costo; ?></td>
         <td><?php echo $fila->maquina; ?></td>
         <td><?php echo $fila->doc_referencia; ?></td>
        
         </tr>
         <?php
        $a=$a+$disponible;
         }


 		 ?>
         <input type="hidden" name="disponible" 
         value="<?php echo $a; ?>">
 		</tbody>
 	</table>
 </div>
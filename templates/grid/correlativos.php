<?php  
$db     = new Conexion();
$query  = "SELECT * FROM correlativos";
$result = $db->query($query);
?>


<div class="table-responsive">
	<table id="consulta"  class="table table-bordered table-condensed">
		<thead>
			<tr class="active">
				<th>ID</th>
				<th>Código</th>
				<th>Descripción</th>
				<th>Tipo</th>
				<th>Número</th>
				<th><i class="fa fa-edit fa-2x text-primary"></i></th>
			</tr>
		</thead>
		<tbody>
		<?php 
        while ($fila = mysqli_fetch_object($result))
         {

        $modal_a  ='actualizar';
		$btn_a    ='#actualizar';
		$modal_a  .=$a;
		$btn_a    =$btn_a.=$a;

        ?>
		<tr>
		<td><?php echo $fila->idcorrelativos; ?></td>
		<td><?php echo $fila->codigo; ?></td>
		<td><?php echo $fila->descripcion; ?></td>
		<td><?php echo $fila->desc_tipo; ?></td>
		<td><?php echo $fila->numero; ?></td>
		<td>
        <a data-toggle="modal" href='<?php echo $btn_a; ?>'>
        <i class="fa fa-edit fa-2x text-primary"></i>
        </a>
        </td>
        <?php include('../templates/modal/correlativos/actualizar.php'); ?>
		</tr>
        <?php

         $a=$a+1;
         }

		 ?>
		</tbody>
	</table>
</div>
<?php 

include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
session_start();
$db           =  new Conexion();
$serie_doc    =  $_SESSION['serie_doc'];
$centro_costo =  $_POST['elegido'];

$query   = "SELECT m.documento,LEFT(m.documento,3) as serie_doc,RIGHT(m.documento,7) as doc,m.tipo,m.ruc,m.razon_social,m.centro_costo,m.comentario,CONCAT(u.nombres,' ',u.apellidos)as fullname,
DATE_FORMAT(m.fecha_creacion,'%d/%m/%Y')as fecha_creacion FROM movalmcab as m
INNER JOIN usuarios as u  ON m.usuarios_idusuarios=u.idusuarios WHERE 
LEFT(m.documento,3)='".$serie_doc."' AND centro_costo='".$centro_costo."' AND m.tipo='NI'";
$result  = $db->query($query); 
$numfila = $result->num_rows;

?>

<?php if ($numfila>0): ?>
<div class="table-responsive">
	<table  id="consulta" class="table table-bordered table-condensed">
		<thead>
			<tr class="active">
			<th>Nota de Ingreso</th>
			<th>Ruc</th>
			<th>Razón Social</th>
			<th>Centro de Costo</th>
			<th>Comentario</th>
			<th>Usuario</th>
			<th>Fecha</th>
			<th><i class="glyphicon glyphicon-trash text-danger"></i></th>
			
			</tr>
		</thead>
		<tbody>
		<?php 
        while ($fila = mysqli_fetch_object($result))
         {

        $modal_e  ='eliminar';
		$btn_e    ='#eliminar';
		$modal_e  .=$e;
		$btn_e    =$btn_e.=$e;
        ?>
        <tr>
        <td><a href="../PDF/reporte/documento?numero=<?php echo $fila->documento; ?>&tipo=<?php echo  $fila->tipo; ?>" target="_blank"><?php echo $fila->serie_doc.' - '.$fila->doc; ?></a></td>
        <td><?php echo $fila->ruc; ?></td>
        <td><?php echo $fila->razon_social; ?></td>
        <td><?php echo $fila->centro_costo; ?></td>
        <td><?php echo $fila->comentario; ?></td>
        <td><?php echo $fila->fullname; ?></td>
        <td><?php echo $fila->fecha_creacion; ?></td>
        <td>
        <a data-toggle="modal" href='<?php echo $btn_e; ?>'>
        <i class="glyphicon glyphicon-trash text-danger"></i>
        </a>
        <?php include('../templates/modal/nota-ingreso/eliminar.php'); ?>
        </td>

        </tr> 
        <?php

         $e=$e+1;
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


<?php else: ?>
<div class="alert alert-warning">
	<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
	<strong>No hay información disponible para la Serie <?php echo $serie_doc ?> y el Centro de Costo <?php echo $centro_costo; ?></strong>
</div>
	
<?php endif ?>

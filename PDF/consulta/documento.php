<?php 
$query_cab  =  "SELECT LEFT(m.documento,3)as serie_doc,RIGHT(m.documento,7)as doc,m.documento,m.tipo,m.ruc,m.razon_social,m.centro_costo,m.comentario,CONCAT(u.nombres,' ',u.apellidos)as fullname,
DATE_FORMAT(m.fecha_creacion,'%d/%m/%Y')as fecha_creacion FROM movalmcab as m
INNER JOIN usuarios as u  ON m.usuarios_idusuarios=u.idusuarios WHERE 
documento='".$_GET['numero']."'  and  m.tipo='".$_GET['tipo']."'";
$result_cab = $db->query($query_cab);
$dato_cab   = mysqli_fetch_array($result_cab);

$query_det  = "SELECT @rownum:=@rownum+1 AS rownum,item,codigo,descripcion,
unidad,serie,cantidad,maquina,doc_referencia 
from movalmdet,(SELECT @rownum:=0) r WHERE movalmcab_documento='".$_GET['numero']."' 
AND movalmcab_tipo='".$_GET['tipo']."'";
$result_det = $db->query($query_det);
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>
    <?php if ($_GET['tipo']=='NI'): ?>
     Nota de Ingreso
    <?php else: ?>
     Nota de Salida
    <?php endif ?>

	  | <?php echo $_GET['numero']; ?></title>
<link rel="stylesheet" href="../estilos/estilos.css">
</head>
<body>
   
   <h3>ROCKDRILL <?php echo date('Y'); ?></h3>

    <!-- Cabecera -->

	<table class="table-cabecera" >
	<tr>
	<td class="td_th_cab">
	<strong>
	<?php if ($_GET['tipo']=='NI'): ?>
		 NOTA DE INGRESO
		<?php else: ?>
		 NOTA DE SALIDA
		<?php endif ?>	
	</strong>
	</td>
	<td class="td_th_cab"><?php echo $dato_cab['serie_doc'].' - '.$dato_cab['doc']; ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>CONTRATO</strong></td>
	<td class="td_th_cab"><?php echo $dato_cab['centro_costo'].' - '.obtener_centro_costo($_SESSION[KEY.CONTRATO]); ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>FECHA</strong></td>
	<td class="td_th_cab"><?php echo $dato_cab['fecha_creacion']; ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>CLIENTE</strong></td>
	<td class="td_th_cab"><?php echo $dato_cab['ruc'].' - '.$dato_cab['razon_social']; ?></td>
	</tr>
	<tr>
	<td class="td_th_cab"><strong>USUARIO</strong></td>
	<td class="td_th_cab"><?php echo $dato_cab['fullname']; ?></td>
	</tr>
	<tr >
	<td class="td_th_cab"><strong>COMENTARIO</strong></td>
	<td class="td_th_cab"><?php echo $dato_cab['comentario']; ?></td>
	</tr>
	</table>
    
    <p></p>
     
	<!-- Detalle -->
	<table class="table-detalle">
	<thead>
	<tr>
	<th class="td_th_det th_det">IT</th>
	<th class="td_th_det th_det">CÓDIGO</th>
	<th class="td_th_det th_det">DESCRIPCIÓN</th>
	<th class="td_th_det th_det">UND</th>
	<th class="td_th_det th_det">SERIE</th>
	<th class="td_th_det th_det">CANT</th>
	<?php if ($_GET['tipo']=='NI'): ?>
	<!-- vacio -->
	<?php else: ?>
	<th  class="td_th_det th_det">MÁQUINA</th>
	<th  class="td_th_det th_det">DOC REF</th>	
	<?php endif ?>
	</tr>
	</thead>
	<tbody>
	<?php 
    while ($fila = mysqli_fetch_object($result_det)) 
    {
    ?>
    <tr>
	<td class="td_th_det"><?php echo $fila->rownum; ?></td>
	<td class="td_th_det"><?php echo $fila->codigo; ?></td>
	<td class="td_th_det"><?php echo $fila->descripcion; ?></td>
	<td class="td_th_det"><?php echo $fila->unidad; ?></td>
	<td class="td_th_det"><?php echo $fila->serie; ?></td>
	<td class="td_th_det"><?php echo $fila->cantidad; ?></td>
	<?php if ($_GET['tipo']=='NI'): ?>
	<!-- vacio -->
	<?php else: ?>
	<td class="td_th_det"><?php echo $fila->maquina; ?></td>
	<td class="td_th_det"><?php echo $fila->doc_referencia; ?></td>	
	<?php endif ?>
	</tr>
    <?php
    }


	 ?>
	</tbody>
	</table>

<div id="piedepagina">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
____________
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
____________
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
____________

<p></p>  
<!-- division -->
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Autorizado
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Despacho
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Vo.Bo.   
</div>

</body>
</html>
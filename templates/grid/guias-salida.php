<?php 

$fecha = date('Y-m-d');

if(!isset($_REQUEST['fechainicio']))
{
$query  = "SELECT CANUMDOC,CAGLOSA,CANOMCLI,CONVERT(VARCHAR,CAFECDOC,103)AS FECHA,CARFTDOC,CARFNDOC,CACENCOS,DOCUMENTO  FROM [004BDCOMUN].DBO.MOVALMCAB AS C 
LEFT JOIN [004BDAPLICACION].DBO.GUIAS_SALIDAS AS G  ON C.CANUMDOC=G.DOCUMENTO
   WHERE  LEFT(CANUMDOC,3)='022'   AND CATD='GS' AND CACODMOV='SO' AND CAALMA='01'   AND CAFECDOC BETWEEN  '".$fecha."' AND '".$fecha."'  AND DOCUMENTO IS NULL";
 }
else
{
$query  = "SELECT CANUMDOC,CONVERT(VARCHAR,CAFECDOC,103)AS FECHA,CAGLOSA,CANOMCLI,CARFTDOC,CARFNDOC,CACENCOS,DOCUMENTO  FROM [004BDCOMUN].DBO.MOVALMCAB AS C 
LEFT JOIN [004BDAPLICACION].DBO.GUIAS_SALIDAS AS G  ON C.CANUMDOC=G.DOCUMENTO
   WHERE  LEFT(CANUMDOC,3)='022'   AND CATD='GS' AND CACODMOV='SO' AND CAALMA='01'   AND CAFECDOC BETWEEN  '".$_REQUEST['fechainicio']."' AND '".$_REQUEST['fechafin']."'  AND DOCUMENTO IS NULL";
}

$result = mssql_query($query);
 ?>
 <div class="table-responsive">
 	<table id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 				<th>Nro de Guía</th>
 				<th>Glosa</th>
 				<th>Cliente</th>
 				<th>Centro de Costo</th>
 				<th>Tipo Doc</th>
 				<th>Doc Referencia</th>
 				<th>Fecha</th>
 				
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila = mssql_fetch_object($result))
         {
        ?>
		<tr>
		<td><a href="../procesos/actualizar-guia-salida?documento=<?php echo $fila->CANUMDOC; ?>&fechainicio=<?php echo $_REQUEST['fechainicio'] ?>&fechafin=<?php echo $_REQUEST['fechafin'] ?>"><?php echo $fila->CANUMDOC; ?></a></td>
		<td><?php echo $fila->CAGLOSA; ?></td>
		<td><?php echo $fila->CANOMCLI; ?></td>
		<td><?php echo $fila->CACENCOS; ?></td>
		<td><?php echo $fila->CARFTDOC; ?></td>
		<td><?php echo $fila->CARFNDOC; ?></td>
		<td ><?php echo $fila->FECHA; ?></td>
		</td>
		</tr>
        <?php
         }
 		 ?>
 		</tbody>
 	</table>
 </div>



<?php 
$query  = "SELECT CODIGO,ACODIGO,SERIE,ISNULL(ADESCRI,'NO EXISTE')AS ADESCRI,AUNIDAD,AFAMILIA,ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,MAQUINA,DOC_REF,
CASE AESTADO 
WHEN 'V' THEN 'ACTIVO'
WHEN 'F' THEN 'INACTIVO'
END AS ESTADO,PROCEDENCIA
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C LEFT JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  LEFT JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE USUARIO='".$_SESSION[KEY.USUARIO]."'";

$query_count ="SELECT CODIGO,ACODIGO,SERIE,ADESCRI,AUNIDAD,AFAMILIA,ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,
CASE AESTADO 
WHEN 'V' THEN 'ACTIVO'
WHEN 'F' THEN 'INACTIVO'
END AS ESTADO
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C LEFT JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  LEFT JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE ACODIGO IS NULL AND USUARIO='".$_SESSION[KEY.USUARIO]."'";

$query_inactivos ="SELECT CODIGO,ACODIGO,SERIE,ADESCRI,AUNIDAD,AFAMILIA,ISNULL(STKPREPRO,0.00)AS STKPREPRO,CANTIDAD,
CASE AESTADO 
WHEN 'V' THEN 'ACTIVO'
WHEN 'F' THEN 'INACTIVO'
END AS ESTADO
FROM [004BDAPLICACION].DBO.CARGA_EXCEL  AS C LEFT JOIN 
(SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,AESTADO,STALMA,STSKDIS,S.STKPREPRO FROM [004BDCOMUN].DBO.MAEART  AS M  INNER JOIN 
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND STALMA='01')AS M ON
C.CODIGO=M.ACODIGO  WHERE USUARIO='".$_SESSION[KEY.USUARIO]."' AND
AESTADO='F' ";


$result               = mssql_query($query);
$result_count         = mssql_query($query_count);
$result_inactivos     = mssql_query($query_inactivos);

$numfila_nulos        = mssql_num_rows($result_count);
$numfila_inactivos    = mssql_num_rows($result_inactivos);

 ?>
<ul>
<li>Articulos Inexistentes: <?php echo $numfila_nulos; ?></li>
<li>Articulos Inactivos: <?php echo $numfila_inactivos; ?></li>
</ul>
 <div class="table-responsive">
 	<table  id="consulta" class="table table-bordered table-condensed">
 		<thead>
 			<tr class="active">
 				<th>CÓDIGO</th>
 				<th>SERIE</th>
 				<th>DESCRIPCIÓN</th>
 				<th>UND</th>
 				<th>FAM</th>
 				<th>PRECIO</th>
 				<th>CANT</th>
 				<th>MÁQUINA</th>
 				<th>DOC.REF</th>
 				<th>ESTADO</th>
 				<th>PROCEDENCIA</th>
 				<th>EXISTE</th>
 			</tr>
 		</thead>
 		<tbody>
 		<?php 
        while ($fila = mssql_fetch_object($result))
         {
        ?>
		<tr>
			<td><?php echo utf8_encode($fila->CODIGO); ?></td>
			<td><?php echo $fila->SERIE; ?></td>
			<td>
			<?php 
			 if($fila->ADESCRI=='NO EXISTE')
			 echo "";
			 else
			 echo utf8_encode($fila->ADESCRI);
			 ?>
			 	
			 </td>
			<td><?php echo $fila->AUNIDAD; ?></td>
			<td><?php echo $fila->AFAMILIA; ?></td>
			<td><?php echo round($fila->STKPREPRO,2); ?></td>
			<td><?php echo round($fila->CANTIDAD,2); ?></td>
			<td><?php echo $fila->MAQUINA; ?></td>
			<td><?php echo $fila->DOC_REF; ?></td>
			<td><?php echo $fila->ESTADO; ?></td>
			<td><?php echo $fila->PROCEDENCIA; ?></td>
			<td>
			<?php 
			 if($fila->ADESCRI=='NO EXISTE')
			 echo "NO";
			 else
			 echo "SI";
			 ?>	
			 </td>
		</tr>
        <?php
         }

 		 ?>
 		</tbody>
 	</table>
 </div>




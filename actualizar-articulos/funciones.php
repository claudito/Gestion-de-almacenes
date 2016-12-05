<?php 


function  count_maeart_starsoft()
{
	$query  = "SELECT COUNT(*)AS CANTIDAD FROM [004BDCOMUN].DBO.MAEART AS M LEFT JOIN
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND S.STALMA='01'
 WHERE M.AESTADO='V' AND M.ACODIGO <> 'TEXTO'";
	$result = mssql_query($query);
	$dato   =  mssql_fetch_array($result);
	return $dato['CANTIDAD'];

}

function  count_maeart_app()
{
	$db     = new Conexion();
	$query  = "SELECT count(*)AS CANTIDAD FROM maeart WHERE  serie=''";
	$result = $db->query($query);
	$dato   = mysqli_fetch_array($result);
	return $dato['CANTIDAD'];
}









 ?>
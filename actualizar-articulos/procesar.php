<?php 
include('../config.php');
include('../session.php');
include('../includes/bd/conexion.php');
include('../includes/bd/conexionSQLserver.php');
include('../includes/clases/Transferir.php');
$db    = new Conexion();
$link  = Conectarse();

$query  = "SELECT ACODIGO,ADESCRI,AUNIDAD,AFAMILIA,ISNULL(S.STKPREPRO,0.00) AS COSTO FROM [004BDCOMUN].DBO.MAEART AS M LEFT JOIN
[004BDCOMUN].DBO.STKART AS S ON M.ACODIGO=S.STCODIGO AND S.STALMA='01' WHERE M.AESTADO='V' AND M.ACODIGO <> 'TEXTO'";
$result = mssql_query($query);

$a=0;

while ($fila = mssql_fetch_array($result))
 {	

	$query2  = "SELECT * FROM maeart WHERE codigo='".$fila['ACODIGO']."'";
	$result2 = $db->query($query2);
	$numfila = $result2->num_rows;

	if ($numfila>0)
	{
	 header('Location: mensaje');
	} 
	else
	{

	maeart($fila['ACODIGO'],'',$fila['ADESCRI'],$fila['AUNIDAD'],$fila['AFAMILIA']);
	stkart('022',$_SESSION[KEY.CONTRATO],$fila['ACODIGO'],'',$fila['COSTO']);
	stkart('027',$_SESSION[KEY.CONTRATO],$fila['ACODIGO'],'',$fila['COSTO']);
	stkart('000',$_SESSION[KEY.CONTRATO],$fila['ACODIGO'],'',$fila['COSTO']);

	header('Location: mensaje');
	
	}

 }



 ?>

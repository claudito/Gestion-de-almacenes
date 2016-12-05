<?php 


function LiberarCarga($usuario)
{

$db  =  new  Conexion();
$query  =  "DELETE FROM carga_excel WHERE 
            usuarios_idusuarios='$usuario'";
$result = $db->query($query);
if ($result)  
{
#echo "ok";
echo "";
} 
else
{
#echo "error";
echo "";
}



}

function LiberarCargaValidar($usuario)
{

$link   = Conectarse();
$query  =  "DELETE FROM [004BDAPLICACION].DBO.CARGA_EXCEL WHERE 
            USUARIO='".$usuario."'";
$result = mssql_query($query);
if ($result)  
{
#echo "ok";
echo "";
} 
else
{
#echo "error";
echo "";
}



}






function correlativo($tamano,$serie,$tipo)
{

$ceros  = $tamano;
$db  = new Conexion();
$query  = "SELECT  numero+1 as numero FROM correlativos  
           WHERE codigo='".trim($serie)."' AND tipo='".trim($tipo)."'";
$result = $db->query($query);
$dato   = mysqli_fetch_array($result);

return sprintf("%0".$ceros."s",$dato['numero']); 

}



function obtener_centro_costo($codigo)
{

$db     =  new  Conexion();
$query  =  "SELECT * FROM centro_costos WHERE codigo='$codigo'";
$result = $db->query($query);
$dato   = mysqli_fetch_array($result);
return  $dato['descripcion'];


}



function count_maeart($codigo,$serie,$cc,$serie_doc)
{
$db = new Conexion();
$query   = "SELECT m.codigo,m.serie,s.centro_costo,s.serie_doc FROM maeart   as m  INNER JOIN 
stkart as s ON m.codigo=s.maeart_codigo  and m.serie=s.maeart_serie
WHERE m.codigo='$codigo' AND m.serie='$serie' AND s.centro_costo='$cc' AND 
s.serie_doc='$serie_doc'";
$result  = $db->query($query);
$numfila = $result->num_rows;
return $numfila;

}


function count_stkart($cc,$codigo,$serie,$serie_doc)
{

$db = new Conexion();
$query   = "SELECT * FROM stkart WHERE centro_costo='".trim($cc)."' AND maeart_codigo='".trim($codigo)."'
AND maeart_serie='".trim($serie)."' AND serie_doc='$serie_doc'";
$result  = $db->query($query);
$numfila = $result->num_rows;
return $numfila;

}


function registrar_maeart($codigo,$serie,$descripcion,$unidad,$familia)
{
 $db    = new Conexion();
 $query   = "SELECT * FROM maeart  WHERE codigo='".trim($codigo)."' AND 
 serie='".trim($serie)."'";
$result  = $db->query($query);
$numfila = $result->num_rows;
if ($numfila>0)
{
 #echo "ya existe:".$codigo.'-'.$serie;
 echo "";
} 
else
{
$query = "INSERT INTO maeart(codigo,serie,descripcion,unidad,familia)VALUES('".trim($codigo)."','".trim($serie)."','".trim($descripcion)."','".trim($unidad)."','".trim($familia)."')"; 
 $result = $db->query($query);
 if($result)
 #echo "ok  maeart".$codigo.' - '.$serie."</br>";
 echo "";
 else
 echo "erro al registrar".$codigo.' - '.$serie."</br>";
}

 
}

function registrar_stkart($cc,$codigo,$serie,$cantidad,$costo,$serie_doc)
{
 $db    = new Conexion();
 $query = "INSERT INTO stkart(serie_doc,centro_costo,maeart_codigo,maeart_serie,cantidad,costo,fecha_update)VALUES('".trim($serie_doc)."','".trim($cc)."','".trim($codigo)."','".trim($serie)."','".trim($cantidad)."','".trim($costo)."',now())"; 
 $result = $db->query($query);
 if($result)
 #echo "ok stkart".$codigo.' - '.$serie."</br>";
 echo "";
 else
 echo "error stkart".$codigo.' - '.$serie."</br>";
}


function actualizar_stkart($cc,$codigo,$serie,$cantidad,$costo,$serie_doc)
{
 $db    = new Conexion();
 $query = "UPDATE stkart SET  costo='$costo',cantidad=cantidad+'".trim($cantidad)."',fecha_update=now() WHERE centro_costo='".trim($cc)."' AND maeart_codigo='".trim($codigo)."' AND maeart_serie='".trim($serie)."' AND serie_doc='".trim($serie_doc)."'"; 
 $result = $db->query($query);
 if($result)
 #echo "ok update stkart".$codigo.' - '.$serie."</br>";
 echo "";
 else
 echo "error update stkart".$codigo.' - '.$serie."</br>";
}


function registrar_nota_salida_cab($documento,$tipo,$ruc,$razon_social,$direccion,$centro_costo,$comentario,$usuario,$fecha)
{

$db     =  new Conexion();
$query  = "INSERT INTO movalmcab(documento,tipo,ruc,
razon_social,direccion,centro_costo,comentario,usuarios_idusuarios,fecha_creacion)
VALUES('$documento','$tipo','$ruc','$razon_social','$direccion',
       '$centro_costo','$comentario','$usuario','$fecha')";
$result = $db->query($query); 
if ($result)
{
 #echo "ok cab";
 echo "";
}
else
{
 echo "error cab";
}

}

function registrar_nota_salida_det($documento,$tipo,$item,$codigo,$serie,$descripcion,$unidad,$cantidad,$costo,$maquina,$doc_referencia,$centro_costo,$familia,$fecha)
{

$db     =  new Conexion();
$query  = "INSERT INTO movalmdet(movalmcab_documento,movalmcab_tipo,item,codigo,
serie,descripcion,unidad,cantidad,costo,maquina,doc_referencia,centro_costo,familia,fecha_creacion)
VALUES('$documento','$tipo','$item','$codigo','$serie','$descripcion',
'$unidad','$cantidad','$costo','$maquina','$doc_referencia','$centro_costo','$familia','$fecha')";
$result = $db->query($query); 
if ($result)
{
 echo "";
 #echo "ok det";
}
else
{
 echo "error det";
}

}


function actualizar_correlativo($serie,$tipo)
{

$db     =  new Conexion();
$query  = "UPDATE correlativos SET numero=numero+1 
           WHERE codigo='$serie' AND tipo='$tipo'";
$result = $db->query($query);
if($result)
#echo "ok";
echo "";
else
echo "error";

}


function actualizar_stkart_nota_salida_det($serie_doc,$centro_costo,$codigo,$serie,$cantidad)
{

$db     =  new Conexion();
$query  = "UPDATE stkart SET cantidad=cantidad-'$cantidad' 
           WHERE serie_doc='$serie_doc' AND centro_costo='$centro_costo' 
           AND maeart_codigo='$codigo' AND maeart_serie='$serie'";
$result = $db->query($query);
if($result)
#echo "ok stkart";
echo "";
else
echo "error stakart";

}

function actualizar_stkart_nota_ingreso_det($serie_doc,$centro_costo,$codigo,$serie,$cantidad)
{

$db     =  new Conexion();
$query  = "UPDATE stkart SET cantidad=cantidad+'$cantidad' 
           WHERE serie_doc='$serie_doc' AND centro_costo='$centro_costo' 
           AND maeart_codigo='$codigo' AND maeart_serie='$serie'";
$result = $db->query($query);
if($result)
echo "";
#echo "ok stkart";
else
echo "error stakart";

}


function movimientos_cab($documento,$tipo)
{

$db    = new Conexion();
$query = "DELETE FROM  movalmcab WHERE documento='".$documento."' AND tipo='".$tipo."'";
$result = $db->query($query);
if($result)
echo "";
#echo "NS cab eliminado";
else
echo "NS det eliminado(error)";


}

function movimientos_det($documento,$tipo)
{

$db    = new Conexion();
$query = "DELETE FROM  movalmdet WHERE movalmcab_documento='".$documento."' AND movalmcab_tipo='".$tipo."'";
$result = $db->query($query);
if($result)
#echo "NS det eliminado";
echo "";
else
echo "NS det eliminado(error)";

}


function registro_guias_salida($documento)
{

$link    = Conectarse();
$query   = "SELECT * FROM [004BDAPLICACION].DBO.GUIAS_SALIDAS  WHERE 
           documento='".$documento."'";
$result  = mssql_query($query);
$numfila = mssql_num_rows($result);
if ($numfila > 0) 
{
  return "existe";
} 
else
{
$query  = "INSERT INTO [004BDAPLICACION].DBO.GUIAS_SALIDAS(DOCUMENTO,FECHA)VALUES('".$documento."',GETDATE())";
$result = mssql_query($query);
if($result)
return "ok";
else
return "error";
}


}

 ?>
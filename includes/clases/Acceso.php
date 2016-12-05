<?php 

class Acceso
{

protected $user;
protected $pass;
protected $contrato;

function __construct($user,$pass,$contrato)
{

$this->user     = addslashes($user);
$this->pass     = addslashes($pass);
$this->contrato = addslashes($contrato);

}

function  Login()
{
$db     =  new Conexion();
$query  = "SELECT * FROM usuarios WHERE UPPER(user)=UPPER('".trim($this->user)."') AND 
pass='".trim($this->pass)."'";
$result = $db->query($query);
$numfila = $result->num_rows;
$dato    = mysqli_fetch_array($result);

if ($numfila>0) 
{
 session_start();
 $_SESSION[KEY.USUARIO]   = $dato['idusuarios'];
 $_SESSION[KEY.NOMBRES]   = $dato['nombres'];
 $_SESSION[KEY.APELLIDOS] = $dato['apellidos'];
 $_SESSION[KEY.TIPO]      = $dato['tipo'];
 $_SESSION[KEY.CONTRATO]  = $this->contrato;
 header('Location: '.PATH.' ');
}
else
{
 echo "<script>
       alert('Usuario o Contraseña incorrecta');
       window.location='".PATH."';
       </script>";
}


} 

function  Logout()
{

session_start();
if (!isset($_SESSION[KEY.USUARIO]))
{
 header('Location: '.PATH.' ');
}
else
{
  unset($_SESSION[KEY.USUARIO]);
  unset($_SESSION[KEY.NOMBRES]);
  unset($_SESSION[KEY.APELLIDOS]);
  unset($_SESSION[KEY.TIPO]);
  unset($_SESSION[KEY.CONTRATO]);
  unset($_SESSION['serie_doc']);
  header('Location: '.PATH.' ');
  
}


} 




}

 ?>
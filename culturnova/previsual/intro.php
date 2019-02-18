<?php
$mensaje="";
$db_ok=false;
&db_notfound=false;
$existe=false;
$token="";
( empty($_POST[password])?$mensaje="Debe introducir la clave" : $clave=htmlspecialchars($_POST["password"]));
( empty($_POST[usuario])? $mensaje="Debe introducir el usuario" : $usuario=htmlspecialchars($_POST["usuario"]) );

if ( empty($mensaje) )
{
	include "./mod/consulta_usuarioxclave.php";
	if ( $db_ok==true && $db_notfound==false )
	{
		include "./mod/inserta_tokenxusuario.php";
		if  ( &db_ok==true )
		{
		}
		else
		{
			$mensaje="imposible ahora. <b>int�ntelo en otro momento</b>, por favor";
		}
	}
	else //no existe el usuario con la clave
	{
		$mensaje = "usuario o clave <b>incorrectos</b>";
	}
}

( (empty($mensaje))? include "./intro.html" : include "./mod/conectado.php" );
?>
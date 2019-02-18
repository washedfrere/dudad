<?php
//Métodos para logear, añadir, borrar o editar usuarios
// La sesión debe estar ya iniciada

//Establece los siguientes parámetros de la sesión
//	$_SESSION['usuario'];
//	$_SESSION['userid'];
//	$_SESSION['clase'];

$_SESSION['msgusuario']=ESPACIOS;

//Inserción usuario-----------
if ( isset($_POST['usernew']))
{//---------------------------
	//Consulta en busca del usuario
	$query=sprintf('SELECT id, timestamp, clase FROM usuario WHERE nombre = "%s"',
			mysql_real_escape_string($_POST['usernew'], $GLOBALS['DB']));
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//El usuario ya existe
		$_SESSION['msgusuario']="El usuario ".$_POST['usernew']." ya existe";
	}
	else 
	{//El usuario no existe. Se procede a la inserción.
		$query=sprintf('INSERT INTO usuario (nombre, clave, clase) VALUES ("%s","%s",%d);',
				mysql_real_escape_string($_POST['usernew'], $GLOBALS['DB']),
				sha1($_POST['llavenew']),
				$_POST['nivelnew']);
		if($rc= mysql_query($query,$GLOBALS['DB']))
		{
			$_SESSION['msgusuario']="Creado usuario ".$_POST['usernew']." en la base de datos";
		}
		else 
		{
			$_SESSION['msgusuario']="Imposible crear usuario ".$_POST['usernew']." <b>Error:" . mysql_error() . "<br> Query:" . $query;
		}			
	}
}

//Accesso con usuario------------------------------------------------------------------
if ( isset($_POST['username']) && isset($_POST['llave']) && ! isset($_POST['llaven']) )
{//------------------------------------------------------------------------------------
	$query=sprintf('SELECT id, timestamp, clase, clave FROM usuario WHERE nombre = "%s"',
			mysql_real_escape_string($_POST['username'], $GLOBALS['DB']));
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//El usuario existe: comprobamos la clave
		if (mysql_result($rc,0,"clave") == sha1($_POST['llave']))
		{
			$_SESSION['usuario']=$_POST['username'];
			$_SESSION['userid']= mysql_result($rc,0,"id");
			$_SESSION['clase'] = mysql_result($rc,0,"clase");
			$_SESSION['msgusuario']= "Usuario " . $_POST['username'] . " activo desde " . mysql_result($rc,0,"timestamp");
			$_SESSION['acceso']=TRUE;
		}
		else 
		{//La clave no coincide
			$_SESSION['msgusuario']= "Clave incorrecta (".$_POST['llave'].")";
		}
	}
	else 
	{//El usuario no existe
		$_SESSION['msgusuario']="El usuario ".$_POST['username']." NO existe";
	}
}

//Desconexión-----------------------------------------------
if ( isset($_POST['useroff']) && isset($_POST['llaveoff']) )
{//---------------------------------------------------------
	$query=sprintf('SELECT id, timestamp, clase, clave FROM usuario WHERE nombre = "%s"',
			mysql_real_escape_string($_POST['useroff'], $GLOBALS['DB']));
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//El usuario existe: comprobamos la clave
		if (mysql_result($rc,0,"clave") == sha1($_POST['llaveoff']))
		{
			session_unset();
			$_SESSION['msgusuario']= "Usuario " . $_POST['useroff'] . " activo desde " . mysql_result($rc,0,"timestamp") . "<br> DESCONECTADO" ;
		}
		else 
		{//La clave no coincide
			$_SESSION['msgusuario']= "Clave incorrecta (".$_POST['llaveoff'].")";
		}
	}
	else 
	{//El usuario no existe
		$_SESSION['msgusuario']="El usuario ".$_POST['useroff']." NO existe";
	}
}

//Cambio de clave--------------------------------------------------------------------
if ( isset($_POST['username']) && isset($_POST['llave']) && isset($_POST['llaven']) )
{//----------------------------------------------------------------------------------
	$query=sprintf('SELECT id, timestamp, clase, clave FROM usuario WHERE nombre = "%s"',
			mysql_real_escape_string($_POST['username'], $GLOBALS['DB']));
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//El usuario existe: comprobamos la clave
		if (mysql_result($rc,0,"clave") == sha1($_POST['llave']) || $_POST['llave'] == 'perdida')
		{
			$query=sprintf('UPDATE usuario SET clave="%s" WHERE nombre = "%s";',
					sha1($_POST['llaven']),
					mysql_real_escape_string($_POST['username'], $GLOBALS['DB']));
			if($rc= mysql_query($query,$GLOBALS['DB']))
			{
				$_SESSION['msgusuario']="Cambiada la clave de ".$_POST['username']." en la base de datos";
			}
			else 
			{
				$_SESSION['msgusuario']="Imposible cambiar clave a ".$_POST['username']." <b>Error:" . mysql_error() . "<br> Query:" . $query;
			}			
		}
		else 
		{//La clave no coincide
			$_SESSION['msgusuario']= "Clave incorrecta (".$_POST['llave'].")";
		}
	}
	else 
	{//El usuario no existe
		$_SESSION['msgusuario']="El usuario ".$_POST['username']." NO existe";
	}
}
?>
<?php
//
// Este apartado está dedicado al control de sesión y a establecer los parámetros comunes al usuario
//
session_name(SESION_DUDAD); //Le pongo nombre a la sesión para poder borrar sólo las variables que cree en ella.
session_start();// Inicio o retomo la sesión.
//Se incluye el mantenimiento de usuarios como tarea principal tras
//arrancar la sesión. Se establece el usuario activo y se conecta o desconecta.
include "manejo_usuario.php"; //Todo el trabajo de mantenimiento del usuario se realiza aquí

//Controla si se ha iniciado sesión y el tipo de usuario.
//Asigna las variables comunes en cada caso
//Aunque las variables están en la sesión, se asignan unas generales para
//  no tener que escribir tanto y acceder de forma sencilla a los parámetros
//  más requeridos de toda la aplicación.
if (isset($_SESSION['acceso']) && $_SESSION['acceso']==TRUE)
{//Se ha iniciado sesión con algún usuario (ver manejo_usuario.php)
	$USUARIO=$_SESSION['usuario'];
	$USERID=$_SESSION['userid'];
	$CLASE=$_SESSION['clase'];
	if ( $CLASE <= CLASE_ALTA )
	{
		$ESFERA='ico/esfv.png';
	}
	elseif ( $CLASE <= CLASE_MEDIA )
	{
		$ESFERA='ico/esfa.png';
	}
	else 
	{
		$ESFERA='ico/esfr.png';
	}
	
}
else
{//No se ha iniciado sesión, se ha salido el usuario o es la primera vez que se entra
	$USUARIO=USERGUEST;
	$USERID=0;
	$CLASE=CLASE_BAJA;
	$ESFERA='ico/esfr.png';
}

//Ahora que conocemos el usuario, definimos el tema actual tratado en el foro para el usuario
//El asunto actual o foro actual permanece en la sesión como una variable global más porque se
//  hace referencia al asunto en diferentes puntos y tiene que estar actualizado desde el
//  principio.
if (isset($_GET['temaactual']) && $_GET['temaactual']!=null)
{
	//Al seleccionar un tema, ponemos automáticamente la página de mensajes a 1
	$_SESSION['pagm']=1;
	
	//Recogemos el tema actual pasado por selección del usuario
	$query=sprintf('SELECT descripcion FROM asunto WHERE id = %d;',
		$_GET['temaactual']);
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//Ponemos el tema actual como el seleccionado y encontrado en la tabla
		$_SESSION['temaactual']= mysql_result($rc, 0, "descripcion");
		$_SESSION['idtemaactual']=$_GET['temaactual'];
	}
	else 
	{//El tema obtenido puede haberse metido por inyección de $_GET y no existía (o lo han borrado en este instante)
		$_SESSION['temaactual']=" que no existe";
		$_SESSION['idtemaactual']=null;
	}
}
elseif (!isset($_SESSION['idtemaactual']) || $_SESSION['idtemaactual']==null )
{//Si no está definido ya un tema actual para el foro en la sesión, se asigna el más reciente o se borra.
	//Consultamos y seleccionamos el más reciente
	$query=sprintf('SELECT id, descripcion, actualidad FROM asunto ORDER BY actualidad DESC LIMIT 0 , 1;');
	$rc= mysql_query($query,$GLOBALS['DB']);
	if (mysql_num_rows($rc))
	{//Recogemos el tema actual por defecto: el más reciente
		$_SESSION['temaactual']=mysql_result($rc, 0, "descripcion");
		$_SESSION['idtemaactual']=mysql_result($rc, 0, "id");
	}
	else 
	{//No hay tema actual que valga
		$_SESSION['temaactual']=ESPACIOS;
		$_SESSION['idtemaactual']=null;
	}
}
session_write_close();//En cada script terminamos la sesión cuanto antes
?>
<?php
// Conexión de la base de datos y constantes del esquema
define('DB_HOST','db79.1and1.es');
define('DB_USER','dbo361529296');
define('DB_PASSWORD','mipassword');
define('DB_SCHEMA','db361529296');

//Establece una conexión con el servidor de la base de datos
if (!$GLOBALS['DB'] = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) )
{
	die('Error: Imposible conectar con el servidor de base de datos');
}
if (!mysql_select_db(DB_SCHEMA, $GLOBALS['DB']))
{
	mysql_close($GLOBALS['DB']);
	die('Error: Imposible seleccionar el esquema de la base de datos');
}
?>
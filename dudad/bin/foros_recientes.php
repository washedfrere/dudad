<?php
session_name(SESION_DUDAD); //Le pongo nombre a la sesión para poder borrar sólo las variables que cree en ella.
session_start();// Inicio o retomo la sesión.
//Consultamos y mostramos los temas existentes por orden de timestamp
$query=sprintf('SELECT id, descripcion, timestamp, idusuario, actualidad FROM asunto ORDER BY actualidad DESC LIMIT 0 , 5;');
$rc= mysql_query($query,$GLOBALS['DB']);
if ($max=mysql_num_rows($rc))
{
	for($i=0;$i<$max;$i++)
	{
		$cuerpo .= '<a href="foro.php?temaactual='. mysql_result($rc, $i, "id") .
		'"><img src="../ico/flchb.png" border="0"></a>' .
		mysql_result($rc, $i, "descripcion") . "<br>";
	}
}
else 
{//No existen asuntos en la tabla
	$cuerpo .= '<img src="../ico/flch.png" border="0"> No hay nada';
}
session_write_close();
?>
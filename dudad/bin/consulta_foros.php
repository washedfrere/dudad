<?php
session_name(SESION_DUDAD); //Le pongo nombre a la sesión para poder borrar sólo las variables que cree en ella.
session_start();// Inicio o retomo la sesión.
//Paginación de foros
if (isset($_GET['pagf']))
{
	if ( $_GET['pagf'] != null ) { $SESSION['pagf'] = $_GET['pagf'];}
	else {$SESSION['pagf'] = 1;}
}
if (!isset($SESSION['pagf'])) { $SESSION['pagf'] = 1;}

$query=sprintf('SELECT COUNT(*) FROM asunto;');
$rc= mysql_query($query,$GLOBALS['DB']);
if (mysql_num_rows($rc))
{
	$total=mysql_result($rc, 0);
	$pags=ceil($total / PORPAG);				//Número de páginas total
	$linkpag="";
	if ($SESSION['pagf'] > 1)
	{
		$pagant=$SESSION['pagf'] - 1;
		$linkpag='<a href="foro.php?pagf=' . $pagant . '">' .
			'<img src="../ico/rpagb.png" border="0"/></a>';
	}
	else
	{
		$linkpag='<img src="../ico/rpag.png" border="0"/>';
	}
	$linkpag = $linkpag . ' p&aacute;gina ' . $SESSION['pagf'] . '/' . $pags . ' ';
		
	$pagsig=$SESSION['pagf'] + 1;
	if ($pagsig <= $pags)
	{
		$linkpag = $linkpag . '<a href="foro.php?pagf=' . $pagsig . '">' .
			'<img src="../ico/apagb.png" border="0"/></a>';
	}
	else
	{
		$linkpag = $linkpag . '<img src="../ico/apag.png" border="0"/>';
	}
}
$cuerpo .= $linkpag . '<hr>';

$primero = ($SESSION['pagf'] - 1 ) * PORPAG;

//Consultamos y mostramos los temas existentes por orden de timestamp
$query=sprintf('SELECT id, descripcion, timestamp, idusuario, actualidad FROM asunto ORDER BY actualidad DESC LIMIT %d , %d;',
		$primero, PORPAG);
$rc= mysql_query($query,$GLOBALS['DB']);
if ($max=mysql_num_rows($rc))
{
	for($i=0;$i<$max;$i++)
	{
		$cuerpo .= '<a href="foro.php?temaactual='. mysql_result($rc, $i, "id") .
		'"><img src="../ico/flch.png" border="0"></a>' .
		mysql_result($rc, $i, "descripcion") . "<br>";
	}
}
else 
{//No existen asuntos en la tabla
	$cuerpo .= '<img src="../ico/flch.png" border="0"> No hay nada';
}
session_write_close();
?>
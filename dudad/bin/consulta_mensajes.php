<?php
include "../bin/aeoiu.php";//Incluimos el fichero con la función de codificación para más adelante
session_name(SESION_DUDAD); //Le pongo nombre a la sesión para poder borrar sólo las variables que cree en ella.
session_start();// Inicio o retomo la sesión.
//Paginación de foros
if (isset($_GET['pagm']))
{
	if ( $_GET['pagm'] != null ) { $SESSION['pagm'] = $_GET['pagm'];}
	else {$SESSION['pagm'] = 1;}
}
if (!isset($SESSION['pagm'])) { $SESSION['pagm'] = 1;}

$query=sprintf('SELECT COUNT(*) FROM mensaje WHERE idasunto = %d;',$_SESSION['idtemaactual']);
$rc= mysql_query($query,$GLOBALS['DB']);
if (mysql_num_rows($rc))
{
	$total=mysql_result($rc, 0);
	$pags=ceil($total / PORPAG);				//Número de páginas total
	$linkpag="";
	if ($SESSION['pagm'] > 1)
	{
		$pagant=$SESSION['pagm'] - 1;
		$linkpag='<a href="foro.php?pagm=' . $pagant . '">' .
			'<img src="../ico/rpagb.png" border="0"/></a>';
	}
	else
	{
		$linkpag='<img src="../ico/rpag.png" border="0"/>';
	}
	$linkpag = $linkpag . ' p&aacute;gina ' . $SESSION['pagm'] . '/' . $pags . ' ';
		
	$pagsig=$SESSION['pagm'] + 1;
	if ($pagsig <= $pags)
	{
		$linkpag = $linkpag . '<a href="foro.php?pagm=' . $pagsig . '">' .
			'<img src="../ico/apagb.png" border="0"/></a>';
	}
	else
	{
		$linkpag = $linkpag . '<img src="../ico/apag.png" border="0"/>';
	}
}
$cuerpo .= $linkpag . '<hr>';

//Consultamos y mostramos los mensajes existentes para el tema/foro/asunto actual
// en $_SESSION['idtemaactual']
$primero = ($SESSION['pagm'] - 1) * PORPAG;
$query=sprintf('SELECT id, idasunto, mensaje, idusuario, timestamp FROM mensaje ' .
			'WHERE idasunto = %d ORDER BY timestamp DESC LIMIT %d, %d;',$_SESSION['idtemaactual'],$primero,PORPAG);
if($rcm=mysql_query($query,$GLOBALS['DB']))
{
	if ( $maxm=mysql_num_rows($rcm))
	{
		for($i=0;$i<$maxm;$i++)
		{//Por cada mensaje, se consulta el usuario para comparar el nivel. Si el nivel
		 //  es inferior al del usuario conectado ($CLASE), se muestra codificado con "aeoiu".
			$esferita='../ico/esfg.png';
			$usermensa=ESPACIOS;
			$mensajeactual=ESPACIOS;
			//Selección del usuario del mensaje y evaluación de la clase
			$query=sprintf('SELECT nombre, clase FROM usuario WHERE id = %d;', mysql_result($rcm, $i, "idusuario"));
			if($rcu= mysql_query($query,$GLOBALS['DB']))
			{
				if (mysql_num_rows($rcu))
				{//Si existe el usuario, se muestra
					if ( mysql_result($rcu, 0, "clase") <= CLASE_ALTA )
					{
						$esferita='../ico/esfv.png';
					}
					elseif ( mysql_result($rcu, 0, "clase") <= CLASE_MEDIA )
					{
						$esferita='../ico/esfa.png';	
					}
					else 
					{
						$esferita='../ico/esfr.png';
					}
					$usermensa=mysql_result($rcu, 0, "nombre");
				
					if (mysql_result($rcu, 0, "clase") < $CLASE )
					{//La clase del usuario conectado es mayor que la del que escribió: codificar
						$mensajeactual=aeoiu(mysql_result($rcm, $i, "mensaje"));
					}
					else 
					{//La clase del usuario conectado es menor o igual que la del que escribió: mostrar
						$mensajeactual=mysql_result($rcm, $i, "mensaje");
					}
				}
				else 
				{//La clase del usuario conectado es menor o igual que la del que escribió: mostrar
					$mensajeactual=mysql_result($rcm, $i, "mensaje");
				}
			}
			else 
			{//No se encontró el usuario original del mensaje, mostrar el mensaje.
				$usermensa="an&oacute;nimo";
				$mensajeactual=mysql_result($rcm, $i, "mensaje");
			}

			//Se muestra el mensaje con los parámetros obtenidos	
			$cuerpo .= '<img src="' . $esferita . '" border="0" /><sup>' . $usermensa . '</sup>' .
					'<sub>' . mysql_result($rcm, $i, "timestamp") . '</sub><br>' . $mensajeactual . '<hr>';

		}
	}
	else 
	{//No existen asuntos en la tabla
		$cuerpo .= '<img src="../ico/esfg.png" border="0"> No hay ning&uacute;n mensaje.';
	}
}
else 
{//No existen asuntos en la tabla
	$cuerpo .= '<img src="../ico/esfg.png" border="0"> No hay ning&uacute;n mensaje.';
}
session_write_close();
?>
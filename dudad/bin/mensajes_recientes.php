<?php
include "../bin/aeoiu.php";//Incluimos el fichero con la función de codificación para más adelante

//Consultamos y mostramos los mensajes más recientes
$query=sprintf('SELECT id, idasunto, mensaje, idusuario, timestamp FROM mensaje ' .
			'ORDER BY timestamp DESC LIMIT 0, 3;');
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
			$asuntoactual=ESPACIOS;
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
////////////////////////////////selección del foro
			$query=sprintf('SELECT descripcion FROM asunto WHERE id=%d;',
					mysql_result($rcm, $i, "idasunto"));
			$rcf= mysql_query($query,$GLOBALS['DB']);
			if ($max=mysql_num_rows($rcf))
			{
				$asuntoactual=mysql_result($rcf, 0, "descripcion");
			}
			else 
			{//No existen asuntos en la tabla
				$cuerpo .= '<img src="../ico/flch.png" border="0"> No hay nada';
			}
////////////////////////////////
			//Se muestra el mensaje con los parámetros obtenidos	
			$cuerpo .= '<img src="' . $esferita . '" border="0" /><sup>' . $usermensa . '</sup>' .
					'<sub>' . mysql_result($rcm, $i, "timestamp") . '</sub><sup>' . 
					$asuntoactual . '</sup><br>' . $mensajeactual . '<br><br>';

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

?>
<?php 
include '../bin/comun.php';
include '../bin/reinicio.php';
include '../bin/dh.php';
include '../bin/control.php';

ob_start();
//Creación
if (isset($_POST['asunto']))
{
	if ($_POST['asunto']!=null && $_POST['asunto']>' ')
	{
		$query=sprintf('INSERT INTO asunto (descripcion, idusuario, actualidad) VALUES ("%s", %d, CURRENT_TIMESTAMP);',
					mysql_real_escape_string($_POST['asunto'], $GLOBALS['DB']),
					$USERID);
		if(mysql_query($query,$GLOBALS['DB']))
		{
			echo 'Creado el tema "' . $_POST['asunto'] . '"<br>';
		}
		else 
		{
			echo 'Imposible crear el tema "' . $_POST['asunto'] . '" <br>';
			echo 'Fall&oacute; la query ' . $query . ' por: ' . mysql_error() .  '<br>';
		}
	}
	else { echo 'Tema nuevo invalido "' . $_POST['asunto'] . '"<br>';}
}
else { echo "No se ha creado nada";}
?>

<h3>Nuevo tema de conversaci&oacute;n</h3>
<form action="" method="post" name="temanuevo">
Asunto: <input type="text" name="asunto" size="100" maxlength="256" />
<br><input type="submit" value="Crear" />
</form>
<br>
Ve al foro cuando hayas terminado para ver los nuevos foros creados y poder insertar m&aacute;s mensajes en ellos.
<?php

$cuerpo .= ob_get_clean();
include "mostrar_foro.php";
include "../bin/menu.php";
include "../bin/template.php";
?>
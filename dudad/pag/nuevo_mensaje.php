<?php 
include '../bin/comun.php';
include '../bin/reinicio.php';
include '../bin/dh.php';
include '../bin/control.php';

ob_start();
// Lo primero es mostrar el formulario de creación para dar agilidad a la escritura-->
?>
<h3>Nuevo mensaje para " <?php echo $_SESSION['temaactual']; ?> "</h3>
<form action="" method="post" name="mensnuevo">
<br>Mensaje:<br><textarea name="mensaje" rows="10" cols="50"></textarea>
<br><input type="submit" value="Crear" />
</form>
<hr>
<?php
//Creación
if (isset($_POST['mensaje']))
{
	if ($_POST['mensaje']!=null && $_POST['mensaje']>' ' && isset($_SESSION['idtemaactual']) && $_SESSION['idtemaactual']!= null)
	{
		$query=sprintf('INSERT INTO mensaje (idasunto, mensaje, idusuario) VALUES (%d, "%s", %d);',
					$_SESSION['idtemaactual'],
					$_POST['mensaje'],
					$USERID);
		if(mysql_query($query,$GLOBALS['DB']))
		{//Se ha insertado ok el mensaje, así que actualizamos la actualidad del foro
			$query=sprintf('UPDATE asunto SET actualidad=CURRENT_TIMESTAMP WHERE id=%d;',
					$_SESSION['idtemaactual']);
			if(mysql_query($query,$GLOBALS['DB']))
			{
				echo 'Nuevo mensaje en el foro' . $_SESSION['temaactual'] . '<br>';
				$cuerpo .= ob_get_clean();
				include "mostrar_foro.php";
			}
			else 
			{
				echo 'No se ha podido actualizar la fecha del foro.';
				$cuerpo .= ob_get_clean();
			}
		}
		else 
		{
			echo 'Imposible crear el tema "' . $_POST['mensaje'] . '" <br>';
			echo 'Fall&oacute; la query ' . $query . ' por: ' . mysql_error() .  '<br>';
			$cuerpo .= ob_get_clean();
		}
	}
	else
	{
		echo 'Mensaje nuevo invalido "' . $_POST['mensaje'] . '"<br>';
		$cuerpo .= ob_get_clean();
	}
}
else 
{
	echo "No se ha creado nada";
	$cuerpo .= ob_get_clean();
	include "mostrar_foro.php";
}

include "../bin/menu.php";
include "../bin/template.php";

?>

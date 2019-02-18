<?php
include '../bin/comun.php';
include '../bin/reinicio.php';
include '../bin/dh.php';
include '../bin/control.php';
//Distribuidor de procesos principales sobre el foro
if  (isset($_GET['respid']) && $_GET['respid']!=NULL)
{//Se responde en uno de los foros
	if($CLASE<=CLASE_MEDIA){ include "resp_foro.php";}
	else {include "mensaje_publico.php";}
}
elseif (isset($_GET['nuevoforo']) && $_GET['nuevoforo']==1)
{//Se crea uno de los foros
	if($CLASE<=CLASE_ALTA) {include "nuevo_foro.php";}
	else {include "mostrar_foro.php";}
}
elseif(isset($_GET['buscaforo']) && $_GET['buscaforo']==1)
{//Buscar foros
	include "buscar_foro.php";
}
elseif(isset($_GET['buscamens']) && $_GET['buscamens']==1)
{//Buscar mensaje
	include "buscar_mensaje.php";
}
elseif (isset($_GET['nuevomens']) && $_GET['nuevomens']==1)
{//Se crea uno de los foros
	if($CLASE<=CLASE_ALTA) {include "nuevo_mensaje.php";}
	else {include "mostrar_foro.php";}
}
else
{//Se muestra el contenido del foro
	include "mostrar_foro.php";
}
include "../bin/menu.php";
include "../bin/template.php";
?>

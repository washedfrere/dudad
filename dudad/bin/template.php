<?php 
	//   ___________________________________________________
	//  /                                                   \
	//  | Esquema de p�gina web est�ndar para todo el sitio |
	//  |                                                   |
	//   >-------------------------------------------------<
	//  | Se utiliza al final del proceso PHP para mostrar  |
	//  |todo el contenido generado. Un include en el �ltimo|
	//  |m�dulo causa la generaci�n del documento WEB entero|
	//   >-------------------------------------------------<
	//  | Creaci�n: Washedfrere@201104021618                |
	//  | Modificaciones:                                   |
	//  | 			Autor				aaaammddhhMM        |
	//  |			-------------------	------------        |
	//  |                                                   |
	//  \___________________________________________________/

	//Cabecera inicial del documento
	echo '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//ES" "http://www.w3.org/TR/html4/loose.dtd">';
	echo '<html dir="ltr" language="es"><head>';

	//Titulo de la p�gina
	if (isset($titulo) && $titulo!="") echo '<title>' . html_entities($titulo) . '</title>';
	else echo '<title>dudad.es</title>';
	
	//Etiquedas <META>contenidometa</meta>
	echo '<meta http-equiv="content-type" content="text/html;charset=ISO-8859-1" />';
	echo '<meta name="author" content="Washedfrere" />';
	if (isset($cabeceras) && $cabeceras!="")  echo $cabeceras;

	//CSS a incluir
	if (isset($estilo) && $estilo!="") echo '<link rel="stylesheet" type="text/css" href="' . $estilo . '.css" />';
	
	//Scripts (javascript o el que sea) a incluir
	if (isset($scripthead) && $scripthead!="") echo $scripthead;
	
	//Fin de cabecera
?></head><body><?php
	//Inicio de cuerpo html
	
	//Cuerpo de la p�gina generado en los distintos m�dulos
	if (isset($cuerpo) && $cuerpo!="") echo $cuerpo;
	else {
		echo '<h1>P�gina vac�a</h1>';
		echo 'No se ha generado contenido para esta p�gina. Revise las opciones o p�ngase en contacto con el administrador del sitio.';
	}
	
	//Pies de p�gina generado en los distintos m�dulos
	if (isset($pies) && $pies!="") echo $pies;
	
	//Fin de cuerpo y de html
?></body></html>
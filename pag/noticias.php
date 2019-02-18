<HTML>
<HEAD>
<TITLE>torredekapter.es:Noticias</TITLE>
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
</HEAD>
<BODY bgcolor="white">
<img src="trrdkptrlogo.png" style="position:absolute; top:0; left:0;"/>
<h3 align="center">
  <sup>Opciones:</sup>
  <sub>
    <a href="../index.html">Inicio</a>
    <a href="escritos.php">Escritos</a>
    <a href="imagenes.php">Im&aacute;genes</a>
    <a href="documentos.php">Documentos</a>
    <a href="colaboradores.php">Colaboradores</a>
    <a href="referencias.html">Referencias</a>
  <sub>
</h3>
<hr>
<h2><sup>Noticias y novadades en</sup>torredekapter<sub>.es</sub></h2>

<?php
//Evaluamos si estamos con noticias recientes (por defecto) o antiguas (link antiguas)
if(isset($_GET["noticias"])) $path=$_GET["noticias"];
else $path = "./new/";
if(!is_dir($path)) $path = "./new/";

//Ahora ponemos el link a noticias antiguas o a recientes
$optativo="./new/old/";
if($path != "./new/") $optativo="./new/";
if($path == "./new/") echo '<br><a href="noticias.php?noticias='.$optativo.'">Antiguas</a><br>';
else echo '<br><b>Volver a noticias<a href="noticias.php?noticias='.$optativo.'">Recientes</a></b><br>';

//abrimos el directorio
$dir = opendir($path);

//Creamos el array para guardar links a los documentos
$noticias=array();

//Se lee el contenido del directorio en un bucle (por orden alfabético, supuestamente)
while ($elemento = readdir($dir))
{
   //Definimos la ruta completa hasta el elemento del direcorio
   $ruta=$path.$elemento;

   //Obtenemos la extensión directamente del nombre del fichero o directorio
   $tipo=substr(strrchr($elemento, '.'), 1);

   //Si no es un directorio y sí es un archivo html lo guardamos en el array con clave por fecha creación
   if(!is_dir($ruta)&&($tipo=="html"||$tipo=="htm")) $noticias[]=strval(filectime($ruta)).'-'.$ruta;
}

//Cerramos el directorio
closedir($dir);

//Reordenamos el array inversamente (el primer dato es el timestamp unix)
rsort($noticias);

//Procesamos las hojas
foreach ($noticias as $value) echo '<br>'.file_get_contents(substr(strrchr($value, '-'), 1));

//Liberamos los array
unset($noticias);

?>

<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

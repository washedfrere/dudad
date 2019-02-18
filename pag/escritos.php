<HTML>
<HEAD>
<TITLE>torredekapter.es:Escritos</TITLE>
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
</HEAD>
<BODY bgcolor="white">
<img src="trrdkptrlogo.png" style="position:absolute; top:0; left:0;"/>
<h3 align="center">
  <sup>Opciones:</sup>
  <sub>
    <a href="../index.html">Inicio</a>
    <a href="noticias.php">Noticias</a>
    <a href="imagenes.php">Im&aacute;genes</a>
    <a href="documentos.php">Documentos</a>
    <a href="colaboradores.php">Colaboradores</a>
    <a href="referencias.html">Referencias</a>
  <sub>
</h3>
<hr>
<h2><sup>Est&aacute; escrito en</sup>torredekapter<sub>.es</sub></h2>
<?php
//definimos el path de acceso o lo recogemos como album
$path = "./esc/";

//abrimos el directorio
$dir = opendir($path);

//Creamos el array para guardar links a los documentos
$escritos=array(0=>"Imagen");

//Se lee el contenido del directorio en un bucle (por orden alfabético, supuestamente)
while ($elemento = readdir($dir))
{
   //Definimos la ruta completa hasta el elemento del direcorio
   $ruta=$path.$elemento;

   //Obtenemos la extensión directamente del nombre del fichero o directorio
   $tipo=substr(strrchr($elemento, '.'), 1);

   //Si es un directorio, lo tomamos como lugar donde está el escrito
   if(is_dir($ruta)&&file_exists($ruta.'/texto.txt')) {
       $salida='<center><h3>'.str_replace('_',' ',$elemento).' (<a href="escrito.php?escrito='.$ruta.'/">Leer</a>)</h3>';
       //Si existe un comentario en texto, se añade detrás
       if(file_exists($ruta.'.txt')) $salida.= htmlentities(file_get_contents($ruta.'.txt'));
       $salida.="</center>";
       //Incluye la linea html en el array de documentos
       $escritos[]=$salida;
   }
}

//Cerramos el directorio
closedir($dir);

//Procesamos las hojas
$max=sizeof($escritos);
$ind=1;
if($max>1) {
  while($ind < $max){
     echo "$escritos[$ind]<br>";
    $ind+=1;
  }
}

//Liberamos los array
unset($escritos);

?>

<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

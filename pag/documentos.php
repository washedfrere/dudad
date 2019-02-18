<HTML>
<HEAD>
<TITLE>torredekapter.es:Documentos</TITLE>
<meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
</HEAD>
<BODY bgcolor="white">
<img src="trrdkptrlogo.png" style="position:absolute; top:0; left:0;"/>
<h3 align="center">
  <sup>Opciones:</sup>
  <sub>
    <a href="../index.html">Inicio</a>
    <a href="noticias.php">Noticias</a>
    <a href="escritos.php">Escritos</a>
    <a href="imagenes.php">Im&aacute;genes</a>
    <a href="colaboradores.php">Colaboradores</a>
    <a href="referencias.html">Referencias</a>
  <sub>
</h3>
<hr>
<h2><sup>Documentos de</sup>torredekapter<sub>.es</sub></h2>
<p>Si quieres bajarte el documento para leerlo en otro momento o en otro sitio donde no tengas internet y tu navegador te lo abre al hacer "click" sobre él, prueba a hacer "click" con el bot&oacute;n derecho del rat&oacute;n y elegir "<b>guardar enlace como...</b>" o "<b>guardar destino como...</b>" u opciones similares de tu explorador de internet.</p>
<?php
//definimos el path de acceso o lo recogemos como album
$path = "./docs/";

//abrimos el directorio
$dir = opendir($path);

//Creamos el array para guardar links a los documentos
$documentos=array(0=>"Imagen");

//Se lee el contenido del directorio en un bucle (por orden alfabético, supuestamente)
while ($elemento = readdir($dir))
{
   //Definimos la ruta completa hasta el elemento del direcorio
   $ruta=$path.$elemento;

   //Obtenemos la extensión directamente del nombre del fichero o directorio
   $tipo=substr(strrchr($elemento, '.'), 1);

   //Si no es un directorio ni un fichero de texto, será un documento
   if(!is_dir($ruta)&&$tipo!="txt") {
       $salida= "<b>$tipo</b><br>";
       $salida.='<a href="'.$ruta.'">'.$elemento.'</a><img src="pluma.jpg" border="0"/><br>';
       //Si existe un comentario en texto, se añade detrás
       if(file_exists($ruta.'.txt')) $salida.= htmlentities(file_get_contents($ruta.'.txt'));
       //Incluye la linea html en el array de documentos
       $documentos[]=$salida;
   }
}

//Cerramos el directorio
closedir($dir);

//Procesamos las imagenes
$max=sizeof($documentos);
$izq=0;//Empezamos a la izquierda de la tabla
if($max>1) {
  echo '<table border="0" width="100%">';
  $ind=1;//Empezamos en el elemento 1 en lugar del 0 para saltarnos el titulo
  while($ind < $max){
    if($izq==0) {
      echo "<tr><td valign=\"top\">$documentos[$ind]</td>";
      $izq=1;
    }
    else {
      echo "<td valign=\"top\">$documentos[$ind]</td></tr>";
      $izq=0;
    }
    $ind+=1;
  }
  if($izq==1) echo "<td></td></tr>";
  echo "</table>";
}

//Liberamos los array
unset($documentos);

?>

<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

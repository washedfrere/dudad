<HTML>
<HEAD>
<TITLE>torredekapter.es:Im&aacute;genes</TITLE>
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
   <a href="documentos.php">Documentos</a>
   <a href="colaboradores.php">Colaboradores</a>
   <a href="referencias.html">Referencias</a>
  <sub>
</h3>
<hr>
<h2><sup>Galer&iacute;a de</sup>torredekapter<sub>.es</sub></h2>
<?php
//definimos el path de acceso o lo recogemos como album
if(isset($_GET["album"])) $path=$_GET["album"];
else $path = "./fotos/";
if(!is_dir($path)) $path = "./fotos/";

//si no es el directorio principal, ponemos un link a �l.
if ($path != "./fotos/"){
  echo '<h2><sup>Album </sup>'.str_ireplace ("/"," ",substr($path, 8)).':</h2>';
  echo '<h3>Ir al inicio de <a href="imagenes.php">Im&aacute;genes</a></h3>';
}
else echo '<p>El contenido est&aacute; expuesto en forma de &aacute;lbumes e im&aacute;genes. Primero los &aacute;lbumes y luego las im&aacute;genes.</p>
';

//Por si hay fotografías, definimos el directorio de thumnails.
$thumb = "$path/tmb/";

//Creamos el directorio de thumnails si no existe
if(!file_exists($thumb)) mkdir($thumb);

//abrimos el directorio
$dir = opendir($path);

//Creamos los vectores para ir guardando fotos y albumes
$albumes=array(0=>"Album");
$fotos=array(0=>"Imagen");

//Se lee el contenido del directorio en un bucle (por orden alfabético, supuestamente)
while ($elemento = readdir($dir))
{ 
   //Definimos la ruta completa hasta el elemento del direcorio
   $ruta=$path.$elemento;

   //Obtenemos la extensión directamente del nombre del fichero o directorio
   $tipo=substr(strrchr($elemento, '.'), 1);

   //Si se trata de un directorio, lo presentamos como album
   if(is_dir($ruta)) {
     if ($elemento!="tmb" && $elemento!="." && $elemento!="..") {
       $salida= '<b>ALBUM</b><br><a href="imagenes.php?album='.$ruta.'/">';
       if(file_exists($ruta.'/portada.jpg')) $salida.= '<img src="'.$ruta.'/portada.jpg'.'" border="0" />';
       else $salida.= "$elemento";
       $salida.= "</a> ";
       if(file_exists($ruta.'.txt')) $salida.= htmlentities(file_get_contents($ruta.'.txt'));
       $albumes[]=$salida;//Incluimos el album en el array de albumes
     }
   }
   //Si no es un directorio, lo presentamos como fotografía o imagen (evitando ciertos archivos)
   else {
     if($tipo!="txt"&&$elemento!="portada.jpg") {
        $salida= "<b>Imagen</b><br>";
        $ftmb=$thumb.$elemento."_tmb.jpg";
        //Si no existe el thumnail, lo creamos (la primera vez siempre lo creamos)
        if(!file_exists($ftmb)) {
          if($tipo=="jpg" || $tipo=="jpeg") {
          $fuente = imagecreatefromjpeg($ruta);
          $imgAncho = imagesx($fuente);
          $imgAlto =imagesy($fuente);
          $ancho=50;
          $alto=$imgAlto*$ancho/$imgAncho;
          $imagen = imagecreatetruecolor($ancho,$alto);
          imagecopyresized($imagen,$fuente,0,0,0,0,$ancho,$alto,$imgAncho,$imgAlto);
          imagejpeg($imagen,$ftmb);
          imagedestroy($imagen);
          imagedestroy($fuente);
         }
       }
       if(file_exists($ftmb)) $salida.= '<a href="'.$ruta.'"><img src="'.$ftmb.'" border="0"/></a> ';
       else $salida.= '<a href="'.$ruta.'">'.$elemento.'</a>';
       if(file_exists($ruta.'.txt')) $salida.= htmlentities(file_get_contents($ruta.'.txt'));
       $fotos[]=$salida;//Incluimos la imagen en el array de imagenes
     }
   }
}

//Cerramos el directorio
closedir($dir); 

//Procesamos los albumes
$max=sizeof($albumes);
$izq=0;//Empezamos a la izquierda de la tabla
$haytabla=0;//Por si no hay �lbumes
if($max>1) {
  echo '<table border="0">';
  $haytabla=1;
  $ind=1;//Empezamos en el elemento 1 en lugar del 0 para saltarnos el titulo
  while($ind < $max){
    if($izq==0) {
      echo "<tr><td valign=\"top\">$albumes[$ind]</td>";
      $izq=1;
    }
    else {
      echo "<td valign=\"top\">$albumes[$ind]</td></tr>";
      $izq=0;
    }
    $ind+=1;
  }
}

//Procesamos las imagenes
$max=sizeof($fotos);
if($max>1) {
  if($haytabla==0) {
    echo '<table border="0">';
    $haytabla=1;
  }
  $ind=1;//Empezamos en el elemento 1 en lugar del 0 para saltarnos el titulo
  while($ind < $max){
    if($izq==0) {
      echo "<tr><td valign=\"top\">$fotos[$ind]</td>";
      $izq=1;
    }
    else {
      echo "<td valign=\"top\">$fotos[$ind]</td></tr>";
      $izq=0;
    }
    $ind+=1;
  }
}

if($haytabla==1) echo "</table>";
//Liberamos los array
unset($albumes);
unset($fotos);

?> 

<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

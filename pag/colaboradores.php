<HTML>
<HEAD>
<TITLE>torredekapter.es:Colaboradores</TITLE>
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
  <a href="imagenes.php">Im&aacute;genes</a>
  <a href="referencias.html">Referencias</a>
 <sub>
</h3>
<hr>
<h2><sup>Colaboran en </sup>torredekapter<sub>.es</sub></h2>
<?php
//definimos el path de acceso o lo recogemos como album
$path = "./colab/";

//abrimos el directorio
$dir = opendir($path);

//Creamos los vectores para ir guardando fotos y albumes
$fotos=array(0=>"Imagen");

//Se lee el contenido del directorio en un bucle (por orden alfabético, supuestamente)
while ($elemento = readdir($dir))
{ 
   //Definimos la ruta completa hasta el elemento del direcorio
   $ruta=$path.$elemento;

   //Obtenemos la extensiÃ³n directamente del nombre del fichero o directorio
   $tipo=substr(strrchr($elemento, '.'), 1);

   //Si no es un directorio ni un fichero de texto, será una imagen del colaborador
   if(!is_dir($ruta)&&$tipo!="txt") {
       $salida= '<img src="'.$ruta.'" border="0"/>';
       //Si existe un comentario en texto, se añade detrás
       if(file_exists($ruta.'.txt')) $salida.= htmlentities(file_get_contents($ruta.'.txt'));
       //Incluye la linea html en el array de fotos
       $fotos[]=$salida;
   }
}

//Cerramos el directorio
closedir($dir); 

//Procesamos las imagenes
$max=sizeof($fotos);
$izq=0;//Empezamos a la izquierda de la tabla
if($max>1) {
  echo '<table border="0">';
  $ind=1;//Empezamos en el elemento 1 en lugar del 0 para saltarnos el titulo
  while($ind < $max){
    if($izq==0) {
      echo "<tr><td>$fotos[$ind]</td>";
      $izq=1;
    }
    else {
      echo "<td>$fotos[$ind]</td></tr>";
      $izq=0;
    }
    $ind+=1;
  }
  if($izq==1) echo "<td></td></tr>";
  echo "</table>";
}


//Liberamos los array
unset($fotos);

?> 

<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

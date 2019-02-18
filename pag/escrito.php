<HTML>
<HEAD>
<TITLE>torredekapter.es:Leer Escrito</TITLE>
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
    <a href="documentos.php">Documentos</a>
    <a href="colaboradores.php">Colaboradores</a>
    <a href="referencias.html">Referencias</a>
  <sub>
</h3>
<hr>
<h2><sup>Est&aacute;s leyendo en</sup>torredekapter<sub>.es</sub></h2>
<?php
include 'esc2html.php';
if(isset($_GET["escrito"])) {
	$ruta=$_GET["escrito"];
	$escrito=$ruta.'texto.txt';
	$contenido = file_get_contents($escrito);
	
	//Formateamos en html las instrucciones de formato
	$contenido=esc2html($contenido,$ruta);
		
	//Presentamos el escrito
	echo $contenido;
}
else echo "<h1>No se ha definido nada</h1>";
?>
<hr>
<h3 align="center">(C) torredekapter.es 2009-2010</h3>
</BODY>
</HTML>

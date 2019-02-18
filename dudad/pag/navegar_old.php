<?php
include '../bin/comun.php';
include '../bin/dh.php';
include '../bin/control.php';
echo "<HTML>";
echo "<HEAD><TITLE>";
if (!isset($_GET["ola"])) {$ola="actual";}
else {$ola=$_GET["ola"];}
echo "?!".$ola;
echo '</TITLE><link rel="shortcut icon" href="favicon.ico"></HEAD>';
echo "<BODY>";
echo '<map name="map">';
echo '<area shape="rect" coords="41,6,106,21" alt="Ultimas novedades" href="navegar.php?ola=actual" />';
echo '<area shape="rect" coords="124,6,186,23" alt="Compartir ideas con otras personas" href="navegar.php?ola=foro" />';
echo '<area shape="rect" coords="203,4,266,22" alt="Aumenta nuestro conocimiento de las cosas" href="navegar.php?ola=wiki" />';
echo '<area shape="rect" coords="284,6,345,21" alt="Comparte datos con otras personas" href="navegar.php?ola=colabor" />';
echo '<area shape="rect" coords="363,5,425,23" alt="Introduce tu usuario para vernos desde dentro" href="navegar.php?ola=login" />';
echo '</map>';
echo '<center>';
echo '<IMG SRC="../ico/dudad_logo_mini.png" BORDER="0"/><IMG SRC="';
if ( $ola=="actual")
{ echo '../ico/actual.png';
} elseif ( $ola=="colabor")
{ echo '../ico/colabor.png';
} elseif ( $ola=="foro" )
{ echo '../ico/foro.png';
} elseif ( $ola=="login" )
{ echo '../ico/login.png'; 
} elseif ( $ola=="wiki" )
{ echo '../ico/wiki.png'; }
else { echo '../ico/actual.png';}
echo '" border="0" usemap="#map" />';
echo '<IMG SRC="'.$ESFERA.'" BORDER="0"/>'.$USUARIO;
echo '</center>';
if ( $ola=="actual")
{ include "actual.php";
} elseif ( $ola=="colabor")
{ include "colabor.php";
} elseif ( $ola=="foro" )
{ include "foro.php";
} elseif ( $ola=="login" )
{ include "login.php"; 
} elseif ( $ola=="wiki" )
{ include "wiki.php"; }
else { include "actual.php"; }
echo "</BODY>";
echo "</HTML>";
?>
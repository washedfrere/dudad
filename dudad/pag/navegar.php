<?php
include '../bin/comun.php';
include '../bin/dh.php';
include '../bin/control.php';
if (!isset($_GET["ola"])) {$ola="actual";}
else {$ola=$_GET["ola"];}
echo "<HTML>";
echo "<HEAD><TITLE>";
echo "?!".$ola;
echo '</TITLE><link rel="shortcut icon" href="favicon.ico"></HEAD>';
header('Cache-control: private');
echo '<link rel="stylesheet" type="text/css" href="global.css" />';
echo "<BODY>";
include "../bin/menu.php";
if ( $ola=="actual")
{ include "../pag/actual.php";
} elseif ( $ola=="colabor")
{ include "../pag/colabor.php";
} elseif ( $ola=="foro" )
{ include "../pag/foro.php";
} elseif ( $ola=="login" )
{ include "../pag/login.php"; 
} elseif ( $ola=="wiki" )
{ include "../pag/wiki.php"; }
else { include "../pag/actual.php"; }
echo "</BODY>";
echo "</HTML>";
?>
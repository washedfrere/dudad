<?php
//Se elimina todo rastro de una antigua sesión.
include "bin/comun.php";
session_name(SESION_DUDAD);
session_start();
session_unset();
session_destroy();
session_start();//Creamos las variables de camino base para toda la web
$dir_local = pathinfo(__FILE__);
$_SESSION['local'] = $dir_local['dirname'];
$uri_sinpag = str_replace("/index.php", "",$_SERVER['SERVER_NAME']);
if ($_SERVER['SERVER_NAME']=='localhost')
{
	$dir_host = "http://" . $_SERVER['SERVER_NAME'] . str_replace("/index.php", "",$_SERVER['REQUEST_URI']);
}
else
{
	$dir_host = "http://www." . $_SERVER['SERVER_NAME'] . str_replace("/index.php", "",$_SERVER['REQUEST_URI']);
}
$_SESSION['remota'] = $dir_host;
session_write_close();
?>
<HTML>
 <HEAD>
  <TITLE>DUDAD?!.ES</TITLE>
  <link rel="shortcut icon" href="favicon.ico">
  <link rel="stylesheet" type="text/css" href="pag/global.css" />
</HEAD>
<BODY>
<CENTER><B>Busquemos el punto com&uacute;n entre la duda(?) y la certeza(!)</B></CENTER>
<CENTER><A HREF="pag/actual.php"><IMG SRC="ico/dudad_logo.png" WIDTH="20%" HEIGHT="50%" BORDER="0"></A></CENTER>
<CENTER>Click en el logo para entrar</CENTER>
<CENTER>Primera pista:
<IMG SRC="aeoiu/s.png" BORDER="0"/><IMG SRC="aeoiu/i.png" BORDER="0"/> <IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/r.png" BORDER="0"/><IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/s.png" BORDER="0"/> <IMG SRC="aeoiu/u.png" BORDER="0"/><IMG SRC="aeoiu/n.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/> <IMG SRC="aeoiu/p.png" BORDER="0"/><IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/r.png" BORDER="0"/><IMG SRC="aeoiu/s.png" BORDER="0"/><IMG SRC="aeoiu/o.png" BORDER="0"/><IMG SRC="aeoiu/n.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/> <IMG SRC="aeoiu/d.png" BORDER="0"/><IMG SRC="aeoiu/i.png" BORDER="0"/><IMG SRC="aeoiu/s.png" BORDER="0"/><IMG SRC="aeoiu/p.png" BORDER="0"/><IMG SRC="aeoiu/u.png" BORDER="0"/><IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/s.png" BORDER="0"/><IMG SRC="aeoiu/t.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/> <IMG SRC="aeoiu/a.png" BORDER="0"/> <IMG SRC="aeoiu/k.png" BORDER="0"/><IMG SRC="aeoiu/o.png" BORDER="0"/><IMG SRC="aeoiu/l.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/><IMG SRC="aeoiu/b.png" BORDER="0"/><IMG SRC="aeoiu/o.png" BORDER="0"/><IMG SRC="aeoiu/r.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/><IMG SRC="aeoiu/r.png" BORDER="0"/>, <IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/n.png" BORDER="0"/><IMG SRC="aeoiu/t.png" BORDER="0"/><IMG SRC="aeoiu/o.png" BORDER="0"/><IMG SRC="aeoiu/n.png" BORDER="0"/><IMG SRC="aeoiu/z.png" BORDER="0"/><IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/s.png" BORDER="0"/>, <IMG SRC="aeoiu/e.png" BORDER="0"/><IMG SRC="aeoiu/n.png" BORDER="0"/><IMG SRC="aeoiu/t.png" BORDER="0"/><IMG SRC="aeoiu/r.png" BORDER="0"/><IMG SRC="aeoiu/a.png" BORDER="0"/>.
</CENTER>
<h3>Primeros datos</h3>
<img src="ico/esfr.png" border="0"> Una esfera roja significa que no est&aacute;s dentro (visitante)<br>
<img src="ico/esfa.png" border="0"> Una esfera amarilla significa que est&aacute;s dentro con invitaci&oacute;n (invitad@) O por m&eacute;ritos (notable)<br>
<img src="ico/esfv.png" border="0"> Una esfera verde significa que has entrado en el c&iacute;rculo de confianza <img src="ico/dudad_logo_mini.png" border="0"> (no te esfuerces m&aacute;s, no depende de ti)
<h3>Tu informaci&oacute;n</h3>
<div id="explorador"></div>
<script type="text/javascript">
txt = '<img src="ico/esfg.png" border="0">CodeName del explorador: ' + navigator.appCodeName;
txt+= '<br><img src="ico/esfg.png" border="0">Nombre del explorador: ' + navigator.appName;
txt+= '<br><img src="ico/esfg.png" border="0">Version: ' + navigator.appVersion;
txt+= (navigator.cookieEnabled==true)?'<br><img src="ico/esfg.png" border="0">Cookies activadas':'<br><img src="ico/esfg.png" border="0">Desactivadas las cookies';
txt+= '<br><img src="ico/esfg.png" border="0">Plataforma: ' + navigator.platform;
txt+= '<br><img src="ico/esfg.png" border="0">Agente Usuario: ' + navigator.userAgent;

document.getElementById("explorador").innerHTML=txt;
</script>

</BODY>
</HTML>
<?php
include '../bin/comun.php';
include '../bin/reinicio.php';
include '../bin/dh.php';
include '../bin/control.php';
$cuerpo .= '<br><h1><center>&Uacute;ltimos sucesos en <b>Dudad.es</b></center></h1>';
$cuerpo .= '<table witdh="100%" height="100%" border="0" CELLPADDING="0" CELLSPACING="0" >';
$cuerpo .= '<tr><td width="8px" height="8px" background="../ico/a.png"></td><td background="../ico/e.png" colspan="2"></td><td width="8" height="8" background="../ico/b.png"></td></tr>';
$cuerpo .= '<tr>';
$cuerpo .= '<td width="8px" background="../ico/e.png"></td>';
$cuerpo .= '<td valign="top" background="../ico/e.png"><h2>Mensajes recientes</h2>';
if ($_SESSION['idtemaactual']!=null){include "../bin/mensajes_recientes.php";}
$cuerpo .= '</td>';
$cuerpo .= '<td valign="top" rowspan="2" background="../ico/e.png"><h2>Wikis recientes</h2>';
include "../bin/doku_recientes.php";
$cuerpo .= '</td>';
$cuerpo .= '<td width="8px" background="../ico/e.png" rowspan="2"></td>';
$cuerpo .= '</tr>';
$cuerpo .= '<tr>';
$cuerpo .= '<td width="8px" background="../ico/e.png"></td>';
$cuerpo .= '<td valign="top" background="../ico/e.png"><h2>Foros recientes</h2>';
include "../bin/foros_recientes.php";
$cuerpo .=  '</td>';
$cuerpo .=  '</tr>';
$cuerpo .= '<tr><td width="8px" height="8px" background="../ico/d.png"></td><td background="../ico/e.png" colspan="2"></td><td width="8" height="8" background="../ico/c.png"></td></tr>';
$cuerpo .= '</table>';
include "../bin/menu.php";
include "../bin/template.php";
?>
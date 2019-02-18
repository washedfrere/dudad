<?php
$cuerpo .= '<TABLE width="100%" border="0" CELLPADDING="0" CELLSPACING="0" >';
$cuerpo .= '<tr><td width="8px" height="8px" background="../ico/a.png"></td><td background="../ico/e.png" colspan="2"></td><td width="8" height="8" background="../ico/b.png"></td></tr>';
$cuerpo .= '<tr><td width="8px" background="../ico/e.png"></td>';
$cuerpo .= '<TD background="../ico/e.png">';
if ($CLASE < CLASE_MEDIA)
{
$cuerpo .= '
<a href="nuevo_foro.php"
 onmouseOver="document.escrforo.src=\'../ico/escribe.png\';"
 onmouseOut="document.escrforo.src=\'../ico/escribe_no.png\';"
><img src="../ico/escribe_no.png" name="escrforo" alt="nuevo tema" border="0" ></a>
';
}
$cuerpo .= '<h3>Temas</h3>';
$cuerpo .= '<a href="foro.php?buscaforo=1"';
$cuerpo .= 'onmouseOver="document.buscaforo.src=' . "'../ico/lupa.png'" . ';"';
$cuerpo .= 'onmouseOut="document.buscaforo.src=' ."'../ico/lupa_no.png'" .';"';
$cuerpo .= '><img src="../ico/lupa_no.png" name="buscaforo" alt="buscar" border="0" ></a>';
$cuerpo .= '</td><td background="../ico/e.png">';
if ($CLASE < CLASE_BAJA)
{
$cuerpo .= '
<a href="nuevo_mensaje.php"
 onmouseOver="document.escrmens.src=\'../ico/escribe.png\';"
 onmouseOut="document.escrmens.src=\'../ico/escribe_no.png\';"
><img src="../ico/escribe_no.png" name="escrmens" alt="nuevo mensaje" border="0" ></a>
';
}
$cuerpo .= '<b>Mensajes</b> del tema : <h3>' . $_SESSION['temaactual'] . '</h3>';
$cuerpo .= '<a href="foro.php?buscamens=1"';
$cuerpo .= ' onmouseOver="document.buscamens.src=' . "'../ico/lupa.png'" . ';"';
$cuerpo .= ' onmouseOut="document.buscamens.src=' . "'../ico/lupa_no.png'" . ';"';
$cuerpo .= '><img src="../ico/lupa_no.png" name="buscamens" alt="buscar" border="0" ></a>';

$cuerpo .= '</td><td width="8px" background="../ico/e.png"></td></tr>';
$cuerpo .= '<tr><td width="8px" background="../ico/e.png"></td>';
$cuerpo .= '<td valign="top" background="../ico/e.png">';
include "../bin/consulta_foros.php";
$cuerpo .= '</td><td valign="top" background="../ico/e.png">';
if ($_SESSION['idtemaactual']!=null){include "../bin/consulta_mensajes.php";}
$cuerpo .= '</td><td width="8px" background="../ico/e.png"></td></tr>';
$cuerpo .= '<tr><td width="8px" height="8px" background="../ico/d.png"></td><td background="../ico/e.png"  colspan="2"></td><td width="8" height="8" background="../ico/c.png"></td></tr>';
$cuerpo .= '</table>';
?>
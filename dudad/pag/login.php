<?php
include '../bin/comun.php';
include '../bin/reinicio.php';
include '../bin/dh.php';
include '../bin/control.php';

ob_start(); ?>
<script type="text/javascript">
function validaclave1()
{
var clavea=document.forms["valclave1"]["llaven"].value
var claveb=document.forms["valclave1"]["llavenn"].value
if (clavea!=claveb)
  {
  alert("Las claves no coinciden");
  return false;
  }
}
function validaclavenew()
{
var clavea=document.forms["valclavenew"]["llavenew"].value
var claveb=document.forms["valclavenew"]["llavenewb"].value
if (clavea!=claveb)
  {
  alert("Las claves no coinciden");
  return false;
  }
}
</script>
<?php
echo $_SESSION['msgusuario']."<br>";
?>
<table border="0" align="center"><tr>
<?php
if($USUARIO==USERGUEST)
{ echo '
<td align="right" valign="top">
<h2>Usuario de conexi&oacute;n</h2>
<form action="" method="post" name="conecta">
<label>Usuario: </label><br><input type="text" name="username" />
<br><br><label>Contrase&ntilde;a: </label><br><input type="password" name="llave" />
<br><br><input type="submit" value="Entrar" style="cursor:pointer"/>
</form>';
}
if($USUARIO!=USERGUEST)
{
echo '
<td align="right" valign="top">
<h2>Cambio de clave</h2>
<form action="" method="post" name="valclave1" onsubmit="return validaclave1();">
<label>Usuario: </label><br><input type="text" name="username" />
<br><br><label>Contrase&ntilde;a: </label><br><input type="password" name="llave" />
<br><br><label>Nueva: </label><br><input type="password" name="llaven" />
<br><br><label>Repetir: </label><br><input type="password" name="llavenn" />
<br><br><input type="submit" value="Nueva Clave" style="cursor:pointer"/>
</form>';
echo '
<td align="right" valign="top">
<h2>Desconectarse</h2>
<form action="../index.php" method="post">
<input type="submit" value="Desconectar" style="cursor:pointer"/>
</form>';}
if ((isset($_GET['dafero']) && $_GET['dafero']='espartaco') || $CLASE<=CLASE_ALTA )
{
echo '
<tr><td align="right" valign="top">
<h2>Nuevo Usuario</h2>
<form action="" method="post" name="valclavenew" onsubmit="return validaclavenew();">
<label>Usuario: </label><br><input type="text" name="usernew" />
<br><br><label>Clase: </label><br><select type="text" name="nivelnew" /><option>' . CLASE_BAJA . '</option><option>' . CLASE_MEDIA . '</option><option>' . CLASE_ALTA . '</option></select>
<br><br><label>Contrase&ntilde;a: </label><br><input type="password" name="llavenew" />
<br><br><label>Repetir: </label><br><input type="password" name="llavenewb" />
<br><br><input type="submit" value="Nuevo Usuario" style="cursor:pointer"/>
</form></tr>';}
?>
</tr></table>
<?php
$cuerpo .= ob_get_clean();
include "../bin/menu.php";
include "../bin/template.php";
?>
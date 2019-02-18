<?php
$zzd = "http://www.dudad.es/"; //Dirección para el menú
$estilo = $zzd . 'pag/global';
 ob_start(); ?>
<div style="width: 137px;
			height: 22px;
			background: transparent url(<?php echo $zzd ?>ico/backmenu.png) top left no-repeat;
			position: absolute;
			top: 0;
			left: 50%;
			margin-left: -68px;
			padding: 0px 0px 0px 4px;
			font: 21px Arial;"
><a href="<?php echo $zzd ?>pag/actual.php"
	title="Actual"
><img src="<?php echo $zzd ?>ico/actual.png"
	alt="A"
	border="0"
/></a><a href="<?php echo $zzd ?>pag/login.php"
	title="Login"
><img src="<?php echo $zzd ?>ico/login.png"
	alt="L"
	border="0"
/></a><a href="<?php echo $zzd ?>pag/foro.php"
	title="Foro"
><img src="<?php echo $zzd ?>ico/foro.png"
	alt="F"
	border="0"
/></a><a href="<?php echo $zzd ?>pag/dokuwiki/doku.php"
	title="WKI"
><img src="<?php echo $zzd ?>ico/wiki.png"
	alt="W"
	border="0"
/></a><a href="<?php echo $zzd ?>pag/EasyGallery.php"
	title="Galeria"
><img src="<?php echo $zzd ?>ico/galeria.png"
	alt="G"
	border="0"
/></a><?php
if (isset($_SESSION['clase']) && $_SESSION['clase']<=100)
echo '<a href="' . $zzd . 'pag/pgrfilemanager/PGRFileManager.php"
	title="Colaborar"
><img src="' . $zzd . 'ico/colabor.png"
	alt="C"
	border="0"
/></a>';
?></div>
<?php $cuerpo .= ob_get_clean();?>
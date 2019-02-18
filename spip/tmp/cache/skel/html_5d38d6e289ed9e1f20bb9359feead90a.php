<?php
/*
 * Squelette : plugins/auto/ahuntsic/styles.html
 * Date :      Sat, 25 Apr 2009 15:33:46 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (4.0ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/auto/ahuntsic/styles.html.
//
function html_5d38d6e289ed9e1f20bb9359feead90a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_style.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('spip_formulaires.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('styles/base.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/alter.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/habillages.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/perso.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(find_in_path('styles/color.css'))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'
	' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('styles/print.css')))))!=='' ?
		((	'<link rel="stylesheet" href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '" type="text/css" media="print" />') :
		'') .
'


' .
pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>
' .
(($t1 = strval(interdire_scripts(find_in_path('js/base.js'))))!=='' ?
		((	'<script src="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(find_in_path('js/perso.js'))))!=='' ?
		((	'<script src="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/') . $t1 . '"  type="text/javascript"></script>') :
		'') .
'
	


<!--[if lte IE 6]>
	<style>
		#menu-rubriques a { height: 1em; }
		#menu-rubriques li { height: 1em; float: left; clear: both;width: 100%; }
	</style>
	<![endif]-->

<!--[if IE 6]>
	<style>
		#menu-rubriques li { clear: none;}
	</style>
	<![endif]-->

<!--[if lt IE 8]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.0(beta3)/IE8.js" type="text/javascript"></script>
	<style>
		#menu-recherche{width:16em;margin-top:-4px;}
		#menu-recherche #recherche{width:10em;margin-top:-4px;}
	</style>

<![endif]-->
');

	return analyse_resultat_skel('html_5d38d6e289ed9e1f20bb9359feead90a', $Cache, $page, 'plugins/auto/ahuntsic/styles.html');
}

?>
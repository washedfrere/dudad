<?php
/*
 * Squelette : squelettes-dist/inc-head.html
 * Date :      Tue, 24 Feb 2009 17:33:52 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (2.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/inc-head.html.
//
function html_75f908390e10da9c8c116727a580ab2e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />


<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />


' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'<link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site',array()) .
	'" href="') . $t1 . '" />') :
		'') .
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
(($t1 = strval(interdire_scripts(direction_css(find_in_path('habillage.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="projection, screen, tv" />') :
		'') .
'


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('impression.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="print" />') :
		'') .
'


' .
(($t1 = strval(interdire_scripts(direction_css(find_in_path('perso.css')))))!=='' ?
		('<link rel="stylesheet" href="' . $t1 . '" type="text/css" media="all" />') :
		'') .
'


' .
pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>');

	return analyse_resultat_skel('html_75f908390e10da9c8c116727a580ab2e', $Cache, $page, 'squelettes-dist/inc-head.html');
}

?>
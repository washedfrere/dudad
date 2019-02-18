<?php
/*
 * Squelette : prive/spip_pass.html
 * Date :      Sat, 06 Dec 2008 20:29:02 GMT
 * Compile :   Sat, 19 Jun 2010 16:15:31 GMT (0.096s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/spip_pass.html.
//
function html_43a47f000baf6006a044751471e023d7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<'.'?php header("' . (	'Content-Type: text/html; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_mot_oublie',array()) .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
<meta name="robots" content="none" />
<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
' .
(($t1 = strval(interdire_scripts(find_in_path('favicon.ico'))))!=='' ?
		('<link rel="shortcut icon" href="' . $t1 . '" />') :
		'') .
'
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('spip_style.css'))) .
'" type="text/css" />
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('minipres.css'))) .
'" type="text/css" />
<link rel="stylesheet" href="' .
interdire_scripts(direction_css(find_in_path('spip_formulaires.css'))) .
'" type="text/css" />


' .
pipeline('insert_head','<!-- insert_head -->'). '<?php header("X-Spip-Filtre: '.'compacte_head' . '"); ?'.'>' .
'

</head>
<body class=\'pass\' >

<div id=\'minipres\'>

	<h3 class="spip">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</h3>
		
	<div class="formulaire_spip pass">
		' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['p']),true)) ?'' :' '))))!=='' ?
		($t1 . (	'
		  ' .
	executer_balise_dynamique('FORMULAIRE_OUBLI',
	array(),
	array(''), $GLOBALS['spip_lang'],15) .
	'
		')) :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['p']),true)) ?' ' :''))))!=='' ?
		($t1 . (	'
		  ' .
	executer_balise_dynamique('FORMULAIRE_MOT_DE_PASSE',
	array(),
	array(''), $GLOBALS['spip_lang'],16) .
	'
		')) :
		'') .
'
	</div>
	<div style=\'text-align:' .
lang_dir(@$Pile[0]['lang'], 'right','left') .
'\'>
	<script type="text/javascript"><!--
	document.write("<a style=\'color: #e86519\' href=\'")
	document.write((window.opener) ? "javascript:close()" : "./")
	document.write("\'>' .
_T('public/spip/ecrire:pass_quitter_fenetre',array()) .
'<" + "/a>");
	//--></script>
	<noscript>
		&#91;<a href=\'./\'>' .
_T('public/spip/ecrire:pass_retour_public',array()) .
'</a>&#93;
	</noscript>
	</div>
	
</div><!--#minipres-->

</body>
</html>');

	return analyse_resultat_skel('html_43a47f000baf6006a044751471e023d7', $Cache, $page, 'prive/spip_pass.html');
}

?>
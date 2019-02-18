<?php
/*
 * Squelette : squelettes-dist/identifiants.html
 * Date :      Wed, 05 Nov 2008 20:03:58 GMT
 * Compile :   Sat, 19 Jun 2010 16:15:27 GMT (0.055s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/identifiants.html.
//
function html_b860cb4a2bcac4efb67ba37d83ea19ee($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-Type: text/html' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_vousinscrire',array()) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>
<body class="page_sommaire">
' .
executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(interdire_scripts(entites_html((@$Pile[0]['mode']),true)),interdire_scripts(entites_html((@$Pile[0]['focus']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true))),
	array(''), $GLOBALS['spip_lang'],11) .
'</body>
</html>
');

	return analyse_resultat_skel('html_b860cb4a2bcac4efb67ba37d83ea19ee', $Cache, $page, 'squelettes-dist/identifiants.html');
}

?>
<?php
/*
 * Squelette : squelettes-dist/404.html
 * Date :      Wed, 26 Nov 2008 16:19:10 GMT
 * Compile :   Tue, 12 Jan 2010 09:40:13 GMT (0.047s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/404.html.
//
function html_843d86e2f9fed4bf5cba3118fdd44184($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . 'HTTP/1.0 404 Not Found' . '"); ?'.'>' .
'<'.'?php header("' . 'Cache-Control: no-store, no-cache, must-revalidate' . '"); ?'.'>' .
'<'.'?php header("' . 'Pragma: no-cache' . '"); ?'.'><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404 - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
<meta name="robots" content="none" />
</head>
<body class="page_404">
	<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	<div id="conteneur">
    <div id="contenu">

        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a> &gt; <strong class="on">' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404</strong></div>

        <div class="cartouche">
        <h1>' .
_T('public/spip/ecrire:pass_erreur',array()) .
' 404</h1>
        </div>
        ' .
(($t1 = strval(interdire_scripts(propre((@$Pile[0]['erreur'])))))!=='' ?
		('<div class="chapo">' . $t1 . '</div>') :
		'') .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],37) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/404.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	</div><!--#page-->
</body>
</html>
');

	return analyse_resultat_skel('html_843d86e2f9fed4bf5cba3118fdd44184', $Cache, $page, 'squelettes-dist/404.html');
}

?>
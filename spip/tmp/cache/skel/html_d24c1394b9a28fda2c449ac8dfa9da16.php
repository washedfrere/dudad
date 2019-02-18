<?php
/*
 * Squelette : squelettes-dist/inc-entete.html
 * Date :      Sat, 15 Nov 2008 14:10:58 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (0.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/inc-entete.html.
//
function html_d24c1394b9a28fda2c449ac8dfa9da16($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="entete">
<a rel="start home" href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
'" class="accueil">' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', ''),'300','100'))))!=='' ?
		($t1 . ' ') :
		'') .
'<strong id="nom_site_spip">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</strong></a>
' .
executer_balise_dynamique('MENU_LANG',
	array(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])),
	array(''), $GLOBALS['spip_lang'],3) .
'
</div>
');

	return analyse_resultat_skel('html_d24c1394b9a28fda2c449ac8dfa9da16', $Cache, $page, 'squelettes-dist/inc-entete.html');
}

?>
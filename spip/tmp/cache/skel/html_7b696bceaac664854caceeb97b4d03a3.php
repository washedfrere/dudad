<?php
/*
 * Squelette : prive/formulaires/inc-logo_auteur.html
 * Date :      Thu, 28 Aug 2008 17:36:36 GMT
 * Compile :   Thu, 14 May 2009 18:16:32 GMT (1.4ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/formulaires/inc-logo_auteur.html.
//
function html_7b696bceaac664854caceeb97b4d03a3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-type:text/html;charset=' .
	interdire_scripts(entites_html((@$Pile[0]['charset']),true))) . '"); ?'.'>' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_auteur', 'ON', @$Pile[0]['id_auteur'],'',  ''), '', ''),'100','80')) .
'
');

	return analyse_resultat_skel('html_7b696bceaac664854caceeb97b4d03a3', $Cache, $page, 'prive/formulaires/inc-logo_auteur.html');
}

?>
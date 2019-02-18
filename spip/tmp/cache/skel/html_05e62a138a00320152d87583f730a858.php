<?php
/*
 * Squelette : prive/rss.html
 * Date :      Sat, 06 Sep 2008 16:38:02 GMT
 * Compile :   Sat, 16 May 2009 12:00:44 GMT (0.015s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/rss.html.
//
function html_05e62a138a00320152d87583f730a858($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-Type: text/xml; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'>' .
recuperer_fond('',$l =  array_merge($Pile[0],array('fond' => (	'prive/rss/' .
	interdire_scripts(entites_html((@$Pile[0]['op']),true))) )), array('etoile'=>true), ''));

	return analyse_resultat_skel('html_05e62a138a00320152d87583f730a858', $Cache, $page, 'prive/rss.html');
}

?>
<?php
/*
 * Squelette : ../prive/contenu/item_rss_plugin.html
 * Date :      Tue, 11 Nov 2008 18:38:58 GMT
 * Compile :   Thu, 14 May 2009 16:48:35 GMT (0.015s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/contenu/item_rss_plugin.html.
//
function html_650e90a6423bc89976a84b936fa4f1b2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-Type: text/html; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'><h3>' .
interdire_scripts(typo(@$Pile[0]['titre'], "TYPO", $connect)) .
'</h3>
' .
(($t1 = strval(interdire_scripts(propre(@$Pile[0]['descriptif'], $connect))))!=='' ?
		('<div class=\'descriptif\'>' . $t1 . '</div>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(propre(entites_html((@$Pile[0]['lesauteurs']),true)))))!=='' ?
		('<p class=\'lesauteurs\'>' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(propre(implode(entites_html((@$Pile[0]['tags']),true),' &mdash; ')))))!=='' ?
		('<p class=\'tags\'>' . $t1 . '</p>') :
		'') .
'
<span class=\'url\'><a href=\'' .
interdire_scripts(attribut_html(entites_html((@$Pile[0]['url']),true))) .
'\'>' .
interdire_scripts(textebrut(entites_html((@$Pile[0]['url']),true))) .
'</a></span>');

	return analyse_resultat_skel('html_650e90a6423bc89976a84b936fa4f1b2', $Cache, $page, '../prive/contenu/item_rss_plugin.html');
}

?>
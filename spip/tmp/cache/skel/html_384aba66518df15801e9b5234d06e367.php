<?php
/*
 * Squelette : ../prive/editer/article.html
 * Date :      Tue, 22 Jul 2008 08:09:46 GMT
 * Compile :   Thu, 14 May 2009 17:35:07 GMT (7.2ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/editer/article.html.
//
function html_384aba66518df15801e9b5234d06e367($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:texte_modifier_article',array()) .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_ARTICLE',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_trad']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true)),interdire_scripts(entites_html((@$Pile[0]['row']),true))),
	array(''), $GLOBALS['spip_lang'],7) .
'</div>
');

	return analyse_resultat_skel('html_384aba66518df15801e9b5234d06e367', $Cache, $page, '../prive/editer/article.html');
}

?>
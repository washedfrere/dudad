<?php
/*
 * Squelette : ../prive/editer/auteur.html
 * Date :      Mon, 21 Jul 2008 21:08:36 GMT
 * Compile :   Thu, 14 May 2009 18:16:53 GMT (3.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/editer/auteur.html.
//
function html_fd47c1b35f575ea389456b66a82275f0($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_auteur',array()) .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_AUTEUR',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_id_article']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true)),(@$Pile[0]['auteur'])),
	array(''), $GLOBALS['spip_lang'],6) .
'</div>
');

	return analyse_resultat_skel('html_fd47c1b35f575ea389456b66a82275f0', $Cache, $page, '../prive/editer/auteur.html');
}

?>
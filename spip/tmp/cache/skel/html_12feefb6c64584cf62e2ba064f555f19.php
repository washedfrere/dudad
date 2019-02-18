<?php
/*
 * Squelette : ../prive/editer/rubrique.html
 * Date :      Fri, 04 Jul 2008 07:55:48 GMT
 * Compile :   Thu, 14 May 2009 16:56:27 GMT (0.031s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/editer/rubrique.html.
//
function html_12feefb6c64584cf62e2ba064f555f19($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'cadre-formulaire-editer\'>
<div class="entete-formulaire">
	' .
(@$Pile[0]['icone_retour']) .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
		((	_T('public/spip/ecrire:info_modifier_rubrique',array()) .
	'
	<h1>') . $t1 . '</h1>') :
		'') .
'
</div>
' .
executer_balise_dynamique('FORMULAIRE_EDITER_RUBRIQUE',
	array(interdire_scripts(entites_html((@$Pile[0]['new']),true)),interdire_scripts(entites_html((@$Pile[0]['id_rubrique']),true)),interdire_scripts(entites_html((@$Pile[0]['redirect']),true)),interdire_scripts(entites_html((@$Pile[0]['lier_trad']),true)),interdire_scripts(entites_html((@$Pile[0]['config_fonc']),true))),
	array(''), $GLOBALS['spip_lang'],6) .
'</div>
');

	return analyse_resultat_skel('html_12feefb6c64584cf62e2ba064f555f19', $Cache, $page, '../prive/editer/rubrique.html');
}

?>
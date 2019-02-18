<?php
/*
 * Squelette : squelettes-dist/formulaires/recherche.html
 * Date :      Tue, 14 Oct 2008 19:41:40 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (1.0ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/formulaires/recherche.html.
//
function html_35cfb8bb802f6d7be6e04761cbe4f7bf($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_recherche" id="formulaire_recherche">
<form action="' .
interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
'" method="get"><div>
	' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['action']),true))) .
'
	' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['lang']),true))))!=='' ?
		('<input type="hidden" name="lang" value="' . $t1 . '" />') :
		'') .
'
	<label for="recherche">' .
_T('public/spip/ecrire:info_rechercher_02',array()) .
'</label>
	<input type="text" class="text" size="10" name="recherche" id="recherche"' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['recherche']),true))))!=='' ?
		(' value="' . $t1 . '"') :
		'') .
' accesskey="4" />
	<input type="submit" class="submit" value="&gt;&gt;" title="' .
_T('public/spip/ecrire:info_rechercher',array()) .
'" />
</div></form>
</div>
');

	return analyse_resultat_skel('html_35cfb8bb802f6d7be6e04761cbe4f7bf', $Cache, $page, 'squelettes-dist/formulaires/recherche.html');
}

?>
<?php
/*
 * Squelette : squelettes-dist/modeles/favicon.html
 * Date :      Tue, 24 Feb 2009 17:33:52 GMT
 * Compile :   Fri, 15 May 2009 22:01:56 GMT (1.4ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/modeles/favicon.html.
//
function html_d9d04a13b2f9c75b94a64ab5d3b613bc($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = strval(interdire_scripts((strlen($a = extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',(strlen($a = (strlen($a = (@$Pile[0]['favicon'])) ? $a : interdire_scripts(find_in_path('favicon.ico')))) ? $a : affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', '')),'32','32'),'32','32','center'),'ico')),'src')) ? $a : interdire_scripts(find_in_path('spip.ico'))))))!=='' ?
		('<link rel="shortcut icon" href="' . $t1 . '" type="image/x-icon" />') :
		'') .
'
');

	return analyse_resultat_skel('html_d9d04a13b2f9c75b94a64ab5d3b613bc', $Cache, $page, 'squelettes-dist/modeles/favicon.html');
}

?>
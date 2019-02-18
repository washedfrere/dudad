<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bandeau.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.8ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bandeau.html.
//
function html_1880c9be5afcc7157fa218385afd3f8e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- L\'entete du site -->
<div id="entete">
	<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'" class="nom-site"><span>' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</span></a>


  
</div><!-- entete -->');

	return analyse_resultat_skel('html_1880c9be5afcc7157fa218385afd3f8e', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bandeau.html');
}

?>
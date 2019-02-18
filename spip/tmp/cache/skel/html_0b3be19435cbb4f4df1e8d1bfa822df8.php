<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bas_cc.html
 * Date :      Sun, 21 Dec 2008 18:27:46 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bas_cc.html.
//
function html_0b3be19435cbb4f4df1e8d1bfa822df8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- Creative Commons License -->

<p>
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" accesskey="8"><img alt="Creative Commons License" style="border: 0;" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a> 
</p>');

	return analyse_resultat_skel('html_0b3be19435cbb4f4df1e8d1bfa822df8', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bas_cc.html');
}

?>
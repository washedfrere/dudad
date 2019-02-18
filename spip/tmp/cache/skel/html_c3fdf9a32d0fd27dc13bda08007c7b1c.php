<?php
/*
 * Squelette : ../plugins/auto/compositions/prive/editer/compositions.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 18:19:16 GMT (2.4ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/compositions/prive/editer/compositions.html.
//
function html_c3fdf9a32d0fd27dc13bda08007c7b1c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = strval(recuperer_fond('',$l =  array_merge($Pile[0],array('fond' => 'prive/editer/inc-compositions' )), array(), '')))!=='' ?
		((	'<div class="cadre" id="composition"><h3>' .
	_T('compositions:composition',array()) .
	'</h3>
') . $t1 . '
</div>') :
		'');

	return analyse_resultat_skel('html_c3fdf9a32d0fd27dc13bda08007c7b1c', $Cache, $page, '../plugins/auto/compositions/prive/editer/compositions.html');
}

?>
<?php
/*
 * Squelette : ../plugins/auto/compositions/formulaires/inc-selecteur_composition.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 19:45:22 GMT (0.029s)
 * Boucles :   _pour
 */ 
//
// <BOUCLE pour>
//
function BOUCLE_pourhtml_b1edf1cc92973d9bfca5c41dfecff2c6(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'pour';
	static $id = '_pour';
	static $from = array('pour' => 'pour');
	static $type = array();
	static $groupby = array();
	static $select = array("pour.valeur",
		"pour.cle");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(
			array('tableau', interdire_scripts(entites_html((@$Pile[0]['compositions']),true))));
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'
<div class=\'choix\'>' .
interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',table_valeur($Pile[$SP]['valeur'],'icon'),'24','24')),'class','logo')) .
'
<input type=\'radio\' class=\'radio\' name=\'' .
interdire_scripts(entites_html((@$Pile[0]['name']),true)) .
'\' id=\'' .
interdire_scripts(entites_html((@$Pile[0]['name']),true)) .
'-' .
interdire_scripts($Pile[$SP]['cle']) .
'\' value=\'' .
interdire_scripts($Pile[$SP]['cle']) .
'\'' .
(($t1 = strval(interdire_scripts(((($Pile[$SP]['cle'] == interdire_scripts(entites_html((@$Pile[0]['selected']),true)))) ?' ' :''))))!=='' ?
		($t1 . 'checked=\'checked\'') :
		'') .
'><label for=\'' .
interdire_scripts(entites_html((@$Pile[0]['name']),true)) .
'-' .
interdire_scripts($Pile[$SP]['cle']) .
'\'>' .
interdire_scripts(table_valeur($Pile[$SP]['valeur'],'nom')) .
'</label>
' .
(($t1 = strval(interdire_scripts(table_valeur($Pile[$SP]['valeur'],'description'))))!=='' ?
		('<p class=\'descriptif\'>' . $t1 . '</p>') :
		'') .
'
</div>
');
	}

	@sql_free($result, 'pour');
	return $t0;
}



//
// Fonction principale du squelette ../plugins/auto/compositions/formulaires/inc-selecteur_composition.html.
//
function html_b1edf1cc92973d9bfca5c41dfecff2c6($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = BOUCLE_pourhtml_b1edf1cc92973d9bfca5c41dfecff2c6($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
' . $t1 . '
') :
		'');

	return analyse_resultat_skel('html_b1edf1cc92973d9bfca5c41dfecff2c6', $Cache, $page, '../plugins/auto/compositions/formulaires/inc-selecteur_composition.html');
}

?>
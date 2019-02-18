<?php
/*
 * Squelette : ../prive/infos/breve.html
 * Date :      Sat, 17 Nov 2007 17:20:48 GMT
 * Compile :   Thu, 14 May 2009 17:34:17 GMT (5.9ms)
 * Boucles :   _breve
 */ 
//
// <BOUCLE breves>
//
function BOUCLE_brevehtml_6b0e4158da9053c745881cf4cee115d9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'breves';
	static $id = '_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.id_rubrique",
		"breves.statut");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.id_breve', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('breves.statut',sql_quote($in0)) : 
			array('=', 'breves.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
_T('public/spip/ecrire:info_gauche_numero_breve',array()) .
'<p>' .
$Pile[$SP]['id_breve'] .
'</p></div>


' .
instituer_breve($Pile[$SP]['id_breve'],$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut'])) .
'


' .
voir_en_ligne('breve',$Pile[$SP]['id_breve'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'

</div>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../prive/infos/breve.html.
//
function html_6b0e4158da9053c745881cf4cee115d9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_brevehtml_6b0e4158da9053c745881cf4cee115d9($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_6b0e4158da9053c745881cf4cee115d9', $Cache, $page, '../prive/infos/breve.html');
}

?>
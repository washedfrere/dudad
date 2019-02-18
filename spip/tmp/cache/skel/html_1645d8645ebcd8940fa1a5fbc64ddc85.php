<?php
/*
 * Squelette : squelettes-dist/formulaires/inc-forum_ajouter_mot.html
 * Date :      Thu, 03 Jul 2008 15:21:36 GMT
 * Compile :   Mon, 25 May 2009 08:41:22 GMT (1.0ms)
 * Boucles :   _mot
 */ 
//
// <BOUCLE mots>
//
function BOUCLE_mothtml_1645d8645ebcd8940fa1a5fbc64ddc85(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	if (!(is_array($a = (interdire_scripts(entites_html((@$Pile[0]['ajouter_mot']),true))))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	static $table = 'mots';
	static $id = '_mot';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(mots.id_mot,' . sql_quote($in1) . ')')));
	$where = 
			array(sql_in('mots.id_mot',sql_quote($in1)));
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
'<input type="hidden" name="ajouter_mot[]" value="' .
$Pile[$SP]['id_mot'] .
'" />');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/formulaires/inc-forum_ajouter_mot.html.
//
function html_1645d8645ebcd8940fa1a5fbc64ddc85($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_mothtml_1645d8645ebcd8940fa1a5fbc64ddc85($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_1645d8645ebcd8940fa1a5fbc64ddc85', $Cache, $page, 'squelettes-dist/formulaires/inc-forum_ajouter_mot.html');
}

?>
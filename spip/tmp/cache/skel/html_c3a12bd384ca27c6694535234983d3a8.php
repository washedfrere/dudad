<?php
/*
 * Squelette : squelettes-dist/inc-rubriques.html
 * Date :      Thu, 23 Aug 2007 13:15:10 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (4.1ms)
 * Boucles :   _re, _test_expose, _sous_rubriques, _rubriques
 */ 
//
// <BOUCLE boucle>
//
function BOUCLE_rehtml_c3a12bd384ca27c6694535234983d3a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_sous_rubriques']);
	$t0 = (($t1 = BOUCLE_sous_rubriqueshtml_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
				' . $t1 . '
			</ul>
			') :
		'');
	$Numrows['_sous_rubriques'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_test_exposehtml_c3a12bd384ca27c6694535234983d3a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_test_expose';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_parent'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? ' ' : '');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_sous_rubriqueshtml_c3a12bd384ca27c6694535234983d3a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_parent",
		"rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($t1 = BOUCLE_test_exposehtml_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
					<li><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'"' .
		(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
				(' class="' . 'on' . '"') :
				'') .
		'>' .
		interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
		'</a>' .
		BOUCLE_rehtml_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons, $Numrows, $SP) .
		'	</li>
				')) :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriqueshtml_c3a12bd384ca27c6694535234983d3a8(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	static $where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
		<li>
			<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>

			' .
(($t1 = BOUCLE_sous_rubriqueshtml_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
				' . $t1 . '
			</ul>
			') :
		'') .
'

		</li>
	');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/inc-rubriques.html.
//
function html_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'

' .
(($t1 = BOUCLE_rubriqueshtml_c3a12bd384ca27c6694535234983d3a8($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="menu rubriques">
	<h2>' .
		_T('public/spip/ecrire:rubriques',array()) .
		'</h2>
	<ul>
	') . $t1 . '

	</ul>
</div>
') :
		''));

	return analyse_resultat_skel('html_c3a12bd384ca27c6694535234983d3a8', $Cache, $page, 'squelettes-dist/inc-rubriques.html');
}

?>
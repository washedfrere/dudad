<?php
/*
 * Squelette : ../plugins/auto/compositions/formulaires/inc-selecteur_accueil.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 19:45:22 GMT (4.9ms)
 * Boucles :   _art, _rub
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_arthtml_312a5470999cb79f09fc5b993019a8ad(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_art';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
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
<option value=\'' .
$Pile[$SP]['id_article'] .
'\'' .
((($Pile[$SP]['id_article'] == interdire_scripts(entites_html((@$Pile[0]['selected']),true))))  ?
		(' ' . ' ' . 'selected="selected"') :
		'') .
'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</option>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubhtml_312a5470999cb79f09fc5b993019a8ad(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[0]['id_rubrique'])));
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
<select' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['name']),true))))!=='' ?
		(' name=\'' . $t1 . '\'') :
		'') .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['id']),true))))!=='' ?
		(' id=\'' . $t1 . '\'') :
		'') .
'>
<option value=\'0\'>' .
_T('compositions:aucun_article_accueil',array()) .
'</option>
' .
BOUCLE_arthtml_312a5470999cb79f09fc5b993019a8ad($Cache, $Pile, $doublons, $Numrows, $SP) .
'
</select>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../plugins/auto/compositions/formulaires/inc-selecteur_accueil.html.
//
function html_312a5470999cb79f09fc5b993019a8ad($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_rubhtml_312a5470999cb79f09fc5b993019a8ad($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_312a5470999cb79f09fc5b993019a8ad', $Cache, $page, '../plugins/auto/compositions/formulaires/inc-selecteur_accueil.html');
}

?>
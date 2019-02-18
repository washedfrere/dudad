<?php
/*
 * Squelette : ../plugins/auto/compositions/prive/editer/inc-compositions.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 18:19:16 GMT (5.3ms)
 * Boucles :   _rub, _article
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_rubhtml_5e08777fc5274c09dc097e7b14280e0e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_article_accueil",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
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
((((((((((($Pile[$SP]['id_article_accueil'] == $Pile[$SP-1]['id_article'])) ?'' :' ')) AND (compositions_utiliser_article_accueil(''))) ?' ' :'')) AND (invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('styliser', 'rubrique', invalideur_session($Cache, $Pile[$SP]['id_rubrique']))?" ":"")))) ?' ' :''))  ?
		('
		' . ' ' . (	'
		' .
	'<form class=\'bouton_action_post '.'ajax'.'\' method=\'post\' action=\''.($u=invalideur_session($Cache, generer_action_auteur('accueillir_rubrique',(	invalideur_session($Cache, $Pile[$SP]['id_rubrique']) .
			'-' .
			invalideur_session($Cache, $Pile[$SP-1]['id_article'])),invalideur_session($Cache, self())))).'\'><span>'.form_hidden($u).'<input type=\'submit\' class=\'submit\' value=\''.attribut_html(_T('compositions:choisir_article_accueil',array())).'\' /></span></form> 
		')) :
		'') .
((($Pile[$SP]['id_article_accueil'] == $Pile[$SP-1]['id_article']))  ?
		(' ' . (	_T('compositions:article_en_accueil',array()) .
	'
')) :
		''));
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_5e08777fc5274c09dc097e7b14280e0e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.id_article",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_article', sql_quote(interdire_scripts(((entites_html((@$Pile[0]['type']),true) == 'article') ? interdire_scripts(entites_html((@$Pile[0]['id']),true)):'0')))));
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
		$t0 .= BOUCLE_rubhtml_5e08777fc5274c09dc097e7b14280e0e($Cache, $Pile, $doublons, $Numrows, $SP);
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../plugins/auto/compositions/prive/editer/inc-compositions.html.
//
function html_5e08777fc5274c09dc097e7b14280e0e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_articlehtml_5e08777fc5274c09dc097e7b14280e0e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<div class="accueil">
' . $t1 . '</div>') :
		'') .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_EDITER_COMPOSITION_OBJET',
	array(interdire_scripts(entites_html((@$Pile[0]['type']),true)),interdire_scripts(entites_html((@$Pile[0]['id']),true))),
	array(''), $GLOBALS['spip_lang'],10)))!=='' ?
		('
' . $t1) :
		''));

	return analyse_resultat_skel('html_5e08777fc5274c09dc097e7b14280e0e', $Cache, $page, '../plugins/auto/compositions/prive/editer/inc-compositions.html');
}

?>
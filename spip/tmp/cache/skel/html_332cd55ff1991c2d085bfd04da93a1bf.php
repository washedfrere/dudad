<?php
/*
 * Squelette : ../prive/infos/rubrique.html
 * Date :      Tue, 25 Nov 2008 17:31:24 GMT
 * Compile :   Thu, 14 May 2009 16:55:56 GMT (0.027s)
 * Boucles :   _arts, _breves, _sites, _docs, _rubs, _rub
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_artshtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_arts';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
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
	$Numrows['_arts']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	for($x=$Numrows["_arts"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breveshtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_breves']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	for($x=$Numrows["_breves"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_siteshtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_sites']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	for($x=$Numrows["_sites"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_docshtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_docs';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet="article")
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet="breve")
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet="rubrique")
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet="forum")
		','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("1");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')));
	static $join = array('L1' => array('documents','id_document'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_docs']['total'] = @intval(sql_count($result, ''));
	$t0 = "";
	for($x=$Numrows["_docs"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubshtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubs';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
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
	$Numrows['_rubs']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	for($x=$Numrows["_rubs"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubhtml_332cd55ff1991c2d085bfd04da93a1bf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'rubriques';
	static $id = '_rub';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.statut");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in0)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
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
_T('public/spip/ecrire:titre_numero_rubrique',array()) .
'<p>' .
$Pile[$SP]['id_rubrique'] .
'</p></div>


' .
'
<div class=\'nb_elements\'>
' .
(($t1 = BOUCLE_artshtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		$Numrows['_arts']['total'] .
		' ' .
		_T('public/spip/ecrire:info_articles',array()) .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_breveshtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		$Numrows['_breves']['total'] .
		' ' .
		_T('public/spip/ecrire:info_breves_02',array()) .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_siteshtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		$Numrows['_sites']['total'] .
		' ' .
		_T('public/spip/ecrire:info_sites',array()) .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_docshtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		$Numrows['_docs']['total'] .
		' ' .
		_T('public/spip/ecrire:info_documents',array()) .
		'</div>')) :
		'') .
'
' .
(($t1 = BOUCLE_rubshtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'<div>' .
		$Numrows['_rubs']['total'] .
		' ' .
		_T('public/spip/ecrire:info_rubriques',array()) .
		'</div>')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['n_forums'],''),true) ? ' ':''))))!=='' ?
		('<p class=\'forums\'>' . $t1 . (	_T('icone_suivi_forum',array('nb_forums' => interdire_scripts(entites_html((@$Pile[0]['n_forums']),true)))) .
	'</p>')) :
		'') .
'
</div>


' .
voir_en_ligne('rubrique',$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'




</div>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../prive/infos/rubrique.html.
//
function html_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_rubhtml_332cd55ff1991c2d085bfd04da93a1bf($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_332cd55ff1991c2d085bfd04da93a1bf', $Cache, $page, '../prive/infos/rubrique.html');
}

?>
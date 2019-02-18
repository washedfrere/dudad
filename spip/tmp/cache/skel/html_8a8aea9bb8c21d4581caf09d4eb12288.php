<?php
/*
 * Squelette : ../prive/infos/auteur.html
 * Date :      Sun, 06 Jul 2008 09:27:58 GMT
 * Compile :   Thu, 14 May 2009 18:16:53 GMT (6.1ms)
 * Boucles :   _arts, _forum, _auteur
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_artshtml_8a8aea9bb8c21d4581caf09d4eb12288(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_arts';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])), 
			array('NOT', 
			array('=', 'articles.statut', "'poubelle'")));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_arts']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forumhtml_8a8aea9bb8c21d4581caf09d4eb12288(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forum';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_auteur', sql_quote($Pile[$SP]['id_auteur'])), 
			array('NOT', 
			array('=', 'forum.statut', "'poubelle'")));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_forum']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurhtml_8a8aea9bb8c21d4581caf09d4eb12288(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'auteurs';
	static $id = '_auteur';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.statut");
	static $orderby = array();
	$where = 
			array(
			array('=', 'auteurs.id_auteur', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('auteurs.statut',sql_quote($in0)) : 
			array('=', 'auteurs.statut', sql_quote($Pile[0]['statut'])))));
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
_T('public/spip/ecrire:titre_cadre_numero_auteur',array()) .
'<p>' .
$Pile[$SP]['id_auteur'] .
'</p></div>
<div class=\'nb_elements\'>
' .
BOUCLE_artshtml_8a8aea9bb8c21d4581caf09d4eb12288($Cache, $Pile, $doublons, $Numrows, $SP)
. (($t2 = strval(interdire_scripts((($Pile[$SP]['statut'] <> '6forum') ? ' ':''))))!=='' ?
			($t2 . (	'<div' .
		($Numrows['_arts']['total'] ? '':' class="noinfo"') .
		'>' .
		$Numrows['_arts']['total'] .
		' ' .
		_T('public/spip/ecrire:info_articles',array()) .
		'</div>')) :
			'') .
'
' .
BOUCLE_forumhtml_8a8aea9bb8c21d4581caf09d4eb12288($Cache, $Pile, $doublons, $Numrows, $SP)
. (	'<div' .
	($Numrows['_forum']['total'] ? '':' class="noinfo"') .
	'>' .
	$Numrows['_forum']['total'] .
	' ' .
	_T('public/spip/ecrire:messages',array()) .
	'</div>') .
'
</div>
</div>

' .
voir_en_ligne('auteur',$Pile[$SP]['id_auteur'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../prive/infos/auteur.html.
//
function html_8a8aea9bb8c21d4581caf09d4eb12288($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_auteurhtml_8a8aea9bb8c21d4581caf09d4eb12288($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_8a8aea9bb8c21d4581caf09d4eb12288', $Cache, $page, '../prive/infos/auteur.html');
}

?>
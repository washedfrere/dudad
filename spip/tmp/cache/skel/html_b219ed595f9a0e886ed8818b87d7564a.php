<?php
/*
 * Squelette : ../prive/infos/article.html
 * Date :      Sat, 17 Nov 2007 17:20:48 GMT
 * Compile :   Thu, 14 May 2009 17:37:20 GMT (9.4ms)
 * Boucles :   _art
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_arthtml_b219ed595f9a0e886ed8818b87d7564a(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'articles';
	static $id = '_art';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.id_rubrique",
		"articles.statut",
		"articles.visites",
		"articles.id_version");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('articles.statut',sql_quote($in0)) : 
			array('=', 'articles.statut', sql_quote($Pile[0]['statut'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$l1 = _T('info_historique_lien');
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
<div class=\'infos\'>
<div class=\'numero\'>' .
_T('public/spip/ecrire:info_numero_article',array()) .
'<p>' .
$Pile[$SP]['id_article'] .
'</p></div>


' .
instituer_article($Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],interdire_scripts($Pile[$SP]['statut'])) .
'



' .
voir_en_ligne('article',$Pile[$SP]['id_article'],interdire_scripts($Pile[$SP]['statut']),'racine-24.gif','0','0') .
'







' .
interdire_scripts(((((((is_array($a = ($GLOBALS["meta"])) ? $a['activer_statistiques'] : "") == 'oui') ? interdire_scripts($Pile[$SP]['statut']):'') == 'publie') ? invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('voirstats', 'article', invalideur_session($Cache, $Pile[$SP]['id_article']))?" ":"")):'') ? interdire_scripts(bouton_lien_statistiques($Pile[$SP]['visites'],$Pile[$SP]['id_article'])):'')) .
'




' .
interdire_scripts((((((is_array($a = ($GLOBALS["meta"])) ? $a['articles_versions'] : "") == 'oui') ? $Pile[$SP]['id_version']:'') ? invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('voirrevisions', 'article', invalideur_session($Cache, $Pile[$SP]['id_article']))?" ":"")):'') ? (	icone_horizontale($l1,(	'?exec=articles_versions&amp;id_article=' .
		$Pile[$SP]['id_article']),'historique-24.gif','rien.gif','0') .
	'
'):'')) .
'

</div>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../prive/infos/article.html.
//
function html_b219ed595f9a0e886ed8818b87d7564a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_arthtml_b219ed595f9a0e886ed8818b87d7564a($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_b219ed595f9a0e886ed8818b87d7564a', $Cache, $page, '../prive/infos/article.html');
}

?>
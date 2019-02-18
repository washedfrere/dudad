<?php
/*
 * Squelette : prive/rss/a_suivre.html
 * Date :      Fri, 10 Oct 2008 07:06:20 GMT
 * Compile :   Sat, 16 May 2009 12:00:44 GMT (0.015s)
 * Boucles :   _AA, _A, _B, _S, 0
 */ 
//
// <BOUCLE auteurs>
//
function BOUCLE_AAhtml_3138bed0f9323dc2f438ff55bb825f3e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_AA';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.nom",
		"auteurs.email");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
	static $limit = '0,1';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'<dc:creator>' .
interdire_scripts(texte_backendq(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
(($t1 = strval(interdire_scripts(texte_backendq($Pile[$SP]['email']))))!=='' ?
		(' &lt;' . $t1 . '&gt;') :
		'') .
'</dc:creator>');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_Ahtml_3138bed0f9323dc2f438ff55bb825f3e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_A';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.date",
		"articles.titre",
		"articles.lang",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif");
	static $orderby = array('articles.date DESC');
	static $where = 
			array(
			array('=', 'articles.statut', "'prop'"));
	static $join = array();
	static $limit = '0,10';
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
$rss[\'' .
interdire_scripts(date_ical(normaliser_date($Pile[$SP]['date']))) .
'\'] .= \'
	<item>
		<title>' .
texte_backendq(_T('public/spip/ecrire:info_article_propose',array())) .
' : ' .
interdire_scripts(texte_backendq(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</title>
		<link>' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('articles',(	'id_article=' .
	$Pile[$SP]['id_article']))))) .
'</link>
		<guid isPermaLink="true">' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('articles',(	'id_article=' .
	$Pile[$SP]['id_article']))))) .
'</guid>
		<dc:date>' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'</dc:date>
		<dc:format>text/html</dc:format>
		' .
(($t1 = strval(texte_backendq(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		('<dc:language>' . $t1 . '</dc:language>') :
		'') .
'
	' .
BOUCLE_AAhtml_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		<description>' .
interdire_scripts(texte_backendq(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))) .
'</description>
	</item>\';
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_Bhtml_3138bed0f9323dc2f438ff55bb825f3e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_B';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.titre",
		"breves.id_breve",
		"breves.lang",
		"breves.texte");
	static $orderby = array('breves.date_heure DESC');
	static $where = 
			array(
			array('=', 'breves.statut', "'prop'"));
	static $join = array();
	static $limit = '0,10';
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
$rss[\'' .
interdire_scripts(date_ical(normaliser_date($Pile[$SP]['date']))) .
'\'] .= \'
	<item>
		<title>' .
texte_backendq(_T('public/spip/ecrire:titre_breve_proposee',array())) .
' : ' .
interdire_scripts(texte_backendq(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</title>
		<link>' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('breves_voir',(	'id_breve=' .
	$Pile[$SP]['id_breve']))))) .
'</link>
		<guid isPermaLink="true">' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('breves_voir',(	'id_breve=' .
	$Pile[$SP]['id_breve']))))) .
'</guid>
		<dc:date>' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'</dc:date>
		<dc:format>text/html</dc:format>
		' .
(($t1 = strval(texte_backendq(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		('<dc:language>' . $t1 . '</dc:language>') :
		'') .
'
		<description>' .
interdire_scripts(texte_backendq(propre($Pile[$SP]['texte'], $connect))) .
'</description>
	</item>\';
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndic>
//
function BOUCLE_Shtml_3138bed0f9323dc2f438ff55bb825f3e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_S';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.date",
		"syndic.id_syndic");
	static $orderby = array('syndic.date DESC');
	static $where = 
			array(
			array('=', 'syndic.statut', "'prop'"));
	static $join = array();
	static $limit = '0,10';
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
$rss[\'' .
interdire_scripts(date_ical(normaliser_date($Pile[$SP]['date']))) .
'\'] .= \'
	<item>
		<title>' .
texte_backendq(_T('public/spip/ecrire:info_site_attente',array())) .
' : ' .
interdire_scripts(texte_backendq(typo(@$Pile[0]['titre'], "TYPO", $connect))) .
'</title>
		<link>' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('sites',(	'id_syndic=' .
	$Pile[$SP]['id_syndic']))))) .
'</link>
		<guid isPermaLink="true">' .
interdire_scripts(texte_backendq(url_absolue(generer_url_ecrire('sites',(	'id_syndic=' .
	$Pile[$SP]['id_syndic']))))) .
'</guid>
		<dc:date>' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'</dc:date>
		<dc:format>text/html</dc:format>
		' .
(($t1 = strval(texte_backendq(htmlentities($Pile[$SP-1]['lang'] ? $Pile[$SP-1]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		('<dc:language>' . $t1 . '</dc:language>') :
		'') .
'
		<description>' .
interdire_scripts(texte_backendq(couper(propre(@$Pile[0]['texte'], $connect)))) .
'</description>
	</item>\';
');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE0html_3138bed0f9323dc2f438ff55bb825f3e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '0';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.lang",
		"auteurs.id_auteur");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'auteurs.id_auteur', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))));
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
		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'<?php
if (' .
(securiser_acces($Pile[$SP]['id_auteur'],interdire_scripts(entites_html((@$Pile[0]['cle']),true)),'rss',interdire_scripts(entites_html((@$Pile[0]['op']),true)),interdire_scripts(entites_html((@$Pile[0]['args']),true))) ? '1':'0') .
') {
?><?xml version="1.0" encoding="' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" ?>

<rss version="2.0" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:thr="http://purl.org/syndication/thread/1.0">
<channel xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'">
	<title>' .
(($t1 = strval(interdire_scripts(texte_backend(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))))!=='' ?
		('&#91;' . $t1 . '&#93;') :
		'') .
' RSS (' .
texte_backend(_T('public/spip/ecrire:icone_a_suivre',array())) .
')</title>
	<link>' .
interdire_scripts(texte_backend(generer_url_ecrire())) .
'</link>
	<description></description>
	<language>' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'</language>
<?php $rss = array();
' .
BOUCLE_Ahtml_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
BOUCLE_Bhtml_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
BOUCLE_Shtml_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
rsort($rss);
echo join(\'\',$rss);
?>
</channel>
</rss><?php
} else {
include_spip(\'inc/minipres\'); 
echo minipres();
}?>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette prive/rss/a_suivre.html.
//
function html_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<'.'?php header("' . (	'Content-Type: text/xml; charset=' .
	interdire_scripts($GLOBALS['meta']['charset'])) . '"); ?'.'><?php header("X-Spip-Cache: 900"); ?>' .
BOUCLE0html_3138bed0f9323dc2f438ff55bb825f3e($Cache, $Pile, $doublons, $Numrows, $SP) .
'

');

	return analyse_resultat_skel('html_3138bed0f9323dc2f438ff55bb825f3e', $Cache, $page, 'prive/rss/a_suivre.html');
}

?>
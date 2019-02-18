<?php
/*
 * Squelette : ../plugins/auto/snippets/snippets/articles/exporter.html
 * Date :      Wed, 14 May 2008 15:35:58 GMT
 * Compile :   Thu, 14 May 2009 22:56:37 GMT (0.051s)
 * Boucles :   _auteurs, _article
 */ 
//
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_d53234b570b47acb36d96e90a29ca353(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
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
		<auteur>' .
interdire_scripts($Pile[$SP]['nom']) .
'</auteur>
		');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_d53234b570b47acb36d96e90a29ca353(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	$in0[]= 'prepa';
	$in0[]= 'prop';
	$in0[]= 'publie';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.ps",
		"articles.date",
		"articles.statut",
		"articles.id_secteur",
		"articles.date_redac",
		"articles.accepter_forum",
		"articles.date_modif",
		"articles.lang",
		"articles.langue_choisie",
		"articles.id_trad",
		"articles.extra",
		"articles.nom_site",
		"articles.url_site");
	$orderby = array(((!sql_quote($in0) OR sql_quote($in0)==="''") ? 0 : ('FIELD(articles.statut,' . sql_quote($in0) . ')')));
	$where = 
			array(
			array('=', 'articles.id_article', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), sql_in('articles.statut',sql_quote($in0)));
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
	<article>
		<id_article>' .
$Pile[$SP]['id_article'] .
'</id_article>
		<surtitre>' .
$Pile[$SP]['surtitre'] .
'</surtitre>
		<titre>' .
$Pile[$SP]['titre'] .
'</titre>
		<soustitre>' .
$Pile[$SP]['soustitre'] .
'</soustitre>
		<id_rubrique>' .
$Pile[$SP]['id_rubrique'] .
'</id_rubrique>
		<descriptif>' .
$Pile[$SP]['descriptif'] .
'</descriptif>
		<chapo>' .
$Pile[$SP]['chapo'] .
'</chapo>
		<texte>' .
$Pile[$SP]['texte'] .
'</texte>
		<ps>' .
$Pile[$SP]['ps'] .
'</ps>
		<date>' .
$Pile[$SP]['date'] .
'</date>
		<statut>' .
$Pile[$SP]['statut'] .
'</statut>
		<id_secteur>' .
$Pile[$SP]['id_secteur'] .
'</id_secteur>
		<date_redac>' .
$Pile[$SP]['date_redac'] .
'</date_redac>
		<accepter_forum>' .
interdire_scripts($Pile[$SP]['accepter_forum']) .
'</accepter_forum>
		<date_modif>' .
$Pile[$SP]['date_modif'] .
'</date_modif>
		<lang>' .
htmlentities($Pile[$SP]['lang']) .
'</lang>
		<langue_choisie>' .
interdire_scripts($Pile[$SP]['langue_choisie']) .
'</langue_choisie>
		<id_trad>' .
$Pile[$SP]['id_trad'] .
'</id_trad>
		<extra>' .
interdire_scripts($Pile[$SP]['extra']) .
'</extra>
		<nom_site>' .
interdire_scripts($Pile[$SP]['nom_site']) .
'</nom_site>
		<url_site>' .
calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
'</url_site>
		' .
BOUCLE_auteurshtml_d53234b570b47acb36d96e90a29ca353($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</article>
	');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../plugins/auto/snippets/snippets/articles/exporter.html.
//
function html_d53234b570b47acb36d96e90a29ca353($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<'.'?php header("' . (	'Content-type: text/xml' .
	(($t2 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
			('; charset=' . $t2) :
			'')) . '"); ?'.'>' .
'
<?php echo \'<\' ?>?xml version="1.0"' .
(($t1 = strval(interdire_scripts($GLOBALS['meta']['charset'])))!=='' ?
		(' encoding="' . $t1 . '"') :
		'') .
'?>
<articles>
	' .
BOUCLE_articlehtml_d53234b570b47acb36d96e90a29ca353($Cache, $Pile, $doublons, $Numrows, $SP) .
'
</articles>');

	return analyse_resultat_skel('html_d53234b570b47acb36d96e90a29ca353', $Cache, $page, '../plugins/auto/snippets/snippets/articles/exporter.html');
}

?>
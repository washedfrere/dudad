<?php
/*
 * Squelette : squelettes-dist/forum.html
 * Date :      Wed, 05 Nov 2008 20:03:58 GMT
 * Compile :   Mon, 25 May 2009 08:40:32 GMT (0.107s)
 * Boucles :   _ariane_site, _contexte_site, _ariane_rubrique, _contexte_rubrique, _ariane_breve, _contexte_breve, _ariane_article, _contexte_article, _contexte_forum, _article, _breve, _rubrique, _syndic, _forum_parent
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_sitehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_site';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
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
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_contexte_sitehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_contexte_site';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'])));
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
            ' .
BOUCLE_ariane_sitehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site') .
'">' .
interdire_scripts(couper(typo(@$Pile[0]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_rubriquehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
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
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_contexte_rubriquehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_contexte_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
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
            ' .
BOUCLE_ariane_rubriquehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_ariane_brevehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_ariane_breve';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
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
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_contexte_brevehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_contexte_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_rubrique",
		"breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'])));
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
            ' .
BOUCLE_ariane_brevehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_ariane_articlehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_ariane_article';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('IN', 'rubriques.id_rubrique', "($hierarchie)"));
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
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_contexte_articlehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_contexte_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.id_rubrique",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'])));
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
            ' .
BOUCLE_ariane_articlehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
'
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_contexte_forumhtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_contexte_forum';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_forum', sql_quote($Pile[0]['id_forum'])));
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
            &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(couper(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect)),'80')) .
'</a>
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.titre",
		"articles.date",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'])));
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
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'150','100')) .
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(recuperer_fond('modeles/lesauteurs',
			array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' ') . $t1) :
		'') .
'</small>
            ' .
(($t1 = strval(interdire_scripts(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_brevehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breve';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
		"breves.titre",
		"breves.date_heure AS date",
		"breves.texte",
		"breves.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_breve', sql_quote($Pile[0]['id_breve'])));
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
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'',  ''), '', ''),'150','100')) .
'
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</small>
            ' .
(($t1 = strval(interdire_scripts(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriquehtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.titre",
		"rubriques.texte",
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
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></h3>
            ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['texte'], $connect))))!=='' ?
		('<div class="texte">' . $t1 . '</div>') :
		'') .
'
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_syndichtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_syndic';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.url_site",
		"syndic.nom_site",
		"syndic.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.id_syndic', sql_quote($Pile[0]['id_syndic'])));
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
            <h3><a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site') .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a></h3>
            ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
		('<div class="texte">' . $t1 . '</div>') :
		'') .
'
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forum_parenthtml_7d97ade31497917a97294ba1987ea848(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forum_parent';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_forum', sql_quote($Pile[0]['id_forum'])));
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
            <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></h3>
            <small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(safehtml(typo($Pile[$SP]['nom'], "TYPO", $connect)))))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' ') . $t1) :
		'') .
'</small>
            ' .
(($t1 = strval(interdire_scripts(lignes_longues(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect)))))!=='' ?
		('<div class="introduction">' . $t1 . '</div>') :
		'') .
'
            ');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/forum.html.
//
function html_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
_T('public/spip/ecrire:poster_message',array()) .
' - ' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
<meta name="robots" content="none" />
</head>

<body class="page_forum">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
    <div id="conteneur">
    <div id="contenu">
    
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>
    
            ' .
(($t1 = BOUCLE_contexte_articlehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
            ') :
		((	'
    
            ' .
	(($t2 = BOUCLE_contexte_brevehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((	'
    
            ' .
		(($t3 = BOUCLE_contexte_rubriquehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((	'
    
            ' .
			(($t4 = BOUCLE_contexte_sitehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					('
    
            ')) .
			'
            '))) .
		'
            '))) .
	'
            '))) .
'
    
            ' .
BOUCLE_contexte_forumhtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    
            &gt; <strong class="on">' .
_T('public/spip/ecrire:poster_message',array()) .
'</strong>
            
        </div><!--#hierarchie-->

        <div class="cartouche">
            <h1>' .
_T('public/spip/ecrire:poster_message',array()) .
'</h1>
        </div>

        <div class="menu articles">
            <h2>' .
_T('public/spip/ecrire:en_reponse',array()) .
'</h2>
        
            ' .
(($t1 = BOUCLE_forum_parenthtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
            
            ' .
	BOUCLE_articlehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_brevehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_rubriquehtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            ' .
	BOUCLE_syndichtml_7d97ade31497917a97294ba1987ea848($Cache, $Pile, $doublons, $Numrows, $SP) .
	'
            
            '))) .
'
        
        </div>

        ' .
executer_balise_dynamique('FORMULAIRE_FORUM',
	array(@$Pile[0]['id_rubrique'],@$Pile[0]['id_forum'],@$Pile[0]['id_article'],@$Pile[0]['id_breve'],@$Pile[0]['id_syndic'],@$Pile[0]['ajouter_mot'],@$Pile[0]['ajouter_groupe'],@$Pile[0]['afficher_texte']),
	array(''), $GLOBALS['spip_lang'],105) .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],116) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/forum.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!--#page-->
</body>
</html>');

	return analyse_resultat_skel('html_7d97ade31497917a97294ba1987ea848', $Cache, $page, 'squelettes-dist/forum.html');
}

?>
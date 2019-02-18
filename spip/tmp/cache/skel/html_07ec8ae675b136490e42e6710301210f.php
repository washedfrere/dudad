<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-menu.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.018s)
 * Boucles :   _RubExclues_sect, _ArtExclus, _art_sommaire, _sousrub_sommaire, _sommaire, _filles, _parents, _hierarchie_courante, _tout, _art_secteur, _sousousrub2, _sousrub2, _secteurs2, _rub_menu
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_RubExclues_secthtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_RubExclues_sect';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'L2.titre', "'exclu_menu_rub'"), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_ArtExclushtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_ArtExclus';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.id_article");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L2.titre', "'exclu_menu_rub'"), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_sommairehtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_art_sommaire';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li>
					<a class="lien' .
(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? 'on' : '') .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
				</li>
		');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_sousrub_sommairehtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sousrub_sommaire';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li>
					<a class="lien' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : '') .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
				</li>
		');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_sommairehtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sommaire';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
		<li>
			<a class="lien' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : '') .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
' .
(($t1 = BOUCLE_art_sommairehtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		
			<ul>
		') . $t1 . '
			</ul>
') :
		'') .
'
		' .
(($t1 = BOUCLE_sousrub_sommairehtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
// <BOUCLE rubriques>
//
function BOUCLE_filleshtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_filles';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'filles')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_parentshtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_parents';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_parent'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'parents')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_hierarchie_courantehtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $id = '_hierarchie_courante';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_parent",
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
        ' .
BOUCLE_parentshtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
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
function BOUCLE_touthtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_tout';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'exclus')] . $doublons[$doublons_index[]= ('rubriques' . 'filles')] . $doublons[$doublons_index[]= ('rubriques' . 'parents')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_secteurhtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_art_secteur';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li>
					<a class="lien' .
(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '') ? 'on' : '') .
' article" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
				</li>
		');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_sousousrub2html_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_sousrub2']);
	$t0 = (($t1 = BOUCLE_sousrub2html_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<ul>
		' . $t1 . '
			</ul>
		') :
		'');
	$Numrows['_sousrub2'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_sousrub2html_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_sousrub2';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')] . $doublons[$doublons_index[]= ('rubriques' . 'exclus')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li>
					<a class="lien' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : '') .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
		' .
BOUCLE_sousousrub2html_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
				</li>
		');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_secteurs2html_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_secteurs2';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
		<li>
				<a class="lien' .
(calcul_exposer($Pile[$SP]['id_rubrique'], 'id_rubrique', $Pile[0], 0, 'id_rubrique', '') ? 'on' : '') .
'" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
		' .
(($t1 = BOUCLE_art_secteurhtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		
			<ul>
		') . $t1 . '
			</ul>
		') :
		'') .
'
		' .
(($t1 = BOUCLE_sousrub2html_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
// <BOUCLE rubriques>
//
function BOUCLE_rub_menuhtml_07ec8ae675b136490e42e6710301210f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rub_menu';
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
' .
BOUCLE_filleshtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'


   ' .
BOUCLE_hierarchie_courantehtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'



' .
BOUCLE_touthtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'



	<h3 class="structure">' .
_T('public/spip/ecrire:rubriques',array()) .
'</h3>
	<ul>
		' .
BOUCLE_secteurs2html_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</ul>
 ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-menu.html.
//
function html_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?><div id="navigation">
    <h2 class="structure">' .
_T('public/spip/ecrire:navigation',array()) .
'</h2>

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu-principal') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>


<div class="menu" id="menu-rubriques">
' .
BOUCLE_RubExclues_secthtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
BOUCLE_ArtExclushtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .
(($t1 = BOUCLE_rub_menuhtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'




' .
	(($t2 = BOUCLE_sommairehtml_07ec8ae675b136490e42e6710301210f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
	<h3 class="structure">' .
			_T('public/spip/ecrire:rubriques',array()) .
			'</h3>
	<ul>
') . $t2 . '
	</ul>
') :
			'') .
	'

'))) .
'

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu-agenda') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div>

</div>
');

	return analyse_resultat_skel('html_07ec8ae675b136490e42e6710301210f', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-menu.html');
}

?>
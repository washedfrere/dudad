<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-meta.html
 * Date :      Mon, 15 Dec 2008 06:02:08 GMT
 * Compile :   Thu, 14 May 2009 18:14:33 GMT (0.043s)
 * Boucles :   _keywords_recap, _author_recap, _recap_auteursDC, _recap_subjectDC, _keywords_site, _site_head, _keywords_rubrique, _subjectDC_rub, _rubrique_head, _keywords_mot, _mot_head, _keywords_breve, _breve_head, _author, _keywords_article, _auteursDC, _subjectDC, _article_head
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_keywords_recaphtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_keywords_recap';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
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
		$t1 = interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_author_recaphtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_author_recap';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom");
	static $orderby = array();
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', "1"));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))));
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_recap_auteursDChtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_recap_auteursDC';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom");
	static $orderby = array();
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', "1"));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
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
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))) .
'" />');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_recap_subjectDChtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_recap_subjectDC';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang");
	static $orderby = array();
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
		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_keywords_sitehtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_site';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_syndic', sql_quote($Pile[$SP]['id_syndic'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_site_headhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_site_head';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
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
  <!-- META site -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_sitehtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_keywords_rubriquehtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_rubrique';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_subjectDC_rubhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_subjectDC_rub';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? '; ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_headhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique_head';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang",
		"rubriques.texte",
		"rubriques.date");
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

	<!-- META rubrique - META section -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_rubriquehtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 600, $connect)))))))!=='' ?
		('<meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDC_rubhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_keywords_mothtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_mot';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[$SP]['id_mot'])));
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

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_mot_headhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mot_head';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot",
		"mots.descriptif");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.id_mot', sql_quote($Pile[0]['id_mot'])));
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

	<!-- META mot-cle - META keyword -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_mothtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_keywords_brevehtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_breve';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_breve', sql_quote($Pile[$SP]['id_breve'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ',' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breve_headhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breve_head';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_breve",
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
	<!-- META breve - META news item -->
	' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
	' .
(($t1 = BOUCLE_keywords_brevehtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('<meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_authorhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_author';
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

		$t1 = interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_keywords_articlehtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_keywords_article';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteursDChtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteursDC';
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

		$t1 = (
'
  <meta name="DC.creator" content="' .
interdire_scripts(entites_html(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))) .
'" />');
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_subjectDChtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_subjectDC';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('mots','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = interdire_scripts(entites_html(textebrut(supprimer_numero(typo($Pile[$SP]['titre'])))));
		$t0 .= (($t1 && $t0) ? '; ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_article_headhtml_38e0483239853375181be3ebfe70fe74(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article_head';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.titre",
		"articles.lang",
		"articles.date");
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
  <!-- META article -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('<meta name="Description" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_authorhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Author" content="' . $t1 . '" />') :
		'') .
'
' .
(($t1 = BOUCLE_keywords_articlehtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('  <meta name="Keywords" content="' . $t1 . '" />') :
		'') .
'
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))))!=='' ?
		('<meta name="DC.title" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
		('<meta name="DC.language" scheme="ISO639-1" content="' . $t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t1 . '/') :
		'') .
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true)))))!=='' ?
		($t1 . '" />
  ') :
		'') .
(($t1 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
		('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t1 . '" />') :
		'') .
BOUCLE_auteursDChtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(attribut_html(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect)))))))!=='' ?
		('
  <meta name="DC.description" content="' . $t1 . '" />') :
		'') .
(($t1 = BOUCLE_subjectDChtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
  <meta name="DC.subject" content="' . $t1 . '" />') :
		'') .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('
  <meta name="DC.date" scheme="ISO8601" content="' . $t1 . '" />') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-meta.html.
//
function html_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- META DATA -->
	<meta http-equiv="Content-Type" content="text/html; charset=' .
interdire_scripts($GLOBALS['meta']['charset']) .
'" />
	<meta http-equiv="Content-language" content="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta name="language" content="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="generator" content="SPIP' .
(($t1 = strval(spip_version()))!=='' ?
		(' ' . $t1) :
		'') .
'" />
	<meta name="robots" content="index,follow" />
	<link rel="schema.DCTERMS"  href="http://purl.org/dc/terms/" />
	<link rel="schema.DC"       href="http://purl.org/dc/elements/1.1/" />
' .
(($t1 = BOUCLE_article_headhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	(($t2 = BOUCLE_breve_headhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			$t2 :
			((($t3 = BOUCLE_mot_headhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				$t3 :
				((($t4 = BOUCLE_rubrique_headhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					$t4 :
					((($t5 = BOUCLE_site_headhtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
						$t5 :
						((	'  
	<!-- META pages recapitulatives - META summary pages -->
' .
					(($t6 = BOUCLE_keywords_recaphtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="keywords" content="' . $t6 . '" />') :
							'') .
					'
  ' .
					(($t6 = strval(interdire_scripts(attribut_html(propre($GLOBALS['meta']['descriptif_site'], $connect)))))!=='' ?
							('<meta name="description" content="' . $t6 . '" />') :
							'') .
					'
  <meta name="author" content="' .
					BOUCLE_author_recaphtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP) .
					'" />
  <!-- META Dublin Core - voir: http://uk.dublincore.org/documents/dcq-html/  -->
  ' .
					(($t6 = strval(interdire_scripts(entites_html(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))))))!=='' ?
							('<meta name="DC.title" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])))!=='' ?
							('<meta name="DC.language" scheme="ISO639-1" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.identifier" scheme="DCTERMS.URI" content="' . $t6 . '" />
  ') :
							'') .
					(($t6 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
							('<meta name="DC.source" scheme="DCTERMS.URI" content="' . $t6 . '" />') :
							'') .
					BOUCLE_recap_auteursDChtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP) .
					(($t6 = strval(interdire_scripts(attribut_html(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
							('
  <meta name="DC.description" content="' . $t6 . '" />') :
							'') .
					(($t6 = BOUCLE_recap_subjectDChtml_38e0483239853375181be3ebfe70fe74($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
							('
  <meta name="DC.subject" content="' . $t6 . '" />') :
							'') .
					(($t6 = strval(interdire_scripts(date_iso(normaliser_date(@$Pile[0]['date'])))))!=='' ?
							('
  <meta name="DC.date" scheme="ISO8601" content="' . $t6 . '" />') :
							'') .
					'

')))))))))))) .
'

' .
(($t1 = strval(interdire_scripts((strlen($a = extraire_attribut(filtrer('image_graver', filtrer('image_format',filtrer('image_recadre',filtrer('image_passe_partout',(strlen($a = (strlen($a = (@$Pile[0]['favicon'])) ? $a : interdire_scripts(find_in_path('favicon.ico')))) ? $a : affiche_logos(calcule_logo('id_syndic', 'ON', "'0'",'',  ''), '', '')),'32','32'),'32','32','center'),'ico')),'src')) ? $a : interdire_scripts(find_in_path('spip.ico'))))))!=='' ?
		('  <link rel="shortcut icon" href="' . $t1 . '" type="image/x-icon" />') :
		'') .
'

' .
(($t1 = strval(interdire_scripts(generer_url_public('backend'))))!=='' ?
		((	'  <link rel="alternate" type="application/rss+xml" title="' .
	_T('public/spip/ecrire:syndiquer_site',array()) .
	' : ' .
	interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
	'" href="') . $t1 . '" />') :
		'') .
'

');

	return analyse_resultat_skel('html_38e0483239853375181be3ebfe70fe74', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-meta.html');
}

?>
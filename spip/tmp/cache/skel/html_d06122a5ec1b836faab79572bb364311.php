<?php
/*
 * Squelette : squelettes-dist/rubrique.html
 * Date :      Wed, 03 Dec 2008 10:30:02 GMT
 * Compile :   Thu, 14 May 2009 23:42:07 GMT (0.045s)
 * Boucles :   _ariane, _m2, _miniplan, _sous_rubriques, _articles, _documents_joints, _breves, _syndic, _sites, _mots, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $id = '_ariane';
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
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect)),'80')) .
'</a>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_m2html_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_miniplan']);
	$t0 = (($t1 = BOUCLE_miniplanhtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
                    <ul>
                        ' . $t1 . '
                    </ul>
                    ') :
		'');
	$Numrows['_miniplan'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_miniplanhtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_miniplan';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
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
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
                        <li>
                            <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a>
                            ' .
BOUCLE_m2html_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP) .
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
function BOUCLE_sous_rubriqueshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_sous_rubriques';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
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
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
                <li>
                    <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a>

                    
                    ' .
(($t1 = BOUCLE_miniplanhtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
// <BOUCLE articles>
//
function BOUCLE_articleshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
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

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_articles']) ? $Pile[0]['debut'.'_articles'] : _request('debut'.'_articles'));
	$fin_boucle = min($debut_boucle + 9, $nombre_boucle - 1);
	$Numrows['_articles']["grand_total"] = $nombre_boucle;
	$Numrows['_articles']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_articles']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_articles']['compteur_boucle']++;
		if ($Numrows['_articles']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_articles']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
                <li>
                    ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','100')) .
'
                    <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
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
                </li>
                ');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_jointshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'documents';
	static $id = '_documents_joints';
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
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (
'
                <li>
                    <strong><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:bouton_telecharger',array()) .
'" type="' .
interdire_scripts($Pile[$SP]['mime_type']) .
'">' .
interdire_scripts((strlen($a = traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) ? $a : _T('public/spip/ecrire:info_document',array()))) .
'</a></strong>
                    <small>(' .
interdire_scripts($Pile[$SP]['type_document']) .
(($t1 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
		(' &ndash; ' . $t1) :
		'') .
')</small>
                    ' .
interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
'
                </li>
                ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breveshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
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

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_breves']) ? $Pile[0]['debut'.'_breves'] : _request('debut'.'_breves'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_breves']["grand_total"] = $nombre_boucle;
	$Numrows['_breves']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_breves']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_breves']['compteur_boucle']++;
		if ($Numrows['_breves']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_breves']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
                <li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></li>
                ');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndic_articles>
//
function BOUCLE_syndichtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array("syndic_articles.id_syndic_article");
	static $select = array("syndic_articles.date",
		"syndic_articles.url",
		"syndic_articles.titre");
	static $orderby = array('syndic_articles.date DESC');
	$where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'syndic_articles.id_syndic', sql_quote($Pile[$SP]['id_syndic'])), 
			array('<', 'LEAST((UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(syndic_articles.date))/86400,
	TO_DAYS(now())-TO_DAYS(syndic_articles.date),
	DAYOFMONTH(now())-DAYOFMONTH(syndic_articles.date)+30.4368*(MONTH(now())-MONTH(syndic_articles.date))+365.2422*(YEAR(now())-YEAR(syndic_articles.date)))', "180"), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,3';
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
                        <li><a href="' .
vider_url($Pile[$SP]['url']) .
'" class="spip_out">' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></li>
                        ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_siteshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.id_syndic",
		"syndic.date",
		"syndic.nom_site",
		"syndic.url_site");
	static $orderby = array('syndic.nom_site');
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
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
                <li>
					<a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) .
'</a>
                    ' .
(($t1 = BOUCLE_syndichtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_motshtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
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

		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></li>
                ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_principalehtml_d06122a5ec1b836faab79572bb364311(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_principale';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
(($t1 = strval(interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique',array()) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />
</head>

<body class="page_rubrique">
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
'</a>' .
BOUCLE_arianehtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect)),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'200','200')) .
'
            <h1 class="">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		((	'<p><small>' .
	_T('public/spip/ecrire:dernier_ajout',array()) .
	' : ') . $t1 . '.</small></p>') :
		'') .
'
        </div>

        ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'

        
        ' .
(($t1 = BOUCLE_articleshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu articles">
            ' .
		filtre_pagination_dist(
	(isset($Numrows['_articles']['grand_total']) ?
		$Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']
	), '_articles',
		$Pile[0]['debut_articles'],10, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
            <h2>' .
		_T('public/spip/ecrire:articles_rubrique',array()) .
		'</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_articles']['grand_total']) ?
		$Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']
	), '_articles',
		$Pile[0]['debut_articles'],10, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		((	'

        
        ' .
	(($t2 = BOUCLE_sous_rubriqueshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
        <div class="menu rubriques">
            <h2>' .
			_T('public/spip/ecrire:sous_rubriques',array()) .
			'</h2>
            <ul>
                ') . $t2 . '
            </ul>
            </div>
        ') :
			'') .
	'

        '))) .
'


        
        ' .
(($t1 = BOUCLE_documents_jointshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu" id="documents_joints">
            <h2>' .
		_T('public/spip/ecrire:titre_documents_joints',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
(($t1 = BOUCLE_breveshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            ' .
		filtre_pagination_dist(
	(isset($Numrows['_breves']['grand_total']) ?
		$Numrows['_breves']['grand_total'] : $Numrows['_breves']['total']
	), '_breves',
		$Pile[0]['debut_breves'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
            <h2>' .
		_T('public/spip/ecrire:breves',array()) .
		'</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_breves']['grand_total']) ?
		$Numrows['_breves']['grand_total'] : $Numrows['_breves']['total']
	), '_breves',
		$Pile[0]['debut_breves'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

        
        ' .
(($t1 = BOUCLE_siteshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:sur_web',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
executer_balise_dynamique('FORMULAIRE_SITE',
	array($Pile[$SP]['id_rubrique']),
	array(''), $GLOBALS['spip_lang'],136) .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</h2>') . $t1 . '</div>') :
		'') .
'

	</div><!--#contenu-->
	</div><!--#conteneur-->

    
    <div id="navigation">

        
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],149) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_motshtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'
        
    </div><!--#extra-->

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/rubrique.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!--#page-->
</body>
</html>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/rubrique.html.
//
function html_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?>' .
BOUCLE_principalehtml_d06122a5ec1b836faab79572bb364311($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_d06122a5ec1b836faab79572bb364311', $Cache, $page, 'squelettes-dist/rubrique.html');
}

?>
<?php
/*
 * Squelette : squelettes-dist/recherche.html
 * Date :      Wed, 11 Feb 2009 11:33:14 GMT
 * Compile :   Sun, 27 Sep 2009 22:12:29 GMT (0.945s)
 * Boucles :   _articles, _rubriques, _mots, _breves, _messages, _sites
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "articles", "","");
	
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("articles.id_article",
		"$rech_select",
		"articles.titre",
		"articles.lang");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('articles','id','id_article'));
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
				<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriqueshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "rubriques", "","");
	
	static $table = 'rubriques';
	static $id = '_rubriques';
	static $from = array('rubriques' => 'spip_rubriques','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("rubriques.id_rubrique",
		"$rech_select",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('rubriques','id','id_rubrique'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_rubriques']) ? $Pile[0]['debut'.'_rubriques'] : _request('debut'.'_rubriques'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_rubriques']["grand_total"] = $nombre_boucle;
	$Numrows['_rubriques']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_rubriques']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_rubriques']['compteur_boucle']++;
		if ($Numrows['_rubriques']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_rubriques']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_motshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "mots", "","");
	
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("mots.id_mot",
		"$rech_select",
		"mots.titre");
	static $orderby = array('points DESC');
	$where = 
			array($rech_where?$rech_where:'');
	static $join = array('resultats' => array('mots','id','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_mots']) ? $Pile[0]['debut'.'_mots'] : _request('debut'.'_mots'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_mots']["grand_total"] = $nombre_boucle;
	$Numrows['_mots']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_mots']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_mots']['compteur_boucle']++;
		if ($Numrows['_mots']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_mots']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
				<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
		}

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breveshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "breves", "","");
	
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("breves.id_breve",
		"$rech_select",
		"breves.titre",
		"breves.lang");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('breves','id','id_breve'));
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
				<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_messageshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "forum", "","");
	
	static $table = 'forum';
	static $id = '_messages';
	static $from = array('forum' => 'spip_forum','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("forum.id_forum",
		"$rech_select",
		"forum.titre",
		"forum.texte");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('forum','id','id_forum'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_messages']) ? $Pile[0]['debut'.'_messages'] : _request('debut'.'_messages'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_messages']["grand_total"] = $nombre_boucle;
	$Numrows['_messages']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_messages']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_messages']['compteur_boucle']++;
		if ($Numrows['_messages']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_messages']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
				<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_forum'], 'forum', '', '', true))) .
'"' .
(($t1 = strval(interdire_scripts(couper(attribut_html(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))),'80'))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(couper(safehtml(propre($Pile[$SP]['texte'], $connect)),'80')) .
'</a></li>
				');
		}

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_siteshtml_7c066b3b0901a5ea690b12c667e8a4e7(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = ''; 
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(@$Pile[0]["recherche"], "syndic", "","");
	
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("syndic.id_syndic",
		"$rech_select",
		"syndic.url_site",
		"syndic.nom_site");
	static $orderby = array('points DESC');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('syndic','id','id_syndic'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_sites']) ? $Pile[0]['debut'.'_sites'] : _request('debut'.'_sites'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_sites']["grand_total"] = $nombre_boucle;
	$Numrows['_sites']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_sites']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_sites']['compteur_boucle']++;
		if ($Numrows['_sites']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_sites']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
				<li><a href="' .
generer_url_entite($Pile[$SP]['id_syndic'],'site','','',($connect ? $connect : NULL)) .
'">' .
interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
'</a></li>
				');
		}

	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/recherche.html.
//
function html_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
_T('public/spip/ecrire:resultats_recherche',array()) .
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

<body class="page_recherche pas_surlignable">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	
	
	<div id="conteneur">
	<div id="contenu pas_surlignable">
		
		
		<div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a> &gt; ' .
_T('public/spip/ecrire:info_rechercher',array()) .
(($t1 = strval(entites_html(_request("recherche"))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>
		
		' .
(($t1 = strval(entites_html(_request("recherche"))))!=='' ?
		((	'<div class="cartouche">
			<h1>' .
	_T('public/spip/ecrire:resultats_recherche',array()) .
	'</h1>
			<p class="soustitre">&#171;&nbsp;') . $t1 . '&nbsp;&#187;</p>
		</div>') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_articleshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
		_T('public/spip/ecrire:articles',array()) .
		' (' .
		(isset($Numrows['_articles']['grand_total'])
			? $Numrows['_articles']['grand_total'] : $Numrows['_articles']['total']) .
		')</h2>
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
		'') .
'
		
		
		' .
(($t1 = BOUCLE_rubriqueshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu rubriques">
			' .
		filtre_pagination_dist(
	(isset($Numrows['_rubriques']['grand_total']) ?
		$Numrows['_rubriques']['grand_total'] : $Numrows['_rubriques']['total']
	), '_rubriques',
		$Pile[0]['debut_rubriques'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			<h2>' .
		_T('public/spip/ecrire:rubriques',array()) .
		' (' .
		(isset($Numrows['_rubriques']['grand_total'])
			? $Numrows['_rubriques']['grand_total'] : $Numrows['_rubriques']['total']) .
		')</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_rubriques']['grand_total']) ?
		$Numrows['_rubriques']['grand_total'] : $Numrows['_rubriques']['total']
	), '_rubriques',
		$Pile[0]['debut_rubriques'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_motshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			' .
		filtre_pagination_dist(
	(isset($Numrows['_mots']['grand_total']) ?
		$Numrows['_mots']['grand_total'] : $Numrows['_mots']['total']
	), '_mots',
		$Pile[0]['debut_mots'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			<h2>' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		' (' .
		(isset($Numrows['_mots']['grand_total'])
			? $Numrows['_mots']['grand_total'] : $Numrows['_mots']['total']) .
		')</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_mots']['grand_total']) ?
		$Numrows['_mots']['grand_total'] : $Numrows['_mots']['total']
	), '_mots',
		$Pile[0]['debut_mots'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_breveshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
		' (' .
		(isset($Numrows['_breves']['grand_total'])
			? $Numrows['_breves']['grand_total'] : $Numrows['_breves']['total']) .
		')</h2>
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
(($t1 = BOUCLE_messageshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			' .
		filtre_pagination_dist(
	(isset($Numrows['_messages']['grand_total']) ?
		$Numrows['_messages']['grand_total'] : $Numrows['_messages']['total']
	), '_messages',
		$Pile[0]['debut_messages'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			<h2>' .
		_T('public/spip/ecrire:messages_forum',array()) .
		' (' .
		(isset($Numrows['_messages']['grand_total'])
			? $Numrows['_messages']['grand_total'] : $Numrows['_messages']['total']) .
		')</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_messages']['grand_total']) ?
		$Numrows['_messages']['grand_total'] : $Numrows['_messages']['total']
	), '_messages',
		$Pile[0]['debut_messages'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_siteshtml_7c066b3b0901a5ea690b12c667e8a4e7($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			' .
		filtre_pagination_dist(
	(isset($Numrows['_sites']['grand_total']) ?
		$Numrows['_sites']['grand_total'] : $Numrows['_sites']['total']
	), '_sites',
		$Pile[0]['debut_sites'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			<h2>' .
		_T('public/spip/ecrire:sites_web',array()) .
		' (' .
		(isset($Numrows['_sites']['grand_total'])
			? $Numrows['_sites']['grand_total'] : $Numrows['_sites']['total']) .
		')</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_sites']['grand_total']) ?
		$Numrows['_sites']['grand_total'] : $Numrows['_sites']['total']
	), '_sites',
		$Pile[0]['debut_sites'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
	</div><!--#contenu-->
	</div><!--#conteneur-->
	
	
	<div id="navigation">
	
		
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-rubriques') . ',
	\'id_rubrique\' => ' . argumenter_squelette(@$Pile[0]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],120) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
	&nbsp;
	</div><!--#extra-->
	
	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/recherche.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
    
</div><!--#page-->
</body>
</html>');

	return analyse_resultat_skel('html_7c066b3b0901a5ea690b12c667e8a4e7', $Cache, $page, 'squelettes-dist/recherche.html');
}

?>
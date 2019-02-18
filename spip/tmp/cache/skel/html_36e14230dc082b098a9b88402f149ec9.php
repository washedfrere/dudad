<?php
/*
 * Squelette : squelettes-dist/sommaire.html
 * Date :      Wed, 19 Nov 2008 18:26:16 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (0.032s)
 * Boucles :   _articles_recents, _breves, _forums_liens, _syndic
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articles_recentshtml_36e14230dc082b098a9b88402f149ec9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_recents';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	static $where = 
			array(
			array('=', 'articles.statut', '\'publie\''));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_articles_recents']) ? $Pile[0]['debut'.'_articles_recents'] : _request('debut'.'_articles_recents'));
	$fin_boucle = min($debut_boucle + 4, $nombre_boucle - 1);
	$Numrows['_articles_recents']["grand_total"] = $nombre_boucle;
	$Numrows['_articles_recents']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_articles_recents']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_articles_recents']['compteur_boucle']++;
		if ($Numrows['_articles_recents']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_articles_recents']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
				<li class="hentry">
					' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','100')) .
'
					<h3 class="entry-title"><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" rel="bookmark">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></h3>
					<small><abbr class="published"' .
(($t1 = strval(interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</abbr>' .
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
		((	'<div class="introduction entry-content">') . $t1 . '</div>') :
		'') .
'
				</li>
				');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breveshtml_36e14230dc082b098a9b88402f149ec9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $where = 
			array(
			array('=', 'breves.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,5';
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
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
				');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forums_lienshtml_36e14230dc082b098a9b88402f149ec9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_liens';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.date_heure",
		"forum.date_heure AS date",
		"forum.id_forum",
		"forum.titre",
		"forum.texte");
	static $orderby = array('forum.date_heure DESC');
	static $where = 
			array(
			array('=', 'forum.statut', '\'publie\''));
	static $join = array();
	static $limit = '0,8';
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
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
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

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndic_articles>
//
function BOUCLE_syndichtml_36e14230dc082b098a9b88402f149ec9(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.titre");
	static $orderby = array('syndic_articles.date DESC');
	static $where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('<', 'LEAST((UNIX_TIMESTAMP(now())-UNIX_TIMESTAMP(syndic_articles.date))/86400,
	TO_DAYS(now())-TO_DAYS(syndic_articles.date),
	DAYOFMONTH(now())-DAYOFMONTH(syndic_articles.date)+30.4368*(MONTH(now())-MONTH(syndic_articles.date))+365.2422*(YEAR(now())-YEAR(syndic_articles.date)))', "180"), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,6';
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
				<li>' .
(($t1 = strval(interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' &ndash; ') :
		'') .
'<a href="' .
vider_url($Pile[$SP]['url']) .
'"' .
(($t1 = strval(interdire_scripts(couper(attribut_html(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))),'80'))))!=='' ?
		(' title="' . $t1 . '"') :
		'') .
' class="spip_out">' .
interdire_scripts(safehtml($Pile[$SP]['titre'])) .
'</a></li>
				');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/sommaire.html.
//
function html_36e14230dc082b098a9b88402f149ec9($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 3600"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
<title>' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(textebrut(couper(propre($GLOBALS['meta']['descriptif_site'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>

<body class="page_sommaire">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
	<div class="hfeed" id="conteneur">
	<div id="contenu">
		
		<div class="cartouche invisible">
			<h1 class="invisible">' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'</h1>
		</div>
		
		' .
(($t1 = strval(interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect))))!=='' ?
		('<div class="chapo">' . $t1 . '</div>') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_articles_recentshtml_36e14230dc082b098a9b88402f149ec9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu articles">
			' .
		filtre_pagination_dist(
	(isset($Numrows['_articles_recents']['grand_total']) ?
		$Numrows['_articles_recents']['grand_total'] : $Numrows['_articles_recents']['total']
	), '_articles_recents',
		$Pile[0]['debut_articles_recents'],5, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			<h2>' .
		_T('public/spip/ecrire:derniers_articles',array()) .
		'</h2>
			<ul>
				') . $t1 . (	'
			</ul>
			' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_articles_recents']['grand_total']) ?
		$Numrows['_articles_recents']['grand_total'] : $Numrows['_articles_recents']['total']
	), '_articles_recents',
		$Pile[0]['debut_articles_recents'],5, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
		</div>
		')) :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_breveshtml_36e14230dc082b098a9b88402f149ec9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:dernieres_breves',array()) .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_forums_lienshtml_36e14230dc082b098a9b88402f149ec9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:derniers_commentaires',array()) .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		
		
		' .
(($t1 = BOUCLE_syndichtml_36e14230dc082b098a9b88402f149ec9($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="menu">
			<h2>' .
		_T('public/spip/ecrire:nouveautes_web',array()) .
		'</h2>
			<ul>
				') . $t1 . '
			</ul>
		</div>
		') :
		'') .
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
	array(''), $GLOBALS['spip_lang'],92) .
'

    </div><!--#navigation-->
	
	
	<div id="extra">
		
		
		' .
executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array(''), $GLOBALS['spip_lang'],100) .
'
		
	</div><!--#extra-->
	
	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/sommaire.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	
</div><!--#page-->
</body>
</html>');

	return analyse_resultat_skel('html_36e14230dc082b098a9b88402f149ec9', $Cache, $page, 'squelettes-dist/sommaire.html');
}

?>
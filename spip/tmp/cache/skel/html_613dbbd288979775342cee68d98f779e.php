<?php
/*
 * Squelette : plugins/auto/ahuntsic/plan.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:15:27 GMT (0.015s)
 * Boucles :   _langue_contexte_exclus, _langues, _articles_racine, _articles, _sous_rubriques, _rubriques, _secteurs
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_langue_contexte_exclushtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_langue_contexte_exclus';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'contexte')], 'NOT')));
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
function BOUCLE_langueshtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_langues';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.lang",
		"rubriques.id_rubrique");
	static $orderby = array('rubriques.lang');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques' . 'contexte')], 'NOT')));
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
		$t0 .= (($t1 = strval(traduire_nom_langue(unique(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])),'lang')))!=='' ?
		((	'
				<li lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" xml:lang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">
					<a href="spip.php?action=converser&amp;redirect=' .
	self() .
	'&amp;var_lang=' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" hreflang="' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'">') . $t1 . '</a>
				</li>
			') :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_racinehtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_racine';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
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
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
						<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a></li>
					');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
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
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
										<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a></li>
									');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_sous_rubriqueshtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_rubriques']);
	$t0 = (($t1 = BOUCLE_rubriqueshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
					<ul>
						' . $t1 . '
					</ul>
				') :
		'');
	$Numrows['_rubriques'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubriqueshtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubriques';
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
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
								' .
(($t1 = BOUCLE_articleshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
								<ul>
									' . $t1 . '
								</ul>
								') :
		'') .
'
								' .
BOUCLE_sous_rubriqueshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP) .
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
function BOUCLE_secteurshtml_613dbbd288979775342cee68d98f779e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_secteurs';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang",
		"0+rubriques.titre AS num1",
		"rubriques.titre");
	static $orderby = array('rubriques.lang DESC', 'num1', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])));
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
(($t1 = strval(traduire_nom_langue(unique(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang'])),'langues')))!=='' ?
		('<h2>' . $t1 . '</h2>') :
		'') .
'
				<div class="plan-archives" style="clear:both;">
				' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', 'right'),'120','0')) .
'
				<h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a></h3>
				</div>
				' .
(($t1 = BOUCLE_articles_racinehtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
				<ul>
					' . $t1 . '
				</ul>
				') :
		'') .
'
					' .
(($t1 = BOUCLE_rubriqueshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
					<ul>
						' . $t1 . '
					</ul>
				') :
		'') .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/plan.html.
//
function html_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
'] : ' .
_T('public/spip/ecrire:plan_site',array()) .
'</title>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-meta') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('styles') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' plan">
<div id="page">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bandeau') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
			' .
BOUCLE_langue_contexte_exclushtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_langueshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div id="sommaire">
			<h4>' .
		_T('public/spip/ecrire:info_langues',array()) .
		'</h4>
			<ul>
			') . $t1 . '
			</ul>
		</div>
		') :
		'') .
'
		<h2>' .
_T('public/spip/ecrire:plan_site',array()) .
'</h2>
		<div id="plan">
			' .
BOUCLE_secteurshtml_613dbbd288979775342cee68d98f779e($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		</div><!-- plan -->
	</div><!-- bloc-contenu -->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
    ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-annonces') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
    ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-breves') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
    ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-syndic') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	</div><!-- encart -->
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</div><!-- page -->

</body>
</html>


');

	return analyse_resultat_skel('html_613dbbd288979775342cee68d98f779e', $Cache, $page, 'plugins/auto/ahuntsic/plan.html');
}

?>
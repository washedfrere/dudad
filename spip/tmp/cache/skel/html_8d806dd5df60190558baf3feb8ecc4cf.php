<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-menu-principal.html
 * Date :      Thu, 29 Jan 2009 06:50:28 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (8.1ms)
 * Boucles :   _article, _rubrique, _art_agenda, _site
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articlehtml_8d806dd5df60190558baf3feb8ecc4cf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_article';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("0+articles.titre AS num",
		"articles.titre",
		"articles.id_article",
		"articles.lang");
	static $orderby = array('num', 'articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
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
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></li>') :
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
function BOUCLE_rubriquehtml_8d806dd5df60190558baf3feb8ecc4cf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'L2.titre', "'inclu_menu_principal'"), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
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
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<li class="menu-principal-rubriques"><a href="' .
	(($t2 = strval(htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.'))))!=='' ?
			($t2 . '/') :
			'') .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></li>') :
		'') .
'
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_art_agendahtml_8d806dd5df60190558baf3feb8ecc4cf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_art_agenda';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L2.titre', "'Agenda'"), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '0,1';
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
			<li id="menu-principal-agenda"><a class="lien" href="' .
interdire_scripts(generer_url_public('agenda')) .
'" title="' .
_T('public/spip/ecrire:icone_agenda',array()) .
'"  accesskey="2">' .
_T('public/spip/ecrire:icone_agenda',array()) .
'</a></li>
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_sitehtml_8d806dd5df60190558baf3feb8ecc4cf(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_site';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''));
	static $join = array();
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
'<li id="menu-principal-sites"><a href="' .
interdire_scripts(generer_url_public('site')) .
'" title="' .
_T('public/spip/ecrire:nouveautes_web',array()) .
'">' .
_T('public/spip/ecrire:sites_web',array()) .
'</a></li>');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-menu-principal.html.
//
function html_8d806dd5df60190558baf3feb8ecc4cf($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<div class="menu" id="menu-principal">
		<ul>
			<li id="menu-principal-accueil"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'" accesskey="0">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a></li>

			' .
BOUCLE_articlehtml_8d806dd5df60190558baf3feb8ecc4cf($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			' .
BOUCLE_rubriquehtml_8d806dd5df60190558baf3feb8ecc4cf($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-contact"><a href="' .
vider_url(urlencode_1738(generer_url_entite('1', 'auteur', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:info_contact',array()) .
'"  accesskey="7">' .
_T('public/spip/ecrire:info_contact',array()) .
'</a></li>
			
			' .
BOUCLE_art_agendahtml_8d806dd5df60190558baf3feb8ecc4cf($Cache, $Pile, $doublons, $Numrows, $SP) .
'			

			<li id="menu-principal-plan"><a href="' .
interdire_scripts(generer_url_public('plan')) .
'" title="' .
_T('public/spip/ecrire:plan_site',array()) .
'" accesskey="3">' .
_T('public/spip/ecrire:plan_site',array()) .
'</a></li>

			' .
BOUCLE_sitehtml_8d806dd5df60190558baf3feb8ecc4cf($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			<li id="menu-principal-resume"><a href="' .
interdire_scripts(generer_url_public('resume')) .
'" title="' .
_T('public/spip/ecrire:en_resume',array()) .
'" accesskey="5">' .
_T('public/spip/ecrire:en_resume',array()) .
'</a></li>
			
	
			' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],0)))!=='' ?
		((	'<li id="menu-principal-recherche">
			<div class="menu" id="menu-recherche">
				<h3 class="structure">' .
	_T('public/spip/ecrire:info_rechercher',array()) .
	'</h3>
					<ul>
						<li>
					') . $t1 . (	'			
						</li>			
					</ul>
			</div><!-- menu-recherche -->
			</li>')) :
		'') .
'
		</ul>
	</div>');

	return analyse_resultat_skel('html_8d806dd5df60190558baf3feb8ecc4cf', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-menu-principal.html');
}

?>
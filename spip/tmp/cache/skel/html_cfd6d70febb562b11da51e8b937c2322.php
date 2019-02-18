<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-bas.html
 * Date :      Thu, 29 Jan 2009 06:50:28 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (7.9ms)
 * Boucles :   _rubriques_chemin, _syndic_rub, _syndic_test
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_rubriques_cheminhtml_cfd6d70febb562b11da51e8b937c2322(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[0]['id_rubrique'])))
		return '';
	$hierarchie = '';
	while ($id_rubrique = sql_getfetsel("id_parent","spip_rubriques","id_rubrique=" . $id_rubrique,"","","", "", $connect)) { 
		$hierarchie = ",$id_rubrique$hierarchie";
	}
	if (!$hierarchie) return "";
	$hierarchie = substr($hierarchie,1);
	static $table = 'rubriques';
	static $id = '_rubriques_chemin';
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
		$t1 = (
'
		<a href="' .
interdire_scripts(generer_url_public('backend',(	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:syndiquer_rubrique',array()) .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite',array()) .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'&nbsp;</span></a>
');
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_syndic_rubhtml_cfd6d70febb562b11da51e8b937c2322(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_syndic_rub';
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
		<a href="' .
interdire_scripts(generer_url_public('backend',(	'id_rubrique=' .
	$Pile[$SP]['id_rubrique']))) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:syndiquer_rubrique',array()) .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite',array()) .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'</span></a>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_syndic_testhtml_cfd6d70febb562b11da51e8b937c2322(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_syndic_test';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	static $where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.syndication', "'oui'"));
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
'
	&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
		<a href="' .
interdire_scripts(generer_url_public('opml')) .
'" rel="nofollow" title="OPML : ' .
_T('ecrire:titre_sites_syndiques',array()) .
'"><img src="' .
interdire_scripts(find_in_path('styles/img/opml-icon.png')) .
'" alt="' .
_T('ecrire:titre_sites_syndiques',array()) .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span>&nbsp;OPML</span></a>
	<big>&nbsp;
		<b><a href="http://' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'.wikipedia.org/wiki/OPML">?</a></b>
	</big>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-bas.html.
//
function html_cfd6d70febb562b11da51e8b937c2322($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<div id="bas">
	<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a> | 
	<a href="' .
vider_url(urlencode_1738(generer_url_entite('1', 'auteur', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:info_contact',array()) .
'">' .
_T('public/spip/ecrire:info_contact',array()) .
'</a> | 
	<a href="' .
interdire_scripts(generer_url_public('plan')) .
'" title="' .
_T('public/spip/ecrire:plan_site',array()) .
'">' .
_T('public/spip/ecrire:plan_site',array()) .
'</a> | 
	' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? ' ':'')))))!=='' ?
		($t1 . (	' <a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array(),
	array(''), $GLOBALS['spip_lang'],6) .
	'">' .
	_T('public/spip/ecrire:icone_deconnecter',array()) .
	'</a>
	')) :
		'') .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? '':' ')))))!=='' ?
		($t1 . (	' <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login'),'url',self())) .
	'" class=\'login_modal\'>' .
	_T('public/spip/ecrire:lien_connecter',array()) .
	'</a>')) :
		'') .
' | 
	<a href="' .
interdire_scripts(generer_url_public('statistiques')) .
'" title="' .
_T('public/spip/ecrire:titre_statistiques',array()) .
'">' .
_T('public/spip/ecrire:icone_statistiques_visites',array()) .
'</a> | 
	<span style="white-space: nowrap;">' .
_T('public/spip/ecrire:info_visites',array()) .
' ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-affvisit') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'></span>

	<p>
		<a href="' .
interdire_scripts(generer_url_public('backend')) .
'" rel="nofollow" title="' .
_T('public/spip/ecrire:bouton_radio_syndication',array()) .
' ' .
traduire_nom_langue(htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])) .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite',array()) .
'" style="position:relative;bottom:-0.3em;" width="16" height="16" class="format_png" /><span style="text-transform: uppercase;">&nbsp;' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'&nbsp;</span></a>

' .
BOUCLE_rubriques_cheminhtml_cfd6d70febb562b11da51e8b937c2322($Cache, $Pile, $doublons, $Numrows, $SP) .
'

' .
BOUCLE_syndic_rubhtml_cfd6d70febb562b11da51e8b937c2322($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	<big>&nbsp;
		<b><a href="http://' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'.wikipedia.org/wiki/Really_Simple_Syndication">?</a></b>
	</big>
' .
BOUCLE_syndic_testhtml_cfd6d70febb562b11da51e8b937c2322($Cache, $Pile, $doublons, $Numrows, $SP) .
'
	</p>
	
	<p>
		<a href="http://www.spip.net" title="' .
_T('public/spip/ecrire:site_realise_avec_spip',array()) .
' ' .
spip_version() .
'"> ' .
_T('public/spip/ecrire:site_realise_avec_spip',array()) .
' ' .
interdire_scripts('2.0.8') .
'</a> + 
		<a href="http://edu.ca.edu/rubrique43.html" title="' .
_T('spip:squelette',array()) .
' AHUNTSIC - ' .
calcul_version_squelette() .
'">AHUNTSIC</a>
	</p>

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas_cc') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!-- fin bas -->

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas_menu-lang') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://www.torredekapter.es/spip/spip.php?action=cron');\"></div>" .
'

');

	return analyse_resultat_skel('html_cfd6d70febb562b11da51e8b937c2322', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-bas.html');
}

?>
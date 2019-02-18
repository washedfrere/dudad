<?php
/*
 * Squelette : plugins/auto/ahuntsic/rubrique.html
 * Date :      Wed, 31 Dec 2008 00:06:56 GMT
 * Compile :   Thu, 14 May 2009 18:16:09 GMT (0.017s)
 * Boucles :   _rubriques_body, _rubriques_chemin, _type_miniplan, _rubrique_principal
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_rubriques_bodyhtml_3f1b6bfefbdb51b29ff0fbd23584098f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $id = '_rubriques_body';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.lang");
	$orderby = array("FIELD(rubriques.id_rubrique, $hierarchie)");
	$where = 
			array(
			array('=', 'rubriques.id_secteur', sql_quote($Pile[$SP]['id_secteur'])), 
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
'rub' .
$Pile[$SP]['id_rubrique']);
		$t0 .= (($t1 && $t0) ? ' ' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE hierarchie>
//
function BOUCLE_rubriques_cheminhtml_3f1b6bfefbdb51b29ff0fbd23584098f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'rubriques.id_secteur', sql_quote($Pile[$SP]['id_secteur'])), 
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
		<b class=\'separateur\'>&gt;</b> 
		<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60')) .
'</a>
	');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_type_miniplanhtml_3f1b6bfefbdb51b29ff0fbd23584098f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_type_miniplan';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	$where = 
			array(
			array('=', 'L1.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'mots.titre', "'Rub_type_plan'"));
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
		<div class="chapo" id="miniplan">   	
    	' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('modeles/miniplan') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP-1]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP-1]['id_secteur']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
		</div><!-- chapo, miniplan -->
		');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_rubrique_principalhtml_3f1b6bfefbdb51b29ff0fbd23584098f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_rubrique_principal';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_secteur",
		"rubriques.id_rubrique",
		"rubriques.lang",
		"rubriques.titre",
		"rubriques.texte",
		"rubriques.descriptif");
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
		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'] : ' .
interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))))) .
'</title>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-meta') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	<link rel="alternate" type="application/rss+xml" title="' .
_T('public/spip/ecrire:syndiquer_rubrique',array()) .
' : ' .
interdire_scripts(entites_html(textebrut(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_rubrique',$Pile[$SP]['id_rubrique'])) .
'" />

	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('styles') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' rubrique sect' .
$Pile[$SP]['id_secteur'] .
' ' .
BOUCLE_rubriques_bodyhtml_3f1b6bfefbdb51b29ff0fbd23584098f($Cache, $Pile, $doublons, $Numrows, $SP) .
' rub' .
$Pile[$SP]['id_rubrique'] .
'">
<div id="page" class="rubrique rub' .
$Pile[$SP]['id_rubrique'] .
'">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bandeau') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<h5>
		<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
' : ' .
interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>
    ' .
(($t1 = BOUCLE_rubriques_cheminhtml_3f1b6bfefbdb51b29ff0fbd23584098f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
    ' . $t1 . '
	') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(couper(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))),'60'))))!=='' ?
		('<b class=\'separateur\'>&gt;</b> ' . $t1) :
		'') .
'
		</h5>
		<div class="ligne-debut"></div><!-- ligne-debut -->
    	' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'120','0'))))!=='' ?
		('<div class="logo-liste-art">
    		' . $t1 . '
    	</div>') :
		'') .
'
    <h1 class="titre-article">' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</h1>
	' .
(($t1 = strval(interdire_scripts((strlen($a = filtrer('image_graver', filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'440','0'))) ? $a : interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		((	'<div class="chapo ' .
	interdire_scripts(($Pile[$SP]['texte'] ? '':'')) .
	'" id="description">
        ') . $t1 . (	'
        ' .
	(($t2 = strval(interdire_scripts(calculer_notes())))!=='' ?
			('<div class="notes" style="padding: 0 1.5em;">' . $t2 . '</div>') :
			'') .
	'
	</div><!-- chapo -->')) :
		'') .
'
	

		' .
recuperer_fond('',$l =  array_merge($Pile[0],array('fond' => 'inc/inc-rub-documents' ,
	'id_rubrique' => $Pile[$SP]['id_rubrique'] )), array(), '') .
'
	


		' .
(($t1 = BOUCLE_type_miniplanhtml_3f1b6bfefbdb51b29ff0fbd23584098f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . '
		') :
		((	'


		' .
	
'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-rub-articles') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		'))) .
'
		
		<br class="nettoyeur" />
	</div><!-- bloc-contenu -->
	
<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  

' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-annonces') . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>

' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-breves') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>

' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-syndic') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
	
  </div><!-- encart -->

<!-- *****************************************************************
	Navigation principale et rubriques (haut et/ou gauche)
	Main and Sections Navigation (top and/orleft) 
    ************************************************************* -->
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
<!-- *****************************************************************
	Pied de page - Footer
    ************************************************************* -->
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'id_secteur\' => ' . argumenter_squelette($Pile[$SP]['id_secteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!-- page -->
</body>
</html>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/rubrique.html.
//
function html_3f1b6bfefbdb51b29ff0fbd23584098f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?>' .
(($t1 = BOUCLE_rubrique_principalhtml_3f1b6bfefbdb51b29ff0fbd23584098f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('404') . ',
	\'id_rubrique\' => ' . argumenter_squelette(@$Pile[0]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
'))));

	return analyse_resultat_skel('html_3f1b6bfefbdb51b29ff0fbd23584098f', $Cache, $page, 'plugins/auto/ahuntsic/rubrique.html');
}

?>
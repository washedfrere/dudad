<?php
/*
 * Squelette : squelettes-dist/breve.html
 * Date :      Wed, 19 Nov 2008 18:26:16 GMT
 * Compile :   Thu, 14 May 2009 17:34:40 GMT (0.024s)
 * Boucles :   _ariane, _breves, _mots, _principale
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_arianehtml_730d56a50f07975ebd0d204d4532151c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_ariane';
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
' &gt; <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breveshtml_730d56a50f07975ebd0d204d4532151c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.id_rubrique",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
	static $join = array();
	static $limit = '0,10';
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
'"' .
(calcul_exposer($Pile[$SP]['id_breve'], 'id_breve', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_breve', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
                ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_motshtml_730d56a50f07975ebd0d204d4532151c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
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

		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_principalehtml_730d56a50f07975ebd0d204d4532151c(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_principale';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.id_rubrique",
		"breves.id_breve",
		"breves.lang",
		"breves.titre",
		"breves.texte",
		"breves.date_heure AS date",
		"breves.lien_url AS url_site",
		"breves.lien_titre AS nom_site");
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
(($t1 = strval(interdire_scripts(textebrut(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(filtre_introduction_dist('', $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
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
_T('public/spip/ecrire:dernieres_breves',array()) .
'" href="' .
interdire_scripts(generer_url_public('backend-breves')) .
'" />
</head>

<body class="page_breve">
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
'/" >' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>' .
BOUCLE_arianehtml_730d56a50f07975ebd0d204d4532151c($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_breve', 'ON', $Pile[$SP]['id_breve'],'',  ''), '', ''),'200','200')) .
'
            <h1 class="">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</h1>
            <p><small><abbr class="published" title="' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'">' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</abbr></small></p>
        </div>
        
        ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['texte'], $connect))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
        ' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="lien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes"><h2>' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</h2>') . $t1 . '</div>') :
		'') .
'
        
        
        <a href="#forum" name="forum" id="forum"></a>
        ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-forum') . ',
	\'id_breve\' => ' . argumenter_squelette($Pile[$SP]['id_breve']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
        ' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum(@$Pile[0]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum(@$Pile[0]['id_article']) == ""))
		? "" : // sinon:
		("id_breve=".$Pile[$SP]['id_breve'].
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	_T('public/spip/ecrire:repondre_breve',array()) .
	'</a></p>')) :
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
	array(''), $GLOBALS['spip_lang'],49) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_breveshtml_730d56a50f07975ebd0d204d4532151c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2>' .
		_T('public/spip/ecrire:autres_breves',array()) .
		'</h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
(($t1 = BOUCLE_motshtml_730d56a50f07975ebd0d204d4532151c($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
	\'skel\' => ' . argumenter_squelette('squelettes-dist/breve.html') . ',
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
// Fonction principale du squelette squelettes-dist/breve.html.
//
function html_730d56a50f07975ebd0d204d4532151c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_730d56a50f07975ebd0d204d4532151c($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_730d56a50f07975ebd0d204d4532151c', $Cache, $page, 'squelettes-dist/breve.html');
}

?>
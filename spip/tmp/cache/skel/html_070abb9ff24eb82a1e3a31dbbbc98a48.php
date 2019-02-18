<?php
/*
 * Squelette : squelettes-dist/auteur.html
 * Date :      Tue, 24 Feb 2009 17:33:52 GMT
 * Compile :   Fri, 15 May 2009 22:01:56 GMT (0.103s)
 * Boucles :   _articles, _auteurs, _principale
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_070abb9ff24eb82a1e3a31dbbbc98a48(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.popularite",
		"articles.id_article",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.popularite DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
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
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_070abb9ff24eb82a1e3a31dbbbc98a48(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom",
		"auteurs.id_auteur");
	static $orderby = array('auteurs.nom');
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L2.statut', '\'publie\''));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_auteurs']) ? $Pile[0]['debut'.'_auteurs'] : _request('debut'.'_auteurs'));
	$fin_boucle = min($debut_boucle + 19, $nombre_boucle - 1);
	$Numrows['_auteurs']["grand_total"] = $nombre_boucle;
	$Numrows['_auteurs']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_auteurs']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_auteurs']['compteur_boucle']++;
		if ($Numrows['_auteurs']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_auteurs']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_auteur'], 'id_auteur', $Pile[0], '', 'id_auteur', '')  ?
		(' class="' . 'on' . '"') :
		'') .
'>' .
interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80')) .
'</a></li>
                ');
		}

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_principalehtml_070abb9ff24eb82a1e3a31dbbbc98a48(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_principale';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.id_auteur",
		"auteurs.lang",
		"auteurs.nom",
		"auteurs.bio",
		"auteurs.url_site",
		"auteurs.nom_site",
		"auteurs.email");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L2.statut', '\'publie\''), 
			array('=', 'auteurs.id_auteur', sql_quote($Pile[0]['id_auteur'])));
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
(($t1 = strval(interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect)))))!=='' ?
		($t1 . ' - ') :
		'') .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'</title>
' .
(($t1 = strval(interdire_scripts(attribut_html(couper(propre($Pile[$SP]['bio'], $connect),'150')))))!=='' ?
		('<meta name="description" content="' . $t1 . '" />') :
		'') .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-head') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>


' .
((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/favicon', $l = array('favicon' => affiche_logos(calcule_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'',  ''), '', '') ,'lang' => $GLOBALS["spip_lang"] ,'id_auteur='.$Pile[$SP]['id_auteur'],'id='.$Pile[$SP]['id_auteur'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')) .
'


<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
</head>

<body class="page_auteur">
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
'</a> &gt; ' .
_T('public/spip/ecrire:info_auteurs',array()) .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['nom'], "TYPO", $connect),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

		<div class="vcard">
        <div class="cartouche">
            ' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'',  ''), '', ''),'200','200')) .
'
            <h1 class="fn">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</h1>
        </div>

        ' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['bio'], $connect))))!=='' ?
		((	'<div class="texte note">') . $t1 . '</div>') :
		'') .
'
        ' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="url org spip_out">' .
	interdire_scripts((strlen($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
		</div>

        
        ' .
(($t1 = BOUCLE_articleshtml_070abb9ff24eb82a1e3a31dbbbc98a48($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
		_T('public/spip/ecrire:articles_auteur',array()) .
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
executer_balise_dynamique('FORMULAIRE_ECRIRE_AUTEUR',
	array($Pile[$SP]['id_auteur'],@$Pile[0]['id_article'],$Pile[$SP]['email']),
	array(''), $GLOBALS['spip_lang'],53) .
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
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		
		' .
executer_balise_dynamique('FORMULAIRE_RECHERCHE',
	array(),
	array(''), $GLOBALS['spip_lang'],66) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_auteurshtml_070abb9ff24eb82a1e3a31dbbbc98a48($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            ' .
		filtre_pagination_dist(
	(isset($Numrows['_auteurs']['grand_total']) ?
		$Numrows['_auteurs']['grand_total'] : $Numrows['_auteurs']['total']
	), '_auteurs',
		$Pile[0]['debut_auteurs'],20, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
            <h2>' .
		_T('public/spip/ecrire:info_auteurs',array()) .
		'</h2>
            <ul>
                ') . $t1 . (	'
            </ul>
            ' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_auteurs']['grand_total']) ?
		$Numrows['_auteurs']['grand_total'] : $Numrows['_auteurs']['total']
	), '_auteurs',
		$Pile[0]['debut_auteurs'],20, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'
        </div>
        ')) :
		'') .
'

    </div><!--#extra-->

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/auteur.html') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!--#page-->
</body>
</html>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/auteur.html.
//
function html_070abb9ff24eb82a1e3a31dbbbc98a48($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_070abb9ff24eb82a1e3a31dbbbc98a48($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_070abb9ff24eb82a1e3a31dbbbc98a48', $Cache, $page, 'squelettes-dist/auteur.html');
}

?>
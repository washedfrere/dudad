<?php
/*
 * Squelette : squelettes-dist/article.html
 * Date :      Wed, 19 Nov 2008 18:26:16 GMT
 * Compile :   Thu, 14 May 2009 17:41:50 GMT (0.016s)
 * Boucles :   _ariane, _articles_rubrique, _principale
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_arianehtml_7b25f536f47d963219c3a0d8038129b5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	if (!($id_rubrique = intval($Pile[$SP]['id_rubrique'])))
		return '';
	$hierarchie = ",$id_rubrique";
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
interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80')) .
'</a>');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_rubriquehtml_7b25f536f47d963219c3a0d8038129b5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_rubrique';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])));
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
                <li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'"' .
(calcul_exposer($Pile[$SP]['id_article'], 'id_article', $Pile[0], $Pile[$SP]['id_rubrique'], 'id_article', '')  ?
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
// <BOUCLE articles>
//
function BOUCLE_principalehtml_7b25f536f47d963219c3a0d8038129b5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_principale';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.id_article",
		"articles.surtitre",
		"articles.soustitre",
		"articles.date",
		"articles.date_redac",
		"articles.url_site",
		"articles.nom_site",
		"articles.ps");
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
(($t1 = strval(interdire_scripts(attribut_html(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], intval('150'), $connect)))))!=='' ?
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

<body class="page_article">
<div id="page">

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-entete') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	
    <div class="hfeed" id="conteneur">
    <div class="hentry" id="contenu">
    
        
        <div id="hierarchie"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>' .
BOUCLE_arianehtml_7b25f536f47d963219c3a0d8038129b5($Cache, $Pile, $doublons, $Numrows, $SP) .
(($t1 = strval(interdire_scripts(couper(typo($Pile[$SP]['titre'], "TYPO", $connect),'80'))))!=='' ?
		(' &gt; <strong class="on">' . $t1 . '</strong>') :
		'') .
'</div>

        <div class="cartouche">
            <div class="surlignable">
				' .
filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'200','200')) .
'
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		((	'<p class="surtitre">') . $t1 . '</p>') :
		'') .
'
				<h1 class="entry-title">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</h1>
				' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		((	'<p class="soustitre">') . $t1 . '</p>') :
		'') .
'
            </div>

            <p><small><abbr class="published" title="' .
interdire_scripts(date_iso(normaliser_date($Pile[$SP]['date']))) .
'">' .
(($t1 = strval(interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		($t1 . ' ') :
		'') .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</abbr>' .
(($t1 = strval(recuperer_fond('modeles/lesauteurs',
			array('id_article' => $Pile[$SP]['id_article']), array('trim'=>true), '')))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' ') . $t1) :
		'') .
(($t1 = strval(affdate(normaliser_date($Pile[$SP]['date_redac']))))!=='' ?
		((	' (' .
	_T('public/spip/ecrire:texte_date_publication_anterieure',array()) .
	' ') . $t1 . ').') :
		'') .
'</small></p>

            
            ' .
((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/article_traductions', $l = array('lang' => $GLOBALS["spip_lang"] ,'id_article='.$Pile[$SP]['id_article'],'id='.$Pile[$SP]['id_article'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')) .
'</div>
		
        <div class="surlignable">
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect),'500','0')))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['texte'], $connect),'500','0')))))!=='' ?
		((	'<div class="texte entry-content">') . $t1 . '</div>') :
		'') .
'
		</div>


		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'
        
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',propre($Pile[$SP]['ps'], $connect),'500','0')))))!=='' ?
		((	'<div class="ps surlignable"><h2 class="pas_surlignable">' .
	_T('public/spip/ecrire:info_ps',array()) .
	'</h2><div class="">') . $t1 . '</div></div>') :
		'') .
'



		
		' .
recuperer_fond('',$l =  array_merge($Pile[0],array('fond' => 'inc-documents' ,
	'id_article' => $Pile[$SP]['id_article'] )), array(), '') .
'


		' .
(quete_petitions($Pile[$SP]['id_article'],'articles','_principale','', $Cache)  ?
		(' ' . 
'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc-petition') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	echo "<div class=\'ajaxbloc env-'
			. eval('return encoder_contexte_ajax(array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc-petition') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ')));')
			. '\'>\n";
	include _DIR_RESTREINT . "public.php";
	echo "</div><!-- ajaxbloc -->\n";
?'.'>') :
		'') .
'

        ' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="notes surlignable"><h2 class="pas_surlignable">' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</h2>') . $t1 . '</div>') :
		'') .
'

		
		<a href="#forum" name="forum" id="forum"></a>
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-forum') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
		' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		("id_article=".$Pile[$SP]['id_article'].
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	_T('public/spip/ecrire:repondre_article',array()) .
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
	array(''), $GLOBALS['spip_lang'],72) .
'

    </div><!--#navigation-->
    
    
    <div id="extra">

        
        ' .
(($t1 = BOUCLE_articles_rubriquehtml_7b25f536f47d963219c3a0d8038129b5($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
        <div class="menu">
            <h2><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">' .
		_T('public/spip/ecrire:meme_rubrique',array()) .
		'</a></h2>
            <ul>
                ') . $t1 . '
            </ul>
        </div>
        ') :
		'') .
'

        
        ' .
((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/article_mots', $l = array('lang' => $GLOBALS["spip_lang"] ,'id_article='.$Pile[$SP]['id_article'],'id='.$Pile[$SP]['id_article'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')) .
'</div><!--#extra-->

	
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc-pied') . ',
	\'skel\' => ' . argumenter_squelette('squelettes-dist/article.html') . ',
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
// Fonction principale du squelette squelettes-dist/article.html.
//
function html_7b25f536f47d963219c3a0d8038129b5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_principalehtml_7b25f536f47d963219c3a0d8038129b5($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_7b25f536f47d963219c3a0d8038129b5', $Cache, $page, 'squelettes-dist/article.html');
}

?>
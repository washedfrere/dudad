<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-sommaire-edito.html
 * Date :      Sun, 19 Apr 2009 20:09:46 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.018s)
 * Boucles :   _articles_edito, _articles_edito2, _rub_first, _rubriques_edito
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articles_editohtml_8511a262f6897ec506bb4ef60f5dccbb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'articles';
	static $id = '_articles_edito';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), (!$Pile[0]['lang'] ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in0)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
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
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public/spip/ecrire:suite',array()) .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
	'" >' .
	_T('public/spip/ecrire:suite',array()) .
	'</a></div>
	</div><!-- fin chapo -->')) :
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
function BOUCLE_articles_edito2html_8511a262f6897ec506bb4ef60f5dccbb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	static $table = 'articles';
	static $id = '_articles_edito2';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.titre",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), (!$Pile[0]['lang'] ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('articles.lang',sql_quote($in1)) : 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
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
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'

	  ' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
			((	'<div class="">') . $t2 . '</div>') :
			'') .
	'
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect),'300'))))!=='' ?
				((	'<div class="">') . $t3 . '</div>') :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="chapo">' . $t1 . (	'	<div class="suite"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'" title="...' .
	_T('public/spip/ecrire:suite',array()) .
	' : ' .
	interdire_scripts(attribut_html(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))) .
	'" >' .
	_T('public/spip/ecrire:suite',array()) .
	'</a></div>
	</div><!-- fin chapo -->')) :
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
function BOUCLE_rub_firsthtml_8511a262f6897ec506bb4ef60f5dccbb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	static $table = 'rubriques';
	static $id = '_rub_first';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.id_parent', 0), (!$Pile[0]['lang'] ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in2)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])))));
	static $join = array();
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

' .
interdire_scripts((propre($GLOBALS['meta']['descriptif_site'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($GLOBALS['meta']['descriptif_site'], $connect))))!=='' ?
			((	'<h3 class="edito-titre descriptif-site">' .
		interdire_scripts(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)) .
		'</h3>
		<div class="chapo descriptif_site">') . $t2 . '</div>') :
			'') .
	'
	'):(	(($t2 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
			((	'<h3 class="edito-titre"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></h3>') :
			'') .
	'
        ' .
	(($t2 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'120','0'))))!=='' ?
			((	'<span style="float:right;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">') . $t2 . '</a></span>') :
			'') .
	'
        ' .
	(($t2 = strval(interdire_scripts((strlen($a = propre($Pile[$SP]['descriptif'], $connect)) ? $a : interdire_scripts(propre($Pile[$SP]['texte'], $connect))))))!=='' ?
			((	'<div class="chapo ' .
		interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
		'">
        	') . $t2 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
        </div>') :
			'') .
	'
'))) .
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
function BOUCLE_rubriques_editohtml_8511a262f6897ec506bb4ef60f5dccbb(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	if (!(is_array($a = ($Pile[0]['lang']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	static $table = 'rubriques';
	static $id = '_rubriques_edito';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("0+rubriques.titre AS num",
		"rubriques.titre",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.texte",
		"rubriques.lang");
	static $orderby = array('num', 'rubriques.titre');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), (!$Pile[0]['lang'] ? '' : ((is_array($Pile[0]['lang'])) ? sql_in('rubriques.lang',sql_quote($in3)) : 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])))), 
			array('=', 'L2.titre', "'Editorial'"));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
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
	  <br class="nettoyeur" />
      ' .
(($t1 = strval(interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<h3 class="edito-titre"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))), ''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'
      ' .
(($t1 = strval(interdire_scripts((strlen($a = propre($Pile[$SP]['descriptif'], $connect)) ? $a : interdire_scripts(propre($Pile[$SP]['texte'], $connect))))))!=='' ?
		((	'<div class="chapo ' .
	interdire_scripts(($Pile[$SP]['descriptif'] ? '':'')) .
	'">') . $t1 . '
        	<div style="clear: both; height: .1em;">&nbsp;</div>
       </div>') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-sommaire-edito.html.
//
function html_8511a262f6897ec506bb4ef60f5dccbb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'   
' .
(($t1 = BOUCLE_rubriques_editohtml_8511a262f6897ec506bb4ef60f5dccbb($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
' . $t1 . (	'

	' .
		(($t3 = BOUCLE_articles_editohtml_8511a262f6897ec506bb4ef60f5dccbb($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
				('
	' . $t3 . '
	') :
				'') .
		'

')) :
		((	'

	' .
	(($t2 = BOUCLE_rub_firsthtml_8511a262f6897ec506bb4ef60f5dccbb($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			('
	' . $t2 . (	'

	' .
			(($t4 = BOUCLE_articles_edito2html_8511a262f6897ec506bb4ef60f5dccbb($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
					('
	' . $t4 . '
	') :
					'') .
			'

	')) :
			((	'
	' .
		
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-install') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	'))) .
	'
	'))) .
'
    ');

	return analyse_resultat_skel('html_8511a262f6897ec506bb4ef60f5dccbb', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-sommaire-edito.html');
}

?>
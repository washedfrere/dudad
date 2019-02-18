<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-sommaire-articles.html
 * Date :      Mon, 12 Jan 2009 07:13:44 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (8.5ms)
 * Boucles :   _article_edito, _auteurs_langue, _article_langue
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_article_editohtml_06127b2c99c23b9789e8d5caf000c957(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_article_edito';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.id_article");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array('=', 'L2.titre', "'Editorial'"), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurs_languehtml_06127b2c99c23b9789e8d5caf000c957(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs_langue';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.nom");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array('L1' => array('auteurs','id_auteur'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t1 = (
'<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</a>');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_article_languehtml_06127b2c99c23b9789e8d5caf000c957(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_article_langue';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.date",
		"articles.id_rubrique",
		"articles.surtitre",
		"articles.titre",
		"articles.soustitre",
		"articles.descriptif",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_article_langue']) ? $Pile[0]['debut'.'_article_langue'] : _request('debut'.'_article_langue'));
	$fin_boucle = min($debut_boucle + 9, $nombre_boucle - 1);
	$Numrows['_article_langue']["grand_total"] = $nombre_boucle;
	$Numrows['_article_langue']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_article_langue']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_article_langue']['compteur_boucle']++;
		if ($Numrows['_article_langue']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_article_langue']['compteur_boucle']-1 > $fin_boucle) break;

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
	  <br class="nettoyeur" />
	  ' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],$Pile[$SP]['id_rubrique'],  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'150','0'))))!=='' ?
		('<div class="logo-liste-art">
		' . $t1 . '
	  </div>') :
		'') .
'
	  ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['surtitre'], "TYPO", $connect)))))!=='' ?
		((	'<div class="surtitre">') . $t1 . '</div>') :
		'') .
'
      <h3><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" class="titre-article">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a></h3>
      ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['soustitre'], "TYPO", $connect)))))!=='' ?
		((	'<div class="sous-titre">') . $t1 . '</div>') :
		'') .
'
      <div class="detail">
        <span class="">' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'</span>
        ' .
(($t1 = BOUCLE_auteurs_languehtml_06127b2c99c23b9789e8d5caf000c957($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'<span class="auteur-article">' .
		_T('public/spip/ecrire:par_auteur',array()) .
		' ') . $t1 . '</span>') :
		'') .
'
      </div><!-- detail -->

      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)) ? (	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
			((	'<div class="">') . $t2 . (	'</div>
		<div class="suite"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'" title="...' .
		_T('public/spip/ecrire:suite',array()) .
		'" >' .
		_T('public/spip/ecrire:suite',array()) .
		'</a></div>')) :
			'') .
	'
		'):(	interdire_scripts((traiter_doublons_documents($doublons, propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect)) ? (	(($t3 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect)))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public/spip/ecrire:suite',array()) .
			'" >' .
			_T('public/spip/ecrire:suite',array()) .
			'</a></div>')) :
				'') .
		'
      		'):(	(($t3 = strval(interdire_scripts(couper(traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)),'300'))))!=='' ?
				((	'<div class="">') . $t3 . (	'</div>
      	<div class="suite"><a href="' .
			vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
			'" title="...' .
			_T('public/spip/ecrire:suite',array()) .
			'" >' .
			_T('public/spip/ecrire:suite',array()) .
			'</a></div>')) :
				'') .
		'
		'))) .
	'
	')))))!=='' ?
		('<div class="extrait">' . $t1 . '</div><!-- fin extrait -->') :
		'') .
'
      </div><!-- fin texte -->
      <br class="nettoyeur" />
    ');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-sommaire-articles.html.
//
function html_06127b2c99c23b9789e8d5caf000c957($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'	<br class="nettoyeur" />
	<div class="edito">
		<h3 class="edito-titre">' .
_T('public/spip/ecrire:articles_recents',array()) .
'</h3>
	</div>

    ' .
BOUCLE_article_editohtml_06127b2c99c23b9789e8d5caf000c957($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    ' .
(($t1 = BOUCLE_article_languehtml_06127b2c99c23b9789e8d5caf000c957($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    ' .
		filtre_pagination_dist(
	(isset($Numrows['_article_langue']['grand_total']) ?
		$Numrows['_article_langue']['grand_total'] : $Numrows['_article_langue']['total']
	), '_article_langue',
		$Pile[0]['debut_article_langue'],10, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
    ') . $t1 . (	'

    ' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_article_langue']['grand_total']) ?
		$Numrows['_article_langue']['grand_total'] : $Numrows['_article_langue']['total']
	), '_article_langue',
		$Pile[0]['debut_article_langue'],10, true, 'page_precedent_suivant','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				((	'<div class="pagination">
      <div class="ligne1">
        <div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_article_langue']['total'] .
			'/' .
			(isset($Numrows['_article_langue']['grand_total'])
			? $Numrows['_article_langue']['grand_total'] : $Numrows['_article_langue']['total']) .
			' ' .
			_T('public/spip/ecrire:articles',array()) .
			'</div>
      </div>
      <div class="ligne2">
        ') . $t3 . '
      </div>
    </div>') :
				'') .
		'

    ')) :
		('
    ')));

	return analyse_resultat_skel('html_06127b2c99c23b9789e8d5caf000c957', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-sommaire-articles.html');
}

?>
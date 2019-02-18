<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-rub-articles.html
 * Date :      Mon, 12 Jan 2009 07:13:44 GMT
 * Compile :   Thu, 14 May 2009 18:16:09 GMT (8.1ms)
 * Boucles :   _articles_rubrique_nom, _auteurs_recents, _articles_rubrique
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_articles_rubrique_nomhtml_c4c63f42398c13e25df7e394c2c16865(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_articles_rubrique_nom';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.descriptif",
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
'
				<b class="petit-info"><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>(' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
')</a></b>
			');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurs_recentshtml_c4c63f42398c13e25df7e394c2c16865(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs_recents';
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
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a>');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_rubriquehtml_c4c63f42398c13e25df7e394c2c16865(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_rubrique';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.id_article",
		"0+articles.titre AS num",
		"articles.date",
		"articles.surtitre",
		"articles.descriptif",
		"articles.titre",
		"articles.soustitre",
		"articles.chapo",
		"articles.texte",
		"articles.lang");
	static $orderby = array('num', 'articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), sql_in('articles.id_rubrique', calcul_branche_in($Pile[0]['id_rubrique'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_articles_rubrique']) ? $Pile[0]['debut'.'_articles_rubrique'] : _request('debut'.'_articles_rubrique'));
	$fin_boucle = min($debut_boucle + 9, $nombre_boucle - 1);
	$Numrows['_articles_rubrique']["grand_total"] = $nombre_boucle;
	$Numrows['_articles_rubrique']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_articles_rubrique']['compteur_boucle'] = 0;
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_articles_rubrique']['compteur_boucle']++;
		if ($Numrows['_articles_rubrique']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_articles_rubrique']['compteur_boucle']-1 > $fin_boucle) break;
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
			<br class="nettoyeur" />
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))), ''),'120','0'))))!=='' ?
		('<div class="logo-liste-art">
				' . $t1 . '
			</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['surtitre'], "TYPO", $connect))))!=='' ?
		('<div class="surtitre">' . $t1 . '</div>') :
		'') .
'
			<h3>
			<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
			' .
BOUCLE_articles_rubrique_nomhtml_c4c63f42398c13e25df7e394c2c16865($Cache, $Pile, $doublons, $Numrows, $SP) .
'
			</h3>
      	' .
(($t1 = strval(interdire_scripts(typo($Pile[$SP]['soustitre'], "TYPO", $connect))))!=='' ?
		('<div class="sous-titre">' . $t1 . '</div>') :
		'') .
'
			<div class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
				' .
(($t1 = BOUCLE_auteurs_recentshtml_c4c63f42398c13e25df7e394c2c16865($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	_T('public/spip/ecrire:par_auteur',array()) .
		' ') . $t1) :
		'') .
'
			</div><!-- detail -->
      <div class="texte">
	' .
(($t1 = strval(interdire_scripts((propre($Pile[$SP]['descriptif'], $connect) ? (	(($t2 = strval(interdire_scripts(propre($Pile[$SP]['descriptif'], $connect))))!=='' ?
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
		'):(	interdire_scripts((propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect) ? (	(($t3 = strval(interdire_scripts(propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect))))!=='' ?
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
      		'):(	(($t3 = strval(interdire_scripts(couper(propre($Pile[$SP]['texte'], $connect),'300'))))!=='' ?
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
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-rub-articles.html.
//
function html_c4c63f42398c13e25df7e394c2c16865($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'		' .
(($t1 = BOUCLE_articles_rubriquehtml_c4c63f42398c13e25df7e394c2c16865($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public/spip/ecrire:articles_rubrique',array()) .
		'</h2>
		 ' .
		filtre_pagination_dist(
	(isset($Numrows['_articles_rubrique']['grand_total']) ?
		$Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']
	), '_articles_rubrique',
		$Pile[0]['debut_articles_rubrique'],10, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
		') . $t1 . (	'
		
		' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_articles_rubrique']['grand_total']) ?
		$Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']
	), '_articles_rubrique',
		$Pile[0]['debut_articles_rubrique'],10, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_articles_rubrique']['total'] .
			'/' .
			(isset($Numrows['_articles_rubrique']['grand_total'])
			? $Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']) .
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
		''));

	return analyse_resultat_skel('html_c4c63f42398c13e25df7e394c2c16865', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-rub-articles.html');
}

?>
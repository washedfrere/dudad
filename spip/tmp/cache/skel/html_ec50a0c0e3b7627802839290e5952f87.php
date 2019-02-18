<?php
/*
 * Squelette : plugins/auto/ahuntsic/article.html
 * Date :      Wed, 18 Mar 2009 12:28:04 GMT
 * Compile :   Thu, 14 May 2009 18:14:54 GMT (0.045s)
 * Boucles :   _rubriques_body, _rubriques_chemin, _traductions, _auteurs_recents, _articles_auteur, _auteurs, _mots_eclus, _articles_mots, _mots, _Forums_Boucle, _forums_fils, _forums, _articles_rubrique, _rub_en_cours, _article_principal
 */ 
//
// <BOUCLE hierarchie>
//
function BOUCLE_rubriques_bodyhtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
	static $id = '_rubriques_body';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
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
function BOUCLE_rubriques_cheminhtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		$t0 .= (
'
              <b class=\'separateur\'>&gt;</b> 
              <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
'">' .
interdire_scripts(couper(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))),'60')) .
'</a>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_traductionshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_traductions';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.lang",
		"articles.id_article",
		"articles.titre");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('OR', 
			array('AND', 
			array('=', 'articles.id_trad', 0), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array('AND', 
			array('>', 'articles.id_trad', 0), 
			array('=', 'articles.id_trad', sql_quote($Pile[$SP]['id_trad'])))), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'])));
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
              ' .
(($t1 = strval(traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
		((	'<div dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">') . $t1 . (	' : <a href="' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'/spip.php?action=converser&amp;redirect=' .
	htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
	'%2F' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'&amp;var_lang=' .
	htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
	'" dir="' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'">')) :
		'') .
(($t1 = strval(interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))))!=='' ?
		($t1 . '</a></div>') :
		'') .
'
            ');
		$t0 .= (($t1 && $t0) ? '<br />' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurs_recentshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</a>
				');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_auteurhtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_auteur';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])), 
			array('!=', 'articles.id_article', sql_quote($Pile[$SP-1]['id_article'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '0,5';
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
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
						</li>
							');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.nom");
	static $orderby = array('auteurs.nom');
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

		$t0 .= (
'
				<h4><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'" title="' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'">' .
interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</a></h4>	
					' .
(($t1 = BOUCLE_articles_auteurhtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
					<h3><em>' .
		_T('public/spip/ecrire:articles_auteur',array()) .
		'</em></h3>
					<ul>
						') . $t1 . (	'
						<li><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
		'" title="' .
		_T('public/spip/ecrire:suite',array()) .
		'">[...]</a></li>
					</ul>
					')) :
		'') .
'
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_mots_eclushtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'mots';
	static $id = '_mots_eclus';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot");
	static $orderby = array();
	$where = 
			array(
			array('=', 'mots.type', "'_config_'"), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_motshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles_mots';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L1.id_mot', sql_quote($Pile[$SP]['id_mot'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '0,5';
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
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" title="' .
interdire_scripts(entites_html(textebrut(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))) .
'">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
								</li>
							');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE mots>
//
function BOUCLE_motshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.id_mot",
		"mots.titre");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[$SP]['id_article'])), 
			array(sql_in('mots.id_mot', $doublons[$doublons_index[]= ('mots')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_mot']; // doublons

		$t0 .= (
'
					<li>
							<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" title="' .
_T('public/spip/ecrire:info_articles_lies_mot',array()) .
'">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
						' .
(($t1 = BOUCLE_articles_motshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						<ul>
							' . $t1 . '
						</ul>
						') :
		'') .
'						
					</li>
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_Forums_Bouclehtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_forums_fils']);
	$t0 = (($t1 = BOUCLE_forums_filshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forums_filshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums_fils';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', sql_quote($Pile[$SP]['id_forum'])));
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

		$t0 .= (
'
						<ul>
							<li>
								<div class="forum">
									<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
									<div class="forum-chapo">
										<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))) .
'</div>
										' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(safehtml(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))))))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
									</div><!-- forum-chapo -->
									<div class=" forum-item">
										' .
interdire_scripts(safehtml(traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)))) .
'
										' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))) .
	'</a></div>')) :
		'') .
'
										' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	_T('public/spip/ecrire:repondre_message',array()) .
	'</a></div>')) :
		'') .
'
									</div><!-- forum-item -->
								</div><!-- forum -->
							</li>
						</ul>
							' .
BOUCLE_Forums_Bouclehtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP) .
'
						');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forumshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'forum';
	static $id = '_forums';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	static $select = array("forum.id_forum",
		"forum.date_heure",
		"forum.titre",
		"forum.date_heure AS date",
		"forum.auteur AS nom",
		"forum.texte",
		"forum.url_site",
		"forum.nom_site",
		"forum.id_article",
		"forum.id_breve",
		"forum.id_rubrique",
		"forum.id_syndic");
	static $orderby = array('forum.date_heure DESC');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), 
			array('=', 'forum.id_article', sql_quote($Pile[$SP]['id_article'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_forums']) ? $Pile[0]['debut'.'_forums'] : _request('debut'.'_forums'));
	$fin_boucle = min($debut_boucle + 19, $nombre_boucle - 1);
	$Numrows['_forums']["grand_total"] = $nombre_boucle;
	$Numrows['_forums']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_forums']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_forums']['compteur_boucle']++;
		if ($Numrows['_forums']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_forums']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
				<li>
					<div class="forum-fil">
						<div class="forum">
							<a name="forum' .
$Pile[$SP]['id_forum'] .
'"></a>
							<div class="forum-chapo">
								<div class=" forum-titre">' .
interdire_scripts(supprimer_numero(safehtml(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))) .
'</div>
								' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(safehtml(traiter_doublons_documents($doublons, typo($Pile[$SP]['nom'], "TYPO", $connect))))))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' <strong>') . $t1 . '</strong>') :
		'') .
'
							</div><!-- forum-chapo -->
							<div class=" forum-item" style="background-color: #ffe;">
								' .
interdire_scripts(safehtml(traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)))) .
'
								' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		('<div class="forum-titre"><a href="' . $t1 . (	'" class="spip_out">' .
	interdire_scripts(safehtml(traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))) .
	'</a></div>')) :
		'') .
'
								' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!$Pile[$SP]['id_article']) ? '' : ('&id_article='.$Pile[$SP]['id_article'])).
((!$Pile[$SP]['id_breve']) ? '' : ('&id_breve='.$Pile[$SP]['id_breve'])).
((!$Pile[$SP]['id_rubrique']) ? '' : ('&id_rubrique='.$Pile[$SP]['id_rubrique'])).
((!$Pile[$SP]['id_syndic']) ? '' : ('&id_syndic='.$Pile[$SP]['id_syndic'])).
((!$Pile[$SP]['id_forum']) ? '' : ('&id_forum='.$Pile[$SP]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre-message"><a href="' . $t1 . (	'">' .
	_T('public/spip/ecrire:repondre_message',array()) .
	'</a></div>')) :
		'') .
'
							</div><!-- forum-item -->
						</div><!-- forum -->
						' .
(($t1 = BOUCLE_forums_filshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
						' . $t1 . '
						') :
		'') .
'
					</div><!-- forum-fil -->
				</li>
			');
		}

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articles_rubriquehtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_articles_rubrique';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("0+articles.titre AS num",
		"articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.lang");
	static $orderby = array('num', 'articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_rubrique', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('NOT', 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article']))), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_articles_rubrique']) ? $Pile[0]['debut'.'_articles_rubrique'] : _request('debut'.'_articles_rubrique'));
	$fin_boucle = min($debut_boucle + 14, $nombre_boucle - 1);
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
							<li>
								<a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</a>
							</li>
							');
		}

	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_rub_en_courshtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_rub_en_cours';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_rubrique",
		"articles.lang");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_article', sql_quote($Pile[$SP]['id_article'])));
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
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu') . ',
	\'id_rubrique\' => ' . argumenter_squelette($Pile[$SP]['id_rubrique']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_article_principalhtml_ec50a0c0e3b7627802839290e5952f87(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_article_principal';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_trad",
		"articles.id_article",
		"articles.id_rubrique",
		"articles.lang",
		"articles.titre",
		"articles.id_secteur",
		"articles.surtitre",
		"articles.soustitre",
		"articles.date",
		"articles.chapo",
		"articles.texte",
		"articles.ps",
		"articles.url_site",
		"articles.nom_site");
	static $orderby = array();
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.id_article', sql_quote($Pile[0]['id_article'])), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
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
	<title>' .
interdire_scripts(textebrut(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))) .
' - [' .
interdire_scripts(textebrut(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect)))) .
']</title>
		' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-meta') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
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
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' article sect' .
$Pile[$SP]['id_secteur'] .
' ' .
BOUCLE_rubriques_bodyhtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP) .
' art' .
$Pile[$SP]['id_article'] .
'">
<div id="page" class="article art' .
$Pile[$SP]['id_article'] .
'">
<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bandeau') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>


<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->

    <div id="bloc-contenu">
      <div class="article-info-rubrique">
        <h5>
        <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'" title="' .
_T('public/spip/ecrire:accueil_site',array()) .
' : ' .
interdire_scripts(traiter_doublons_documents($doublons, typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'">' .
_T('public/spip/ecrire:accueil_site',array()) .
'</a>
        ' .
(($t1 = BOUCLE_rubriques_cheminhtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
            ' . $t1) :
		'') .
'
        </h5>

        ' .
(($t1 = BOUCLE_traductionshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
            <div class="petit-info" style="text-align:right">' .
		_T('public/spip/ecrire:titre_langue_trad_article',array()) .
		' 
            ') . $t1 . '
            </div>
        ') :
		'') .
'
        
        <div class="ligne-debut"></div><!-- ligne-debut -->
      </div><!-- article-info-rubrique -->
      
      <div class="cartouche">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'160','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['surtitre'], "TYPO", $connect)))))!=='' ?
		((	'<div  class="surtitre">') . $t1 . '</div>') :
		'') .
'
			<h1 class="titre-article">' .
interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))) .
'</h1>
            ' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['soustitre'], "TYPO", $connect)))))!=='' ?
		((	'<div class="sous-titre">') . $t1 . '</div>') :
		'') .
'
				<p class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
				' .
(($t1 = BOUCLE_auteurs_recentshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	_T('public/spip/ecrire:par_auteur',array()) .
		'
				') . $t1) :
		'') .
'
				</p>
				
      </div><!-- cartouche -->


		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',traiter_doublons_documents($doublons, propre(nettoyer_chapo($Pile[$SP]['chapo']), $connect)),'440','0')))))!=='' ?
		((	'<div class="chapo">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(filtrer('image_graver',filtrer('image_reduire',traiter_doublons_documents($doublons, propre($Pile[$SP]['texte'], $connect)),'440','0')))))!=='' ?
		((	'<div class="texte">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['ps'], $connect)))))!=='' ?
		((	'<div class="ps">') . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		('<div class="notes">' . $t1 . '</div>') :
		'') .
'
		' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<div class="chapo">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'">' .
	interdire_scripts((strlen($a = traiter_doublons_documents($doublons, typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) ? $a : calculer_url($Pile[$SP]['url_site'],'','url', $connect))) .
	'</a></div>')) :
		'') .
'
		<br class="nettoyeur" />


		' .
recuperer_fond('',$l =  array_merge($Pile[0],array('fond' => 'inc/inc-art-documents' ,
	'id_article' => $Pile[$SP]['id_article'] )), array(), '') .
'


		' .
(($t1 = strval((quete_petitions($Pile[$SP]['id_article'],'articles','_article_principal','', $Cache) ? '':'')))!=='' ?
		((	'  Conserver cet invalideur : ') . $t1 . ' ') :
		'') .
'
			' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc-petition') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>' .
'
		
		<!-- Derniers articles des auteurs de l\'article -->
		' .
(($t1 = BOUCLE_auteurshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
			<div class="ps" id="articles-recents-auteur">
				' . $t1 . '
			</div><!-- notes chapo -->
		') :
		'') .
'

		<!-- Mots cles -->
		' .
BOUCLE_mots_eclushtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP) .
'
		' .
(($t1 = BOUCLE_motshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<div class="ps" id="mots-cles_associes">
			<h2>' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		'</h2>
			<ul title="' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		'">
				') . $t1 . '
			</ul>
		</div><!-- menu -->
		') :
		'') .
'

		<!-- Forums -->
		' .
(($t1 = strval(url_reponse_forum(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum($Pile[$SP]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum($Pile[$SP]['id_article']) == ""))
		? "" : // sinon:
		("id_article=".$Pile[$SP]['id_article'].
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))))))!=='' ?
		('<div class="forum-repondre">
			<h5><a href="' . $t1 . (	'">' .
	_T('public/spip/ecrire:repondre_article',array()) .
	'</a></h5>
		</div>')) :
		'') .
'
		' .
(($t1 = BOUCLE_forumshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<h2 class="structure">' .
		_T('public/spip/ecrire:forum',array()) .
		'</h2>
			' .
		filtre_pagination_dist(
	(isset($Numrows['_forums']['grand_total']) ?
		$Numrows['_forums']['grand_total'] : $Numrows['_forums']['total']
	), '_forums',
		$Pile[0]['debut_forums'],20, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
		<ul class="forum-total">
			') . $t1 . (	'
		</ul><!-- forum-total -->
		
		' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_forums']['grand_total']) ?
		$Numrows['_forums']['grand_total'] : $Numrows['_forums']['total']
	), '_forums',
		$Pile[0]['debut_forums'],20, true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				((	'<div class="pagination">
			<div class="ligne1">
				<div dir="' .
			lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
			'">' .
			$Numrows['_forums']['total'] .
			'/' .
			(isset($Numrows['_forums']['grand_total'])
			? $Numrows['_forums']['grand_total'] : $Numrows['_forums']['total']) .
			' ' .
			_T('public/spip/ecrire:messages_forum',array()) .
			'</div>
			</div>
			<div class="ligne2">
        		') . $t3 . '
			</div>
		</div><!-- pagination -->') :
				'') .
		'

		')) :
		'') .
'
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
		<!-- Derniers articles dans la meme rubrique -->
		' .
(($t1 = BOUCLE_articles_rubriquehtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
			<div class="menu" id="articles_meme_rubrique">
			<h2 class="structure">' .
		_T('public/spip/ecrire:articles_recents',array()) .
		'</h2>
				' .
		filtre_pagination_dist(
	(isset($Numrows['_articles_rubrique']['grand_total']) ?
		$Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']
	), '_articles_rubrique',
		$Pile[0]['debut_articles_rubrique'],15, false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
				<ul>
					<li>
						<a href="' .
		htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
		'/' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'">' .
		_T('public/spip/ecrire:meme_rubrique',array()) .
		'</a>
						<ul>
							') . $t1 . (	'
						</ul>
					</li>
				</ul>
				' .
		filtre_pagination_dist(
	(isset($Numrows['_articles_rubrique']['grand_total']) ?
		$Numrows['_articles_rubrique']['grand_total'] : $Numrows['_articles_rubrique']['total']
	), '_articles_rubrique',
		$Pile[0]['debut_articles_rubrique'],15, true, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'
			</div><!-- menu -->
		')) :
		'') .
'

	</div><!-- encart -->
	
' .
BOUCLE_rub_en_courshtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP) .
'
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas') . ',
	\'id_article\' => ' . argumenter_squelette($Pile[$SP]['id_article']) . ',
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
// Fonction principale du squelette plugins/auto/ahuntsic/article.html.
//
function html_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?>' .
(($t1 = BOUCLE_article_principalhtml_ec50a0c0e3b7627802839290e5952f87($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('404') . ',
	\'id_article\' => ' . argumenter_squelette(@$Pile[0]['id_article']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
'))));

	return analyse_resultat_skel('html_ec50a0c0e3b7627802839290e5952f87', $Cache, $page, 'plugins/auto/ahuntsic/article.html');
}

?>
<?php
/*
 * Squelette : squelettes-dist/inc-forum.html
 * Date :      Mon, 09 Feb 2009 08:15:42 GMT
 * Compile :   Thu, 14 May 2009 17:34:40 GMT (0.021s)
 * Boucles :   _decompte, _doc, _doc2, _forums_boucle, _forums_fils, _forums
 */ 
//
// <BOUCLE forums>
//
function BOUCLE_decomptehtml_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['id_rubrique']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['id_article']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	$in2 = array();
	if (!(is_array($a = ($Pile[0]['id_breve']))))
		$in2[]= $a;
	else $in2 = array_merge($in2, $a);
	$in3 = array();
	if (!(is_array($a = ($Pile[0]['id_syndic']))))
		$in3[]= $a;
	else $in3 = array_merge($in3, $a);
	static $table = 'forum';
	static $id = '_decompte';
	static $from = array('forum' => 'spip_forum');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), (!$Pile[0]['id_rubrique'] ? '' : ((is_array($Pile[0]['id_rubrique'])) ? sql_in('forum.id_rubrique',sql_quote($in0)) : 
			array('=', 'forum.id_rubrique', sql_quote($Pile[0]['id_rubrique'])))), (!$Pile[0]['id_article'] ? '' : ((is_array($Pile[0]['id_article'])) ? sql_in('forum.id_article',sql_quote($in1)) : 
			array('=', 'forum.id_article', sql_quote($Pile[0]['id_article'])))), (!$Pile[0]['id_breve'] ? '' : ((is_array($Pile[0]['id_breve'])) ? sql_in('forum.id_breve',sql_quote($in2)) : 
			array('=', 'forum.id_breve', sql_quote($Pile[0]['id_breve'])))), (!$Pile[0]['id_syndic'] ? '' : ((is_array($Pile[0]['id_syndic'])) ? sql_in('forum.id_syndic',sql_quote($in3)) : 
			array('=', 'forum.id_syndic', sql_quote($Pile[0]['id_syndic'])))));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_decompte']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_dochtml_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_doc';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet="article")
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet="breve")
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet="rubrique")
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet="forum")
		','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.extension",
		"documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'])), 
			array('=', 'L1.objet', sql_quote('forum')));
	static $join = array('L1' => array('documents','id_document'));
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
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/emb', $l = array('300' => @$Pile[0]['300'] ,'lang' => $GLOBALS["spip_lang"] ,'id_document='.$Pile[$SP]['id_document'],'id='.$Pile[$SP]['id_document'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')),'300')) .
	'
				'):(	calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '','') .
	'
				'))) .
'
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_doc2html_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_doc2';
	static $from = array('documents' => 'spip_documents LEFT JOIN spip_documents_liens AS l
			ON documents.id_document=l.id_document
			LEFT JOIN spip_articles AS aa
				ON (l.id_objet=aa.id_article AND l.objet="article")
			LEFT JOIN spip_breves AS bb
				ON (l.id_objet=bb.id_breve AND l.objet="breve")
			LEFT JOIN spip_rubriques AS rr
				ON (l.id_objet=rr.id_rubrique AND l.objet="rubrique")
			LEFT JOIN spip_forum AS ff
				ON (l.id_objet=ff.id_forum AND l.objet="forum")
		','L1' => 'spip_documents_liens');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.extension",
		"documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_forum'])), 
			array('=', 'L1.objet', sql_quote('forum')));
	static $join = array('L1' => array('documents','id_document'));
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
				' .
interdire_scripts((match($Pile[$SP]['extension'],'^(gif|jpg|png)$') ? (	filtrer('image_graver',filtrer('image_reduire',((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/emb', $l = array('300' => @$Pile[0]['300'] ,'lang' => $GLOBALS["spip_lang"] ,'id_document='.$Pile[$SP]['id_document'],'id='.$Pile[$SP]['id_document'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')),'300')) .
	'
				'):(	calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '','') .
	'
				'))) .
'
				');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE boucle>
//
function BOUCLE_forums_bouclehtml_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$save_numrows = ($Numrows['_forums_fils']);
	$t0 = (($t1 = BOUCLE_forums_filshtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
		<ul>
			' . $t1 . '
		</ul>
		') :
		'');
	$Numrows['_forums_fils'] = ($save_numrows);
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forums_filshtml_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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

			<li>
				<div class="forum-message">
					<div class="forum-chapo">
						<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></strong>
						<small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(couper(safehtml(typo($Pile[$SP]['nom'], "TYPO", $connect)),'80'))))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' <span class="">') . $t1 . '</span>') :
		'') .
'</small>
					</div>
					<div class="forum-texte">
						' .
interdire_scripts(lignes_longues(safehtml(propre($Pile[$SP]['texte'], $connect)))) .
'
						' .
(($t1 = strval(interdire_scripts(lignes_longues(safehtml(calculer_notes())))))!=='' ?
		('<div class="notes surlignable">' . $t1 . '</div>') :
		'') .
'
						' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_doc2html_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP) .
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
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	_T('public/spip/ecrire:repondre_message',array()) .
	'</a></p>')) :
		'') .
'
					</div>
				</div>

				' .
BOUCLE_forums_bouclehtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP) .
'

			</li>

			');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE forums>
//
function BOUCLE_forumshtml_f9bfdf2f688bb73aa1d5a55210485c44(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in4 = array();
	if (!(is_array($a = ($Pile[0]['id_rubrique']))))
		$in4[]= $a;
	else $in4 = array_merge($in4, $a);
	$in5 = array();
	if (!(is_array($a = ($Pile[0]['id_article']))))
		$in5[]= $a;
	else $in5 = array_merge($in5, $a);
	$in6 = array();
	if (!(is_array($a = ($Pile[0]['id_breve']))))
		$in6[]= $a;
	else $in6 = array_merge($in6, $a);
	$in7 = array();
	if (!(is_array($a = ($Pile[0]['id_syndic']))))
		$in7[]= $a;
	else $in7 = array_merge($in7, $a);
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
	static $orderby = array('forum.date_heure');
	$where = 
			array(
			array('=', 'forum.statut', '\'publie\''), 
			array('=', 'forum.id_parent', 0), (!$Pile[0]['id_rubrique'] ? '' : ((is_array($Pile[0]['id_rubrique'])) ? sql_in('forum.id_rubrique',sql_quote($in4)) : 
			array('=', 'forum.id_rubrique', sql_quote($Pile[0]['id_rubrique'])))), (!$Pile[0]['id_article'] ? '' : ((is_array($Pile[0]['id_article'])) ? sql_in('forum.id_article',sql_quote($in5)) : 
			array('=', 'forum.id_article', sql_quote($Pile[0]['id_article'])))), (!$Pile[0]['id_breve'] ? '' : ((is_array($Pile[0]['id_breve'])) ? sql_in('forum.id_breve',sql_quote($in6)) : 
			array('=', 'forum.id_breve', sql_quote($Pile[0]['id_breve'])))), (!$Pile[0]['id_syndic'] ? '' : ((is_array($Pile[0]['id_syndic'])) ? sql_in('forum.id_syndic',sql_quote($in7)) : 
			array('=', 'forum.id_syndic', sql_quote($Pile[0]['id_syndic'])))));
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

	<li class="forum-fil">

		<div class="forum-message">
			<div class="forum-chapo">
				<strong class="forum-titre"><a href="#forum' .
$Pile[$SP]['id_forum'] .
'" name="forum' .
$Pile[$SP]['id_forum'] .
'" id="forum' .
$Pile[$SP]['id_forum'] .
'">' .
interdire_scripts(safehtml(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
'</a></strong>
				<small>' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
(($t1 = strval(interdire_scripts(heures(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('&nbsp;' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(minutes(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		(':' . $t1) :
		'') .
(($t1 = strval(interdire_scripts(couper(safehtml(typo($Pile[$SP]['nom'], "TYPO", $connect)),'80'))))!=='' ?
		((	', ' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' <span class="">') . $t1 . '</span>') :
		'') .
'</small>
			</div>
			<div class="forum-texte">
				' .
interdire_scripts(lignes_longues(safehtml(propre($Pile[$SP]['texte'], $connect)))) .
'
				' .
(($t1 = strval(interdire_scripts(lignes_longues(safehtml(calculer_notes())))))!=='' ?
		('<div class="notes surlignable">' . $t1 . '</div>') :
		'') .
'
				' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<p class="hyperlien">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))) ? $a : couper(calculer_url($Pile[$SP]['url_site'],'','url', $connect),'80'))) .
	'</a></p>')) :
		'') .
'

				' .
BOUCLE_dochtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP) .
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
		('<p class="repondre"><a href="' . $t1 . (	'" rel="noindex nofollow">' .
	_T('public/spip/ecrire:repondre_message',array()) .
	'</a></p>')) :
		'') .
'
			</div>
		</div>

		' .
(($t1 = BOUCLE_forums_filshtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
// Fonction principale du squelette squelettes-dist/inc-forum.html.
//
function html_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(htmlspecialchars(
		// refus des forums ?
		(quete_accepter_forum(@$Pile[0]['id_article'])=="non" OR
		($GLOBALS["meta"]["forums_publics"] == "non"
		AND quete_accepter_forum(@$Pile[0]['id_article']) == ""))
		? "" : // sinon:
		(substr(((!@$Pile[0]['id_article']) ? '' : ('&id_article='.@$Pile[0]['id_article'])).
((!@$Pile[0]['id_breve']) ? '' : ('&id_breve='.@$Pile[0]['id_breve'])).
((!@$Pile[0]['id_rubrique']) ? '' : ('&id_rubrique='.@$Pile[0]['id_rubrique'])).
((!@$Pile[0]['id_syndic']) ? '' : ('&id_syndic='.@$Pile[0]['id_syndic'])).
((!@$Pile[0]['id_forum']) ? '' : ('&id_forum='.@$Pile[0]['id_forum'])),1).
	(($lien = (_request("retour") ? _request("retour") : str_replace("&amp;", "&", ''))) ? "&retour=".rawurlencode($lien) : ""))) ? '':'') .
'


' .
BOUCLE_decomptehtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP)
. (($t2 = strval((($Numrows['_decompte']['total'] > '0') ? $Numrows['_decompte']['total']:'')))!=='' ?
			('<h2>' . $t2 . (	'
' .
		(($Numrows['_decompte']['total'] == '1') ? _T('public/spip/ecrire:message',array()):_T('public/spip/ecrire:messages_forum',array())) .
		'</h2>')) :
			'') .
'


' .
(($t1 = BOUCLE_forumshtml_f9bfdf2f688bb73aa1d5a55210485c44($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
<ul class="forum">

	' . $t1 . '

</ul>
') :
		''));

	return analyse_resultat_skel('html_f9bfdf2f688bb73aa1d5a55210485c44', $Cache, $page, 'squelettes-dist/inc-forum.html');
}

?>
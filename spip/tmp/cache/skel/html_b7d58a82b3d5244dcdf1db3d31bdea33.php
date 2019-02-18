<?php
/*
 * Squelette : squelettes-dist/inc-documents.html
 * Date :      Sat, 21 Feb 2009 15:42:20 GMT
 * Compile :   Thu, 14 May 2009 17:41:50 GMT (0.019s)
 * Boucles :   _documents_portfolio, _afficher_document, _documents_joints, _documents_decompte
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_documents_portfoliohtml_b7d58a82b3d5244dcdf1db3d31bdea33(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	$in0 = array();
	$in0[]= 'png';
	$in0[]= 'jpg';
	$in0[]= 'gif';
	static $table = 'documents';
	static $id = '_documents_portfolio';
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
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.fichier");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in0)), 
			array('=', 'L1.vu', "'non'"), 
			array(sql_in('documents.id_document', $doublons[$doublons_index[]= ('documents')], 'NOT')));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_document']; // doublons

		$t0 .= (($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
	<a href="' . $t1 . (	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'" onclick="location.href=\'' .
	parametre_url(vider_url(urlencode_1738(generer_url_entite(@$Pile[0]['id_article'], 'article', '', '', true))),'id_document',$Pile[$SP]['id_document']) .
	'#documents_portfolio\';return false;"' .
	(calcul_exposer($Pile[$SP]['id_document'], 'id_document', $Pile[0], '', 'id_document', '')  ?
			(' class="' . 'on' . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'0','100')),'class','spip_logos'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))),'80')))) .
	'</a>
	')) :
		'');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_afficher_documenthtml_b7d58a82b3d5244dcdf1db3d31bdea33(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	$in1[]= 'png';
	$in1[]= 'jpg';
	$in1[]= 'gif';
	static $table = 'documents';
	static $id = '_afficher_document';
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
	static $select = array("documents.id_document");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in1) . ')')));
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'])), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in1)));
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
filtrer('image_graver',filtrer('image_reduire',((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/emb', $l = array('500' => @$Pile[0]['500'] ,'lang' => $GLOBALS["spip_lang"] ,'id_document='.$Pile[$SP]['id_document'],'id='.$Pile[$SP]['id_document'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')),'500','0')) .
'
');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_jointshtml_b7d58a82b3d5244dcdf1db3d31bdea33(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 'gif';
	$in2[]= 'jpg';
	$in2[]= 'png';
	static $table = 'documents';
	static $id = '_documents_joints';
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
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("0+documents.titre AS num",
		"documents.date",
		"documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date');
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), sql_in('documents.extension',sql_quote($in2),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	static $join = array('L1' => array('documents','id_document'), 'L2' => array('documents','extension'));
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
(($t1 = strval(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))))!=='' ?
		('
		<li>
			<strong><a href="' . $t1 . (	'" title="' .
	_T('public/spip/ecrire:bouton_telecharger',array()) .
	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'">' .
	interdire_scripts((strlen($a = traiter_doublons_documents($doublons, typo($Pile[$SP]['titre'], "TYPO", $connect))) ? $a : _T('public/spip/ecrire:info_document',array()))) .
	'</a></strong>
			<small>(<span>' .
	interdire_scripts($Pile[$SP]['type_document']) .
	(($t2 = strval(interdire_scripts(taille_en_octets($Pile[$SP]['taille']))))!=='' ?
			(' &ndash; ' . $t2) :
			'') .
	'</span>)</small>
			' .
	interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))) .
	'
		')) :
		'') .
'</li>
		');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_decomptehtml_b7d58a82b3d5244dcdf1db3d31bdea33(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	$in3[]= 'gif';
	$in3[]= 'jpg';
	$in3[]= 'png';
	static $table = 'documents';
	static $id = '_documents_decompte';
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
		','L1' => 'spip_documents_liens','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("documents.id_document",
		"documents.id_document");
	static $select = array("documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L2.id_article', sql_quote($Pile[0]['id_article'])), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L2.texte', "''"), sql_in('documents.extension',sql_quote($in3),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	$join = array('L1' => array('documents','id_document'), 'L2' => array('L1','id_article','id_objet','L1.objet='.sql_quote('article')));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_documents_decompte']['total'] = @intval(sql_count($result, ''));
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (($t1 = strval((($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond('',$l =  array('fond' => 'modeles/emb' ,
	'id_document' => $Pile[$SP]['id_document'] ), array(), '')):'')))!=='' ?
		('
' . $t1) :
		'');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/inc-documents.html.
//
function html_b7d58a82b3d5244dcdf1db3d31bdea33($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_b7d58a82b3d5244dcdf1db3d31bdea33($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div id="documents_portfolio">
	<h2>' .
		_T('public/spip/ecrire:info_portfolio',array()) .
		'</h2>
	') . $t1 . '
</div>
') :
		'') .
'


' .
BOUCLE_afficher_documenthtml_b7d58a82b3d5244dcdf1db3d31bdea33($Cache, $Pile, $doublons, $Numrows, $SP) .
'



' .
(($t1 = BOUCLE_documents_decomptehtml_b7d58a82b3d5244dcdf1db3d31bdea33($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'



' .
	(($t2 = BOUCLE_documents_jointshtml_b7d58a82b3d5244dcdf1db3d31bdea33($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
	<div class="menu" id="documents_joints">
	<h2>' .
			_T('public/spip/ecrire:titre_documents_joints',array()) .
			'</h2>
	<ul>
		') . $t2 . '
	</ul>
	</div>
') :
			'') .
	'

'))));

	return analyse_resultat_skel('html_b7d58a82b3d5244dcdf1db3d31bdea33', $Cache, $page, 'squelettes-dist/inc-documents.html');
}

?>
<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-rub-documents.html
 * Date :      Sat, 27 Dec 2008 23:51:14 GMT
 * Compile :   Thu, 14 May 2009 18:16:09 GMT (0.016s)
 * Boucles :   _documents_portfolio, _afficher_document, _documents_decompte, _documents_joints
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_documents_portfoliohtml_4dbb2cc0d2a49241f665cf257854b3c2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
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
	parametre_url(vider_url(urlencode_1738(generer_url_entite(@$Pile[0]['id_rubrique'], 'rubrique', '', '', true))),'id_document',$Pile[$SP]['id_document']) .
	'#documents_portfolio\';return false;"' .
	(calcul_exposer($Pile[$SP]['id_document'], 'id_document', $Pile[0], '', 'id_document', '')  ?
			(' class="' . 'on' . '"') :
			'') .
	(($t2 = strval(interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	interdire_scripts(inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',copie_locale(get_spip_doc($Pile[$SP]['fichier'])),'0','100')),'class','spip_vignette_portfolio'),'alt',interdire_scripts(couper(attribut_html(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))),'80')))) .
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
function BOUCLE_afficher_documenthtml_4dbb2cc0d2a49241f665cf257854b3c2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

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
		','L1' => 'spip_documents_liens','L2' => 'spip_types_documents');
	static $type = array();
	static $groupby = array("documents.id_document");
	static $select = array("documents.id_document",
		"L2.mime_type",
		"documents.titre",
		"documents.descriptif");
	$orderby = array(((!sql_quote($in1) OR sql_quote($in1)==="''") ? 0 : ('FIELD(documents.extension,' . sql_quote($in1) . ')')));
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'])), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.mode', "'document'"), sql_in('documents.extension',sql_quote($in1)));
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
'
		<div class="spip_documents spip_documents_center" id="document_actif">
			' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',((($recurs=(isset($Pile[0]['recurs'])?$Pile[0]['recurs']:0))>=5)? '' : $p = recuperer_fond('modeles/emb', $l = array('520' => @$Pile[0]['520'] ,'lang' => $GLOBALS["spip_lang"] ,'id_document='.$Pile[$SP]['id_document'],'id='.$Pile[$SP]['id_document'],'recurs='.(++$recurs), $GLOBALS['spip_lang']), array('trim'=>true, 'modele'=>true), '')),'520','0'))))!=='' ?
		((	'<a href="' .
	url_absolue(vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true)))) .
	'" type="' .
	interdire_scripts($Pile[$SP]['mime_type']) .
	'">') . $t1 . '</a>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
		((	'<div class="spip_doc_titre">') . $t1 . '</div>') :
		'') .
'
			' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'<div class="spip_doc_descriptif">') . $t1 . '</div>') :
		'') .
'
		</div>
	');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_decomptehtml_4dbb2cc0d2a49241f665cf257854b3c2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in2 = array();
	$in2[]= 'gif';
	$in2[]= 'jpg';
	$in2[]= 'png';
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
		','L1' => 'spip_documents_liens','L2' => 'spip_rubriques');
	static $type = array();
	static $groupby = array("documents.id_document",
		"documents.id_document");
	static $select = array("documents.id_document");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L2.id_rubrique', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'documents.mode', "'document'"), 
			array('=', 'L2.texte', "''"), sql_in('documents.extension',sql_quote($in2),'NOT'), 
			array('=', 'L1.vu', "'non'"));
	$join = array('L1' => array('documents','id_document'), 'L2' => array('L1','id_rubrique','id_objet','L1.objet='.sql_quote('rubrique')));
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

		$t0 .= (
'
' .
(($Numrows['_documents_decompte']['total'] == '1') ? trim(recuperer_fond('',$l =  array('fond' => 'modeles/emb' ,
	'id_document' => $Pile[$SP]['id_document'] ), array(), '')):''));
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_documents_jointshtml_4dbb2cc0d2a49241f665cf257854b3c2(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in3 = array();
	$in3[]= 'gif';
	$in3[]= 'jpg';
	$in3[]= 'png';
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
		"documents.titre",
		"documents.id_document",
		"L2.titre AS type_document",
		"documents.taille",
		"documents.descriptif");
	static $orderby = array('num', 'documents.date DESC');
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), sql_in('documents.extension',sql_quote($in3),'NOT'), 
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

		$t1 = (
'
				' .
(($t1 = strval(interdire_scripts(supprimer_numero(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))))!=='' ?
		((	'<h3 class="" style="margin-bottom: .6em;"><a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'">') . $t1 . '</a></h3>') :
		'') .
'
				' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))), '', '',''),'60','0'))))!=='' ?
		('<div style="float:left;padding-right: .5em;  width:36%;">
					<div style="float:left; margin-right: .5em;">' . $t1 . (	'</div>
					<small>
						' .
	(($t2 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
			($t2 . '<br />') :
			'') .
	'
						' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['type_document'])))!=='' ?
			((	_T('spip:info_document',array()) .
		' : ') . $t2 . '<br />') :
			'') .
	'
						' .
	interdire_scripts(taille_en_octets($Pile[$SP]['taille'])) .
	'
					</small>
				</div>')) :
		'') .
'
				' .
(($t1 = strval(interdire_scripts(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect)))))!=='' ?
		((	'<div class="" style="margin: 0 0 0 40%; border-left: 1px gray dotted;padding-left: 1em">') . $t1 . '</div>') :
		'') .
'
		');
		$t0 .= (($t1 && $t0) ? '<hr style=\'clear:both\' />' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-rub-documents.html.
//
function html_4dbb2cc0d2a49241f665cf257854b3c2($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
(($t1 = BOUCLE_documents_portfoliohtml_4dbb2cc0d2a49241f665cf257854b3c2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
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
BOUCLE_afficher_documenthtml_4dbb2cc0d2a49241f665cf257854b3c2($Cache, $Pile, $doublons, $Numrows, $SP) .
'


' .
BOUCLE_documents_decomptehtml_4dbb2cc0d2a49241f665cf257854b3c2($Cache, $Pile, $doublons, $Numrows, $SP) .
'



	' .
(($t1 = BOUCLE_documents_jointshtml_4dbb2cc0d2a49241f665cf257854b3c2($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
	<h2>' .
		_T('ecrire:titre_documents_joints',array()) .
		'</h2>
	<div class="chapo" id="documents" style="line-height:1;"> 
		') . $t1 . '
		<br class="nettoyeur" />
	</div><!-- chapo -->
	') :
		'') .
'
');

	return analyse_resultat_skel('html_4dbb2cc0d2a49241f665cf257854b3c2', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-rub-documents.html');
}

?>
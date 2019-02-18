<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-annonces.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.054s)
 * Boucles :   _logo_rub_doc, _annonces_rub_img, _logo_art_doc, _annonces_art_img, _annonces_rub, _annonces_art
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_logo_rub_dochtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_logo_rub_doc';
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
	static $select = array("documents.fichier",
		"documents.titre",
		"documents.descriptif");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_rubrique'])), 
			array('=', 'L1.objet', sql_quote('rubrique')), 
			array('=', 'documents.titre', "'Annonce'"));
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
(($t1 = strval(interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'150','0')),'alt',interdire_scripts(texte_backend(couper(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))),'80')))))))!=='' ?
		((	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP-1]['id_rubrique'], 'rubrique', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>') . $t1 . '</a>') :
		'') .
'
              ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_annonces_rub_imghtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'rubriques';
	static $id = '_annonces_rub_img';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.id_rubrique",
		"rubriques.date",
		"rubriques.lang");
	static $orderby = array('rubriques.date DESC');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array(sql_in('rubriques.id_rubrique', $doublons[$doublons_index[]= ('rubriques')], 'NOT')));
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

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_rubrique']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($t1 = BOUCLE_logo_rub_dochtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
          	<li class="annonce">
              ' . $t1 . '
          	</li>
            ') :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE documents>
//
function BOUCLE_logo_art_dochtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'documents';
	static $id = '_logo_art_doc';
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
	static $select = array("documents.fichier",
		"documents.titre",
		"documents.descriptif");
	static $orderby = array();
	$where = 
			array('((aa.statut = "publie") OR bb.statut = "publie" OR rr.statut = "publie" OR ff.statut="publie")', 
			array('!=', 'documents.mode', '\'vignette\''), 
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'L1.id_objet', sql_quote($Pile[$SP]['id_article'])), 
			array('=', 'L1.objet', sql_quote('article')), 
			array('=', 'documents.titre', "'Annonce'"));
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
(($t1 = strval(interdire_scripts(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',get_spip_doc($Pile[$SP]['fichier']),'150','0')),'alt',interdire_scripts(texte_backend(couper(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))),'80')))))))!=='' ?
		((	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP-1]['id_article'], 'article', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>') . $t1 . '</a>') :
		'') .
'
              ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_annonces_art_imghtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_annonces_art_img';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article",
		"articles.date",
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
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (($t1 = BOUCLE_logo_art_dochtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		('
            <li class="annonce">

              ' . $t1 . '
          	</li>
            ') :
		'');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE rubriques>
//
function BOUCLE_annonces_rubhtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'rubriques';
	static $id = '_annonces_rub';
	static $from = array('rubriques' => 'spip_rubriques','L1' => 'spip_mots_rubriques','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("rubriques.id_rubrique");
	static $select = array("rubriques.date",
		"rubriques.id_rubrique",
		"rubriques.descriptif",
		"rubriques.titre",
		"rubriques.lang");
	static $orderby = array('rubriques.date DESC');
	$where = 
			array(
			array('=', 'rubriques.statut', '\'publie\''), 
			array('=', 'rubriques.lang', sql_quote($GLOBALS['spip_lang'])), 
			array('=', 'L2.titre', "'Annonce'"));
	static $join = array('L1' => array('rubriques','id_rubrique'), 'L2' => array('L1','id_mot'));
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

            <li class="annonce">
            ' .
(affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', '') ? (	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' style="text-align:center;">
				' .
	inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',affiche_logos(calcule_logo('id_rubrique', 'ON', $Pile[$SP]['id_rubrique'],quete_parent($Pile[$SP]['id_rubrique']),  ''), '', ''),'150','0')),'alt',interdire_scripts(textebrut(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))),'title',interdire_scripts(textebrut(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))) .
	'
				</a>

			'):(	'<p>
                ' .
	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
			((	'<big style="text-align:center;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_rubrique'], 'rubrique', '', '', true))) .
		'"' .
		(($t3 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		' style="text-align:center;">') . $t2 . '</a></big>') :
			'') .
	'
                </p>

			')) .
'
          	</li>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_annonces_arthtml_f16ba8b2eb8958444c7c2b0059b8fdee(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_annonces_art';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_mots_articles','L2' => 'spip_mots');
	static $type = array();
	static $groupby = array("articles.id_article");
	static $select = array("articles.date",
		"articles.id_article",
		"articles.descriptif",
		"articles.titre",
		"articles.surtitre",
		"articles.soustitre",
		"articles.lang");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'articles.lang', sql_quote($GLOBALS['spip_lang'])), 
			array('=', 'L2.titre', "'Annonce'"));
	static $join = array('L1' => array('articles','id_article'), 'L2' => array('L1','id_mot'));
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
            <li class="annonce">
            ' .
(affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', '') ? (	'<a href="' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
	'"' .
	(($t2 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' style="text-align:center;">

				' .
	inserer_attribut(inserer_attribut(filtrer('image_graver', filtrer('image_reduire',affiche_logos(calcule_logo('id_article', 'ON', $Pile[$SP]['id_article'],'',  ''), '', ''),'150','0')),'alt',interdire_scripts(textebrut(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))),'title',interdire_scripts(textebrut(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre'])))))) .
	'
				</a>

			'):(	'<p>
                ' .
	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['surtitre'], "TYPO", $connect)))))!=='' ?
			('<small style="text-transform:uppercase">' . $t2 . '</small>') :
			'') .
	'
                ' .
	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, supprimer_numero(typo($Pile[$SP]['titre']))))))!=='' ?
			((	'<big style="text-align:center;"><a href="' .
		vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
		'"' .
		(($t3 = strval(interdire_scripts(supprimer_tags(traiter_doublons_documents($doublons, propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
				(' title="' . $t3 . '"') :
				'') .
		' style="text-align:center;">') . $t2 . '</a></big>') :
			'') .
	'
                ' .
	(($t2 = strval(interdire_scripts(traiter_doublons_documents($doublons, typo($Pile[$SP]['soustitre'], "TYPO", $connect)))))!=='' ?
			('<span>' . $t2 . '</span>') :
			'') .
	'
                <br />
                </p>

			')) .
'
          	</li>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-annonces.html.
//
function html_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    ' .
(($t1 = BOUCLE_annonces_art_imghtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:info_annonces_generales',array()) .
		'</h2>
      <ul>
        <li><b class="titre-annonce">' .
		_T('public/spip/ecrire:bouton_annonce',array()) .
		'</b>
          <ul>') . $t1 . (	'
            ' .
		BOUCLE_annonces_rub_imghtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP) .
		'            
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ')) :
		'') .
'


    ' .
(($t1 = BOUCLE_annonces_rubhtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <!-- Annonces -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:info_annonces_generales',array()) .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'

    ' .
(($t1 = BOUCLE_annonces_arthtml_f16ba8b2eb8958444c7c2b0059b8fdee($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'

    <!-- Annonces -->
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:info_annonces_generales',array()) .
		'</h2>
      <ul>
        <li>
          <ul>') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		'') .
'

');

	return analyse_resultat_skel('html_f16ba8b2eb8958444c7c2b0059b8fdee', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-annonces.html');
}

?>
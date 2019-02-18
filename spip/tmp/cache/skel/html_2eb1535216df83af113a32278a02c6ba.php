<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-trad.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (3.1ms)
 * Boucles :   _articles_langue, _articles
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articles_languehtml_2eb1535216df83af113a32278a02c6ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_articles_langue';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.id_article");
	static $orderby = array();
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
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

			foreach($doublons_index as $k) $doublons[$k] .= "," . $Pile[$SP]['id_article']; // doublons

	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_2eb1535216df83af113a32278a02c6ba(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$doublons_index = array();
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.date",
		"articles.lang",
		"articles.id_article",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.titre");
	static $orderby = array('articles.date DESC');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array(sql_in('articles.id_article', $doublons[$doublons_index[]= ('articles')], 'NOT')));
	static $join = array();
	static $limit = '0,3';
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
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . (	(($t2 = strval(traduire_nom_langue(htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']))))!=='' ?
			(' - <dfn class="lang">' . $t2 . '</dfn>') :
			'') .
	'</span>')) :
		'') .
' 
          	    
              <a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'&amp;var_lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
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
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-trad.html.
//
function html_2eb1535216df83af113a32278a02c6ba($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    ' .
BOUCLE_articles_languehtml_2eb1535216df83af113a32278a02c6ba($Cache, $Pile, $doublons, $Numrows, $SP) .
'
    ' .
(($t1 = BOUCLE_articleshtml_2eb1535216df83af113a32278a02c6ba($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:info_multilinguisme',array()) .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:info_langues',array()) .
		'<br />
              <small>' .
		_T('public/spip/ecrire:articles_recents',array()) .
		'</small>
            </b>
          <ul>

            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		''));

	return analyse_resultat_skel('html_2eb1535216df83af113a32278a02c6ba', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-trad.html');
}

?>
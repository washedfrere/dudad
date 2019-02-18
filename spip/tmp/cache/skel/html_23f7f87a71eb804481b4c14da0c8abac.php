<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-syndic.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (9.2ms)
 * Boucles :   _art_syndic2, _art_syndic, _sites
 */ 
//
// <BOUCLE syndic_articles>
//
function BOUCLE_art_syndic2html_23f7f87a71eb804481b4c14da0c8abac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_art_syndic2';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"syndic_articles.titre",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.descriptif");
	static $orderby = array('syndic_articles.date DESC');
	static $where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,10';
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
            <li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(supprimer_numero($Pile[$SP]['titre']))))!=='' ?
		((	'<a href="' .
	vider_url($Pile[$SP]['url']) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))))))!=='' ?
			((	'title="' .
		_T('public/spip/ecrire:form_prop_nom_site',array()) .
		' : ') . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))))!=='' ?
		((	'<span style="text-align: right;"><a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out" style="text-align: right; color: maroon; margin-top:-.7em">') . $t1 . ' </a></span>') :
		'') .
'
             </li>
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndic_articles>
//
function BOUCLE_art_syndichtml_23f7f87a71eb804481b4c14da0c8abac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic_articles';
	static $id = '_art_syndic';
	static $from = array('syndic_articles' => 'spip_syndic_articles','L1' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic_articles.date",
		"syndic_articles.titre",
		"syndic_articles.url",
		"L1.url_site",
		"L1.nom_site",
		"syndic_articles.descriptif");
	static $orderby = array('syndic_articles.date DESC');
	$where = 
			array(
			array('=', 'syndic_articles.statut', '\'publie\''), 
			array('=', 'L1.id_rubrique', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'L1.statut', '\'publie\''));
	static $join = array('L1' => array('syndic_articles','id_syndic'));
	static $limit = '0,5';
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
            <li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(supprimer_numero($Pile[$SP]['titre']))))!=='' ?
		((	'<a href="' .
	vider_url($Pile[$SP]['url']) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))))))!=='' ?
			((	'title="' .
		_T('public/spip/ecrire:form_prop_nom_site',array()) .
		' : ') . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
                ' .
(($t1 = strval(interdire_scripts(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)))))!=='' ?
		((	'<span style="text-align: right;"><a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(safehtml($Pile[$SP]['descriptif']))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out" style="text-align: right; color: maroon; margin-top:-.5em">') . $t1 . '</a></span>') :
		'') .
'
            </li>
            ');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE syndication>
//
function BOUCLE_siteshtml_23f7f87a71eb804481b4c14da0c8abac(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'syndic';
	static $id = '_sites';
	static $from = array('syndic' => 'spip_syndic');
	static $type = array();
	static $groupby = array();
	static $select = array("syndic.nom_site",
		"syndic.url_site",
		"syndic.descriptif");
	static $orderby = array('syndic.nom_site');
	$where = 
			array(
			array('=', 'syndic.statut', '\'publie\''), 
			array('=', 'syndic.syndication', "'non'"), 
			array('=', 'syndic.id_rubrique', sql_quote($Pile[0]['id_rubrique'])));
	static $join = array();
	static $limit = '0,5';
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
                ' .
(($t1 = strval(interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))))!=='' ?
		((	'<a href="' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'" ' .
	(($t2 = strval(interdire_scripts(attribut_html(supprimer_tags(propre($Pile[$SP]['descriptif'], $connect))))))!=='' ?
			('title="' . $t2 . '"') :
			'') .
	' class="spip_out">') . $t1 . '</a>') :
		'') .
'
            </li>            
            ');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-syndic.html.
//
function html_23f7f87a71eb804481b4c14da0c8abac($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Sur le Web -->


    ' .
(($t1 = BOUCLE_art_syndichtml_23f7f87a71eb804481b4c14da0c8abac($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
		interdire_scripts(generer_url_public('site')) .
		'" title="' .
		_T('public/spip/ecrire:autres_sites',array()) .
		'">' .
		_T('public/spip/ecrire:nouveautes_web',array()) .
		'</a>
          <ul>

            ') . $t1 . '

          </ul>
        </li>
      </ul>
      </div><!-- menu -->                
    ') :
		((	'


    ' .
	(($t2 = BOUCLE_art_syndic2html_23f7f87a71eb804481b4c14da0c8abac($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
			interdire_scripts(generer_url_public('site')) .
			'" title="' .
			_T('public/spip/ecrire:autres_sites',array()) .
			'">' .
			_T('public/spip/ecrire:nouveautes_web',array()) .
			'</a>
          <ul>

            ') . $t2 . '

          </ul>
        </li>
      </ul>
      </div><!-- menu -->                
    ') :
			'') .
	'

    '))) .
'
      	

    ' .
(($t1 = BOUCLE_siteshtml_23f7f87a71eb804481b4c14da0c8abac($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
      <div class="menu rub">
      <ul>
        <li><a href="' .
		interdire_scripts(generer_url_public('site')) .
		'" title="' .
		_T('public/spip/ecrire:autres_sites',array()) .
		'">' .
		_T('public/spip/ecrire:sites_web',array()) .
		'</a>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
      </div><!-- menu -->
    ') :
		'') .
'

    ');

	return analyse_resultat_skel('html_23f7f87a71eb804481b4c14da0c8abac', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-syndic.html');
}

?>
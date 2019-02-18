<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-breves.html
 * Date :      Fri, 28 Nov 2008 22:59:24 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (4.0ms)
 * Boucles :   _breves_sommaire, _breves_rubriques
 */ 
//
// <BOUCLE breves>
//
function BOUCLE_breves_sommairehtml_2e46d2b01b607d725f7f610710e53fcd(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves_sommaire';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'])));
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
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
          	</li>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE breves>
//
function BOUCLE_breves_rubriqueshtml_2e46d2b01b607d725f7f610710e53fcd(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'breves';
	static $id = '_breves_rubriques';
	static $from = array('breves' => 'spip_breves');
	static $type = array();
	static $groupby = array();
	static $select = array("breves.date_heure",
		"breves.date_heure AS date",
		"breves.id_breve",
		"breves.texte",
		"breves.titre",
		"breves.lang");
	static $orderby = array('breves.date_heure DESC');
	$where = 
			array(
			array('=', 'breves.statut', '\'publie\''), 
			array('=', 'breves.id_rubrique', sql_quote($Pile[0]['id_rubrique'])), 
			array('=', 'breves.lang', sql_quote($GLOBALS['spip_lang'])));
	static $join = array();
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
          	<li>' .
(($t1 = strval(interdire_scripts(affdate(normaliser_date($Pile[$SP]['date'])))))!=='' ?
		('<span>' . $t1 . '</span>') :
		'') .
'
              <a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_breve'], 'breve', '', '', true))) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist('', $Pile[$SP]['texte'], 300, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a>
          	</li>
            ');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-breves.html.
//
function html_2e46d2b01b607d725f7f610710e53fcd($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'    <!-- Breves -->
    ' .
(($t1 = BOUCLE_breves_rubriqueshtml_2e46d2b01b607d725f7f610710e53fcd($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
    <div class="menu">
    <h2 class="structure">' .
		_T('public/spip/ecrire:dernieres_breves',array()) .
		'</h2>
      <ul>
        <li><b>' .
		_T('public/spip/ecrire:nouvelles_breves',array()) .
		'</b>
          <ul>
            ') . $t1 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
		((	'
    
    ' .
	(($t2 = BOUCLE_breves_sommairehtml_2e46d2b01b607d725f7f610710e53fcd($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
			((	'
    <div class="menu">
    <h2 class="structure">' .
			_T('public/spip/ecrire:dernieres_breves',array()) .
			'</h2>
      <ul>
        <li><b>' .
			_T('public/spip/ecrire:nouvelles_breves',array()) .
			'</b>
          <ul>
            ') . $t2 . '
          </ul>
        </li>
      </ul>
    </div><!-- menu -->
    ') :
			'') .
	'
    
    '))));

	return analyse_resultat_skel('html_2e46d2b01b607d725f7f610710e53fcd', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-breves.html');
}

?>
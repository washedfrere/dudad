<?php
/*
 * Squelette : plugins/auto/spip-bonux/modeles/pagination.html
 * Date :      Sat, 15 Nov 2008 14:29:00 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (9.7ms)
 * Boucles :   _pages
 */ 
//
// <BOUCLE pour>
//
function BOUCLE_pageshtml_f73ef86fc1bf49d5ff8cfe2fa0e64140(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = 'pour';
	static $table = 'pour';
	static $id = '_pages';
	static $from = array('pour' => 'pour');
	static $type = array();
	static $groupby = array();
	static $select = array("pour.valeur");
	static $orderby = array();
	static $where = 
			array();
	static $join = array();
	static $limit = '';
	$having = 
			array(
			array('tableau', (is_array($a = ($Pile["vars"])) ? $a['pages'] : "")));
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, 'pour')) {

		$t0 .= (
'
' .
vide($Pile['vars']['item'] = interdire_scripts(mult(moins($Pile[$SP]['valeur'],'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true))))) .
'
' .
interdire_scripts(aoustrong(ancre_url(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),(is_array($a = ($Pile["vars"])) ? $a['item'] : "")),interdire_scripts(entites_html((@$Pile[0]['ancre']),true))),interdire_scripts(mult(moins($Pile[$SP]['valeur'],'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true)))),interdire_scripts(($Pile[$SP]['valeur'] == interdire_scripts(entites_html((@$Pile[0]['page_courante']),true)))),'lien_pagination','','nofollow')) .
'
' .
(($t1 = strval(interdire_scripts((($Pile[$SP]['valeur'] < (is_array($a = ($Pile["vars"])) ? $a['derniere'] : "")) ? (is_array($a = ($Pile["vars"])) ? $a['separateur'] : ""):''))))!=='' ?
		('<span class=\'separateur\'>' . $t1 . '</span>') :
		'') .
'
');
	}

	@sql_free($result, 'pour');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/spip-bonux/modeles/pagination.html.
//
function html_f73ef86fc1bf49d5ff8cfe2fa0e64140($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
interdire_scripts((@$Pile[0]['bloc_ancre'])) .
vide($Pile['vars']['bornes'] = interdire_scripts(filtre_bornes_pagination_dist(entites_html((@$Pile[0]['page_courante']),true),interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)),'10'))) .
vide($Pile['vars']['premiere'] = filtre_reset((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['derniere'] = filtre_end((is_array($a = ($Pile["vars"])) ? $a['bornes'] : ""))) .
vide($Pile['vars']['pages'] = range((is_array($a = ($Pile["vars"])) ? $a['premiere'] : ""),(is_array($a = ($Pile["vars"])) ? $a['derniere'] : ""))) .
vide($Pile['vars']['separateur'] = interdire_scripts(entites_html(sinon(@$Pile[0]['separateur'],'|'),true))) .
(($t1 = BOUCLE_pageshtml_f73ef86fc1bf49d5ff8cfe2fa0e64140($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
' .
		(((is_array($a = ($Pile["vars"])) ? $a['premiere'] : "") > '1')  ?
				((	'<a href=\'' .
			interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),'')) .
			'#' .
			interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
			'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . (	'</a> ' .
			(is_array($a = ($Pile["vars"])) ? $a['separateur'] : ""))) :
				'') .
		'
') . $t1 . (	'
' .
		(((is_array($a = ($Pile["vars"])) ? $a['derniere'] : "") < interdire_scripts(entites_html((@$Pile[0]['nombre_pages']),true)))  ?
				((	(is_array($a = ($Pile["vars"])) ? $a['separateur'] : "") .
			'<a href=\'' .
			interdire_scripts(parametre_url(entites_html((@$Pile[0]['url']),true),interdire_scripts(entites_html((@$Pile[0]['debut']),true)),interdire_scripts(mult(moins(entites_html((@$Pile[0]['nombre_pages']),true),'1'),interdire_scripts(entites_html((@$Pile[0]['pas']),true)))))) .
			'#' .
			interdire_scripts(entites_html((@$Pile[0]['ancre']),true)) .
			'\' class=\'lien_pagination\' rel=\'nofollow\'>') . '...' . '</a>') :
				'') .
		'
')) :
		''));

	return analyse_resultat_skel('html_f73ef86fc1bf49d5ff8cfe2fa0e64140', $Cache, $page, 'plugins/auto/spip-bonux/modeles/pagination.html');
}

?>
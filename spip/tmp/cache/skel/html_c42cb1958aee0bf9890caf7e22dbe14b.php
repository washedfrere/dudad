<?php
/*
 * Squelette : squelettes-dist/modeles/lesauteurs.html
 * Date :      Thu, 21 Aug 2008 21:30:00 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (4.7ms)
 * Boucles :   _auteurs
 */ 
//
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_c42cb1958aee0bf9890caf7e22dbe14b(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.nom",
		"auteurs.id_auteur");
	static $orderby = array('auteurs.nom');
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L1.id_article', sql_quote($Pile[0]['id_article'])));
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
'
<span class="vcard author"><a class="url fn spip_in" href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a></span>');
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/modeles/lesauteurs.html.
//
function html_c42cb1958aee0bf9890caf7e22dbe14b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
BOUCLE_auteurshtml_c42cb1958aee0bf9890caf7e22dbe14b($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_c42cb1958aee0bf9890caf7e22dbe14b', $Cache, $page, 'squelettes-dist/modeles/lesauteurs.html');
}

?>
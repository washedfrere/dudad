<?php
/*
 * Squelette : squelettes-dist/modeles/article_mots.html
 * Date :      Sun, 19 Aug 2007 12:24:16 GMT
 * Compile :   Thu, 14 May 2009 17:41:50 GMT (3.2ms)
 * Boucles :   _mots
 */ 
//
// <BOUCLE mots>
//
function BOUCLE_motshtml_91ef1e80144fde5018c40170e4c76052(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots','L1' => 'spip_mots_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("mots.titre",
		"mots.id_mot");
	static $orderby = array('mots.titre');
	$where = 
			array(
			array('=', 'L1.id_article', sql_quote($Pile[0]['id_article'])));
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

		$t0 .= (
'
		<li><a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_mot'], 'mot', '', '', true))) .
'" rel="tag">' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</a></li>
		');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/modeles/article_mots.html.
//
function html_91ef1e80144fde5018c40170e4c76052($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_motshtml_91ef1e80144fde5018c40170e4c76052($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<div class="menu"' .
		(($t3 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
				(' style=\'float:' . $t3 . ';\'') :
				'') .
		'>
	<h2>' .
		_T('public/spip/ecrire:mots_clefs',array()) .
		'</h2>
	<ul>
		') . $t1 . '
	</ul>
</div>
') :
		'') .
'
');

	return analyse_resultat_skel('html_91ef1e80144fde5018c40170e4c76052', $Cache, $page, 'squelettes-dist/modeles/article_mots.html');
}

?>
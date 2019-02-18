<?php
/*
 * Squelette : squelettes-dist/formulaires/inc-forum_bloc_choix_mots.html
 * Date :      Thu, 24 Jul 2008 10:29:42 GMT
 * Compile :   Mon, 25 May 2009 08:40:33 GMT (0.018s)
 * Boucles :   _G
 */ 
//
// <BOUCLE groupes_mots>
//
function BOUCLE_Ghtml_db966ec61898e0ea1a2c98be4b8930c3(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'groupes_mots';
	static $id = '_G';
	static $from = array('groupes_mots' => 'spip_groupes_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("groupes_mots.id_groupe",
		"groupes_mots.titre",
		"groupes_mots.unseul");
	static $orderby = array();
	$where = 
			array(
			array('REGEXP', 'groupes_mots.tables_liees', sql_quote((is_array($a = ($Pile["vars"])) ? $a['table'] : ""))));
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
' .
(($t1 = strval(in_any($Pile[$SP]['id_groupe'],(@$Pile[0]['ajouter_groupe']),' ')))!=='' ?
		($t1 . (	'
	<fieldset>
	<legend>' .
	_T('public/spip/ecrire:mots_clefs',array()) .
	' : ' .
	interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
	'</legend>
		' .
	
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('formulaires/inc-choix_mots') . ',
	\'id_groupe\' => ' . argumenter_squelette($Pile[$SP]['id_groupe']) . ',
	\'ajouter_mot\' => ' . argumenter_squelette(@$Pile[0]['ajouter_mot']) . ',
	\'unseul\' => ' . argumenter_squelette($Pile[$SP]['unseul']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	</fieldset>
')) :
		''));
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/formulaires/inc-forum_bloc_choix_mots.html.
//
function html_db966ec61898e0ea1a2c98be4b8930c3($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
vide($Pile['vars']['table'] = concat(concat('(^|,)(',interdire_scripts(entites_html(sinon(@$Pile[0]['table'],'rienderien'),true))),interdire_scripts(choixsiegal(lire_config('mots_cles_forums',null,false),'oui','|forum','')),')(,|$)')) .
BOUCLE_Ghtml_db966ec61898e0ea1a2c98be4b8930c3($Cache, $Pile, $doublons, $Numrows, $SP));

	return analyse_resultat_skel('html_db966ec61898e0ea1a2c98be4b8930c3', $Cache, $page, 'squelettes-dist/formulaires/inc-forum_bloc_choix_mots.html');
}

?>
<?php
/*
 * Squelette : ../prive/contenu/rubrique.html
 * Date :      Tue, 02 Dec 2008 16:34:28 GMT
 * Compile :   Thu, 14 May 2009 16:55:56 GMT (3.4ms)
 * Boucles :   _afficher_contenu
 */ 
//
// <BOUCLE rubriques>
//
function BOUCLE_afficher_contenuhtml_141845e91a6e4a4f473831f31f49e18e(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in1 = array();
	if (!(is_array($a = ($Pile[0]['statut']))))
		$in1[]= $a;
	else $in1 = array_merge($in1, $a);
	static $table = 'rubriques';
	static $id = '_afficher_contenu';
	static $from = array('rubriques' => 'spip_rubriques');
	static $type = array();
	static $groupby = array();
	static $select = array("rubriques.titre",
		"rubriques.lang",
		"rubriques.descriptif",
		"rubriques.texte");
	static $orderby = array();
	$where = 
			array(
			array('=', 'rubriques.id_rubrique', sql_quote(interdire_scripts(entites_html((@$Pile[0]['id']),true)))), (!$Pile[0]['statut'] ? '' : ((is_array($Pile[0]['statut'])) ? sql_in('rubriques.statut',sql_quote($in1)) : 
			array('=', 'rubriques.statut', sql_quote($Pile[0]['statut'])))));
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
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t0 .= (
'
<div class="champ contenu_titre' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['titre']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_titre',array()) .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'titre\'>' .
interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
'</div>
</div>
<div class="champ contenu_descriptif' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['descriptif']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_descriptif',array()) .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'descriptif\'>' .
interdire_scripts(propre($Pile[$SP]['descriptif'], $connect)) .
'</div>
</div>
<div class="champ contenu_texte' .
(($t1 = strval(interdire_scripts((strlen($Pile[$SP]['texte']) ? '':'vide'))))!=='' ?
		(' ' . $t1) :
		'') .
'">
<div class=\'label\'>' .
_T('public/spip/ecrire:info_texte',array()) .
'</div>
<div dir=\'' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'\' class=\'' .
'texte\'>' .
interdire_scripts(propre($Pile[$SP]['texte'], $connect)) .
'</div>
</div>
' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		((	'<div class="champ contenu_notes">
<div class=\'label\'>' .
	_T('public/spip/ecrire:info_notes',array()) .
	'</div>
<div dir=\'' .
	lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
	'\' class=\'' .
	'notes\'>') . $t1 . '</div>
</div>') :
		'') .
'
');
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette ../prive/contenu/rubrique.html.
//
function html_141845e91a6e4a4f473831f31f49e18e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = BOUCLE_afficher_contenuhtml_141845e91a6e4a4f473831f31f49e18e($Cache, $Pile, $doublons, $Numrows, $SP);

	return analyse_resultat_skel('html_141845e91a6e4a4f473831f31f49e18e', $Cache, $page, '../prive/contenu/rubrique.html');
}

?>
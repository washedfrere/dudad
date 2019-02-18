<?php
/*
 * Squelette : prive/modeles/img.html
 * Date :      Mon, 21 Jul 2008 12:34:04 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (0.012s)
 * Boucles :   _document
 */ 
//
// <BOUCLE documents>
//
function BOUCLE_documenthtml_cb2e6ffadeadceb4715a6a7d1b0819d5(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ($Pile[0]['mode']))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'documents';
	static $id = '_document';
	static $from = array('documents' => 'spip_documents','L1' => 'spip_types_documents');
	static $type = array();
	static $groupby = array();
	static $select = array("documents.id_document",
		"documents.mode",
		"documents.largeur",
		"documents.hauteur",
		"documents.titre",
		"L1.mime_type",
		"L1.titre AS type_document");
	static $orderby = array();
	$where = 
			array(
			array('(documents.taille > 0 OR documents.distant=\'oui\')'), 
			array('=', 'documents.id_document', sql_quote($Pile[0]['id_document'])), (!$Pile[0]['mode'] ? '' : ((is_array($Pile[0]['mode'])) ? sql_in('documents.mode',sql_quote($in0)) : 
			array('=', 'documents.mode', sql_quote($Pile[0]['mode'])))));
	static $join = array('L1' => array('documents','extension'));
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
vide($Pile['vars']['image'] = interdire_scripts(((strlen($a = match($Pile[$SP]['mode'],'image|vignette')) ? $a : interdire_scripts(entites_html((@$Pile[0]['embed']),true))) ? ' ':''))) .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['image'] : "")))!=='' ?
		($t1 . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'>
' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['lien']),true))))!=='' ?
			('<a href="' . $t2 . (	'"' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['lien_class']),true))))!=='' ?
				(' class="' . $t3 . '"') :
				'') .
		'>')) :
			'') .
	'<img src=\'' .
	vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))) .
	'\'' .
	(($t2 = strval(interdire_scripts($Pile[$SP]['largeur'])))!=='' ?
			(' width="' . $t2 . '"') :
			'') .
	(($t2 = strval(interdire_scripts($Pile[$SP]['hauteur'])))!=='' ?
			(' height="' . $t2 . '"') :
			'') .
	' alt="' .
	interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect))) .
	'"' .
	(($t2 = strval(interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' />' .
	interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '</a>':'')) .
	'</span>
')) :
		'') .
(!(is_array($a = ($Pile["vars"])) ? $a['image'] : "")  ?
		(' ' . (	'
<span class=\'spip_document_' .
	$Pile[$SP]['id_document'] .
	' spip_documents' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['align']),true))))!=='' ?
			(' spip_documents_' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['class']),true))))!=='' ?
			(' ' . $t2) :
			'') .
	' spip_lien_ok\'' .
	(($t2 = strval(interdire_scripts(match(entites_html((@$Pile[0]['align']),true),'left|right'))))!=='' ?
			(' style=\'float:' . $t2 . (	';' .
		(($t3 = strval(largeur(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '',''))))!=='' ?
				(' width:' . $t3 . 'px;') :
				'') .
		'\'')) :
			'') .
	'><a href="' .
	interdire_scripts((strlen($a = entites_html((@$Pile[0]['lien']),true)) ? $a : vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_document'], 'document', '', '', true))))) .
	'"' .
	(($t2 = strval(interdire_scripts((entites_html((@$Pile[0]['lien']),true) ? '':(	'type="' .
		interdire_scripts($Pile[$SP]['mime_type']) .
		'"')))))!=='' ?
			(' ' . $t2) :
			'') .
	(($t2 = strval(interdire_scripts(texte_backend(typo($Pile[$SP]['titre'], "TYPO", $connect)))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	'>' .
	inserer_attribut(calcule_logo_document($Pile[$SP]['id_document'], '', $doublons, 0, '', '', '',''),'alt',interdire_scripts((strlen(typo($Pile[$SP]['titre'], "TYPO", $connect)) ? (	interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect)) .
			' {' .
			interdire_scripts($Pile[$SP]['type_document']) .
			'}'):interdire_scripts($Pile[$SP]['type_document'])))) .
	'</a></span>
')) :
		''));
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette prive/modeles/img.html.
//
function html_cb2e6ffadeadceb4715a6a7d1b0819d5($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
BOUCLE_documenthtml_cb2e6ffadeadceb4715a6a7d1b0819d5($Cache, $Pile, $doublons, $Numrows, $SP) .
'
');

	return analyse_resultat_skel('html_cb2e6ffadeadceb4715a6a7d1b0819d5', $Cache, $page, 'prive/modeles/img.html');
}

?>
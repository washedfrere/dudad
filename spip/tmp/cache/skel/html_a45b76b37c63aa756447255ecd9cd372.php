<?php
/*
 * Squelette : squelettes-dist/inc-petition.html
 * Date :      Thu, 30 Apr 2009 21:47:40 GMT
 * Compile :   Thu, 14 May 2009 18:14:54 GMT (0.029s)
 * Boucles :   _signature-message-th, _signature-message-td, _signatures
 */ 
//
// <BOUCLE petitions>
//
function BOUCLE_signature_message_thhtml_a45b76b37c63aa756447255ecd9cd372(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'petitions';
	static $id = '_signature-message-th';
	static $from = array('petitions' => 'spip_petitions');
	static $type = array();
	static $groupby = array();
	static $select = array("1");
	static $orderby = array();
	$where = 
			array(
			array('=', 'petitions.id_article', sql_quote($Pile[0]['id_article'])), 
			array('=', 'petitions.message', "'oui'"));
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
			<th class="signature-message">' .
_T('public/spip/ecrire:message',array()) .
'</th>
			');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE petitions>
//
function BOUCLE_signature_message_tdhtml_a45b76b37c63aa756447255ecd9cd372(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'petitions';
	static $id = '_signature-message-td';
	static $from = array('petitions' => 'spip_petitions');
	static $type = array();
	static $groupby = array();
	$select = array("count(*)");
	static $orderby = array();
	$where = 
			array(
			array('=', 'petitions.id_article', sql_quote($Pile[$SP]['id_article'])), 
			array('=', 'petitions.message', "'oui'"));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$Numrows['_signature-message-td']['total'] = @intval(array_shift(sql_fetch($result, '')));
	$t0 = "";
	for($x=$Numrows["_signature-message-td"]["total"];$x>0;$x--)
			$t0 .= ' ';
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE signatures>
//
function BOUCLE_signatureshtml_a45b76b37c63aa756447255ecd9cd372(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $champs__signatures; $champs__signatures = array('id_signature','id_article','date_time','nom_email','ad_email','nom_site','url_site','message','statut','maj');
	// RECHERCHE
	$prepare_recherche = charger_fonction('prepare_recherche', 'inc');
	list($rech_select, $rech_where) = $prepare_recherche(interdire_scripts(entites_html((@$Pile[0]['recherche_signatures']),true)), "signatures", "?","");
	
	static $table = 'signatures';
	static $id = '_signatures';
	static $from = array('signatures' => 'spip_signatures','resultats' => 'spip_resultats');
	static $type = array();
	static $groupby = array();
	$select = array("signatures.id_article",
		"signatures.id_signature",
		"$rech_select",
		"rand() AS hasard",
		"signatures.date_time AS date",
		"signatures.nom_email AS nom",
		"signatures.url_site",
		"signatures.nom_site",
		"signatures.message");
	$orderby = array((($x = preg_replace("/\W/",'',interdire_scripts(entites_html((@$Pile[0]['tri']),true)))) ? ( in_array($x, $champs__signatures)  ? ('signatures.' . $x . ' DESC'):($x . ' DESC') ) : ''), (($x = preg_replace("/\W/",'',interdire_scripts(entites_html((@$Pile[0]['tri_inverse']),true)))) ? ( in_array($x, $champs__signatures)  ? ('signatures.' . $x):($x) ) : ''), (($x = preg_replace("/\W/",'',interdire_scripts((entites_html(sinon(@$Pile[0]['tri'],interdire_scripts(entites_html((@$Pile[0]['tri_inverse']),true))),true) ? '':'date_time')))) ? ( in_array($x, $champs__signatures)  ? ('signatures.' . $x . ' DESC'):($x . ' DESC') ) : ''));
	$where = 
			array(
			array('=', 'signatures.statut', '\'publie\''), 
			array('=', 'signatures.id_article', sql_quote($Pile[0]['id_article'])), $rech_where?$rech_where:'');
	static $join = array('resultats' => array('signatures','id','id_signature'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);

	// PARTITION
	$nombre_boucle = @sql_count($result, '');
	$debut_boucle = intval(isset($Pile[0]['debut'.'_signatures']) ? $Pile[0]['debut'.'_signatures'] : _request('debut'.'_signatures'));
	$fin_boucle = min($debut_boucle+(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10) - 1, $nombre_boucle - 1);
	$Numrows['_signatures']["grand_total"] = $nombre_boucle;
	$Numrows['_signatures']["total"] = max(0,$fin_boucle - $debut_boucle + 1);
	$Numrows['_signatures']['compteur_boucle'] = 0;
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$Numrows['_signatures']['compteur_boucle']++;
		if ($Numrows['_signatures']['compteur_boucle'] > $debut_boucle) {
		if ($Numrows['_signatures']['compteur_boucle']-1 > $fin_boucle) break;

		$t0 .= (
'
		<tr id=\'id_signature' .
$Pile[$SP]['id_signature'] .
'\'>
			<td class="signature-date">' .
interdire_scripts(affdate_jourcourt(normaliser_date($Pile[$SP]['date']))) .
'</td>
			<td class="signature-nom"><strong class="">' .
interdire_scripts(safehtml(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</strong>' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	' <small class=""><a href="') . $t1 . (	'"' .
	(($t2 = strval(interdire_scripts(couper(attribut_html(safehtml(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect))),'80'))))!=='' ?
			(' title="' . $t2 . '"') :
			'') .
	' class="spip_out">' .
	_T('public/spip/ecrire:site_web',array()) .
	'</a></small>')) :
		'') .
'</td>
			
			' .
(($t1 = BOUCLE_signature_message_tdhtml_a45b76b37c63aa756447255ecd9cd372($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		($t1 . (	'
			<td class="signature-message ">' .
		interdire_scripts(PtoBR(safehtml(propre($Pile[$SP]['message'], $connect)))) .
		'</td>
			')) :
		'') .
'
		</tr>
		');
		}

	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/inc-petition.html.
//
function html_a45b76b37c63aa756447255ecd9cd372($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
executer_balise_dynamique('FORMULAIRE_SIGNATURE',
	array(@$Pile[0]['id_article'],quete_petitions(@$Pile[0]['id_article'],'','','', $Cache)),
	array(''), $GLOBALS['spip_lang'],2) .
'


' .
(($t1 = BOUCLE_signatureshtml_a45b76b37c63aa756447255ecd9cd372($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
<form method=\'get\' action=\'' .
		self() .
		'\'>
<div id="signatures">' .
		form_hidden(self()) .
		'
	' .
		filtre_pagination_dist(
	(isset($Numrows['_signatures']['grand_total']) ?
		$Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total']
	), '_signatures',
		$Pile[0]['debut_signatures'],(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10), false, '','', array('lang' => $GLOBALS["spip_lang"] )) .
		'

	<table summary="' .
		_T('public/spip/ecrire:signatures_petition',array()) .
		'">
	<caption><h2>' .
		(isset($Numrows['_signatures']['grand_total'])
			? $Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total']) .
		' ' .
		_T('public/spip/ecrire:signatures_petition',array()) .
		'</h2></caption>
		<thead>
			<th class="signature-date"><a href=\'' .
		parametre_url(parametre_url(self(),'tri','date_time'),'tri_inverse','') .
		'#signatures\' title="' .
		_T('public/spip/ecrire:lien_trier_date',array()) .
		'">' .
		_T('public/spip/ecrire:date',array()) .
		'</a></th>
			<th class="signature-nom"><a href=\'' .
		parametre_url(parametre_url(self(),'tri','nom_email'),'tri_inverse','') .
		'#signatures\' title="' .
		_T('public/spip/ecrire:lien_trier_nom',array()) .
		'">' .
		_T('public/spip/ecrire:nom',array()) .
		'</a></th>
			
			' .
		BOUCLE_signature_message_thhtml_a45b76b37c63aa756447255ecd9cd372($Cache, $Pile, $doublons, $Numrows, $SP) .
		'
		</thead>
		') . $t1 . (	'
	</table>
	
	' .
		(($t3 = strval(filtre_pagination_dist(
	(isset($Numrows['_signatures']['grand_total']) ?
		$Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total']
	), '_signatures',
		$Pile[0]['debut_signatures'],(($a = intval(interdire_scripts(entites_html(sinon(@$Pile[0]['pagination'],'15'),true)))) ? $a : 10), true, '','', array('lang' => $GLOBALS["spip_lang"] ))))!=='' ?
				('<p class="pagination">' . $t3 . '</p>') :
				'') .
		'

	
	' .
		(($t3 = strval(interdire_scripts(((((entites_html((@$Pile[0]['recherche_signatures']),true) ? '31':(isset($Numrows['_signatures']['grand_total'])
			? $Numrows['_signatures']['grand_total'] : $Numrows['_signatures']['total'])) > '30')) ?' ' :''))))!=='' ?
				($t3 . (	'
	<div class="formulaire_spip formulaire_recherche" id="formulaire_recherche_signatures"><label for="recherche_signatures">' .
			_T('public/spip/ecrire:info_rechercher',array()) .
			'</label> <input type="text" class="text" size="10" name="recherche_signatures" id="recherche_signatures" style=\'font-style: italic;\' value=" ' .
			_T('public/spip/ecrire:entree_signature',array()) .
			'"/> <input type="submit" class="submit" value="' .
			_T('public/spip/ecrire:info_rechercher',array()) .
			'" /></div>
	')) :
				'') .
		'
</div><!--#signatures-->
</form>
')) :
		''));

	return analyse_resultat_skel('html_a45b76b37c63aa756447255ecd9cd372', $Cache, $page, 'squelettes-dist/inc-petition.html');
}

?>
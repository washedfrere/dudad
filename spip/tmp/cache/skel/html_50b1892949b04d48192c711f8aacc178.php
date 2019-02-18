<?php
/*
 * Squelette : squelettes-dist/formulaires/inc-forum_previsu.html
 * Date :      Mon, 09 Feb 2009 08:15:42 GMT
 * Compile :   Mon, 25 May 2009 08:41:22 GMT (7.9ms)
 * Boucles :   _mots
 */ 
//
// <BOUCLE mots>
//
function BOUCLE_motshtml_50b1892949b04d48192c711f8aacc178(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	$in0 = array();
	if (!(is_array($a = ((@$Pile[0]['ajouter_mot'])))))
		$in0[]= $a;
	else $in0 = array_merge($in0, $a);
	static $table = 'mots';
	static $id = '_mots';
	static $from = array('mots' => 'spip_mots');
	static $type = array();
	static $groupby = array();
	static $select = array("0+mots.type AS num",
		"mots.type",
		"0+mots.titre AS num2",
		"mots.titre");
	static $orderby = array('num', 'mots.type', 'num2', 'mots.titre');
	$where = 
			array(sql_in('mots.id_mot',sql_quote($in0)));
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

		$t1 = interdire_scripts(typo($Pile[$SP]['titre'], "TYPO", $connect));
		$t0 .= (($t1 && $t0) ? ', ' : '') . $t1;
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette squelettes-dist/formulaires/inc-forum_previsu.html.
//
function html_50b1892949b04d48192c711f8aacc178($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<fieldset class="previsu">
	<legend>' .
_T('public/spip/ecrire:previsualisation',array()) .
'</legend>
	<ul>
		<li>
			<ul class=\'forum previsu\'>
				<li class="forum-fil">
					<div class="forum-message">
						<div class="forum-chapo">
							' .
(($t1 = strval(interdire_scripts((@$Pile[0]['titre']))))!=='' ?
		('<strong class="forum-titre"><a href="#">' . $t1 . '</a></strong>') :
		'') .
'
							' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, (strlen($a = safehtml((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['session_nom'] : ""))) ? $a : interdire_scripts(invalideur_session($Cache, typo((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['nom'] : "")))))))))!=='' ?
		((	'<small>' .
	_T('public/spip/ecrire:par_auteur',array()) .
	' <span>') . $t1 . '</span></small>') :
		'') .
'
						</div>
						<div class="forum-texte">
							' .
interdire_scripts(lignes_longues((@$Pile[0]['texte']))) .
'
							' .
(($t1 = strval(interdire_scripts(lignes_longues((@$Pile[0]['notes'])))))!=='' ?
		('<div class="notes">' . $t1 . '</div>') :
		'') .
'
							' .
(($t1 = strval(interdire_scripts(attribut_html(entites_html((@$Pile[0]['url_site']),true)))))!=='' ?
		((	'<p class="">' .
	_T('public/spip/ecrire:voir_en_ligne',array()) .
	' : <a href="') . $t1 . (	'" class="spip_out">' .
	interdire_scripts((strlen($a = (@$Pile[0]['nom_site'])) ? $a : interdire_scripts(couper(entites_html((@$Pile[0]['url_site']),true),'80')))) .
	'</a></p>')) :
		'') .
'
							' .
(($t1 = strval(interdire_scripts(table_valeur(entites_html((@$Pile[0]['ajouter_document']),true),'name'))))!=='' ?
		((	'<div class="forum-document">' .
	_T('public/spip/ecrire:info_document',array()) .
	' : ') . $t1 . '</div>') :
		'') .
'
							' .
(($t1 = BOUCLE_motshtml_50b1892949b04d48192c711f8aacc178($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'<p class="reponse_formulaire">' .
		_T('public/spip/ecrire:forum_avez_selectionne',array()) .
		'
							') . $t1 . '
							</p>') :
		'') .
'
						</div>
					</div>
				</li>
			</ul>
			' .
(($t1 = strval(interdire_scripts((@$Pile[0]['erreur']))))!=='' ?
		('<li class="reponse_formulaire">' . $t1 . '</li>') :
		'') .
'
		</li>
	</ul>
	' .
(($t1 = strval(interdire_scripts((@$Pile[0]['bouton']))))!=='' ?
		('<p class="boutons"><input type="submit" class="submit" name="confirmer_previsu_forum" value="' . $t1 . '" /></p>') :
		'') .
'
</fieldset>
<br class="nettoyeur" />');

	return analyse_resultat_skel('html_50b1892949b04d48192c711f8aacc178', $Cache, $page, 'squelettes-dist/formulaires/inc-forum_previsu.html');
}

?>
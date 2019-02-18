<?php
/*
 * Squelette : squelettes-dist/inc-pied.html
 * Date :      Sat, 15 Nov 2008 14:10:58 GMT
 * Compile :   Fri, 15 May 2009 21:55:04 GMT (2.6ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/inc-pied.html.
//
function html_d8829f3fa844421a77bda8b36e925128($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div id="pied">
	<a href="http://www.spip.net/" title="' .
_T('public/spip/ecrire:site_realise_avec_spip',array()) .
'"><img src="' .
interdire_scripts(find_in_path('spip.png')) .
'" alt="SPIP" width="48" height="16" /></a> | 
	<a href="' .
interdire_scripts(entites_html((@$Pile[0]['skel']),true)) .
'" title="' .
_T('public/spip/ecrire:voir_squelette',array()) .
'" rel="nofollow">' .
_T('public/spip/ecrire:squelette',array()) .
'</a>' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? ' ':'')))))!=='' ?
		('
	' . $t1 . (	'| <a href="' .
	executer_balise_dynamique('URL_LOGOUT',
	array(),
	array(''), $GLOBALS['spip_lang'],4) .
	'" rel="nofollow">' .
	_T('public/spip/ecrire:icone_deconnecter',array()) .
	'</a>
	')) :
		'') .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['id_auteur'] : "") ? '':' ')))))!=='' ?
		($t1 . (	'| <a href="' .
	interdire_scripts(parametre_url(generer_url_public('login'),'url',self())) .
	'" rel="nofollow" class=\'login_modal\'>' .
	_T('public/spip/ecrire:lien_connecter',array()) .
	'</a>')) :
		'') .
(($t1 = strval(invalideur_session($Cache, (include_spip("inc/autoriser")&&autoriser('ecrire')?" ":""))))!=='' ?
		('
	' . $t1 . (	'| <a href="' .
	interdire_scripts(eval('return '.'_DIR_RESTREINT_ABS'.';')) .
	'">' .
	_T('public/spip/ecrire:espace_prive',array()) .
	'</a>')) :
		'') .
' | 
	<a rel="contents" href="' .
interdire_scripts(generer_url_public('plan')) .
'">' .
_T('public/spip/ecrire:plan_site',array()) .
'</a> | 
	<a href="' .
interdire_scripts(generer_url_public('backend')) .
'" rel="alternate" title="' .
_T('public/spip/ecrire:syndiquer_site',array()) .
'"><img src="' .
interdire_scripts(find_in_path('feed.png')) .
'" alt="' .
_T('public/spip/ecrire:icone_suivi_activite',array()) .
'" width="16" height="16" />&nbsp;RSS&nbsp;2.0</a>
</div>
' .
"<!-- SPIP-CRON --><div style=\"background-image: url('http://www.torredekapter.es/spip/spip.php?action=cron');\"></div>" .
'
');

	return analyse_resultat_skel('html_d8829f3fa844421a77bda8b36e925128', $Cache, $page, 'squelettes-dist/inc-pied.html');
}

?>
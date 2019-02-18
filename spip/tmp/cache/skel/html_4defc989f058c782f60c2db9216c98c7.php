<?php
/*
 * Squelette : squelettes-dist/formulaires/inc-login_forum.html
 * Date :      Sat, 15 Nov 2008 14:41:56 GMT
 * Compile :   Mon, 25 May 2009 08:40:33 GMT (0.020s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/formulaires/inc-login_forum.html.
//
function html_4defc989f058c782f60c2db9216c98c7($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
<fieldset>
<legend>' .
_T('public/spip/ecrire:forum_qui_etes_vous',array()) .
'</legend>
' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['auth'] : "") ? ' ':'')))))!=='' ?
		($t1 . (	'
	' .
	(($t2 = strval(interdire_scripts(invalideur_session($Cache, typo((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['nom'] : ""))))))!=='' ?
			((	'<p class=\'explication\'>' .
		_T('public/spip/ecrire:forum_votre_nom',array()) .
		' <strong>') . $t2 . (	'</strong> <span class="details">&#91;<a href="' .
		executer_balise_dynamique('URL_LOGOUT',
	array(),
	array(''), $GLOBALS['spip_lang'],5) .
		'" rel="nofollow">' .
		_T('public/spip/ecrire:icone_deconnecter',array()) .
		'</a>&#93;</span></p>')) :
			'') .
	'
	
')) :
		'') .
'
' .
(($t1 = strval(interdire_scripts(invalideur_session($Cache, ((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['auth'] : "") ? '':' ')))))!=='' ?
		($t1 . (	'
	<ul>
		<li class=\'saisie_session_nom\'>
			<label for="session_nom">' .
	_T('public/spip/ecrire:forum_votre_nom',array()) .
	'</label>
			<input type="text" class="text" name="session_nom" id="session_nom" value="' .
	invalideur_session($Cache, entites_html((strlen($a = (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['nom'] : "")) ? $a : invalideur_session($Cache, (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['session_nom'] : ""))))) .
	'" size="40" />
			' .
	(($t2 = strval(interdire_scripts(((lire_config('accepter_inscriptions',null,false) == 'oui') ? ' ':''))))!=='' ?
			($t2 . (	'
			<span class="details">&#91;<a href="' .
		interdire_scripts(parametre_url(generer_url_public('login'),'url',self())) .
		'" rel="nofollow">' .
		_T('public/spip/ecrire:lien_connecter',array()) .
		'</a>&#93;</span>
			')) :
			'') .
	'
		</li>
		<li class=\'saisie_session_email\'>
			<label for="session_email">' .
	_T('public/spip/ecrire:forum_votre_email',array()) .
	'</label>
			<input type="text" class="text" name="session_email" id="session_email" value="' .
	invalideur_session($Cache, entites_html((strlen($a = (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['email'] : "")) ? $a : invalideur_session($Cache, (is_array($a = ($GLOBALS["visiteur_session"])) ? $a['session_email'] : ""))))) .
	'" size="40" />
		</li>
	</ul>
')) :
		'') .
'
</fieldset>');

	return analyse_resultat_skel('html_4defc989f058c782f60c2db9216c98c7', $Cache, $page, 'squelettes-dist/formulaires/inc-login_forum.html');
}

?>
<?php
/*
 * Squelette : squelettes-dist/formulaires/ecrire_auteur.html
 * Date :      Thu, 31 Jul 2008 22:12:20 GMT
 * Compile :   Thu, 14 May 2009 18:15:15 GMT (6.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/formulaires/ecrire_auteur.html.
//
function html_8106fb6e7561bb98e05e0c8ff0405c6a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_ecrire_auteur ajax" id="formulaire_ecrire_auteur' .
interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
'">
<br class=\'bugajaxie\' />
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_ok">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
		('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t1 . '</p>') :
		'') .
'
' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'
<form method=\'post\' action=\'' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'#formulaire_ecrire_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'\' enctype=\'multipart/form-data\'>
	
	' .
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'ecrire_auteur' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div>
	' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'previsu')) ?' ' :''))))!=='' ?
			($t2 . (	'
	<fieldset class="previsu">
		<legend>' .
		_T('public/spip/ecrire:previsualisation',array()) .
		'</legend>
		<ul>
			<li><strong>' .
		interdire_scripts(entites_html((@$Pile[0]['sujet_message_auteur']),true)) .
		'</strong> - <em>' .
		interdire_scripts(entites_html((@$Pile[0]['email_message_auteur']),true)) .
		'</em></li>
			<li>' .
		interdire_scripts(nl2br(entites_html((@$Pile[0]['texte_message_auteur']),true))) .
		'</li>
		</ul>
		<p class="boutons"><input type="submit" class="submit" name="confirmer" value="' .
		_T('public/spip/ecrire:form_prop_confirmer_envoi',array()) .
		'" /></p>
	</fieldset>
	')) :
			'') .
	'
	
	<fieldset>
		<legend>' .
	_T('public/spip/ecrire:envoyer_message',array()) .
	'</legend>
		<ul>
			<li class=\'saisie_email_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'email_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="email_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'">' .
	_T('public/spip/ecrire:form_pet_votre_email',array()) .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'email_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="email_message_auteur" id="email_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'" value="' .
	interdire_scripts(entites_html((@$Pile[0]['email_message_auteur']),true)) .
	'" size="30" />
			</li>
			<li class=\'saisie_sujet_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'sujet_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="sujet_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'">' .
	_T('public/spip/ecrire:form_prop_sujet',array()) .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'sujet_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<input type="text" class="text" name="sujet_message_auteur" id="sujet_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'" value="' .
	interdire_scripts(entites_html((@$Pile[0]['sujet_message_auteur']),true)) .
	'" size="30" />
			</li>
			<li class=\'saisie_texte_message_auteur obligatoire' .
	(($t2 = strval(interdire_scripts(((table_valeur((@$Pile[0]['erreurs']),'texte_message_auteur')) ?' ' :''))))!=='' ?
			(' ' . $t2 . 'erreur') :
			'') .
	'\'>
				<label for="texte_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'">' .
	_T('public/spip/ecrire:info_texte_message',array()) .
	'</label>
				' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'texte_message_auteur'))))!=='' ?
			('<span class="erreur_message">' . $t2 . '</span>') :
			'') .
	'
				<textarea name="texte_message_auteur" id="texte_message_auteur' .
	interdire_scripts(entites_html((@$Pile[0]['id']),true)) .
	'" rows="8" cols="60">' .
	interdire_scripts(entites_html((@$Pile[0]['texte_message_auteur']),true)) .
	'</textarea>
			</li>
		</ul>
	</fieldset>
	
	<p style="display: none;">
		<label for="nobot">' .
	_T('public/spip/ecrire:antispam_champ_vide',array()) .
	'</label>
		<input type="text" class="text" name="nobot" id="nobot" value="' .
	interdire_scripts(entites_html((@$Pile[0]['nobot']),true)) .
	'" size="10" />
	</p>
	<p class="boutons"><input type="submit" class="submit" name="valide" value="' .
	_T('public/spip/ecrire:form_prop_envoyer',array()) .
	'" /></p>
</form>
')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_8106fb6e7561bb98e05e0c8ff0405c6a', $Cache, $page, 'squelettes-dist/formulaires/ecrire_auteur.html');
}

?>
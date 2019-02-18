<?php
/*
 * Squelette : ../prive/formulaires/editer_breve.html
 * Date :      Wed, 22 Apr 2009 18:37:28 GMT
 * Compile :   Thu, 14 May 2009 17:33:39 GMT (0.011s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/formulaires/editer_breve.html.
//
function html_a7b8104890507f6ba6d39c0c9e3401ad($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'formulaire_spip formulaire_editer formulaire_editer_breve formulaire_editer_breve-' .
interdire_scripts(entites_html(sinon(@$Pile[0]['id_breve'],'nouveau'),true)) .
'\'>
	<!-- <br class=\'bugajaxie\' /> -->
	' .
(($t1 = strval((@$Pile[0]['message_ok'])))!=='' ?
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
	'\' enctype=\'multipart/form-data\'><div>
		
		' .
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'editer_breve' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div>' .
	'<input type=\'hidden\' name=\'id_breve\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['id_breve']),true)) .
	'\' />
	  <ul>
	    <li class="editer_titre obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
		    	<label for="titre">' .
	_T('public/spip/ecrire:info_titre',array()) .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'titre')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'titre\' id=\'titre\' value="' .
	sinon(@$Pile[0]['titre'],_T(concat('','titre_nouvelle_breve'))) .
	'"
					' .
	(($t2 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['titre'],''),true) ? '':' '))))!=='' ?
			($t2 . 'onfocus="if(!antifocus){this.value=\'\';antifocus=true;}"') :
			'') .
	'/>
	    </li>

	 	' .
	(($t2 = strval(chercher_rubrique('',interdire_scripts(entites_html((@$Pile[0]['id_breve']),true)),interdire_scripts((strlen($a = entites_html((@$Pile[0]['id_rubrique']),true)) ? $a : interdire_scripts(entites_html((@$Pile[0]['id_parent']),true)))),'breve',interdire_scripts(entites_html((@$Pile[0]['id_secteur']),true)),table_valeur((@$Pile[0]['config']),'restreint'),'0','form_simple')))!=='' ?
			((	'<li class="editer_parent' .
		((table_valeur((@$Pile[0]['erreurs']),'id_rubrique'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				<label for="id_parent">' .
		_T('public/spip/ecrire:entree_interieur_rubrique',array()) .
		'<em class=\'aide\'>' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('brevesrub'):'')) .
		'</em></label>
				') . $t2 . '
	    </li>') :
			'') .
	'
	    
	    <li class="editer_texte' .
	((table_valeur((@$Pile[0]['erreurs']),'texte'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
	      		<label for="text_area">' .
	_T('public/spip/ecrire:entree_texte_breve',array()) .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'texte')))!=='' ?
			('
				<span class=\'erreur_message\'>' . $t2 . '</span>
				') :
			'') .
	(($t2 = strval(sinon(@$Pile[0]['_texte_trop_long'],'')))!=='' ?
			($t2 . '
				') :
			'') .
	(table_valeur((@$Pile[0]['config']),'afficher_barre') ? barre_typo('text_area',htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang'])):'') .
	'
				<textarea name=\'texte\' id=\'text_area\' class=\'barre_inserer\' rows=\'' .
	plus(table_valeur((@$Pile[0]['config']),'lignes'),'2') .
	'\' cols=\'40\'' .
	(($t2 = strval(sinon(@$Pile[0]['_browser_caret'],'')))!=='' ?
			('
					' . $t2) :
			'') .
	'>' .
	(@$Pile[0]['texte']) .
	'</textarea>
	    </li>
	  	<li class="editer_liens_sites fieldset">
			<fieldset>
			<h3 class="legend">' .
	_T('public/spip/ecrire:entree_liens_sites',array()) .
	'</h3>
			<ul>
				<li class="editer_lien_titre' .
	((table_valeur((@$Pile[0]['erreurs']),'lien_titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
						<label for="lien_titre">' .
	_T('public/spip/ecrire:info_titre',array()) .
	'<em class=\'aide\'>' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('breveslien'):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'lien_titre')))!=='' ?
			('
						<span class=\'erreur_message\'>' . $t2 . '</span>
						') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'lien_titre\' id=\'lien_titre\' value="' .
	(@$Pile[0]['lien_titre']) .
	'" />
				</li>
				<li class="editer_lien_url' .
	((table_valeur((@$Pile[0]['erreurs']),'lien_url'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
						<label for="lien_url">' .
	_T('public/spip/ecrire:info_url',array()) .
	'</label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'lien_url')))!=='' ?
			('
						<span class=\'erreur_message\'>' . $t2 . '</span>
						') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'lien_url\' id=\'lien_url\' value="' .
	(@$Pile[0]['lien_url']) .
	'" />
				</li>
			</ul>
	    	</fieldset>
	    </li>
	    
	    ' .
	(($t2 = strval(interdire_scripts(invalideur_session($Cache, ((((is_array($a = ($GLOBALS["visiteur_session"])) ? $a['statut'] : "") == '0minirezo')) ?' ' :'')))))!=='' ?
			($t2 . (	'
	    <li class="fieldset">
			<fieldset>
			<ul>
			<li class="editer_statut obligatoire">
				<label for=\'statut\'>' .
		_T('public/spip/ecrire:entree_breve_publiee',array()) .
		'<em class=\'aide\'>' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('brevesstatut'):'')) .
		'</em>
				</label><select name=\'statut\' id=\'statut\' size=\'1\'>
					<option value=\'prop\'' .
		(((@$Pile[0]['statut']) == 'prop') ? ' selected="selected"':'') .
		' style=\'background-color: white\'>' .
		_T('public/spip/ecrire:item_breve_proposee',array()) .
		'</option>
					<option value=\'refuse\'' .
		(((@$Pile[0]['statut']) == 'refuse') ? ' selected="selected"':'') .
		' class=\'danger\'>' .
		_T('public/spip/ecrire:item_breve_refusee',array()) .
		'</option>
					<option value=\'publie\'' .
		(((@$Pile[0]['statut']) == 'publie') ? ' selected="selected"':'') .
		' style=\'background-color: #B' .
		'4E8C5\'>' .
		_T('public/spip/ecrire:item_breve_validee',array()) .
		'</option>
				</select>
			</li>
			</ul>
			</fieldset>
			</li>
			')) :
			'') .
	'
	  </ul>
	  ' .
	'
	  <!--extra-->
	  <p class="boutons"><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer',array()) .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>');

	return analyse_resultat_skel('html_a7b8104890507f6ba6d39c0c9e3401ad', $Cache, $page, '../prive/formulaires/editer_breve.html');
}

?>
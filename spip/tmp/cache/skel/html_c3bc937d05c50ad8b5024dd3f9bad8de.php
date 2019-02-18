<?php
/*
 * Squelette : ../prive/formulaires/editer_article.html
 * Date :      Wed, 22 Apr 2009 18:37:28 GMT
 * Compile :   Thu, 14 May 2009 17:35:07 GMT (0.023s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/formulaires/editer_article.html.
//
function html_c3bc937d05c50ad8b5024dd3f9bad8de($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_editer formulaire_editer_article formulaire_editer_article-' .
interdire_scripts(entites_html(sinon(@$Pile[0]['id_article'],'nouveau'),true)) .
'">
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
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'editer_article' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div>' .
	'<input type=\'hidden\' name=\'id_article\' value=\'' .
	interdire_scripts(entites_html((@$Pile[0]['id_article']),true)) .
	'\' />
	  <ul>
	  
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_surtitre') == 'non') ? sinon(@$Pile[0]['surtitre'],''):' '))  ?
			(' ' . (	'
	    <li class="editer_surtitre' .
		((table_valeur((@$Pile[0]['erreurs']),'surtitre'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="surtitre">' .
		_T('public/spip/ecrire:texte_sur_titre',array()) .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('arttitre'):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'surtitre')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'surtitre\' id=\'surtitre\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		(@$Pile[0]['surtitre']) .
		'" />
	    </li>')) :
			'') .
	'
	    <li class="editer_titre obligatoire' .
	((table_valeur((@$Pile[0]['erreurs']),'titre'))  ?
			(' ' . ' ' . 'erreur') :
			'') .
	'">
	    	<label for="titre">' .
	_T('public/spip/ecrire:info_titre',array()) .
	'<em class="aide">' .
	interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('arttitre'):'')) .
	'</em></label>' .
	(($t2 = strval(table_valeur((@$Pile[0]['erreurs']),'titre')))!=='' ?
			('
		<span class=\'erreur_message\'>' . $t2 . '</span>
		') :
			'') .
	'<input type=\'text\' class=\'text\' name=\'titre\' id=\'titre\'' .
	(($t2 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
			(' lang=\'' . $t2 . '\'') :
			'') .
	' value="' .
	sinon(@$Pile[0]['titre'],_T(concat('','info_nouvel_article'))) .
	'"
		' .
	(($t2 = strval(interdire_scripts((entites_html(sinon(@$Pile[0]['titre'],''),true) ? '':' '))))!=='' ?
			($t2 . 'onfocus="if(!antifocus){this.value=\'\';antifocus=true;}"') :
			'') .
	'/>
	    </li>
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_soustitre') == 'non') ? sinon(@$Pile[0]['soustitre'],''):' '))  ?
			(' ' . (	'
	    <li class="editer_soustitre' .
		((table_valeur((@$Pile[0]['erreurs']),'soustitre'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="soustitre">' .
		_T('public/spip/ecrire:texte_sous_titre',array()) .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('arttitre'):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'soustitre')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'soustitre\' id=\'soustitre\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		(@$Pile[0]['soustitre']) .
		'" />
	    </li>')) :
			'') .
	'
	' .
	(($t2 = strval(chercher_rubrique('',interdire_scripts(entites_html((@$Pile[0]['id_article']),true)),interdire_scripts(entites_html((@$Pile[0]['id_parent']),true)),'article',interdire_scripts(entites_html((@$Pile[0]['id_secteur']),true)),table_valeur((@$Pile[0]['config']),'restreint'),'0','form_simple')))!=='' ?
			((	'<li class="editer_parent' .
		((table_valeur((@$Pile[0]['erreurs']),'id_rubrique'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="id_parent">' .
		_T('public/spip/ecrire:titre_cadre_interieur_rubrique',array()) .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artrub'):'')) .
		'</em></label>
				') . $t2 . '
	    </li>') :
			'') .
	'
		
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_descriptif') == 'non') ? sinon(@$Pile[0]['descriptif'],''):' '))  ?
			(' ' . (	'
	    <li class="editer_descriptif' .
		((table_valeur((@$Pile[0]['erreurs']),'descriptif'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
		<label for="descriptif">' .
		_T('public/spip/ecrire:texte_descriptif_rapide',array()) .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artdesc'):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'descriptif')))!=='' ?
				('
		<span class=\'erreur_message\'>' . $t3 . '</span>
		') :
				'') .
		'<textarea name=\'descriptif\' id=\'descriptif\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'2\' cols=\'40\'>' .
		(@$Pile[0]['descriptif']) .
		'</textarea>
	    </li>')) :
			'') .
	'
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_chapeau') == 'non') ? sinon(@$Pile[0]['chapo'],''):' '))  ?
			(' ' . (	'
	    ' .
		((match((@$Pile[0]['chapo']),'^='))  ?
				((	'<li class=\'editer_virtuel' .
			((table_valeur((@$Pile[0]['erreurs']),'virtuel'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'>') . ' ' . (	'
		<label for=\'virtuel\'>' .
			_T('public/spip/ecrire:info_redirection',array()) .
			'<em class="aide">' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('artvirt'):'')) .
			'</em></label>' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'virtuel')))!=='' ?
					('
		<span class=\'erreur_message\'>' . $t4 . '</span>
		') :
					'') .
			'<input type=\'text\' class=\'text\' name=\'virtuel\' id=\'virtuel\' value="' .
			replace((@$Pile[0]['chapo']),'^=','') .
			'" />
		<input type=\'hidden\' name=\'changer_virtuel\' value=\'oui\' />
		<p class=\'explication\'>' .
			_T('public/spip/ecrire:texte_article_virtuel_reference',array()) .
			'</p>
		</li>')) :
				'') .
		'
		' .
		(!(match((@$Pile[0]['chapo']),'^='))  ?
				((	'<li class="editer_chapo' .
			((table_valeur((@$Pile[0]['erreurs']),'chapo'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'">') . ' ' . (	'
			<label for="chapo">' .
			_T('public/spip/ecrire:info_chapeau',array()) .
			'<em class="aide">' .
			interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('arttitre'):'')) .
			'</em></label>' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'chapo')))!=='' ?
					('
			<span class=\'erreur_message\'>' . $t4 . '</span>
			') :
					'') .
			'<textarea name=\'chapo\' id=\'chapo\'' .
			(($t4 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
					(' lang=\'' . $t4 . '\'') :
					'') .
			(($t4 = strval(table_valeur((@$Pile[0]['config']),'lignes')))!=='' ?
					(' rows=\'' . $t4 . '\'') :
					'') .
			' cols=\'40\'>' .
			(@$Pile[0]['chapo']) .
			'</textarea>
		</li>')) :
				'') .
		'
			')) :
			'') .
	'

		' .
	((((table_valeur((@$Pile[0]['config']),'articles_urlref') == 'non') ? sinon(@$Pile[0]['url_site'],sinon(@$Pile[0]['nom_site'],'')):' '))  ?
			(' ' . (	'
	  	<li class="editer_liens_sites fieldset">
			<fieldset>
				<h3 class="legend">' .
		_T('public/spip/ecrire:entree_liens_sites',array()) .
		'</h3>
				<ul>
				<li class="editer_nom_site' .
		((table_valeur((@$Pile[0]['erreurs']),'nom_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
					<label for="nom_site">' .
		_T('public/spip/ecrire:info_titre',array()) .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'nom_site')))!=='' ?
				('
					<span class=\'erreur_message\'>' . $t3 . '</span>
					') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'nom_site\' id=\'nom_site\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' value="' .
		(@$Pile[0]['nom_site']) .
		'" />
				</li>
				<li class="editer_url_site' .
		((table_valeur((@$Pile[0]['erreurs']),'url_site'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
					<label for="url_site">' .
		_T('public/spip/ecrire:info_url',array()) .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'url_site')))!=='' ?
				('
					<span class=\'erreur_message\'>' . $t3 . '</span>
					') :
				'') .
		'<input type=\'text\' class=\'text\' name=\'url_site\' id=\'url_site\' value="' .
		(@$Pile[0]['url_site']) .
		'" />
				</li>
				</ul>
			</fieldset>
		</li>')) :
			'') .
	'
	    
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_texte') == 'non') ? sinon(@$Pile[0]['texte'],''):' '))  ?
			(' ' . (	'
	    <li class="editer_texte obligatoire' .
		((table_valeur((@$Pile[0]['erreurs']),'texte'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
			<label for="text_area">' .
		_T('public/spip/ecrire:info_texte',array()) .
		'<em class="aide">' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('arttexte'):'')) .
		'</em></label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'texte')))!=='' ?
				('
			<span class=\'erreur_message\'>' . $t3 . '</span>
			') :
				'') .
		sinon(@$Pile[0]['_texte_trop_long'],'') .
		'
				<div class="explication">' .
		_T('public/spip/ecrire:texte_enrichir_mise_a_jour',array()) .
		'<em>' .
		interdire_scripts((($aider=charger_fonction('aider','inc'))?$aider('raccourcis'):'')) .
		'</em></div>
				' .
		(table_valeur((@$Pile[0]['config']),'afficher_barre') ? barre_typo('text_area',interdire_scripts(@$Pile[0]['langue'])):'') .
		'
				<textarea name=\'texte\' id=\'text_area\' class=\'barre_inserer\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'' .
		plus(table_valeur((@$Pile[0]['config']),'lignes'),'2') .
		'\' cols=\'40\'' .
		(($t3 = strval(sinon(@$Pile[0]['_browser_caret'],'')))!=='' ?
				('
				' . $t3) :
				'') .
		'>' .
		(@$Pile[0]['texte']) .
		'</textarea>
				
				<script type=\'text/javascript\'><!--
				jQuery(\'document\').ready(function(){
				jQuery(\'#text_area\')
				.height((jQuery(window).height()-80)+\'px\');
				});
				//--></script>
	    </li>')) :
			'') .
	'
	  	' .
	((((table_valeur((@$Pile[0]['config']),'articles_ps') == 'non') ? sinon(@$Pile[0]['ps'],''):' '))  ?
			(' ' . (	'
	    <li class="editer_ps' .
		((table_valeur((@$Pile[0]['erreurs']),'ps'))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
			<label for="ps">' .
		_T('public/spip/ecrire:info_post_scriptum',array()) .
		'</label>' .
		(($t3 = strval(table_valeur((@$Pile[0]['erreurs']),'ps')))!=='' ?
				('
			<span class=\'erreur_message\'>' . $t3 . '</span>
			') :
				'') .
		'<textarea name=\'ps\' id=\'ps\'' .
		(($t3 = strval(interdire_scripts(@$Pile[0]['langue'])))!=='' ?
				(' lang=\'' . $t3 . '\'') :
				'') .
		' rows=\'5\' cols=\'40\'>' .
		(@$Pile[0]['ps']) .
		'</textarea>
	    </li>')) :
			'') .
	'

	  </ul>

	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\'><input type=\'submit\' name="save" class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer',array()) .
	'\' /></p>
	</div></form>
	')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_c3bc937d05c50ad8b5024dd3f9bad8de', $Cache, $page, '../prive/formulaires/editer_article.html');
}

?>
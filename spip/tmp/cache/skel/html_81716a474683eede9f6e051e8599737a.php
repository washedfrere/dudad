<?php
/*
 * Squelette : squelettes-dist/formulaires/forum.html
 * Date :      Thu, 05 Feb 2009 17:19:24 GMT
 * Compile :   Mon, 25 May 2009 08:40:32 GMT (0.016s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette squelettes-dist/formulaires/forum.html.
//
function html_81716a474683eede9f6e051e8599737a($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_forum ajax" id="formulaire_forum">
' .
'<br class=\'bugajaxie\' />

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
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['login_forum_abo']),true))))!=='' ?
		($t1 . (	'
' .
	
'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('formulaires/inc-login_forum_abo') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
')) :
		'') .
'

' .
(($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		($t1 . (	'


' .
	(($t2 = strval(interdire_scripts(table_valeur((@$Pile[0]['erreurs']),'previsu'))))!=='' ?
			((	'<form action="' .
		interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
		'#formulaire_forum" method="post" class="noajax">
	<div>
	' .
		'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'forum' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div>' .
		'
	<input type=\'hidden\' name=\'titre\' value="' .
		interdire_scripts(entites_html((@$Pile[0]['titre']),true)) .
		'" />
	<input type=\'hidden\' name=\'texte\' value="' .
		interdire_scripts(entites_html((@$Pile[0]['texte']),true)) .
		'" />
	<input type=\'hidden\' name=\'url_site\' value="' .
		interdire_scripts(entites_html((@$Pile[0]['url_site']),true)) .
		'" />
	<input type=\'hidden\' name=\'nom_site\' value="' .
		interdire_scripts(entites_html((@$Pile[0]['nom_site']),true)) .
		'" />
	' .
		(($t3 = strval(interdire_scripts((@$Pile[0]['id_forum']))))!=='' ?
				('<input type="hidden" name="id_forum" value="' . $t3 . '" />') :
				'') .
		'
	' .
		recuperer_fond('',$l =  array('fond' => 'formulaires/inc-forum_ajouter_mot' ,
	'ajouter_mot' => @$Pile[0]['ajouter_mot'] ), array(), '') .
		'
	') . $t2 . '
	</div>
</form>') :
			'') .
	'


<form action="' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'#formulaire_forum" method="post" enctype=\'multipart/form-data\'><div>
' .
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'forum' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div>
' .
	(($t2 = strval(interdire_scripts((@$Pile[0]['id_forum']))))!=='' ?
			('<input type="hidden" name="id_forum" value="' . $t2 . '" />') :
			'') .
	'
' .
	(($t2 = strval(interdire_scripts(entites_html((@$Pile[0]['modere']),true))))!=='' ?
			((	'<fieldset>
	<legend>' .
		_T('public/spip/ecrire:bouton_radio_modere_priori',array()) .
		'</legend>
	<p class="explication">') . $t2 . (	_T('public/spip/ecrire:forum_info_modere',array()) .
		'</p>
</fieldset>')) :
			'') .
	'

' .
	(($t2 = strval(choixsiegal((@$Pile[0]['afficher_texte']),'non',' ','')))!=='' ?
			($t2 . (	'
' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
				('<input type="hidden" name="titre" value="' . $t3 . '" />') :
				'') .
		'
<p class="spip_bouton"><input type="submit" class="submit" value="' .
		_T('public/spip/ecrire:forum_valider',array()) .
		'" /></p>')) :
			'') .
	'

' .
	(($t2 = strval(choixsiegal((@$Pile[0]['afficher_texte']),'non','',' ')))!=='' ?
			($t2 . (	'

	<fieldset>
	<legend>' .
		_T('public/spip/ecrire:form_pet_message_commentaire',array()) .
		'</legend>' .
		(($t3 = strval(interdire_scripts((((lire_config('forums_titre',null,false) != 'non')) ?'' :' '))))!=='' ?
				('
	' . $t3 . (	'
		<input type="hidden" name="titre" id="titre"' .
			(($t4 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
					(' value="' . $t4 . '"') :
					'') .
			' />
	')) :
				'') .
		'<ul>
	' .
		(($t3 = strval(recuperer_fond('',$l =  array('fond' => 'formulaires/inc-forum_bloc_choix_mots' ,
	'table' => interdire_scripts((@$Pile[0]['table'])) ,
	'ajouter_mot' => @$Pile[0]['ajouter_mot'] ), array(), '')))!=='' ?
				('<li class=\'saisie_mots_forum\'>' . $t3 . '</li>') :
				'') .
		'

' .
		(($t3 = strval(interdire_scripts((((lire_config('forums_titre',null,false) != 'non')) ?' ' :''))))!=='' ?
				($t3 . (	'
	<li class=\'saisie_titre' .
			((table_valeur((@$Pile[0]['erreurs']),'titre'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'>
		<label for="titre">' .
			_T('public/spip/ecrire:forum_titre',array()) .
			'</label>
		' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'titre')))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
		<input type="text" class="text" name="titre" id="titre"' .
			(($t4 = strval(interdire_scripts(entites_html((@$Pile[0]['titre']),true))))!=='' ?
					(' value="' . $t4 . '"') :
					'') .
			' size="60" />
	</li>
')) :
				'') .
		'

' .
		interdire_scripts(((lire_config('forums_texte',null,false) != 'non') ? (	'<li class=\'saisie_texte' .
			((table_valeur((@$Pile[0]['erreurs']),'texte'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'>
		<label for=\'texte\'>' .
			typo(_T('public/spip/ecrire:forum_texte',array())) .
			'</label>
		' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'texte')))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
		<p class=\'explication\'>' .
			_T('public/spip/ecrire:info_creation_paragraphe',array()) .
			'</p>
		' .
			(table_valeur((@$Pile[0]['config']),'afficher_barre') ? barre_typo('texte',htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']),'1'):'') .
			'
		<textarea name="texte" id="texte" rows="12" cols="60">' .
			interdire_scripts(entites_html((@$Pile[0]['texte']),true)) .
			'</textarea>
	</li>
'):'')) .
		'
	</ul></fieldset>

' .
		interdire_scripts(((lire_config('forums_urlref',null,false) != 'non') ? (	'<fieldset>
	<legend>' .
			_T('public/spip/ecrire:forum_lien_hyper',array()) .
			'</legend>
	<p class=\'explication\'>' .
			_T('public/spip/ecrire:forum_page_url',array()) .
			'</p>
	<ul>
	<li class=\'saisie_nom_site' .
			((table_valeur((@$Pile[0]['erreurs']),'nom_site'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'><label for="nom_site">' .
			_T('public/spip/ecrire:forum_titre',array()) .
			'</label>
	' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'nom_site')))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
	<input type="text" class="text" name="nom_site" id="nom_site" size="40" value="' .
			interdire_scripts(entites_html((@$Pile[0]['nom_site']),true)) .
			'" /></li>
	<li class=\'saisie_url_site' .
			((table_valeur((@$Pile[0]['erreurs']),'url_site'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'><label for="url_site">' .
			_T('public/spip/ecrire:forum_url',array()) .
			'</label>
	' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'url_site')))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
	<input type="text" class="text" name="url_site" id="url_site" style="text-align: left;" dir="ltr" size="40" value="' .
			interdire_scripts(entites_html((@$Pile[0]['url_site']),true)) .
			'" /></li>
	</ul></fieldset>
'):'')) .
		'

' .
		(($t3 = strval(interdire_scripts(entites_html((@$Pile[0]['cle_ajouter_document']),true))))!=='' ?
				((	'
	<fieldset>
	<legend>' .
			_T('public/spip/ecrire:bouton_ajouter_document',array()) .
			'</legend>
	<ul>
	<li class=\'saisie_document_forum' .
			((table_valeur((@$Pile[0]['erreurs']),'document_forum'))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'\'>
	' .
			(($t4 = strval(table_valeur((@$Pile[0]['erreurs']),'document_forum')))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
	<input type="hidden" name="cle_ajouter_document" value="') . $t3 . (	'" />
	' .
			(($t4 = strval(interdire_scripts(entites_html((@$Pile[0]['ajouter_document']),true))))!=='' ?
					('<div id="ajouter_document_up">' . $t4 . (	'
	<label for="supprimer_document_ajoute"><input type=\'checkbox\' name=\'supprimer_document_ajoute\' id=\'supprimer_document_ajoute\' />
	' .
				_T('public/spip/ecrire:lien_supprimer',array()) .
				'</label>
	</div>')) :
					'') .
			'
	<div>
	' .
			(($t4 = strval(interdire_scripts(join(entites_html((@$Pile[0]['formats_documents_forum']),true),', '))))!=='' ?
					('<label for="ajouter_document">' . $t4 . '</label>') :
					'') .
			'
	<input class=\'file\' type="file" name="ajouter_document" id="ajouter_document"' .
			(($t4 = strval(interdire_scripts(join(entites_html((@$Pile[0]['formats_documents_forum']),true),','))))!=='' ?
					('
	accept="' . $t4 . '"') :
					'') .
			' />
	</div>

	<script type=\'text/javascript\'>
	jQuery(\'#ajouter_document_up\')
	.next()
		.hide()
	.prev()
	.find(\':checkbox\')
	.bind(\'change\', function(){
		jQuery(\'#ajouter_document_up\').hide().next().show();
	})
	;
	</script>
	</li>
	</ul></fieldset>
')) :
				'') .
		'

	' .
		
'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('formulaires/inc-login_forum') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>

	
	<p style="display: none;">
		<label for="nobot_forum">' .
		_T('public/spip/ecrire:antispam_champ_vide',array()) .
		'</label>
		<input type="text" class="text" name="nobot" id="nobot_forum" value="' .
		interdire_scripts(entites_html((@$Pile[0]['nobot']),true)) .
		'" size="10" />
	</p>
	<p class="boutons"><input type="submit" class="submit" value="' .
		_T('public/spip/ecrire:forum_voir_avant',array()) .
		'" /></p>
')) :
			'') .
	'
</div>
</form>


<script type="text/javascript">/*<!' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'CDATA' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'*/
if (window.jQuery)(function($){
	$.getScript(\'' .
	interdire_scripts(url_absolue(find_in_path('javascript/jquery.cookie.js'))) .
	'\',
	function(){
		var a = $.cookie(\'spip_contenu_formulaire_' .
	interdire_scripts(entites_html((@$Pile[0]['_sign']),true)) .
	'\');
		var saveauto = true;
		if (a) {
			$(\'#formulaire_forum textarea' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'name=texte' .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	'\')
			.val(a);
			$.cookie(\'spip_contenu_formulaire_' .
	interdire_scripts(entites_html((@$Pile[0]['_sign']),true)) .
	'\', null);
		}
		$(\'#formulaire_forum form\')
		.bind(\'submit\', function() {
			saveauto = false;
		});
		$(window)
		.bind(\'unload\', function(){
			if (saveauto)
			$.cookie(\'spip_contenu_formulaire_' .
	interdire_scripts(entites_html((@$Pile[0]['_sign']),true)) .
	'\',
				$(\'#formulaire_forum textarea' .
	interdire_scripts(eval('return '.'chr(91)'.';')) .
	'name=texte' .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	'\').val()
			);
		});
	});
}(jQuery));
/*' .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	interdire_scripts(eval('return '.'chr(93)'.';')) .
	'>*/</script>
')) :
		'') .
'
</div>
');

	return analyse_resultat_skel('html_81716a474683eede9f6e051e8599737a', $Cache, $page, 'squelettes-dist/formulaires/forum.html');
}

?>
<?php
/*
 * Squelette : ../plugins/auto/compositions/formulaires/editer_composition_objet.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 18:19:16 GMT (0.014s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/compositions/formulaires/editer_composition_objet.html.
//
function html_7f99200a7783f53237ea9ad402080697($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (($t1 = strval(interdire_scripts(entites_html((@$Pile[0]['editable']),true))))!=='' ?
		((	'<div class=\'ajax\'>
<div class="formulaire_spip formulaire_editer formulaire_' .
	interdire_scripts(@$Pile[0]['form']) .
	' formulaire_' .
	interdire_scripts(@$Pile[0]['form']) .
	'-' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['id'],'nouveau'),true)) .
	'">
	' .
	(($t2 = strval(interdire_scripts((@$Pile[0]['message_ok']))))!=='' ?
			('<p class="reponse_formulaire reponse_formulaire_ok">' . $t2 . '</p>') :
			'') .
	'
	' .
	(($t2 = strval(interdire_scripts((@$Pile[0]['message_erreur']))))!=='' ?
			('<p class="reponse_formulaire reponse_formulaire_erreur">' . $t2 . '</p>') :
			'') .
	'
	') . $t1 . (	'
	<form method=\'post\' action=\'' .
	interdire_scripts(entites_html((@$Pile[0]['action']),true)) .
	'\' enctype=\'multipart/form-data\'><div>
		
		' .
	'<div>' . (form_hidden(interdire_scripts(entites_html((@$Pile[0]['action']),true)))). '<input type=\'hidden\' name=\'formulaire_action\' value=\'' . 'editer_composition_objet' . '\' />'. '<input type=\'hidden\' name=\'formulaire_action_args\' value=\'' . @$Pile[0]['formulaire_args']. '\' />'. (@$Pile[0]['_hidden']?@$Pile[0]['_hidden']:'') . '</div><ul>
	  	' .
	vide($Pile['vars']['fl'] = 'compositions') .
	(($t2 = strval(interdire_scripts(((strlen(entites_html(sinon(@$Pile[0]['id_article_accueil'],''),true))) ?' ' :''))))!=='' ?
			($t2 . (	'
	  	' .
		vide($Pile['vars']['name'] = 'id_article_accueil') .
		vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
		vide($Pile['vars']['obli'] = '') .
		'<li class="editer_' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['obli'] : "")))!=='' ?
				(' ' . $t3) :
				'') .
		(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
	    	<label for="' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		'">' .
		_T(concat((is_array($a = ($Pile["vars"])) ? $a['fl'] : ""),':label_',(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
		'</label>
				' .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
				' .
		recuperer_fond('',$l =  array('fond' => 'formulaires/inc-selecteur_accueil' ,
	'name' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id_rubrique' => @$Pile[0]['id_rubrique'] ,
	'selected' => interdire_scripts(entites_html((@$Pile[0][(is_array($a = ($Pile["vars"])) ? $a['name'] : "")]),true)) ), array(), '') .
		'
				' .
		(($t3 = strval(interdire_scripts(((entites_html((@$Pile[0]['id_article_accueil']),true)) ?' ' :''))))!=='' ?
				('<span class="explication">' . $t3 . (	'<a href="' .
			interdire_scripts(generer_url_entite(entites_html((@$Pile[0]['id_article_accueil']),true),'article')) .
			'">' .
			_T('compositions:voir_article_accueil',array()) .
			'</a></span>')) :
				'') .
		'
	    </li>')) :
			'') .
	'
			' .
	vide($Pile['vars']['lockable'] = '') .
	vide($Pile['vars']['name'] = 'composition') .
	vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
	vide($Pile['vars']['obli'] = '') .
	(($t2 = strval(invalideur_session($Cache, ((((((include_spip("inc/autoriser")&&autoriser('webmestre')?" ":"")) OR (interdire_scripts(invalideur_session($Cache, ((entites_html((@$Pile[0]['composition_lock']),true)) ?'' :' '))))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
	    ' .
		(($t3 = strval(recuperer_fond('',$l =  array('fond' => 'formulaires/inc-selecteur_composition' ,
	'name' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id_rubrique' => @$Pile[0]['id_rubrique'] ,
	'selected' => interdire_scripts(entites_html((@$Pile[0][(is_array($a = ($Pile["vars"])) ? $a['name'] : "")]),true)) ,
	'compositions' => @$Pile[0]['compositions'] ), array(), '')))!=='' ?
				((	'<li class="editer_' .
			(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
			(($t4 = strval((is_array($a = ($Pile["vars"])) ? $a['obli'] : "")))!=='' ?
					(' ' . $t4) :
					'') .
			(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
					(' ' . ' ' . 'erreur') :
					'') .
			'">
	    	<label for="' .
			(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
			'">' .
			_T(concat((is_array($a = ($Pile["vars"])) ? $a['fl'] : ""),':label_',(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
			'</label>
				' .
			(($t4 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
					('<span class=\'erreur_message\'>' . $t4 . '</span>') :
					'') .
			'
				') . $t3 . (	'
	    </li>' .
			vide($Pile['vars']['lockable'] = ' '))) :
				'') .
		'
			')) :
			'') .
	(($t2 = strval(invalideur_session($Cache, ((((((((include_spip("inc/autoriser")&&autoriser('webmestre')?" ":"")) ?'' :' ')) AND (interdire_scripts(invalideur_session($Cache, entites_html((@$Pile[0]['composition_lock']),true))))) ?' ' :'')) ?' ' :''))))!=='' ?
			($t2 . (	'
	    ' .
		(($t3 = strval(recuperer_fond('',$l =  array('fond' => 'formulaires/inc-informeur_composition' ,
	'name' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id' => (is_array($a = ($Pile["vars"])) ? $a['name'] : "") ,
	'id_rubrique' => @$Pile[0]['id_rubrique'] ,
	'selected' => interdire_scripts(entites_html((@$Pile[0][(is_array($a = ($Pile["vars"])) ? $a['name'] : "")]),true)) ,
	'compositions' => @$Pile[0]['compositions'] ), array(), '')))!=='' ?
				('<li class="informer_composition">
				' . $t3 . (	'
				<em>' .
			_T('compositions:composition_verrouillee',array()) .
			'</em>
	    </li>')) :
				''))) :
			'') .
	'
	  	' .
	(($t2 = strval(invalideur_session($Cache, ((((((include_spip("inc/autoriser")&&autoriser('webmestre')?" ":"")) ?' ' :'')) AND (invalideur_session($Cache, (is_array($a = ($Pile["vars"])) ? $a['lockable'] : "")))) ?' ' :''))))!=='' ?
			($t2 . (	'
	  	' .
		vide($Pile['vars']['name'] = 'composition_lock') .
		vide($Pile['vars']['erreurs'] = table_valeur((@$Pile[0]['erreurs']),(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
		vide($Pile['vars']['obli'] = '') .
		'<li class="editer_' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['obli'] : "")))!=='' ?
				(' ' . $t3) :
				'') .
		(((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : ""))  ?
				(' ' . ' ' . 'erreur') :
				'') .
		'">
				' .
		(($t3 = strval((is_array($a = ($Pile["vars"])) ? $a['erreurs'] : "")))!=='' ?
				('<span class=\'erreur_message\'>' . $t3 . '</span>') :
				'') .
		'
				<label>' .
		_T('compositions:label_composition_explication',array()) .
		'<label>
				<div class="choix">
				<input type="checkbox" class="checkbox" name="' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		'" value="1" id="' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		'"' .
		(($t3 = strval(interdire_scripts(((entites_html((@$Pile[0][(is_array($a = ($Pile["vars"])) ? $a['name'] : "")]),true)) ?' ' :''))))!=='' ?
				(' ' . $t3 . 'checked="checked"') :
				'') .
		' />
	    	<label for="' .
		(is_array($a = ($Pile["vars"])) ? $a['name'] : "") .
		'">' .
		_T(concat((is_array($a = ($Pile["vars"])) ? $a['fl'] : ""),':label_',(is_array($a = ($Pile["vars"])) ? $a['name'] : ""))) .
		'</label>
				</div>
	    </li>')) :
			'') .
	'
	  </ul>
	  ' .
	'
	  <!--extra-->
	  <p class=\'boutons\'><span class=\'image_loading\'></span><input type=\'submit\' class=\'submit\' value=\'' .
	_T('public/spip/ecrire:bouton_enregistrer',array()) .
	'\' /></p>
	</div></form>
</div></div>')) :
		'');

	return analyse_resultat_skel('html_7f99200a7783f53237ea9ad402080697', $Cache, $page, '../plugins/auto/compositions/formulaires/editer_composition_objet.html');
}

?>
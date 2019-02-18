<?php
/*
 * Squelette : ../plugins/auto/compositions/fonds/cfg_compositions.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 19:29:30 GMT (2.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/compositions/fonds/cfg_compositions.html.
//
function html_e8f72e3e6f7483e3283eda856eeeefcb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=' .
_T('compositions:compositions',array()) .
'-->

' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>' .
'<div class=\'formulaire_spip formulaire_configurer formulaire_configurer_forums_contenu\' id=\'formulaire_configurer_forums_contenu\'>
<h3 class=\'titrem\'>' .
_T('compositions:compositions',array()) .
'</h3>

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

	<form method="post" action="' .
self() .
'"><div>
		' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['_cfg_']),true))) .
'
		<ul>
			<li class=\'configurer_chemin_compositions\'>
				<label for="chemin_compositions">' .
_T('compositions:label_chemin_compositions',array()) .
'</label>
				<div class=\'explication\'>' .
_T('compositions:label_chemin_compositions_details',array()) .
'</div>
				<input type="text" name="chemin_compositions" value="' .
entites_html(compositions_chemin('')) .
'" id="chemin_compositions" class="text"/>
			</li>
			<li class=\'configurer_utiliser_article_accueil\'>
				<label>' .
_T('compositions:label_composition_rubrique',array()) .
'</label>
				<div class="choix">
					<input type="checkbox" name="utiliser_article_accueil" ' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['utiliser_article_accueil']),true) == 'non') ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="utiliser_article_accueil" value=\'non\'/>
					<label for="utiliser_article_accueil">' .
_T('compositions:label_utiliser_article_accueil',array()) .
'</label>
				</div>
			</li>
			<li class=\'configurer_styliser_auto\'>
				<label>' .
_T('compositions:label_styliser',array()) .
'</label>
				<div class="choix">
					<input type="checkbox" name="styliser_auto" ' .
(($t1 = strval(interdire_scripts(((entites_html((@$Pile[0]['styliser_auto']),true) == 'non') ? 'checked':''))))!=='' ?
		('checked="' . $t1 . '"') :
		'') .
' id="styliser_auto" value=\'non\'/>
					<label for="utiliser_article_accueil">' .
_T('compositions:label_styliser_auto',array()) .
'</label>
				</div>
			</li>
		</ul>
		<p class=\'boutons\'><input class=\'submit\' type="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:bouton_enregistrer',array()) .
'"/></p>
	</div></form>

</div>');

	return analyse_resultat_skel('html_e8f72e3e6f7483e3283eda856eeeefcb', $Cache, $page, '../plugins/auto/compositions/fonds/cfg_compositions.html');
}

?>
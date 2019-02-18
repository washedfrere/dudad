<?php
/*
 * Squelette : ../plugins/auto/compositions/prive/style_prive_plugin_compositions.html
 * Date :      Sat, 09 May 2009 18:48:10 GMT
 * Compile :   Thu, 14 May 2009 17:55:09 GMT (4.9ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/compositions/prive/style_prive_plugin_compositions.html.
//
function html_0c93c7963c72ccd5826273e1ff993891($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'
' .
'<?php header("X-Spip-Cache: 360000"); ?>'.'<?php header("Cache-Control: max-age=360000"); ?>'.'<?php header("X-Spip-Statique: oui"); ?>' .
'<'.'?php header("' . 'Content-Type: text/css; charset=iso-8859-15' . '"); ?'.'>' .
'<'.'?php header("' . 'Vary: Accept-Encoding' . '"); ?'.'>' .
vide($Pile['vars']['claire'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'edf3fe'),true)))) .
vide($Pile['vars']['foncee'] = (	'#' .
	interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_foncee'],'3874b0'),true)))) .
vide($Pile['vars']['left'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','left','right'))) .
vide($Pile['vars']['right'] = interdire_scripts(choixsiegal(entites_html((@$Pile[0]['ltr']),true),'left','right','left'))) .
'#composition {border:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';font-size:11px;background:#fff;}
#composition h3 {background:' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';padding:1px 3px;}
#composition .formulaire_editer_composition_objet {border:0;}

#composition .accueil {padding:5px;}

.formulaire_editer_composition_objet .editer_id_article_accueil .explication {display:block;text-align:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';}

.formulaire_editer_composition_objet .editer_composition .choix label {font-weight:bold;}
.formulaire_editer_composition_objet .editer_composition .choix {padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':20px;}
.formulaire_editer_composition_objet .editer_composition .choix input {margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':-20px;display:inline;position:relative;float:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';}

.formulaire_editer_composition_objet .editer_composition .choix img.logo {float:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';}
.formulaire_editer_composition_objet .editer_composition .choix {clear:' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';}

.formulaire_editer_composition_objet .informer_composition em {font-size:0.9em;display:block;margin-top:1em;}');

	return analyse_resultat_skel('html_0c93c7963c72ccd5826273e1ff993891', $Cache, $page, '../plugins/auto/compositions/prive/style_prive_plugin_compositions.html');
}

?>
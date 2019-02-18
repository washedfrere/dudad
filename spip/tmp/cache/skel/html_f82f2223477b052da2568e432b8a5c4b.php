<?php
/*
 * Squelette : ../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux.html
 * Date :      Thu, 29 Jan 2009 17:50:18 GMT
 * Compile :   Thu, 14 May 2009 17:55:04 GMT (4.4ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux.html.
//
function html_f82f2223477b052da2568e432b8a5c4b($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


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
'.item_picked {list-style:none;margin:0;padding:0;float:left;}
.item_picked li {margin:0 2px 2px;padding:2px;background:#eee;border:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';float:left;clear:none;}
.item_picked li span.sep {display:none;}

.item_picked li.article {padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':15px;background:url(' .
interdire_scripts(find_in_path('img_pack/article-12.png')) .
') no-repeat ' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['left'] : "")))!=='' ?
		($t1 . ' ') :
		'') .
'center;}
.item_picked li.rubrique {padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':15px;background:url(' .
interdire_scripts(find_in_path('prive/images/rubrique-12.gif')) .
') no-repeat ' .
(($t1 = strval((is_array($a = ($Pile["vars"])) ? $a['left'] : "")))!=='' ?
		($t1 . ' ') :
		'') .
'center;}

.item_picked.select li {padding:2px 0;border:0;font-weight:bold;background:none;float:none;}
.item_picked.select ul > li {float:left;}
.item_picked.changing {}

.picker_bouton {float:right;clear:both;}

.item_picker {clear:left;font-size:0.95em;}
.item_picker .chemin {border-bottom:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';margin:0.5em 0 0.25em;clear:both;}

.item_picker .frame {background:#fff;border:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';width:159px;height:400px;float:left;overflow:auto;position:relative;}
.item_picker .frame.total_3 {margin-left:-58px;border-left:3px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}
.item_picker .frame.frame_0 {margin-left:0;z-index:1000;}
.item_picker .frame.frame_1 {z-index:1010;}
.item_picker .frame.frame_2 {z-index:1020;}
.item_picker .frame.frame_3 {z-index:1030;}
.item_picker .frame.frame_4 {z-index:1040;}

.item_picker .frame .frame_close {float:right;}
.item_picker .frame h2 {margin:0;padding:5px;background:' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';font-size:1.3em;}
.item_picker .frame .pagination {font-size:0.9em;}

.item_picker .frame ul {list-style:none;margin:0;padding:0;}
.item_picker .frame ul li {display:block;clear:both;list-style:none;margin:0;padding:0 2px;padding-left:15px;position:relative;}
.item_picker .frame ul li.rubrique {background:url(' .
interdire_scripts(find_in_path('prive/images/rubrique-12.gif')) .
') no-repeat left 2px;padding-right:16px;}
.item_picker .frame ul li.article {clear:both;background:url(' .
interdire_scripts(find_in_path('img_pack/article-12.png')) .
') no-repeat left 2px;}

.item_picker .frame ul li:hover,.item_picker .frame ul li.on {background-color:' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';}
.item_picker .frame a:hover,.item_picker .frame a:hover .ouvrir,.item_picker .frame a:hover .add {background-color:' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';}

.item_picker .frame ul li.rubrique .ouvrir {position:absolute;display:block;top:0px;right:0px;}
.item_picker .frame ul >li .add {float:left;clear:left;}
.item_picker .frame ul li a {display:block;}
.item_picker .frame a {text-decoration:none;}


/* formulaire_recherche_ecrire */

.formulaire_recherche { margin: 0; padding: 0; background: none; text-align:right;border:0; }
.formulaire_recherche * { display: inline; vertical-align: middle; }
.formulaire_recherche label {display:none;}
.formulaire_recherche input.text { width: 17em;color:#fff;border:1px solid #fff;background:' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';padding:3px;}
.formulaire_recherche input.image {}
.formulaire_recherche img {padding:0 0 3px;}');

	return analyse_resultat_skel('html_f82f2223477b052da2568e432b8a5c4b', $Cache, $page, '../plugins/auto/spip-bonux/prive/style_prive_plugin_bonux.html');
}

?>
<?php
/*
 * Squelette : ../prive/style_prive_formulaires.html
 * Date :      Wed, 10 Dec 2008 19:55:02 GMT
 * Compile :   Thu, 14 May 2009 17:54:05 GMT (0.018s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/style_prive_formulaires.html.
//
function html_d2f0831020d1e4755c7410fde6a7e3c8($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?>
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
'.entete-formulaire{
	background:white;
	border:1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	border-bottom:0;
	padding:0.5em;
	overflow:auto;
	zoom:1; /* correction IE6 */
}
.formulaire_spip .cadre{border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';}

/*
	Note sur ecran large et etroit, en [11846]
		large = 540px (ou 600px!)
		etroit = 505px
*/


/* elements du formulaire */
.formulaire_spip input.text,
.formulaire_spip input.password,
.formulaire_spip textarea,
.formulaire_spip select {
	/*display: block;*/
	font-size:1em;
	margin:0;
	width: 96%;
	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	padding: 3px;
}

.formulaire_spip li .erreur_message {
	display: block;
	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	border-bottom: 0px;
	color: red;
	background-color: #fed7d7;
	padding: 3px;
	width: 96%;
}

.formulaire_spip .reponse_formulaire_erreur,
.formulaire_spip .reponse_formulaire_ok {
	font-weight: bold;
	margin:10px;
}
.formulaire_spip .reponse_formulaire_erreur {
	color: #C30;
	border:2px solid #c30;
	padding:5px;
}
.formulaire_spip .reponse_formulaire_ok {
	color: #53AD20;
}


/* Explications */
.formulaire_spip .explication {
	margin: 0px;
	display: -moz-inline-box;
	display: inline-block;
	width: 96%;
	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	border-bottom: 0px;
	padding: 3px;
	font-size:10px;
	background-color: #dddddd;
}
.formulaire_spip .explication a {color:' .
(($t1 = strval(filtrer('couleur_foncer',(is_array($a = ($Pile["vars"])) ? $a['foncee'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';}
/* Remarques importantes */
.formulaire_spip em.attention { display: block; margin: 0.5em; font-weight: normal; }


.formulaire_spip textarea {
	width: 93.6%;
	padding: 10px;
	overflow: auto;
}
.formulaire_spip input.submit, 
.formulaire_spip input.reset, 
.formulaire_spip input.button {
	width: auto;
}

/* sauf dans les petits cf. http://trac.rezo.net/trac/spip/ticket/1484 */
.document .formulaire_spip select {
	display: inline;
	font-size:0.8em;
	margin:0;
	width: auto;
	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	padding: 2px;
}

/* icone d\'aide */
.formulaire_spip li em.aide {
	padding-top: 0px;
}



/* Style des formulaires d\'edition
----------------------------------------------- */
.formulaire_spip {
	font-size:11px;
	line-height: 1.4em;
	padding:0;
	clear:both;

	border: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	color: #333;
	background-color: #f0f0f0;
}

.formulaire_spip form {
	margin: 0px;
}

/* ul li */
.formulaire_spip ul {
	margin: 0;
	padding: 0;
	padding-bottom: 10px;
	list-style: none;
}
.formulaire_spip ul li ul {
	padding-bottom: 0px;
}
.formulaire_spip li {
	margin: 0;
	padding: 10px;
	clear:both;
	overflow:hidden;
}
.formulaire_spip li:first-child {
	padding-top: 10px;
}

.formulaire_spip>form li {
	padding-top: 0px;	
}

/* annuler les f@@@@ div de sa majeste */
div.edition, div.label {display:inline;}

/* Formulaires alignes a gauche 
c\'est le par defaut des formulaires de Spip */
.formulaire_spip li,
.formulaire_spip li.gauche {padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':140px;}

.formulaire_spip li label,
.formulaire_spip li.gauche label {
	width: 114px;
	float:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':-130px; 
	text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	/*vertical-align: top;*/
	/* for IE 6*/
	position:relative;
	display:inline;

	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-gauche-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(entites_html(sinon(@$Pile[0]['couleur_claire'],'3874b0'),true)),(	'center ' .
	(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
	' no-repeat '))) .
'

	color: #' .
filtrer('couleur_foncer',(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "")) .
';
	line-height: 11px;
	font-family: verdana, arial, helvetica, sans;

	padding-top: 4px;
	padding-bottom: 6px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 5px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 10px;
}
.formulaire_spip ul>li label,
.formulaire_spip ul>li.gauche label {
	display:block;
	position:static;
}

.formulaire_spip li.obligatoire label,
.formulaire_spip li.obligatoire.gauche label {
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-gauche-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(filtrer('couleur_foncer',entites_html((@$Pile[0]['couleur_foncee']),true))),(	'center ' .
	(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
	' no-repeat '))) .
'
	color: white;
	font-weight: bold;
}


/* Formulaires avec label en haut */
/* les cas particuliers des edition pleines largeur */
.formulaire_spip li.editer_parent,
.formulaire_spip li.editer_groupe_mot,
.formulaire_spip li.editer_descriptif,
.formulaire_spip li.editer_chapo,
.formulaire_spip li.editer_texte,
.formulaire_spip li.editer_ps,
.formulaire_spip li.haut {
padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':10px;
padding-top:10px;
}

.formulaire_spip li.editer_parent label,
.formulaire_spip li.editer_groupe_mot label,
.formulaire_spip li.editer_descriptif label,
.formulaire_spip li.editer_chapo label,
.formulaire_spip li.editer_texte label,
.formulaire_spip li.editer_ps label,
.formulaire_spip li.haut label {
	display: block;
	float: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	width:auto;
	margin: 0px;
	padding-top: 5px;
	padding-bottom: 10px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 5px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 5px;
	font-family: verdana, arial, helvetica, sans;
	color: #' .
filtrer('couleur_foncer',(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "")) .
';
	font-weight: bold;
	font-size: 95%;
	line-height: 11px;
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-haut-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(entites_html((@$Pile[0]['couleur_claire']),true)),(	'bottom ' .
	(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
	' no-repeat '))) .
'
}

.formulaire_spip li.editer_parent textarea,
.formulaire_spip li.editer_parent select,
.formulaire_spip li.editer_groupe_mot select,
.formulaire_spip li.editer_descriptif textarea,
.formulaire_spip li.editer_chapo textarea,
.formulaire_spip li.editer_texte textarea,
.formulaire_spip li.editer_texte .spip_barre,
.formulaire_spip li.editer_ps textarea,
.formulaire_spip li.haut textarea,
.formulaire_spip li.haut select,
.formulaire_spip li.haut input,
.formulaire_spip li.editer_descriptif .erreur_message,
.formulaire_spip li.editer_chapo .erreur_message,
.formulaire_spip li.editer_texte .erreur_message,
.formulaire_spip li.editer_ps .erreur_message,
.formulaire_spip li.haut .erreur_message {
	clear:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
}
 


/* Formulaires obligatoires */
.formulaire_spip li.obligatoire input {
	font-weight: bold;
}


/*
.formulaire_spip li.editer_descriptif.obligatoire label,
.formulaire_spip li.editer_chapo.obligatoire label,
.formulaire_spip li.editer_texte.obligatoire label,
.formulaire_spip li.editer_ps.obligatoire label,
.formulaire_spip li.obligatoire.haut label {
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-haut-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(entites_html((@$Pile[0]['couleur_foncee']),true)),(	'bottom ' .
	(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
	' no-repeat '))) .
'
	color: white;
}*/

/* Fieldset */

.formulaire_spip li.fieldset {padding:0;}
.formulaire_spip fieldset {
	margin: 0px;
	padding: 10px 0px;
	border: 0;
	border-top: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	width:auto;
}

.formulaire_spip h3.legend,
.formulaire_spip legend
 {
	display: block;
	float: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	margin: 0px;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
	padding-top: 5px;
	padding-bottom: 10px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 5px;
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
': 5px;
	font-family: verdana, arial, helvetica, sans;
	color: white;
	font-weight: bold;
	font-size: 95%;
	line-height: 11px;
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-haut-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(entites_html((@$Pile[0]['couleur_foncee']),true)),(	'bottom ' .
	(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
	' no-repeat '))) .
'
}

.formulaire_spip li.fieldset.editer_liens_sites {
	border-bottom: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
}



/* Extra */

.formulaire_spip extra {
	margin: 0px;
	padding: 0px;
	border: 0px;
}



/* boutons */
.formulaire_spip .boutons {
	background-color: ' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';
	border-top: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	margin:0; 
	clear:both;
	text-align: ' .
(is_array($a = ($Pile["vars"])) ? $a['right'] : "") .
';
	padding: 7px 1em;
}




/*
.cadre-formulaire{background:white;padding:0;}
.entete-formulaire{padding:0.5em;}
*/



.formulaire_spip li.editer_identification fieldset{
	background-color: ' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';
}

.formulaire_spip li.editer_identification em.attention {
	clear: ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';
	margin-left: 10px;
	margin-right: 10px;
	border: 1px solid red;
	color: red;
	background-color: white;
	font-style: normal;
	padding: 5px;
}


.formulaire_spip li.editer_parent, 
.formulaire_spip li.editer_groupe_mot,
.formulaire_editer_auteur li.editer_statut {
	margin-top: 10px;
	margin-bottom: 10px;
	background-color: ' .
(($t1 = strval(filtrer('couleur_eclaircir',(is_array($a = ($Pile["vars"])) ? $a['claire'] : ""))))!=='' ?
		('#' . $t1) :
		'') .
';
}
.formulaire_spip li.editer_parent .rubrique_actuelle {clear:' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
';}

.formulaire_editer_auteur li.editer_statut {	padding-top:10px;}
.formulaire_editer_auteur li.editer_statut .instituer_auteur {margin-left:-130px;}

.formulaire_spip li.editer_groupe_mots_associer,
.formulaire_spip li.editer_groupe_mots_reglage_avance,
.formulaire_spip li.editer_groupe_mots_editeur {
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
}


/* Inscription du flux RSS */
.formulaire_spip li.editer_referencement_automatise {
	border-top: 0px;
	background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	margin-bottom: 10px;
}
.formulaire_spip li.editer_referencement_automatise fieldset {
	padding: 0px;
	border-bottom: 1px solid ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
}
.formulaire_spip li.editer_referencement_automatise fieldset li {
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
}
.formulaire_spip li.editer_referencement_automatise p.explication {
	width: auto;
	border: 0px;
}

.formulaire_spip li.editer_syndication {
	padding-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;	
}


.formulaire_spip li.editer_parent label, 
.formulaire_spip li.editer_groupe_mot label {
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-haut-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif'),interdire_scripts(entites_html((@$Pile[0]['couleur_foncee']),true)),(	'bottom ' .
	(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
	' no-repeat '))) .
'
	color: white;
}


/* barre typo */

.formulaire_spip table.spip_barre {
	background-color: ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
';
	width: 97.4%;
	padding: 5px;
	padding-bottom: 0px;
	clear:both;
}
.formulaire_spip table.spip_barre tr {
	width: 98%;
}
.formulaire_spip table.spip_barre a img { 
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'fond-fondo.gif'),interdire_scripts(filtrer('couleur_eclaircir',entites_html((@$Pile[0]['couleur_claire']),true))),'center center ')) .
'
	padding: 3px; border: 1px outset ' .
(is_array($a = ($Pile["vars"])) ? $a['claire'] : "") .
'; 
}
.formulaire_spip table.spip_barre a:hover img { background: #fff; border: 1px solid #cc9; }
.formulaire_spip table.spip_barre input.barre { width: 99%; background: transparent; border: 0; color: #f57900; }


.formulaire_spip li.editer_parent .choix label,
.formulaire_spip .choix label{
	float:none; 
	display:inline;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 5px; 
	font-weight:normal; 
	text-transform: none;
	font-size: 1em;
	background: none;
	padding: 0px;
	color: #666666;
}
.formulaire_spip .choix input.radio,
.formulaire_spip .choix input.checkbox {width:auto;}




/* Formulaire compact */
.formulaire_spip_compact{
	font-size: 100%;
}
.formulaire_spip_compact ul li {
	padding: 2px 5px !important;
}

.formulaire_spip_compact li label,
.formulaire_spip_compact li.editer_descriptif label
 {
	text-transform: none;
	color: #444444;
	
	-moz-display: inline-box;
	display: inline-block;
	font-weight: normal;
	
	padding: 0;
	padding-top: 3px;
	padding-bottom: 7px;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
':0;

	background: url(' .
interdire_scripts(concat(eval('return '.'_DIR_IMG_PACK'.';'),'label-fond-compact-',interdire_scripts(entites_html((@$Pile[0]['ltr']),true)),'.gif')) .
') bottom ' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
' no-repeat;
}

.formulaire_spip_compact select { width:auto;}
.formulaire_spip_compact input, 
.formulaire_spip_compact textarea {
	padding: 3px;
}

/* Bouton de validation */
input[type="submit"] {
	' .
interdire_scripts(image_bg(concat(eval('return '.'_DIR_IMG_PACK'.';'),'fond-fondo.gif'),interdire_scripts(filtrer('couleur_foncer',entites_html((@$Pile[0]['couleur_foncee']),true))),'center center ')) .
'
	border: 1px outset ' .
(is_array($a = ($Pile["vars"])) ? $a['foncee'] : "") .
';
	padding: 3px;
	font-weight: bold;
	color: white;
}

.formulaire_spip ul.spip {
	margin:10px 0;
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
	list-style-type: disc;
	list-style-position: outside;
}
.formulaire_spip ul.spip li {
	margin-' .
(is_array($a = ($Pile["vars"])) ? $a['left'] : "") .
': 10px;
	padding: 0;
	overflow:visible;
}
');

	return analyse_resultat_skel('html_d2f0831020d1e4755c7410fde6a7e3c8', $Cache, $page, '../prive/style_prive_formulaires.html');
}

?>
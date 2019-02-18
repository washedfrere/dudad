<?php
/*
 * Squelette : plugins/auto/ahuntsic/auteur.html
 * Date :      Thu, 22 Jan 2009 04:43:38 GMT
 * Compile :   Thu, 14 May 2009 18:15:15 GMT (0.023s)
 * Boucles :   _articles, _auteurs, _auteur_principal
 */ 
//
// <BOUCLE articles>
//
function BOUCLE_articleshtml_4f9a710a8d6a65d75f81cf509278ab6f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'articles';
	static $id = '_articles';
	static $from = array('articles' => 'spip_articles','L1' => 'spip_auteurs_articles');
	static $type = array();
	static $groupby = array();
	static $select = array("articles.titre",
		"articles.id_article",
		"articles.lang",
		"articles.texte",
		"articles.chapo",
		"articles.descriptif",
		"articles.date");
	static $orderby = array('articles.titre');
	$where = 
			array(
			array('=', 'articles.statut', '\'publie\''), 
			array('=', 'L1.id_auteur', sql_quote($Pile[$SP]['id_auteur'])));
	static $join = array('L1' => array('articles','id_article'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	lang_select($GLOBALS['spip_lang']);
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {
		if (!$GLOBALS['forcer_lang'])
	 		if ($x = $Pile[$SP]['lang']) $GLOBALS["spip_lang"] = $x;
		$t1 = (
'
			<h3><a href="' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'/spip.php?action=converser&amp;redirect=' .
htmlspecialchars(sinon($GLOBALS['meta']['adresse_site'],'.')) .
'%2F' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_article'], 'article', '', '', true))) .
'&amp;var_lang=' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" hreflang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" ' .
(($t1 = strval(interdire_scripts(entites_html(textebrut(filtre_introduction_dist($Pile[$SP]['descriptif'], (strlen($Pile[$SP]['descriptif']) OR chapo_redirigetil($Pile[$SP]['chapo']))
		? ''
		: $Pile[$SP]['chapo'] . "\n\n" . $Pile[$SP]['texte'], 500, $connect))))))!=='' ?
		('title="' . $t1 . '"') :
		'') .
'>' .
interdire_scripts(supprimer_numero(supprimer_numero(typo($Pile[$SP]['titre'])))) .
'</a></h3>
			<div class="detail">
				' .
interdire_scripts(nom_jour(normaliser_date($Pile[$SP]['date']))) .
' ' .
interdire_scripts(affdate(normaliser_date($Pile[$SP]['date']))) .
'
			</div>
		');
		$t0 .= (($t1 && $t0) ? '<br />' : '') . $t1;
	}

	lang_select();
	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteurshtml_4f9a710a8d6a65d75f81cf509278ab6f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteurs';
	static $from = array('auteurs' => 'spip_auteurs','L1' => 'spip_auteurs_articles','L2' => 'spip_articles');
	static $type = array();
	static $groupby = array("auteurs.id_auteur");
	static $select = array("auteurs.nom",
		"auteurs.id_auteur");
	static $orderby = array('auteurs.nom');
	static $where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'L2.statut', '\'publie\''));
	static $join = array('L1' => array('auteurs','id_auteur'), 'L2' => array('L1','id_article'));
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
						<ul>
							<li>
								<a href="' .
vider_url(urlencode_1738(generer_url_entite($Pile[$SP]['id_auteur'], 'auteur', '', '', true))) .
'">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</a>	
							</li>
						</ul>
						');
	}

	@sql_free($result, '');
	return $t0;
}


//
// <BOUCLE auteurs>
//
function BOUCLE_auteur_principalhtml_4f9a710a8d6a65d75f81cf509278ab6f(&$Cache, &$Pile, &$doublons, &$Numrows, $SP) {

	static $connect = '';
	static $table = 'auteurs';
	static $id = '_auteur_principal';
	static $from = array('auteurs' => 'spip_auteurs');
	static $type = array();
	static $groupby = array();
	static $select = array("auteurs.id_auteur",
		"auteurs.lang",
		"auteurs.nom",
		"auteurs.bio",
		"auteurs.url_site",
		"auteurs.nom_site",
		"auteurs.email");
	static $orderby = array();
	$where = 
			array(
			array('!=', 'auteurs.statut', '\'5poubelle\''), 
			array('=', 'auteurs.id_auteur', sql_quote($Pile[0]['id_auteur'])));
	static $join = array();
	static $limit = '';
	static $having = 
			array();
	// REQUETE
	$result = calculer_select($select, $from, $type, $where, $join, $groupby, $orderby, $limit, $having, $table, $id, $connect);
	$t0 = "";
	$SP++;

	// RESULTATS
	while ($Pile[$SP] = @sql_fetch($result, '')) {

		$t0 .= (
'
<?php header("X-Spip-Cache: 7200"); ?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
'] : ' .
interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'</title>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-meta') . ',
	\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	<link rel="alternate" type="application/rss+xml" title="' .
interdire_scripts(textebrut(typo($Pile[$SP]['nom'], "TYPO", $connect))) .
'" href="' .
interdire_scripts(parametre_url(generer_url_public('backend'),'id_auteur',$Pile[$SP]['id_auteur'])) .
'" />
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('styles') . ',
	\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</head>
<body dir="' .
lang_dir($Pile[$SP]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities($Pile[$SP]['lang'] ? $Pile[$SP]['lang'] : $GLOBALS['spip_lang']) .
' auteur aut' .
$Pile[$SP]['id_auteur'] .
'">
<div id="page" class="auteur">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->
	
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bandeau') . ',
	\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
	<div id="bloc-contenu">
		<div class="cartouche">
		' .
(($t1 = strval(filtrer('image_graver',filtrer('image_reduire',affiche_logos(calcule_logo('id_auteur', 'ON', $Pile[$SP]['id_auteur'],'',  ''), '', ''),'120','0'))))!=='' ?
		('<span style="float:right;">' . $t1 . '</span>') :
		'') .
'
			<h1 class="">' .
interdire_scripts(typo($Pile[$SP]['nom'], "TYPO", $connect)) .
'</h1>
			<div class="texte">
				' .
(($t1 = strval(interdire_scripts(propre($Pile[$SP]['bio'], $connect))))!=='' ?
		((	'<div  class="bio">') . $t1 . '</div>') :
		'') .
'
				' .
(($t1 = strval(calculer_url($Pile[$SP]['url_site'],'','url', $connect)))!=='' ?
		((	'<b>' .
	interdire_scripts(typo(supprimer_numero(calculer_url($Pile[$SP]['url_site'],$Pile[$SP]['nom_site'], 'titre', $connect)), "TYPO", $connect)) .
	' : <a href="') . $t1 . (	'">' .
	calculer_url($Pile[$SP]['url_site'],'','url', $connect) .
	'</a></b><br />')) :
		'') .
'
				' .
(($t1 = strval(interdire_scripts(calculer_notes())))!=='' ?
		($t1 . '<br />') :
		'') .
'
				<br />
				' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_ECRIRE_AUTEUR',
	array($Pile[$SP]['id_auteur'],@$Pile[0]['id_article'],$Pile[$SP]['email']),
	array(''), $GLOBALS['spip_lang'],27)))!=='' ?
		((	'<h2 id="message">' .
	_T('public/spip/ecrire:info_envoyer_message_prive',array()) .
	'</h2>') . $t1) :
		'') .
'
			</div><!-- texte -->
		</div><!-- cartouche -->
		<!-- Articles de l\'auteur -->
		<h2>' .
_T('public/spip/ecrire:articles_auteur',array()) .
'</h2>
		' .
(($t1 = BOUCLE_articleshtml_4f9a710a8d6a65d75f81cf509278ab6f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		('
		')) .
'
	</div><!-- bloc-contenu -->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
	<div id="encart">
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-annonces') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

		' .
(($t1 = BOUCLE_auteurshtml_4f9a710a8d6a65d75f81cf509278ab6f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		((	'
		<!-- Tous les auteurs -->
			<div class="menu">
				<ul class="titre">
					<li><b>' .
		_T('public/spip/ecrire:icone_tous_auteur',array()) .
		'</b>
						') . $t1 . '
					</li>
				</ul>
			</div><!-- menu -->
		') :
		'') .
'
	</div><!-- encart -->
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-menu') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bas') . ',
	\'id_auteur\' => ' . argumenter_squelette($Pile[$SP]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
</div><!-- page -->

</body>
</html>
');
	}

	@sql_free($result, '');
	return $t0;
}



//
// Fonction principale du squelette plugins/auto/ahuntsic/auteur.html.
//
function html_4f9a710a8d6a65d75f81cf509278ab6f($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
(($t1 = BOUCLE_auteur_principalhtml_4f9a710a8d6a65d75f81cf509278ab6f($Cache, $Pile, $doublons, $Numrows, $SP))!=='' ?
		$t1 :
		((	'
' .
	
'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('404') . ',
	\'id_auteur\' => ' . argumenter_squelette(@$Pile[0]['id_auteur']) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
'))) .
'
 ');

	return analyse_resultat_skel('html_4f9a710a8d6a65d75f81cf509278ab6f', $Cache, $page, 'plugins/auto/ahuntsic/auteur.html');
}

?>
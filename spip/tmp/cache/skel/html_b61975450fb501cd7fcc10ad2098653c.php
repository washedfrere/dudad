<?php
/*
 * Squelette : prive/formulaires/menu_lang.html
 * Date :      Tue, 29 Jul 2008 10:47:28 GMT
 * Compile :   Thu, 14 May 2009 18:16:32 GMT (1.0ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette prive/formulaires/menu_lang.html.
//
function html_b61975450fb501cd7fcc10ad2098653c($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class="formulaire_spip formulaire_menu_lang" id="formulaire_menu_lang">
<form method="post" action="' .
interdire_scripts(entites_html((@$Pile[0]['url']),true)) .
'">
	' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['url']),true))) .
'
	<label for="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'">' .
_T('public/spip/ecrire:info_langues',array()) .
'</label>
	<select name="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" id="' .
interdire_scripts(entites_html((@$Pile[0]['nom']),true)) .
'" onchange="this.parentNode.submit()">' .
interdire_scripts((@$Pile[0]['langues'])) .
'</select>
	<noscript><input type="submit" class="submit" value="&gt;&gt;" /></noscript>
</form>
</div>');

	return analyse_resultat_skel('html_b61975450fb501cd7fcc10ad2098653c', $Cache, $page, 'prive/formulaires/menu_lang.html');
}

?>
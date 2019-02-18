<?php
/*
 * Squelette : ../prive/stats/echelle.html
 * Date :      Thu, 26 Jun 2008 11:11:54 GMT
 * Compile :   Wed, 20 May 2009 01:30:37 GMT (0.021s)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../prive/stats/echelle.html.
//
function html_31ab704493d21eccd88ee7e892f66e6e($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<div class=\'verdana1 spip_x-small\'>
<table cellpadding=\'0\' cellspacing=\'0\' border=\'0\'>
<tr><td style=\'height: 15\' valign=\'top\'>
<span class=\'arial1 spip_x-small\'><b>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'8','8')) .
'</b></span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>
 ' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'7','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'6','8')) .
'</span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'> ' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'5','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'><b>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'4','8')) .
'</b></span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'3','8')) .
'</td></tr>
<tr><td style=\'height: 25px\' valign=\'middle\'>
<span class=\'arial1 spip_x-small\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'2','8')) .
'</span>
</td></tr>
<tr><td valign=\'middle\'  class=\'arial1 spip_x-small\' style=\'color: #a0a0a0;height: 25px\'>' .
interdire_scripts(regledetrois(entites_html((@$Pile[0]['echelle']),true),'1','8')) .
'</td></tr>
<tr><td style=\'height: 10px\' valign=\'bottom\'>
<span class=\'arial1 spip_x-small\'><b>0</b></span>
</td>
</tr>
</table></div>

');

	return analyse_resultat_skel('html_31ab704493d21eccd88ee7e892f66e6e', $Cache, $page, '../prive/stats/echelle.html');
}

?>
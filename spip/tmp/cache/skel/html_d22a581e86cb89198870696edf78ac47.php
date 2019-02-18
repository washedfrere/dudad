<?php
/*
 * Squelette : ../plugins/auto/barre_typo_v2/fonds/cfg_btv2.html
 * Date :      Tue, 07 Oct 2008 12:14:54 GMT
 * Compile :   Thu, 14 May 2009 19:29:30 GMT (3.9ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/barre_typo_v2/fonds/cfg_btv2.html.
//
function html_d22a581e86cb89198870696edf78ac47($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<!-- titre=Barre typographique-->
<!-- icone=img_pack/moinecopiste.png-->
' .
vide($Pile['vars']['logo'] = (	'<img src=\'' .
	_DIR_RACINE . 'plugins/auto/barre_typo_v2/fonds' .
	'/../img_pack/moinecopiste.gif\' width=\'59\' height=\'85\' alt=\'Logo Barre Typographique version 2\' style="float:' .
	lang_dir(@$Pile[0]['lang'], 'right','left') .
	';" />
')) .
'
<!-- descriptif=
' .
(is_array($a = ($Pile["vars"])) ? $a['logo'] : "") .
'<h4>Configuration de la Barre Typographique version 2</h4>
-->
' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><form method="post" action="' .
self() .
'"><div>' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['_cfg_']),true))) .
'</div>

<fieldset><legend>' .
_T('enlumtypo:cfg_avancee',array()) .
'</legend>
	<label for="btv2_avancee">Afficher les boutons avancés&nbsp;:</label>
	<select name="avancee" id="btv2_avancee" class="forml">
		<option value="Oui"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['avancee'],'Non'),true) == 'Oui') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Oui, envoyez la sauce !</option>
		<option value="Non"' .
(($t1 = strval(interdire_scripts(((entites_html(sinon(@$Pile[0]['avancee'],'Non'),true) == 'Non') ? 'selected':''))))!=='' ?
		(' selected="' . $t1 . '"') :
		'') .
'>Non, je prends pas ce risque !</option>
	</select>
</fieldset>

<div>
<input type="submit" name="_cfg_ok" value="' .
_T('public/spip/ecrire:ok',array()) .
'" class="fondo" />
<input type="reset" value="' .
_T('public/spip/ecrire:reset',array()) .
'" class="fondo" />
<input type="submit" name="_cfg_delete" value="' .
_T('public/spip/ecrire:supprimer',array()) .
'" class="fondo" />
</div>
</form>
');

	return analyse_resultat_skel('html_d22a581e86cb89198870696edf78ac47', $Cache, $page, '../plugins/auto/barre_typo_v2/fonds/cfg_btv2.html');
}

?>
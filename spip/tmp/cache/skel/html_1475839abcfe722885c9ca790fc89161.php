<?php
/*
 * Squelette : ../plugins/auto/swfupload/fonds/cfg_swfupload.html
 * Date :      Mon, 13 Oct 2008 08:45:56 GMT
 * Compile :   Thu, 14 May 2009 19:29:30 GMT (2.3ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette ../plugins/auto/swfupload/fonds/cfg_swfupload.html.
//
function html_1475839abcfe722885c9ca790fc89161($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'



' .
'<?php header("X-Spip-Cache: 0"); ?>'.'<?php header("Cache-Control: no-store, no-cache, must-revalidate"); ?><?php header("Pragma: no-cache"); ?><form method="post" action="' .
self() .
'"><div>' .
interdire_scripts(form_hidden(entites_html((@$Pile[0]['_cfg_']),true))) .
'</div>

<fieldset><legend>' .
_T('swfupload:texte_swfupload',array()) .
'</legend>
<p>
<label for="file_size_limit">' .
_T('swfupload:file_size_limit',array()) .
'</label>
<input type="text" name="file_size_limit" class="type_txt" id="file_size_limit" size="60"	value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['file_size_limit'],'2048'),true)) .
'" />
</p>
<p>
<label for="file_types">' .
_T('swfupload:file_types',array()) .
'</label>
<input type="text" name="file_types" class="type_txt" id="file_types" size="60"	value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['file_types'],'*.jpg;*.gif;*.png'),true)) .
'" />
</p>
<p>
<label for="file_upload_limit">' .
_T('swfupload:file_upload_limit',array()) .
'</label>
<input type="text" name="file_upload_limit" class="type_txt" id="file_upload_limit" size="60"	value="' .
interdire_scripts(entites_html(sinon(@$Pile[0]['file_upload_limit'],'0'),true)) .
'" />
</p>

<p>
<label for="debug">' .
_T('swfupload:debug',array()) .
'</label>
     <select name="debug" id="debug">
      <option value="false"' .
interdire_scripts(((entites_html((@$Pile[0]['debug']),true) == 'false') ? ' selected="selected"':'')) .
'>false</option>
      <option value="true"' .
interdire_scripts(((entites_html((@$Pile[0]['debug']),true) == 'true') ? ' selected="selected"':'')) .
'>true</option>
      </select>
</p>


<p>* si <strong>_</strong> ou vide, supprime la fonctionnalit&eacute; (vide reviendra au d&eacute;faut)</p>
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

	return analyse_resultat_skel('html_1475839abcfe722885c9ca790fc89161', $Cache, $page, '../plugins/auto/swfupload/fonds/cfg_swfupload.html');
}

?>
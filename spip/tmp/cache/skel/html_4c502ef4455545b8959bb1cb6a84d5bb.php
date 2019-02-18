<?php
/*
 * Squelette : plugins/auto/ahuntsic/sommaire.html
 * Date :      Sat, 21 Feb 2009 23:03:56 GMT
 * Compile :   Thu, 14 May 2009 18:14:33 GMT (6.7ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/auto/ahuntsic/sommaire.html.
//
function html_4c502ef4455545b8959bb1cb6a84d5bb($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = (
'<?php header("X-Spip-Cache: 7200"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" lang="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
'" dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'">
<head>
	<title>[' .
interdire_scripts(textebrut(typo($GLOBALS['meta']['nom_site'], "TYPO", $connect))) .
']</title>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-meta') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>
	' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('styles') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

	' .
(($t1 = strval(interdire_scripts(generer_url_public('ispip'))))!=='' ?
		('<script type="text/javascript">
function iPhoneAlert() {
if((navigator.userAgent.match(/iPhone/i))||(navigator.userAgent.
match(/iPod/i))){
var question = confirm("Souhaitez-vous naviguer sur le site optimisé pour iPhone?")
if (question){
window.location = "' . $t1 . '";
}else{

}
}
}
</script><!-- fin script -->') :
		'') .
'

</head>
<body dir="' .
lang_dir(@$Pile[0]['lang'], 'ltr','rtl') .
'" class="' .
htmlentities(@$Pile[0]['lang'] ? @$Pile[0]['lang'] : $GLOBALS['spip_lang']) .
' sommaire"' .
(($t1 = strval(interdire_scripts(((filtre_info_plugin_dist("ispip", "est_actif") == '1') ? 'onload="iPhoneAlert();"':''))))!=='' ?
		(' ' . $t1) :
		'') .
'>
<div id="page" class="sommaire">

<!-- *****************************************************************
	Bandeau, titre du site et menu langue
	Header and main menu (top and right) 
    ************************************************************* -->

  ' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-bandeau') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

<!-- *****************************************************************
	Contenu principal (centre)
	Main content (center) 
    ************************************************************* -->
  <div id="bloc-contenu">
    <div class="edito">
		' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-sommaire-edito') . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
    </div><!-- edito -->
    
    <h2 class="structure">' .
_T('public/spip/ecrire:articles_recents',array()) .
'</h2>
    ' .

'<?php
	$contexte_inclus = array_merge('.var_export($Pile[0],1).',array(\'fond\' => ' . argumenter_squelette('inc/inc-sommaire-articles') . ',
	\'self\' => ' . argumenter_squelette(self()) . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . '));
	include _DIR_RESTREINT . "public.php";
?'.'>
    
     
  </div><!-- bloc-contenu-->

<!-- *****************************************************************
	Menus contextuels (droite)
	Contextual menus (right) 
    ************************************************************* -->
  <div id="encart">  

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-trad') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-annonces') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-breves') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

' .

'<?php
	$contexte_inclus = array(\'fond\' => ' . argumenter_squelette('inc/inc-syndic') . ',
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

    <!-- Inscription au site -->
    ' .
(($t1 = strval(executer_balise_dynamique('FORMULAIRE_INSCRIPTION',
	array(),
	array(''), $GLOBALS['spip_lang'],51)))!=='' ?
		((	'<div class="menu" id="inscription">
        <ul>
          <li><b>' .
	_T('public/spip/ecrire:pass_vousinscrire',array()) .
	'</b>            
            <ul>
              <li>
                ') . $t1 . '
              </li>
            </ul>
          </li>
        </ul>
    </div><!-- menu -->') :
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
	\'lang\' => ' . argumenter_squelette($GLOBALS["spip_lang"]) . ');
	include _DIR_RESTREINT . "public.php";
?'.'>

</div><!-- page-->
</body>
</html>');

	return analyse_resultat_skel('html_4c502ef4455545b8959bb1cb6a84d5bb', $Cache, $page, 'plugins/auto/ahuntsic/sommaire.html');
}

?>
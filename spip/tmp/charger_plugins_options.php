<?php
if (defined('_ECRIRE_INC_VERSION')) {
define('_DIR_PLUGIN_BARRETYPOENRICHIE',_DIR_PLUGINS.'auto/barre_typo_v2/');
_chemin(_DIR_PLUGIN_BARRETYPOENRICHIE);
define('_DIR_PLUGIN_CFG',_DIR_PLUGINS.'auto/cfg/');
_chemin(_DIR_PLUGIN_CFG);
define('_DIR_PLUGIN_IMAGE_RAGGED',_DIR_PLUGINS.'auto/image_ragged/');
_chemin(_DIR_PLUGIN_IMAGE_RAGGED);
define('_DIR_PLUGIN_SNIPPETS',_DIR_PLUGINS.'auto/snippets/');
_chemin(_DIR_PLUGIN_SNIPPETS);
define('_DIR_PLUGIN_SPIP_BONUX',_DIR_PLUGINS.'auto/spip-bonux/');
_chemin(_DIR_PLUGIN_SPIP_BONUX);
define('_DIR_PLUGIN_SWFUPLOAD',_DIR_PLUGINS.'auto/swfupload/');
_chemin(_DIR_PLUGIN_SWFUPLOAD);
define('_DIR_PLUGIN_ODT2SPIP',_DIR_PLUGINS.'odt2spip_v0.1/');
_chemin(_DIR_PLUGIN_ODT2SPIP);
define('_DIR_PLUGIN_COMPOSITIONS',_DIR_PLUGINS.'auto/compositions/');
_chemin(_DIR_PLUGIN_COMPOSITIONS);
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once _DIR_PLUGINS.'auto/barre_typo_v2/typo_options.php';
include_once _DIR_PLUGINS.'auto/cfg/cfg_options.php';
error_reporting(SPIP_ERREUR_REPORT);
function boutons_plugins(){return unserialize('a:0:{}');}
function onglets_plugins(){return unserialize('a:0:{}');}
}
?>
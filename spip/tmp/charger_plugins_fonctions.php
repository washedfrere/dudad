<?php
if (defined('_ECRIRE_INC_VERSION')) {
error_reporting(SPIP_ERREUR_REPORT_INCLUDE_PLUGINS);
include_once _DIR_PLUGINS.'auto/cfg/cfg_fonctions.php';
include_once _DIR_PLUGINS.'auto/image_ragged/image_ragged_filtre.php';
include_once _DIR_PLUGINS.'auto/spip-bonux/public/spip_bonux_criteres.php';
include_once _DIR_PLUGINS.'auto/spip-bonux/public/spip_bonux_balises.php';
include_once _DIR_PLUGINS.'auto/spip-bonux/spip_bonux_fonctions.php';
include_once _DIR_PLUGINS.'auto/compositions/compositions_fonctions.php';
error_reporting(SPIP_ERREUR_REPORT);
}
?>
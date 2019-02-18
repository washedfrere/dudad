<?php
/**
 * plugin FreepapeR
 * Visionneuse PDF
 *
 * Auteurs :
 * Franck Ruzzin
 * le 04/08/2008
 *
 **/

	if (!defined('_DIR_PLUGIN_FREEPAPER')){
		$p=explode(basename(_DIR_PLUGINS)."/",str_replace('\\','/',realpath(dirname(__FILE__))));
		define('_DIR_PLUGIN_FREEPAPER',(_DIR_PLUGINS.end($p))."/");
	}

	function freepaper_insert_head($flux){	
		$flux .= "<script src='" . _DIR_PLUGIN_FREEPAPER . "javascript/freepaper_spip-min.js' type='text/javascript'></script>\n";
		$flux .= "<link rel='stylesheet' href='" . _DIR_PLUGIN_FREEPAPER . "css/freepaper.css' type='text/css' media='all' />\n";
		return $flux;
	}
	
?>
<?php

/*
* PHP 4
*/

class Pdf2swf
{
	//Chemin de pdf2swf avec "/" terminal
	var $pdftoolsPath;
	
	/**
	* Constructeur
	*/
	function Pdf2swf()
	{
		$this->pdftoolsPath='..\\';
	}
		
	/**
	* Méthode pour convertir pour convertir un PDF en SWF
	* @param string $pdfFilePath chemin complet vers le fichier PDF
	* @param string $swfFilePath chemin complet vers le fichier SWF
	* @return boolean "true" si le fichier existe, "false" sinon ou s'il y a un problème de paramètre
	*/
	function convert($pdfFilePath,$swfFilePath)
	{	
		$output=array();
		if (!file_exists($pdfFilePath)) {
			array_push ($output, "Ne trouve pas $pdfFilePath");
			return $output[0];
		}
		if ($swfFilePath==null) {
			array_push ($output, "Nom du fichier de sortie non fixé");
			return $output[0];
		}
		//si le fichier PDF est plus ancien que le fichier SWF. Donc le SWF requis existe déjà.
		if (!$this->isPdfNewer($pdfFilePath,$swfFilePath)) {
			array_push ($output, "Fichier de sortie déjà à jour");
			return $output[0];
		}
		// Supprimer l'éventuel fichier
        //if (file_exists($swfFilePath)) unlink($swfFilePath);
		// Création d'un SWF à partir d'un PDF  
		$command = $this->pdftoolsPath . 'pdf2swf -t -o ' . $swfFilePath . ' ' . $pdfFilePath;
		$return_var=0;
		exec($command,$output,$return_var);
		array_push ($output, "EXEC RETURN VALUE : " . $return_var);
		$s=$this->arrayToString($output);
		
		//if (!file_exists($swfFilePath)) return $s;
		return $s;
	}
	
	
	/**
	* Methode pour déterminer si le fichier PDF est plus récent que le fichier SWF
	* @param string $pdfFilePath chemin complet du fixhier PDF
	* @param string $swfFilePath chemin complet du fixhier SWF
	* @return boolean "true" si le fihier SWF est inexistant ou si le PDF est plus récent que la SWF, "false" sinon.
	*/
	function isPdfNewer($pdfFilePath,$swfFilePath)
	{
		if (!file_exists($swfFilePath)) {
			return true;
		} else {
			if (filemtime($pdfFilePath)>filemtime($swfFilePath)) return true;
		}
		return false;
	}
	
	/**
	* Transforme un simple tableau en une chaîne d'éléments avec retour à la ligne
	* @param array $result_array le tableau à traiter
	* @return String la chaîne représentant le tableau "aplati"
	*/
	function arrayToString($result_array) {
		reset($result_array);
		$s="";
		while ($array_cell=each($result_array)) {
			$s .= "->" . $array_cell['value'] . chr(10) ;
		}
		return $s;
	}
	
}

?>
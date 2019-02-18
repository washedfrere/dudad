<?php require_once("pdf2swf.php"); ?>

<?php 
	$docURL=$_POST["docURL"];
	$callerURL=$_POST["callerURL"];

	$pos = strpos($docURL, "/");
	//s'il y a / en début de $docURL
	if (($pos !== false) && ($pos==0)) {
		$docURL="http://" . $_SERVER["HTTP_HOST"] . $docURL;
	} else {
		$pos = strpos($docURL, "http://");
		//$docURL ne débute pas par http://
		if ($pos === false) { //on considère http:// toujours au début !
			$docURL=removeFileName($callerURL) . $docURL;
		}
	}
	$fullDocURL='URL en entrée : ' . $docURL;
	
	//comparaison url et chemin script appelé
	$filepath=$_SERVER["SCRIPT_FILENAME"];
	$url="http://" . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"];

	$compare=0;
	while($compare==0) {
		$s1=getLastWord($filepath);
		$s2=getLastWord($url);
		$compare=strcmp($s1,$s2);
		if ($compare==0) {
			$filepath=substr($filepath,0,strlen($filepath)-strlen($s1));
			$url=substr($url,0,strlen($url)-strlen($s1));
		}
	}
	
	
	$docPath=str_replace($url, $filepath ,$docURL);

	$pdfconv=new Pdf2swf();
	$output=$pdfconv->convert($docPath,$docPath . ".swf");
	//a-t-on essayé de lancer pdf2swf (pas de fichier swf préexistant)
	$pos = strpos($output, "EXEC RETURN VALUE :");
	if ($pos != false) {
		$return_var=substr($output,$pos+20);
		//et si cet erreur est "programme non trouvé" (1), on calcule et renvoie dans la chaiîne le fichier de remplacement éventuel, dans le dossier swf
		if ($return_var==1) {
			$docPath=str_replace("/IMG/pdf", "/IMG/swf" ,$docPath);
			$output.="TRYING WITH -> $docPath.swf" ;
		}
	}
	echo $fullDocURL . chr(10) . $output;

	
	
	function getLastWord($myStr) {
		$compare=1;
		$i=0;
		while(($compare!=0)&&($i+strlen($myStr)>0)) {
			$i--;
			$s1=substr($myStr,$i,1);
			$compare=strcmp($s1,"/");
		}
		return substr($myStr,strlen($myStr)+$i);
	}
	function removeFileName($myStr) {
		$end=getLastWord($myStr);
		$root=substr($myStr,0,strlen($myStr)-strlen($end));
		if ($root{strlen($root)-1}!="/") $root=$root . "/";
		return $root;
	}
	
?>


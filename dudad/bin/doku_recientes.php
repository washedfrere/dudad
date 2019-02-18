<?php
//Mostramos los ficheros y directorios de la wiki por orden de cambio.
$dirwiki = '../pag/dokuwiki/data/pages';
if ($gestor = opendir($dirwiki))
{
    /* Introducimos todos los archivos en un array indexado por fecha de modificacion */
	/* E introducimos las fechas en un array para ordenarlas de mayor a menor luego*/
	$contador = 0;
	$maxcont=0;
    while (false !== ($archivo = readdir($gestor)))
	{
		$conpath=$dirwiki . "/" . $archivo;
		if ( is_file($conpath) == true )
		{
			$archivos[filemtime($conpath)]=str_replace(".txt", "", $archivo);
			$mtimes[$contador++]= filemtime($conpath);
		}
    }
	$maxcont=$contador;
    closedir($gestor); //Ya no necesitamos el directorio abierto
	if ( $maxcont > 0 )
	{
		/*Reordenamos el array de fechas de mayor a menor*/
		rsort($mtimes);
	
		/*Mostramos los 10 primeros archivos en orden de mtime*/
		$contador=0;
		while ($contador < 15 && $contador < $maxcont)
		{
			$cuerpo .= '<center><img src="../ico/esfg.png" border="0"> ' . $archivos[$mtimes[$contador]] . "</b><sub> modificado el " . date("Y/m/d-H:i:s",$mtimes[$contador]) . "</sub></center><br>";
			$contador += 1;
		}
	}
	else
		$cuerpo .= "Ningun archivo encontrado";
}
?>
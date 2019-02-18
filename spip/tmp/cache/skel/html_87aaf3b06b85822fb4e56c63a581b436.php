<?php
/*
 * Squelette : plugins/auto/ahuntsic/inc/inc-affvisit.html
 * Date :      Mon, 22 Dec 2008 17:46:42 GMT
 * Compile :   Thu, 14 May 2009 18:14:34 GMT (0.1ms)
 * Pas de boucle
 */ 

//
// Fonction principale du squelette plugins/auto/ahuntsic/inc/inc-affvisit.html.
//
function html_87aaf3b06b85822fb4e56c63a581b436($Cache, $Pile, $doublons=array(), $Numrows=array(), $SP=0) {


	if (isset($Pile[0]["doublons"]) AND is_array($Pile[0]["doublons"]))
		$doublons = nettoyer_env_doublons($Pile[0]["doublons"]);

	$connect = '';
	$page = '<?php
$query = "SELECT SUM(visites) AS total_absolu FROM spip_visites";
	$result = spip_query($query);

	if ($row = spip_fetch_array($result)) {
		$total_absolu = $row[\'total_absolu\'];
	}


$query = "SELECT visites FROM spip_visites WHERE date=NOW()";
		$result = spip_query($query);
	
	if ($row = @spip_fetch_array($result)) {
		$visites_today = $row[\'visites\'];
}

$total_gen = $total_absolu + $visites_today;

echo "<strong>".$total_gen."</strong>";

?>';

	return analyse_resultat_skel('html_87aaf3b06b85822fb4e56c63a581b436', $Cache, $page, 'plugins/auto/ahuntsic/inc/inc-affvisit.html');
}

?>
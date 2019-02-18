<?php

function balise_FREEPAPER($p){
	// Transforme l'ecriture du deuxieme param {truc=chose,machin=chouette} en
	// {truc=chose}{machin=chouette}... histoire de simplifier l'ecriture pour
	// le webmestre : #MODELE{emb}{autostart=true,truc=1,chose=chouette}
	if ($p->param[0]) {
		while (count($p->param[0])>2){
			$p->param[]=array(0=>NULL,1=>array_pop($p->param[0]));
		}
	}
	$champ = phraser_arguments_inclure($p, true); 
	$code_contexte = argumenter_inclure($champ, $p->descr, $p->boucles, $p->id_boucle, false);
	// Reserver la cle primaire de la boucle courante
	if ($primary = $p->boucles[$p->id_boucle]->primary) {
		$id = champ_sql($primary, $p);
		$code_contexte[] = "'$primary='.".$id;
	}
	
	$p->code = "( ((\$recurs=(isset(\$Pile[0]['recurs'])?\$Pile[0]['recurs']:0))<5)?
	recuperer_fond('modeles/freepaper',
		creer_contexte_de_modele(array(".join(',', $code_contexte).",'recurs='.(++\$recurs), \$GLOBALS['spip_lang']))):'')";
	
	$p->interdire_scripts = false;
	return $p;
}

?>

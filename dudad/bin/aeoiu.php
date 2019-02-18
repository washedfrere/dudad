<?php
function aeoiu ($mensaje,$imagen=true)
{
	$aeoiu="<sub>(CODIFICADO)</sub>";
	
	//Arreglo al casteiano.
	//Eliminación de acentos
	$intermedio=str_replace("\xE1", "a", $mensaje);//%E1 á
	$intermedio=str_replace("&aacute;", "a", $intermedio);//%E1 á
	$intermedio=str_replace("&aacute", "a", $intermedio);//%E1 á
	$intermedio=str_replace("\xE9", "e", $intermedio);//%E9 é
	$intermedio=str_replace("\xED", "i", $intermedio);//%ED í
	$intermedio=str_replace("\xEF", "i", $intermedio);//%EF ï
	$intermedio=str_replace("\xF3", "o", $intermedio);//%F3 ó
	$intermedio=str_replace("\xFA", "u", $intermedio);//%FA ú
	
	$intermedio=str_replace("\xC1", "a", $intermedio);//Á
	$intermedio=str_replace("\xC9", "e", $intermedio);//É
	$intermedio=str_replace("\xCD", "i", $intermedio);//Í
	$intermedio=str_replace("\xCF", "i", $intermedio);//Ï
	$intermedio=str_replace("\xD3", "o", $intermedio);//Ó
	$intermedio=str_replace("\xDA", "u", $intermedio);//Ú
	
	//Cambio de caracteres por fonéticos
	$intermedio=str_replace("ch","ts", $intermedio);
	$intermedio=str_replace("Ch","ts", $intermedio);
	$intermedio=str_replace("x","ks", $intermedio);
	$intermedio=str_replace("X","ks", $intermedio);
	$intermedio=str_replace("h","", $intermedio);
	$intermedio=str_replace("H","", $intermedio);
	$intermedio=str_replace("ce","ze", $intermedio);
	$intermedio=str_replace("Ce","ze", $intermedio);
	$intermedio=str_replace("ci","zi", $intermedio);
	$intermedio=str_replace("Ci","zi", $intermedio);
	$intermedio=str_replace("c","k", $intermedio);
	$intermedio=str_replace("C","k", $intermedio);
	$intermedio=str_replace("ge","je", $intermedio);
	$intermedio=str_replace("Ge","je", $intermedio);
	$intermedio=str_replace("gi","ji", $intermedio);
	$intermedio=str_replace("Gi","ji", $intermedio);
	$intermedio=str_replace("gue","ge", $intermedio);
	$intermedio=str_replace("Gue","ge", $intermedio);
	$intermedio=str_replace("gui","gi", $intermedio);
	$intermedio=str_replace("Gui","gi", $intermedio);
	$intermedio=str_replace("g\xFC", "gu", $intermedio);//gü
	$intermedio=str_replace("G\xFC", "gu", $intermedio);//Gü
	$intermedio=str_replace("g\xDC", "gu", $intermedio);//gÜ
	$intermedio=str_replace("G\xDC", "gu", $intermedio);//GÜ
	$intermedio=str_replace("ñ","ni", $intermedio);
	$intermedio=str_replace("qu","k", $intermedio);
	$intermedio=str_replace("Qu","k", $intermedio);
	$intermedio=str_replace("q","k", $intermedio);
	$intermedio=str_replace("v","bf", $intermedio);
	$intermedio=str_replace("y","i", $intermedio);
	$intermedio=str_replace("ll","i", $intermedio);
	$intermedio=str_replace("\xF1", "ni", $intermedio);//ñ
	$intermedio=str_replace("\xD1", "ni", $intermedio);//Ñ
	
	if ($imagen==true)
	{
		//Pongo alfabeto nuevo
		$vector=str_split($intermedio);
		foreach($vector as $car) 
		{
			if($car=='a'||$car=='A') {$aeoiu=$aeoiu . '<img src="../aeoiu/a.png" border="0" />';}
			elseif($car=='b'||$car=='B') {$aeoiu=$aeoiu . '<img src="../aeoiu/b.png" border="0" />';}
			elseif($car=='d'||$car=='D') {$aeoiu=$aeoiu . '<img src="../aeoiu/d.png" border="0" />';}
			elseif($car=='e'||$car=='E') {$aeoiu=$aeoiu . '<img src="../aeoiu/e.png" border="0" />';}
			elseif($car=='f'||$car=='F') {$aeoiu=$aeoiu . '<img src="../aeoiu/f.png" border="0" />';}
			elseif($car=='g'||$car=='G') {$aeoiu=$aeoiu . '<img src="../aeoiu/g.png" border="0" />';}
			elseif($car=='i'||$car=='I') {$aeoiu=$aeoiu . '<img src="../aeoiu/i.png" border="0" />';}
			elseif($car=='j'||$car=='J') {$aeoiu=$aeoiu . '<img src="../aeoiu/j.png" border="0" />';}
			elseif($car=='k'||$car=='K') {$aeoiu=$aeoiu . '<img src="../aeoiu/k.png" border="0" />';}
			elseif($car=='l'||$car=='L') {$aeoiu=$aeoiu . '<img src="../aeoiu/l.png" border="0" />';}
			elseif($car=='m'||$car=='M') {$aeoiu=$aeoiu . '<img src="../aeoiu/m.png" border="0" />';}
			elseif($car=='n'||$car=='N') {$aeoiu=$aeoiu . '<img src="../aeoiu/n.png" border="0" />';}
			elseif($car=='o'||$car=='O') {$aeoiu=$aeoiu . '<img src="../aeoiu/o.png" border="0" />';}
			elseif($car=='p'||$car=='P') {$aeoiu=$aeoiu . '<img src="../aeoiu/p.png" border="0" />';}
			elseif($car=='r'||$car=='R') {$aeoiu=$aeoiu . '<img src="../aeoiu/r.png" border="0" />';}
			elseif($car=='s'||$car=='S') {$aeoiu=$aeoiu . '<img src="../aeoiu/s.png" border="0" />';}
			elseif($car=='t'||$car=='T') {$aeoiu=$aeoiu . '<img src="../aeoiu/t.png" border="0" />';}
			elseif($car=='u'||$car=='U') {$aeoiu=$aeoiu . '<img src="../aeoiu/u.png" border="0" />';}
			elseif($car=='z'||$car=='Z') {$aeoiu=$aeoiu . '<img src="../aeoiu/z.png" border="0" />';}
			else {$aeoiu=$aeoiu . ESPACIOS;}
		}
	}
	else {$aeoiu=$intermedio;}
	return $aeoiu;
}
?>
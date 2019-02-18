<?php
//Función esc2html
//Descripción: Traduce trinomios de caracteres a formatos etiquetas html,
//					partiendo de una cadena y devolviendo otra con el resultado.
//Autor: Washedfrere Lionline Pax desde Cero
//Las etiquetas html originales son respetadas, por lo que se pueden incluir.
//No realiza verificación de corrección, por lo que pueden quedarse etiquetas descolgadas
//Las etiquetas que traduce son:
//	1>> <<1 por <h1> </h1>
// 2>> <<2 por <h2> </h2>
// 3>> <<3 por <h3> </h3>
// 4>> <<4 por <h4> </h4>
// i>>archivo<<i por <img src="carpeta/archivo" alt="imagenN" border="0" />
//	(donde carpeta es el directorio pasado como segundo parámetro)
// _>> <<_ por <u> </u>
// n>> <<n por <b> </b>
// +>> por <ul><li>
// ->> por </li><li>
// <<+ por </li></ul>
// <<< por <br>
// --- por <hr>
function esc2html($origen,$carpeta)
{
	$numgraf=0; //Contador de imágenes para el parámetro alt de <img>
	$l=strlen($origen);//Longitud de la cadena de entrada
	$resultado=""; //Cadena con el texto final

	for($i=0;$i<$l;$i++){ //Se recorre la cadena desde el inicio hasta el final (sólo una pasada)
		switch($origen[$i]){
			case "1" : //Evaluamos "1>>"
				$i++;//Avanzamos al siguiente carácter
				if($i<$l && $origen[$i]==">"){ // Vamos por "1>"
					$i++;//Avanzamos al siguiente carácter
					if($i<$l && $origen[$i]==">") // Vamos por "1>>"
						$resultado.="<h1>"; // Estamos en "1>>"
					else {$i-=2; $resultado.=$origen[$i];}//No coincide "1>?": retrocedemos 2 y pintamos origen
				}
				else {$i--; $resultado.=$origen[$i];}//No coincide "1?": retrocedemos 1 y pintamos origen
				break; //Pasamos al siguiente carácter (no evaluamos más: el "for" hace el resto)
			case "2": //Evaluamos "2>>", etc.
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<h2>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "3": //Evaluamos "3>>"
				$i++;
				if($i<$l && $origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<h3>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "4": //Evaluamos "4>>"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<h4>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "i": //Evaluamos "i>>"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.='<img src="'.$carpeta;
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "c": //Evaluamos "c>>"
				$i+=1;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<center>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "_": //Evaluamos "_>>"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<u>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "n": //Evaluamos "n>>"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<b>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "+": //Evaluamos "+>>"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="<ul><li>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "-": //Evaluamos "->>" o "---"
				$i++;
				if($i<$l&&$origen[$i]==">"){
					$i++;
					if($i<$l&&$origen[$i]==">")
						$resultado.="</li><li>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				elseif($i<$l&&$origen[$i]=="-"){
					$i++;
					if($i<$l&&$origen[$i]=="-")
						$resultado.="<hr>";
					else {$i-=2; $resultado.=$origen[$i];}
				}
				else {$i--; $resultado.=$origen[$i];}
				break;
			case "<": //Terminación de alguna de las múltiples aperturas anteriores "<??"
				$i++; //Avanzamos carácter
				if($i<$l&&$origen[$i]=="<"){//Comprobamos "<<?"
					$i++;
					if($i<$l){
						switch($origen[$i]){
							case "1": //Evaluamos "<<1"
								$resultado.="</h1>";
								break;
							case "2": //Evaluamos "<<2"
								$resultado.="</h2>";
								break;
							case "3": //Evaluamos "<<3"
								$resultado.="</h3>";
								break;
							case "4": //Evaluamos "<<4"
								$resultado.="</h4>";
								break;
							case "i": //Evaluamos "<<i"
								$resultado.='" alt="imagen'.$numgraf.'" border="0" />';
								$numgraf++;
								break;
							case "c": //Evaluamos "<<c"
								$resultado.="</center>";
								break;
							case "n": //Evaluamos "<<n"
								$resultado.="</b>";
								break;
							case "_": //Evaluamos "<<_"
								$resultado.="</u>";
								break;
							case "+": //Evaluamos "<<+"
								$resultado.="</li></ul>";
								break;
							case "<": //Evaluamos "<<<"
								$resultado.="<br/>";
								break;
							default: //No hubo coincidencia de trinomio: "<<?"
								$i-=2; //Retrocedemos 2
								$resultado.=$origen[$i]; //Pintamos origen
						}
					}
					else {$i-=2; $resultado.=$origen[$i];}// No coincide "<<?": retrocedemos 2 y pintamos origen
				}
				else{ $i--; $resultado.=$origen[$i];} //No coincide "<??": retrocedemos uno y pintamos origen
				break;
			default: //No hubo coincidencia de primer término del trinomio
				$resultado.=$origen[$i];
		}
	}
	return $resultado;
}
?>
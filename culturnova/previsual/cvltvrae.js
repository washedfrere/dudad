//Variables globales
var htimersol2;
var yaactivo="no";
var activosol2="no";
var xlogo;
var ylogo;

function accion(origen,acto)
{
	if  ( origen=="menu" )
	{
	    menuactivo(acto);
		switch(acto)
		{
			case "0":
				document.getElementById("mensaje").innerHTML='Has pulsado inicio. Desde aqu� est� previsto reiniciar la aplicaci�n como si se acabara de entrar nada m�s introducir el usuario, pero sin desconectarlo.';
				sincontenido();
				document.getElementById("contenedor").innerHTML='<center><h2>Utilice alguna opci�n de la izquierda</h2></center>';
				break;
			case "1":
				document.getElementById("mensaje").innerHTML='Las aplicaciones se mostrar�n en el contenido...';
				document.getElementById("contenido").innerHTML='Aqu� ir�an las aplicaciones posibles';
				concontenido();
				document.getElementById("contenedor").innerHTML='';
				break;
			case "2":
				document.getElementById("mensaje").innerHTML='Informes, listados, impresos...';
				document.getElementById("contenido").innerHTML='Los tipos de informe o los documentos a imprimir';
				concontenido();
				document.getElementById("contenedor").innerHTML='';
				break;
			case "3":
				document.getElementById("mensaje").innerHTML='Mensajer�a, contactos.';
				document.getElementById("contenido").innerHTML='Como m�nimo un sistema de chat y otro de foro.<br />Pendiente de estudiar la posibilidad de voz-ip o videoconferencia.';
				concontenido();
				document.getElementById("contenedor").innerHTML='';
				break;
			case "4":
				document.getElementById("mensaje").innerHTML='Las opciones del sistema';
				document.getElementById("contenido").innerHTML='Selector de colores, fuentes, notificaciones, control de accesos, usuarios, permisos y dem�s, seg�n la categor�a de cada usuario';
				concontenido();
				document.getElementById("contenedor").innerHTML='';
				break;
			case "z":
				//intro.html
				document.getElementById("mensaje").innerHTML='<h1>Saliendo...</h1>';
				bloqueo();
				sincontenido();
				document.getElementById("contenido").style.visibility="hidden";
				document.getElementById("contenedor").innerHTML='<center><img src="culturaetitulo.png" border="0"></center>';
				setTimeout("salida()",3000)
		}
	}
}
function salida(){window.location.replace("intro.html");}
function entrada()
{
	bloqueo();
	sincontenido();
	document.getElementById("contenedor").innerHTML='<center><h1>le damos la vienvenida a</h1><img src="culturaetitulo.png" border="0"></center>';
	setTimeout("desbloqueo()",3000);
}
function bloqueo(){document.getElementById("bloqueo").style.visibility="visible";}
function desbloqueo(){document.getElementById("bloqueo").style.visibility="hidden";}
function concontenido(){document.getElementById("contenido").style.visibility="visible";}
function sincontenido(){document.getElementById("contenido").style.visibility="hidden";}
function menuactivo(mnact)
{
	if (mnact=="0") document.getElementById("mninicio").style.background="#ffffff";
	else document.getElementById("mninicio").style.background="#4080ff";
	if  (mnact=="1")document.getElementById("mnapps").style.background="#ffffff";
	else document.getElementById("mnapps").style.background="#4080ff";
	if  (mnact=="2")document.getElementById("mninform").style.background="#ffffff";
	else document.getElementById("mninform").style.background="#4080ff";
	if  (mnact=="3")document.getElementById("mnmsg").style.background="#ffffff";
	else document.getElementById("mnmsg").style.background="#4080ff";
	if  (mnact=="4")document.getElementById("mnopc").style.background="#ffffff";
	else document.getElementById("mnopc").style.background="#4080ff";
}

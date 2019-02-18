<!--
#############################################################
  Le jeu de squelettes AHUNTSIC - version 1.0
#############################################################

Ce dossier contient :
- le jeu de squelettes 'ahuntsic'

Compatibilit� : SPIP 2.0 ou plus recent

La documentation de ce jeu de squelettes se trouve a :
	http://edu.ca.edu/rubrique43.html

Aussi r�f�renc� sur spip-contrib.net
	

1. POUR INSTALLER LE JEU DE SQUELETTES AHUNTSIC
---------------------------------------------------

AUTOMATIQUE (m�thode pr�f�r�e) :
1. Cr�er � la racine de SPIP les dossiers /plugins/auto/
2. Dans l'interface priv� de SPIP, aller � :
  'Configuration > Gestion des plugins : Ajoutez des plugins'
3. Cliquer sur ou ins�rer :
     http://files.spip.org/spip-zone/paquets.rss.xml.gz
   et 'Valider'
4. Dans la liste des plugins � installer qui s'affichent, rep�rer et s�lectionner 'ahuntsic'
5. 'Valider' (la derni�re version des squelettes sera t�l�charg� dans /plugins/auto/)
6. Dans la 'Liste des plugins' du haut, cocher 'Squelette Ahuntsic' et 'Valider' pour activer.
7. Dans 'Configuration',  'Vider le cache' du r�pertoire de SPIP et des images calcul�es.
8. 'Visiter' votre site public.

Pour une mise � jour automatique des squelettes Ahuntsic, r�p�ter les �tapes 4 � 8.

MANUELLE
1. Comme plugin (alternative acceptable � la m�thode pr�c�dente)
   - T�l�charger :
		http://files.spip.org/spip-zone/ahuntsic.zip
   - D�compresser l'archive sur votre poste
   - Cr�er sur votre serveur � la racine de SPIP les dossiers /plugins/auto/
   - T�l�versez le dossier 'ahuntsic' dans :
		./plugins/auto/ahuntsic
   - Dans 'Configuration > Gestion des plugins' activer 'Ahuntsic'
   - Dans 'Configuration',  'Vider le cache' du r�pertoire de SPIP et des images calcul�es.

2. Comme squelette ordinaire (pas de mise � jour automatique - possible, mais pas conseill�)
   - T�l�charger et d�compresser le jeu de squelettes 'ahuntsic.zip'.
   - Cr�er un dossier ./squelettes/ � la racine de votre installation de SPIP sur votre serveur.
   - T�l�verser le CONTENU du dossier 'ahuntsic' dans ./squelettes/ sur votre serveur.
   - Renommer le fichier 'ahuntsic_options.php' en 'mes_options.php' et le d�placer dans le
     dossier ./config/ sur votre serveur.
   - Dans 'Configuration',  'Vider le cache' du r�pertoire de SPIP et des images calcul�es.
  

2. POUR PERSONNALISER LES SQUELETTES AHUNTSIC
-------------------------------------------------

Si vous desirez profiter des mises � jour r�guli�res du jeu de squelettes
AHUNTSIC, il est fortement recommand� de ne PAS modifier aucun des fichiers 
qui se trouvent dans :
	/plugins/auto/ahuntsic/

Pour personnaliser un fichier du jeu de squelettes AHUNTSIC, 
utiliser plut�t la proc�dure suivante :

- Cr�er � la racine de SPIP un dossier /squelettes/
  Si un dossier /squelettes/ y est d�j� pr�sent, le renommer
  sous un autre nom (exemple : '_squelettes').

- Pour modifier les styles de base d'AHUNTSIC
  - cr�er une feuille de styles tr�s exactement libell� : 
  		/squelettes/styles/perso.css
  -	y inscrire les modifications ou ajouts des r�gles de styles d�sir�es,  
  	ainsi que les images associ�es dans un dossier 
  		/squelettes/styles/img/

- Pour modifier n'importe quel autre fichier du jeu de squelettes AHUNTSIC, 
  il suffit de le recopier dans ce dossier de personnaliation et de 
  le modifier selon vos besoins. Il faut seulement respecter la m�me
  arboresence de fichiers. 
  Exemple :
  	/squelettes/rubrique.html
  	/squelettes/inc/inc-bas.html

- Au besoin, videz le cache de SPIP
	-> Configuration -> Vider le cache

Pour les changements recents en cours de developpement, voir :
	- CHANGES.txt (dans ce meme repertoire)
-->
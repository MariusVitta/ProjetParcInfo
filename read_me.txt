STRUCTURE DU SITE WEB DE RECHERCHE DE LOGICIELS ET DE SALLES
------------------------------------------------------------

Page d'accueil : accueil.blade.php
Permet à l'utilisateur de choisir de rechercher des logiciels ou des salles.
Lien vers : logiciels.blade.php, salles.blade.php

Page de recherche de logiciels : logiciels.blade.php
Demande à l'utilisateur de saisir le nom d'un logiciel et affiche la liste des salles contenant le logiciel.
Lien vers : accueil.blade.php

Page de recherche de salles : salles.blade.php
Demande à l'utilisateur de saisir le nom d'une salle et affiche la liste des logiciels présents dans la salle.
Lien vers : accueil.blade.php

AUTRES FICHIERS ACCOMPAGNANT LE PROJET
--------------------------------------

1) Fichier de gestion des routes

Chemin d'accès : routes/web.php
Description : ce fichier permet de gérer les routes d'accès aux différentes pages.
Pour chaque route (/, logiciels, salles), un contrôleur sur la page web en question est affecté.

2) Contrôleurs

Chemin d'accès : app/Http/Controllers/ControleurAccueil.php
				 app/Http/Controllers/ControleurLogiciels.php
				 app/Http/Controllers/ControleurSalles.php
Description : ces fichiers représentent les contrôleurs qui vont recevoir les requêtes et renvoyer la page appropriée.

3) Fichiers de requête

Chemin d'accès : app/Http/Requests/RequeteLogiciel.php
				 app/Http/Requests/RequeteSalle.php
Description : ces fichiers traitent les requêtes en effectuant les vérifications nécessaires (autorisations, champs valides).
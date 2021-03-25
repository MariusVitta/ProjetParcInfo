## Présentation

Le projet a été réalisé avec Laravel 8, vérifiez également que vous possédez la version de PHP 7.4 ou ultérieure et à utiliser mySQL en tant que système de base de données.

## Installation du serveur

 Avant de lancer le serveur vous devez configurer la base de données à laquelle votre serveur va se connecter, pour cela ouvrez le fichier **.env** qui se trouve dans le dossier *ProjetParcInfo*.
- modifiez la ligne *DB_DATABASE* avec le nom de la base de données crée au préalable.
- modifiez les lignes *DB_USERNAME*,*DB_PASSWORD* de telle sorte que le nom utilisateur et le mot de passe correspondent à vos données permettant de vous connectez à votre système de gestion de base de données.


## Création des tables utilisateur

Après cela dans un terminal, placez vous dans le dossier *ProjetParcInfo* et exécutez la code `php artisan migrate:install` à la suite de cela une table *migrations* devrait être ajoutée à votre base de données, ensuite lancez la commande `php artisan migrate` cette commande-ci devrait vous créer toutes les tables nécessaires au bon fonctionnement de l'application.


## Remplissage des tables utilisateurs

Toujours dans le dossier *ProjetParcInfo* et exécutez la code `php artisan db:seed` à la suite de ça  toutes les tables devrait etre remplies.

## Lancement du serveur

Enfin pour lancer votre serveur à partir du dossier *ProjetParcInfo*, tapez la commande `php artisan serve`. Pour accéder au site, ouvrez un navigateur et tapez [http://127.0.0.1:8000/](http://127.0.0.1:8000/) qui est l'URL qui ouvre la page principale du projet

## Notes

Vous pouvez mettre à jour vos *composer* régulièrement avec la commande `composer update` depuis un terminal dans le dossier *ProjetParcInfo* 

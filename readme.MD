Quai Antique Projet symfony
===

@Autor : Mist3rYan

# Environment de développement

### Prérequis

* PHP 8.1
* Composer
* Symfony CLI 6.2
* node js et npm

Vous pouvez vérifier les pré requis avec la commande suivante :

```bash
symfony check:requirements
```
# Installation en local
## Cloner le projet
```bash
git clone (URL de ce repo)
```

## Lancer l'environnement de développement

```bash
composer install
npm install
npm run build
symfony serve -d
```
## Arrêter l'environnement de développement

```bash
symfony server:stop
```

* Page d'acueil : http://127.0.0.1:8000/
* Page de connexion : http://127.0.0.1:8000/connexion


# Liste des commandes 

## Manipulation du schéma de base de données


### Effectuer la migration. Transforme entity en sql.

```
php bin/console make:migration
```

### Puis pour ajouter à la base de donnée
```
php bin/console doctrine:migrations:migrate
```

## Ajouter des fixtures avec fakerphp et orm-fixtures
```
php bin/console doctrine:fixtures:load
```

## Administration gérer par easyadmin-bundle

Sources : https://symfony.com/bundles/EasyAdminBundle/current/dashboards.html

# Connection à l'administration
Un admin a été créé avec les fixtures, les identifiants pour se connecter sont :
* email: admin@quaiantique.fr
* MDP: password

# Utilisation
### Vous pouvez vous inscrire et vous connecter. Pour cela completez un nom, un email, un mot de passe, un nombre de convive et les allergies si vous en avez.

### Vous pouvez ensuite créer une réservation, en précisant une date et une heure le reste est automatiquement rempli garce à votre profil.

### Vous pouvez aussi réserver sans avoir de compte, dans ce cas vous devez remplir tous les champs.

### L'adresse mail et le mot de passe ne peuvent pas être modifiés.

### Le mot de passe est crypté en base de données.

### Vous pouvez modifier ou supprimer votre compte, en cliquant dans le menu sur mon compte.

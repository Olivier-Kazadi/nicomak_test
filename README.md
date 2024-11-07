# MerciApp

MerciApp est une application Symfony permettant aux utilisateurs de s’envoyer des messages de remerciement, accompagnés de leurs avatars. Ce projet a été conçu pour permettre une expression facile de gratitude entre utilisateurs, avec une interface simple pour visualiser et envoyer des messages.

## Fonctionnalités

- **Liste des mercis** : Consultez tous les messages de remerciement envoyés, avec les avatars et les détails de chaque utilisateur.
- **Envoi de mercis** : Les utilisateurs peuvent envoyer des messages de remerciement à d'autres utilisateurs.
- **Date et heure** : Chaque message est enregistré avec la date et l'heure de l’envoi.

## Prérequis

Avant d'installer et de lancer le projet, assurez-vous d'avoir les éléments suivants installés :

- PHP >= 8.1
- Composer
- Symfony CLI (optionnel, mais recommandé pour le développement local)
- Un serveur de base de données compatible (par exemple PostgreSQL ou MySQL)

## Installation

Suivez ces étapes pour installer et configurer le projet localement.

1. **Clonez le dépôt :**

   ```bash
   git clone https://github.com/votre-utilisateur/nom-du-repo.git
   cd nom-du-repo

    Installez les dépendances PHP :

composer install

Configurez les variables d’environnement :

Copiez le fichier .env en .env.local et configurez les informations de connexion à la base de données, par exemple :

DATABASE_URL="postgresql://db_user:db_password@127.0.0.1:5432/merciapp"

Créez la base de données et appliquez les migrations :

php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate

Chargez les données de test (facultatif)

Si vous avez des fixtures pour charger des données de test, exécutez :

php bin/console doctrine:fixtures:load

Démarrez le serveur Symfony :

    symfony server:start

    L'application sera accessible à l'adresse http://127.0.0.1:8000.

Utilisation

    Accédez à l'application dans votre navigateur à l'adresse http://127.0.0.1:8000.
    Consultez la liste des mercis existants ou utilisez le bouton pour envoyer un nouveau message de remerciement.
    Remplissez les champs requis et soumettez le formulaire pour enregistrer le message.

Structure du projet

    Entity : Définit les entités de base de données pour Merci, User, etc.
    Repository : Contient les classes de requêtes pour interagir avec la base de données.
    Controller : Gère la logique métier des pages et des formulaires.
    Templates : Contient les fichiers Twig pour l'affichage des pages.

Captures d'écran
Liste des Mercis

Formulaire d'envoi de Merci

Contribuer

Les contributions sont les bienvenues ! Veuillez suivre ces étapes pour contribuer :

    Fork le projet.
    Créez une branche pour votre fonctionnalité (git checkout -b nouvelle-fonctionnalite).
    Committez vos changements (git commit -am 'Ajout de nouvelle fonctionnalité').
    Poussez vers la branche (git push origin nouvelle-fonctionnalite).
    Créez une pull request.

License

Ce projet est sous licence MIT. Consultez le fichier LICENSE pour plus d’informations.

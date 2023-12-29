# Le blog de LP

Le blog de LP est un projet laravel de...blog (surprenant) permettant à l'utilisateur de publié des articles, avec des catégories, tags, etc.

Lors du premier démarrage, pensez à bien définir un utilisateur en tant qu'administrateur afin de créer des catégories/tags (sans celles-ci, vous ne pourrez pas créer d'articles).

## Prérequis

Avant de commencer, assurez-vous que vous avez les logiciels suivants installés sur votre machine :

- [PHP](https://www.php.net/) (version 8)
- [Composer](https://getcomposer.org/)
- [Node.js](https://nodejs.org/) et [npm](https://www.npmjs.com/)
- [Git](https://git-scm.com/)

## Installation

1. Clonez le dépôt :

   ```bash
   git clone https://github.com/votre-utilisateur/votre-projet.git
2. Accédez au répertoire du projet :

    ```bash
    cd votre-projet
    ```

3. Installez les dépendances PHP avec Composer :

    ```bash
    composer install
    ```

4. Installez les dépendances frontend avec npm :

    ```bash
    npm install
    ```

5. Copiez le fichier .env.example et renommez-le en .env (ATTENTION à bien modifier vos informations pour la votre base de données)

## Initialisation de la base de données et du stockage

1. Effectuez les migrations afin de mettre en place votre base de données :

    ```bash
    php artisan migrate
    ```

2. Connectez votre stockage afin de pouvoir récupérer les fichiers :

    ```bash
    php artisan storage:link
    ```

3. Si ça n'est pas déjà le cas, vérifiez que la valeur `upload_max_filesize` dans le fichier `php.ini` est au moins initialisé à 10M.

## Lancement du Serveur de Développement
Lancez le serveur de développement Laravel avec la commande :

```bash
php artisan serve
```

Le projet sera accessible à l'adresse http://localhost:8000.

## Compilation des Ressources Frontend
Si vous apportez des modifications aux ressources frontend (CSS, JavaScript), compilez-les avec la commande :

```bash
npm run dev
```
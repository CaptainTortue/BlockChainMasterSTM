<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Installation

## Prérequis
- PHP 8.1 (potentiezllement 8.2)
- Laragon de préférence
- Sinon XAMPP ou WAMP peut fonctionner
- Nécessite composer installé pour installer les dépendances (présent dans laragon et potentiellement dans XAMPP et WAMP)

````
composer install
````

Dans le cas de laragon : 
- Ouvrir laragon
- Cliquer sur le bouton "démarrer" pour lancer les serveurs
- Cliquer sur le bouton "Terminal" en bas à droite
![img.png](readme%20files/imgLaragon.png)
- Dans le terminal, taper la commande ci-dessus
- Attendre que les dépendances soient installées
- Une fois les dépendances installées, il faut récupérer la base de données
- Laragon a un serveur sql et l'interface heidiSQL, si besoin on peut installer l'interface de MySQL
- Créer une base de donnée nommé "blockchain"
- commande de migration pour créer les tables : 
````
php artisan migrate
````
Normalment vous aurez une base de données avec les tables suivantes :
![img.png](readme%20files/imgBDD.png)
- commande de seed, pour avoir des données de tests, avec des users, des transactions a valider, etc...
```
php artisan db:seed
```
- exemple de commande pour créer des données de test en fonction de tel table
````
php artisan db:seed --class=BlocSeeder
````

Si besoin un dump de la BDD est dans le projet.

Une fois le serveur lancé et la base de donénes, si votre configuration laragon est laisser par défault, le lien du site local sera
http://blockchain.test/

Sinon cette url peut fonctionner http://localhost/BlockChain/public/

Le projet utilise tailwind pour le CSS, il faut donc installer les dépendances JS et CSS, pour cela il faut installer node.js, npm (présent dans laragon) et les dépendances JS et CSS
````
npm install
````

Une fois les dépendances installées, il faut compiler le CSS et JS, pour cela il faut lancer la commande suivante
````
npm run dev
````
![img.png](readme%20files/imgNPM.png)
## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[WebReinvent](https://webreinvent.com/)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Jump24](https://jump24.co.uk)**
- **[Redberry](https://redberry.international/laravel/)**
- **[Active Logic](https://activelogic.com)**
- **[byte5](https://byte5.de)**
- **[OP.GG](https://op.gg)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

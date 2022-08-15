<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="300"></a></p>
<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>
<h1 align="center">CRUD interface</h1>

<h2 style="text-decoration: underline">Présentation</h2>

Ce projet Laravel permet de faire un CRUD sur une base de données fournie.

<h2 style="text-decoration: underline">Requiert</h2>

- Laravel 9
- composer
- php 8
- mariadb ou mysql

<h2 style="text-decoration: underline">Installation</h2>

```
git clone https://gitlab.com/...chemin complet
cd webcs-crud-interface
composer install
cp .env.example .env
php artisan key:generate
Modifiez le fichier .env pour votre base de données
php artisan migrate:fresh --seed
php artisan serve

Visitez localhost:8000 dans votre navigateur.

Deux users sont présents de base :

Email : hc@gmail.com
MDP   : hc4webcs
Rôle  : admin

Email : read@gmail.com
MDP   : read1234
Rôle  : reader

```
<h2 style="text-decoration: underline">License</h2>

Licensed under the [MIT license](https://opensource.org/licenses/MIT).

<p align="center"><img src="https://laravel.com/assets/img/components/logo-laravel.svg"></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, yet powerful, providing tools needed for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of any modern web application framework, making it a breeze to get started learning the framework.

If you're not in the mood to read, [Laracasts](https://laracasts.com) contains over 1100 video tutorials on a range of topics including Laravel, modern PHP, unit testing, JavaScript, and more. Boost the skill level of yourself and your entire team by digging into our comprehensive video library.

## Script

A continuación, se presenta el script de las diferentes tablas con el motor de base de datos MySQL:

```sql
CREATE TABLE actores (
  idActor int(11) PRIMARY KEY AUTO_INCREMENT,
  nombres varchar(30) NOT NULL,
  apellidos varchar(30) NOT NULL,
  created_at datetime NOT NULL,
  updated_at datetime NOT NULL
);

CREATE TABLE generos (
  idGenero int(11) PRIMARY KEY AUTO_INCREMENT,
  nombre varchar(30) NOT NULL unique,
  created_at datetime NOT NULL,
  updated_at datetime NOT NULL,
  deleted_at datetime
);

CREATE TABLE peliculas (
  idPelicula int(11) PRIMARY KEY AUTO_INCREMENT,
  titulo varchar(30) NOT NULL,
  duracion int(11) NOT NULL,
  anio int(11) NOT NULL,
  imagen varchar(250),
  created_at datetime NOT NULL,
  updated_at datetime NOT NULL
);

CREATE TABLE peliculas_actores (
  idPelAct int(11) PRIMARY KEY AUTO_INCREMENT,
  idPelicula int(11) NOT NULL REFERENCES peliculas (idPelicula),
  idActor int(11) NOT NULL REFERENCES actores (idActor),
  unique(idPelicula,idActor)
);

CREATE TABLE peliculas_generos (
  idPelGen int(11) PRIMARY KEY AUTO_INCREMENT,
  idPelicula int(11) NOT NULL REFERENCES peliculas (idPelicula),
  idGenero int(11) NOT NULL REFERENCES generos (idGenero),
  unique(idPelicula,idGenero)
)
```

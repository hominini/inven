# Gestión de Bienes del Sector Público

Software para la administración y control de Bienes en Instituciones Públicas.

## Primeros Pasos

### Pre-requisitos

PHP 7
Laravel 5.7
Composer

### Instalación

Clonar el repositorio
```
git clone https://github.com/hominini/inven.git
```

Configurar el archivo .env
```
cd inven
cp .env.example .env
### editar el archivo .env con la configuracion local de la base de datos
```

Instalar las dependencias del proyecto

```
composer install
```

Generar la Clave de la Aplicación

```
php artisan key:generate
```

Ejecutar las migraciones

```
php artisan migrate
```

Ejecutar
```
php artisan serve
```

End with an example of getting some data out of the system or using it for a little demo

## Implementación

No se ha probado en producción.

## Construido con

* [Laravel](https://laravel.com/docs/5.7) - Framework Web
* [Composer](https://getcomposer.org/) - Manejador de Dependencias

## Versionamiento

Usando [SemVer](http://semver.org/) para el versionamiento.

## Autores

## Licenciamiento

Licencia MIT.

## Reconocimientos

* Hat tip to anyone whose code was used
* Inspiration
* etc

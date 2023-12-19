# QuickStock

QuickStock es una aplicación de gestión de inventario que permite a los usuarios rastrear productos, ventas y más.

## Características

-   **Gestión de productos:** Añade, edita y elimina productos de tu inventario.
-   **Seguimiento de ventas:** Registra las ventas y ve un resumen de tus ventas recientes.
-   **Informes:** Genera informes para obtener información sobre tus ventas e inventario.

## Instalación

1.  Clona este repositorio: `git clone https://github.com/DakaAlvarez97/QuickStock.git`
2.  Navega al directorio del proyecto: `cd quickstock`
3.  Instala las dependencias: `composer install`
4.  Copia el archivo de entorno de ejemplo y configura tus variables de entorno: `cp .env.example .env`
5.  Genera una clave de aplicación: `php artisan key:generate`
6.  Ejecuta las migraciones: `php artisan migrate`
7.  Ejecuta Faker para generar artículos aleatorios en la base de datos: `composer require fakerphp/faker`
8.  Ejecuta los seeders: `php artisan db:seed --class=ProductsTableSeeder`
9.  Ejecuta npm: `npm install`
10. Genera JWT: `php artisan jwt:secret`
11. Inicia el servidor de desarrollo: `php artisan serve`

## Uso

Abre tu navegador y navega a `http://localhost:8000` para empezar a usar QuickStock.
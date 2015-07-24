# Socialist

A social authentication REST API for Laravel 5

**WARNING: THIS IS STILL UNDER DEVELOPMENT AND SHOULD IN NO WAY BE USED FOR PRODUCTION**

## Installation

Add the package to your composer.json file:

    "require": {
        ...
        "andyjessop/socialist": "dev-master"
    },

Then update:

    composer update

Add the service provider to 'YourRoot/config/app.php' `providers` array

    'providers' => [
        
        ...
        AndyJessop\Socialist\SocialistServiceProvider::class,
    ],

Publish the config and migration files:

    php artisan vendor:publish

Run the migration

    php artisan migrate

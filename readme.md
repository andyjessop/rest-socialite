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

## Events

Socialist exposes some events for you to hook into in your application. To register listeners, follow the instructions in the [Laravel Docs](http://laravel.com/docs/5.1/events#defining-listeners).

    AndyJessop\Socialist\Events\UserHasLoggedIn

* fires when a user logs in
* exposes user data

    AndyJessop\Socialist\Events\UserHasRegistered

* fires when a user is created
* exposes user data

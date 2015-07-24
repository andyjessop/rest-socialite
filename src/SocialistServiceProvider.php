<?php

namespace	AndyJessop\Socialist;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class SocialistServiceprovider extends ServiceProvider{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->loadViewsFrom(realpath(__DIR__.'/../resources/views'), 'socialist');
		$this->setupRoutes($this->app->router);
		$this->publishes([
				__DIR__.'/config/socialist.php' => config_path('socialist.php'),
		]);
	}

	/**
	 * Define the routes for the application.
	 *
	 * @param  \Illuminate\Routing\Router  $router
	 * @return void
	 */
	public function setupRoutes(Router $router)
	{
		$router->group(['namespace' => 'AndyJessop\Socialist\Http\Controllers'], function($router)
		{
			require __DIR__.'/Http/routes.php';
		});
	}

	public function register()
	{
		$this->registerSocialite();
		$this->registerSocialist();
		config([
				'config/socialist.php',
		]);
	}

	private function registerSocialite()
	{
		$this->app->register('\Laravel\Socialite\SocialiteServiceProvider');
	}

	private function registerSocialist()
	{
		$this->app->bind('socialist',function($app){
			return new Socialite($app);
		});
	}
}

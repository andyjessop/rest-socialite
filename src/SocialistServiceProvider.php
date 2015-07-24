<?php

namespace	AndyJessop\Socialist;

use Illuminate\Support\ServiceProvider;
use Illuminate\Routing\Router;

class SocialistServiceProvider extends ServiceProvider{

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	public function boot()
	{
		$this->setupRoutes($this->app->router);

		// Publish config and migrations
		$this->publishes([
				__DIR__.'/../config/socialist.php' => config_path('socialist.php'),
				__DIR__.'/../migrations' => base_path('database/migrations')
		]);

		// Use this package's auth model, rather than the default User.php
		$this->app->config->set('auth.model', $this->app->config->get('socialist.auth.model'));
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

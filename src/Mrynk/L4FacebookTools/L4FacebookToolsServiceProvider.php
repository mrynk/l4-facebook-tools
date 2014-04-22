<?php namespace Mrynk\L4FacebookTools;

use Illuminate\Support\ServiceProvider;

class L4FacebookToolsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('mrynk/l4-facebook-tools');

		//include __DIR__.'/../../routes.php';
		include __DIR__.'/../../filter.php';
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		\App::register('Thomaswelton\LaravelFacebook\LaravelFacebookServiceProvider');
		\App::register('Jenssegers\Agent\AgentServiceProvider');

		// Shortcut so developers don't need to add an Alias in app/config/app.php
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Facebook', 'Thomaswelton\LaravelFacebook\Facades\Facebook');
			$loader->alias('Agent', 'Jenssegers\Agent\Facades\Agent');
		});

		\Route::filter( 'l4-facebook-tools', 'L4FacebookToolsFilter' );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}

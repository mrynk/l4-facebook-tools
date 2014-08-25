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
		$this->app['mobiledetect'] = $this->app->share(function($app)
        {
            return new \Mobile_Detect;
        });

		$this->app['facebook'] = $this->app->share(function($app)
        {
            return new Facebook;
        });

		\Route::filter( 'facebook-scope', 'L4FacebookToolsFilter' );
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('facebook', 'mobiledetect');
	}

}

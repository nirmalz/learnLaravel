<?php namespace Nextgen\First;

use Illuminate\Support\ServiceProvider;

class FirstServiceProvider extends ServiceProvider {

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
		$this->package('nextgen/first');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['First'] = $this->app->share(function($app){
			return new First;
		});


		//this allows the facaded to work without the developer having to add it the alias array in app/congig/app.php
		$this->app->booting(function(){
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('First', 'Nextgen\First\Facades\First');
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('First');
	}

}

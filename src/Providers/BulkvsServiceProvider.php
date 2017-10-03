<?php

namespace Bulkvs\Providers;

use Illuminate\Support\ServiceProvider;

class BulkvsServiceProvider extends ServiceProvider {

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
        //
    }

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('bulkvs', function($app) {
		    return new \Bulkvs\Bulkvs;
		});

		$this->app->booting(function() {
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Bulkvs', 'Bulkvs\Facades\Bulkvs');
		});

        $configPath = config_path('bulkvs.php');
        if (!\Illuminate\Support\Facades\File::exists($configPath)) {
            $this->publishes([
                __DIR__ . '/../config/bulkvs.php' => $configPath
            ]);
        }

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('bulkvs');
	}

}

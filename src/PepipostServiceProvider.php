<?php
namespace Pepipost\PepipostLib;
use Illuminate\Support\ServiceProvider;
class PepipostServiceProvider extends ServiceProvider
{
  /**
     * Boot the service provider.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/api.php' => config_path('pepipost.php')
        ], 'config');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('pepipost-lib', function($app)
        {
            return new PepipostLib();
        });
    }
}
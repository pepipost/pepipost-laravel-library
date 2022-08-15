<?php
namespace Pepipost\PepipostLib;
use Illuminate\Support\ServiceProvider;
// use Pepipost\PepipostLib\PepipostMailer;
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
        // $this->app->singleton('command.tinker', function () {
        //     return new TinkerCommand;
        // });

        // $this->commands(['command.tinker']);
        $this->app->bind('pepipost-lib', function($app)
        {
            return new PepipostLib();
        });
    }
}
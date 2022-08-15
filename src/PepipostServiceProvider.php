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
        // $source = realpath($raw = __DIR__.'/../config/tinker.php') ?: $raw;

        /*if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('tinker.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('tinker');
        }

        $this->mergeConfigFrom($source, 'tinker');*/
        // $this->mergeConfigFrom(__DIR__.'/Configuration.php', 'pepimailer');
        $this->publishes([
            __DIR__.'/Configuration.php' => config_path('pepimailer.php')
        ], 'pepimailer-config');
        // $this->loadRoutesFrom(__DIR__.'/routes/web.php');
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
        $this->app->bind('pepipostmailer', function($app)
        {
            return new Pepipostmailer();
        });
    }
}
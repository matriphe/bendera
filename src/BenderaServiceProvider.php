<?php

namespace Matriphe\Bendera;

use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Illuminate\Foundation\Application as LaravelApplication;
use Stidges\CountryFlags\CountryFlag;

class BenderaServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->configure();
        $this->offerPublishing();
        $this->registerSingletons();
    }

    /**
     * Setup the configuration.
     *
     * @return void
     */
    protected function configure()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/bendera.php', 'bendera');
    }

    /**
     * Setup the resource publishing groups.
     *
     * @return void
     */
    protected function offerPublishing()
    {
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/config/bendera.php' => config_path('bendera.php'),
            ], 'bendera');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('bendera');
        }
    }

    /**
     * Register the singletons in the container.
     *
     * @return void
     */
    protected function registerSingletons()
    {
        $this->app->singleton(BenderaContract::class, static function () {
            return new Bendera(new CountryFlag(config('bendera.aliases')));
        });
    }
}

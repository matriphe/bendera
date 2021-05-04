<?php

namespace Matriphe\Bendera;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use Stidges\CountryFlags\CountryFlag;

class BenderaServiceProvider extends PackageServiceProvider
{
    /**
     * @param  Package  $package
     */
    public function configurePackage(Package $package): void
    {
        $package->name('bendera')->hasConfigFile();
    }

    /**
     * @return void
     */
    public function packageRegistered()
    {
        $this->app->singleton(CountryFlag::class, static function () {
            return new CountryFlag(config('bendera.aliases'));
        });

        $this->app->singleton(BenderaContract::class, static function ($app) {
            return new Bendera($app[CountryFlag::class]);
        });
    }
}

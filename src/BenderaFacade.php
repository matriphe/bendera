<?php

namespace Matriphe\Bendera;

use Illuminate\Support\Facades\Facade;

class BenderaFacade extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return BenderaFactory::class;
    }
}

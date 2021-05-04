<?php

namespace Matriphe\Bendera;

use Stidges\CountryFlags\CountryFlag;

class Bendera implements BenderaInterface
{
    /**
     * @var CountryFlag
     */
    protected $countryFlag;

    /**
     * @param CountryFlag $countryFlag
     */
    public function __construct(CountryFlag $countryFlag)
    {
        $this->countryFlag = $countryFlag;
    }

    /**
     * @param  string  $countryCode
     * @return string|null
     */
    public function emoji($countryCode)
    {
        try {
            return $this->countryFlag->get($countryCode);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }
}

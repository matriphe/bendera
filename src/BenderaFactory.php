<?php

namespace Matriphe\Bendera;

use Stidges\CountryFlags\CountryFlag;

class BenderaFactory implements BenderaContract
{
    /**
     * @var CountryFlag
     */
    protected $countryFlag;

    /**
     * @param  CountryFlag  $countryFlag
     */
    public function __construct(CountryFlag $countryFlag)
    {
        $this->countryFlag = $countryFlag;
    }

    /**
     * @param  string  $countryCode
     * @return string|null
     */
    public function emoji(string $countryCode): ?string
    {
        try {
            return $this->countryFlag->get($countryCode);
        } catch (\InvalidArgumentException $e) {
            return null;
        }
    }
}

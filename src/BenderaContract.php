<?php

namespace Matriphe\Bendera;

interface BenderaContract
{
    /**
     * @param  string  $countryCode
     * @return string|null
     */
    public function emoji(string $countryCode): ?string;
}

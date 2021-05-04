<?php

namespace Matriphe\Bendera;

interface BenderaInterface
{
    /**
     * @param string $countryCode
     * @return string|null
     */
    public function emoji($countryCode);
}

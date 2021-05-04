<?php

namespace Matriphe\Bendera\Tests;

use Matriphe\Bendera\BenderaFactory;
use PHPUnit\Framework\TestCase;
use Stidges\CountryFlags\CountryFlag;

class BenderaTest extends TestCase
{
    /**
     * @return array[]
     */
    public function benderaData(): array
    {
        return [
            'ID mapped correctly' => [
                'aliases' => [],
                'country' => 'ID',
                'emoji' => '🇮🇩',
            ],
            'UK mapped to UK code' => [
                'aliases' => [],
                'country' => 'UK',
                'emoji' => '🇺🇰',
            ],
            'UK mapped to GB' => [
                'aliases' => ['uk' => 'gb'],
                'country' => 'UK',
                'emoji' => '🇬🇧',
            ],
            'invalid country return null' => [
                'aliases' => [],
                'country' => 'XYZ',
                'emoji' => null,
            ],
        ];
    }

    /**
     * @dataProvider benderaData
     *
     * @param  array  $aliases
     * @param  string  $country
     * @param  string|null  $emoji
     */
    public function testBenderaReturnsEmojiCorrectly(
        array $aliases,
        string $country,
        ?string $emoji
    ) {
        $countryFlag = new CountryFlag($aliases);
        $bendera = new BenderaFactory($countryFlag);

        $this->assertEquals($emoji, $bendera->emoji($country));
    }
}

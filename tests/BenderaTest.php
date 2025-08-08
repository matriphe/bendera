<?php

namespace Matriphe\Bendera\Tests;

use Matriphe\Bendera\BenderaFactory;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use Stidges\CountryFlags\CountryFlag;

class BenderaTest extends TestCase
{
    /**
     * @return array[]
     */
    public static function benderaData(): array
    {
        return [
            'ID mapped correctly' => [
                [], // aliases
                'ID', // country
                '🇮🇩', // emoji
            ],
            'UK mapped to UK code' => [
                [], // aliases
                'UK', // country
                '🇺🇰', // emoji
            ],
            'UK mapped to GB' => [
                ['uk' => 'gb'], // aliases
                'UK', // country
                '🇬🇧', // emoji
            ],
            'invalid country return null' => [
                [], // aliases
                'XYZ', // country
                null, // emoji
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
    #[DataProvider('benderaData')]
    public function testBenderaReturnsEmojiCorrectly(
        array $aliases,
        string $country,
        ?string $emoji
    ): void {
        $countryFlag = new CountryFlag($aliases);
        $bendera = new BenderaFactory($countryFlag);

        $this->assertEquals($emoji, $bendera->emoji($country));
    }
}

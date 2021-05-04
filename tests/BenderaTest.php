<?php

namespace Matriphe\Bendera\Tests;

use Matriphe\Bendera\Bendera;
use PHPUnit\Framework\TestCase;
use Stidges\CountryFlags\CountryFlag;

class BenderaTest extends TestCase
{
    public function benderaData()
    {
        return [
            'ID mapped correctly' => [
                'aliases' => [],
                'country' => 'ID',
                'emoji' => '🇮🇩'
            ],
            'UK mapped to UK code' => [
                'aliases' => [],
                'country' => 'UK',
                'emoji' => '🇺🇰'
            ],
            'UK mapped to GB' => [
                'aliases' => ['uk' => 'gb'],
                'country' => 'UK',
                'emoji' => '🇬🇧'
            ],
            'invalid country return null' => [
                'aliases' => [],
                'country' => 'XYZ',
                'emoji' => null
            ]
        ];
    }

    /**
     * @dataProvider benderaData
     *
     * @param $aliases
     * @param $country
     * @param $emoji
     */
    public function testBenderaReturnsEmojiCorrectly($aliases, $country, $emoji)
    {
        $countryFlag = new CountryFlag($aliases);
        $bendera = new Bendera($countryFlag);

        $this->assertEquals($emoji, $bendera->emoji($country));
    }
}

<?php

namespace Matriphe\Bendera\Tests;

use Illuminate\Foundation\Application;
use Matriphe\Bendera\BenderaFacade;
use Matriphe\Bendera\BenderaServiceProvider;
use PHPUnit\Framework\Attributes\DataProvider;
use Orchestra\Testbench\TestCase;

class FacadeTest extends TestCase
{
    /**
     * @return array[]
     */
    public static function benderaData()
    {
        return [
            'ID mapped correctly' => [
                'country' => 'ID',
                'emoji' => '🇮🇩',
            ],
            'GB mapped to GB' => [
                'country' => 'GB',
                'emoji' => '🇬🇧',
            ],
            'invalid country return null' => [
                'country' => 'XYZ',
                'emoji' => null,
            ],
            'EN mapped to GB' => [
                'country' => 'en',
                'emoji' => '🇬🇧',
            ],
            'UK mapped to GB' => [
                'country' => 'UK',
                'emoji' => '🇬🇧',
            ],
        ];
    }

    /**
     * @dataProvider benderaData
     *
     * @param  string  $country
     * @param  string|null  $emoji
     */
    #[DataProvider('benderaData')]
    public function testBenderaFacadeReturnsEmojiCorrectly(
        string $country,
        ?string $emoji
    ): void {
        $this->assertEquals($emoji, BenderaFacade::emoji($country));
    }

    /**
     * @param  Application  $app
     * @return string[]
     */
    protected function getPackageProviders($app): array
    {
        return [BenderaServiceProvider::class];
    }
}
